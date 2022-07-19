<?php


require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


// if(isset($_POST['submit'])){


  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());


    // echo "You have total ".$totalSheet." sheets".


    // $html="<table border='1'>";
    // $html.="<tr><th>Title</th><th>Description</th></tr>";


    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);


      foreach ($Reader as $Row)
      {
        // $html.="<tr>";
        switch ($Row[1]) {
          case 'Laptop':
            $jenis_perangkat = 1;
            break;
          
          case 'Komputer':
            $jenis_perangkat = 2;
            break;
          
          case 'Handphone':
            $jenis_perangkat = 3;
            break;
          
          case 'Hardware':
            $jenis_perangkat = 4;
            break;
          
          case 'Software':
            $jenis_perangkat = 5;
            break;
          
          case 'Printer':
            $jenis_perangkat = 6;
            break;
          
          case 'Kamera':
            $jenis_perangkat = 7;
            break;
          
          case 'Mouse':
            $jenis_perangkat = 8;
            break;
          
          case 'Parabola':
            $jenis_perangkat = 9;
            break;
          
          case 'Kabel':
            $jenis_perangkat = 10;
            break;
  
          default:
            $jenis_perangkat = 0;
            break;
        }
        $merk = isset($Row[2]) ? $Row[2] : '';
        $type_or_seri = isset($Row[3]) ? $Row[3] : '';
        $sn_perangkat = isset($Row[4]) ? $Row[4] : '';
        $sn_charger = isset($Row[5]) ? $Row[5] : '';
        $perlengkapan = isset($Row[6]) ? $Row[6] : '';
        $spesifikasi = isset($Row[7]) ? $Row[7] : '';
        $status_kebutuhan = isset($Row[8]) ? $Row[8] : '';
        $user = isset($Row[9]) ? $Row[9] : '';
        $department = isset($Row[10]) ? $Row[10] : '';
        $serah_terima = isset($Row[11]) ? $Row[11] : '';
        $keterangan = isset($Row[12]) ? $Row[12] : '';
        $jlm_nb = isset($Row[13]) ? $Row[13] : '';
        $jlm_pc = isset($Row[14]) ? $Row[14] : '';
        $windows_ori = isset($Row[15]) ? $Row[15] : '';
        $no_po = isset($Row[16]) ? $Row[16] : '';
        $suplier = isset($Row[17]) ? $Row[17] : '';
        $windows_os = isset($Row[18]) ? $Row[18] : '';
        $pengguna_sebelumnya = isset($Row[19]) ? $Row[19] : '';
        $jabatan = isset($Row[20]) ? $Row[20] : '';
        $lokasi = isset($Row[21]) ? $Row[21] : '';
        $tahun_pembelian = isset($Row[22]) ? $Row[22] : '';
        // $html.="<td>".$title."</td>";
        // $html.="<td>".$description."</td>";
        // $html.="</tr>";
        var_dump($jenis_perangkat);
        die();

        $query = "INSERT INTO `office`.`details_barang` (`id`, `jenis_perangkat`, `merk`, `type_or_seri`, `sn_perangkat`, `sn_charger`, `perlengkapan`, `spesifikasi`, `status_kebutuhan`, `user`, `department`, `serah_terima`, `keterangan`, `jlm_nb`, `jlm_pc`, `windows_ori`, `no_po`, `suplier`, `windows_os`, `pengguna_sebelumnya`, `jabatan`, `lokasi`, `tahun_pembelian`) 
                  VALUES (NULL, '".$jenis_perangkat."', '".$merk."', '".$type_or_seri."', '".$sn_perangkat."', '".$sn_charger."', '".$perlengkapan."', '".$spesifikasi."', '".$status_kebutuhan."', '".$user."', '".$department."', '".$serah_terima."', '".$keterangan."', '".$jlm_nb."', '".$jlm_pc."', '".$windows_ori."', '".$no_po."', '".$suplier."', '".$windows_os."', '".$pengguna_sebelumnya."', '".$jabatan."', '".$lokasi."', '".$tahun_pembelian."');";
        // $query = "insert into items(title,description) values('".$title."','".$description."')";


        $mysqli->query($query);
       }


    }

    // $html.="</table>";
    // echo $html;
    // echo "<br />Data Inserted in dababase";


  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }


// }


?>

