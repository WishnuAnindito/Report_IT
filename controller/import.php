<?php
// Load file koneksi.php
include_once("../database/config.php");
// Load file autoload.php
require '../vendor/autoload.php';
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = $_POST['namafile'];
    $path = '../tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana
    $reader = new Xlsx();
    $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $jenis_perangkat_td = $row['B'];
    if(strcasecmp($row['B'], "Laptop") == 0){
        $jenis_perangkat = 1;
    }else if(strcasecmp($row['B'], "PC") == 0){
        $jenis_perangkat = 2;
    }else if(strcasecmp($row['B'], "Handphone") == 0){
        $jenis_perangkat = 3;
    }else if(strcasecmp($row['B'], "Hardware") == 0){
        $jenis_perangkat = 4;
    }else if(strcasecmp($row['B'], "Software") == 0){
        $jenis_perangkat = 5;
    }else if(strcasecmp($row['B'], "Printer") == 0){
        $jenis_perangkat = 6;
    }else if(strcasecmp($row['B'], "Kamera") == 0){
        $jenis_perangkat = 7;
    }else if(strcasecmp($row['B'], "Mouse") == 0){
        $jenis_perangkat = 8;
    }else if(strcasecmp($row['B'], "Parabola") == 0){
        $jenis_perangkat = 9;
    }else if(strcasecmp($row['B'], "Kabel") == 0){
        $jenis_perangkat = 10;
    }
    $merk = $row['C']; 
    $type_or_seri = $row['D']; 
    $sn_perangkat = $row['E']; 
    $sn_charger = $row['F'];
    $perlengkapan = $row['G'];
    $spesifikasi = $row['H'];
    if(strcasecmp($row['I'], "Pergantian Barang") == 0){
        $status_kebutuhan = 1;
    }else if(strcasecmp($row['I'], "Perbaikan Barang") == 0){
        $status_kebutuhan = 2;
    }else if(strcasecmp($row['I'], "Kerusakan Barang") == 0){
        $status_kebutuhan = 3;
    }else if(strcasecmp($row['I'], "Permintaan Barang") == 0){
        $status_kebutuhan = 4; 
    }
    $user = $row['J'];
    $department = $row['K'];
    $serah_terima = $row['L'];
    $keterangan = $row['M'];
    $jlm_nb = $row['N'];
    $jlm_pc = $row['O'];
    $windows_ori = $row['P'];
    $no_po = $row['Q'];
    $suplier = $row['R'];
    $windows_os = $row['S'];
    $pengguna_sebelumnya = $row['T'];
    $jabatan = $row['U'];
    $lokasi = $row['V'];
    $tahun_pembelian = $row['W'];

    if ($jenis_perangkat_td == "" && $merk == "" && $type_or_seri == "" && $sn_perangkat == "" && $sn_charger == "" && $perlengkapan == "" && $spesifikasi == "" && $status_kebutuhan == "" && $user == "" && $department == "" && $serah_terima == "" && $keterangan == "" && $jlm_nb == "" && $jlm_pc == "" && $windows_ori == "" && $no_po == "" && $suplier == "" && $windows_os == "" && $pengguna_sebelumnya == "" && $jabatan == "" && $lokasi == "" && $tahun_pembelian == "")
        continue;
    if($numrow > 1){
      // Buat query Insert
      $query = "INSERT INTO `office`.`details_barang` (`id`, `jenis_perangkat`, `merk`, `type_or_seri`, `sn_perangkat`, `sn_charger`, `perlengkapan`, `spesifikasi`, `status_kebutuhan`, `user`, `department`, `serah_terima`, `keterangan`, `jlm_nb`, `jlm_pc`, `windows_ori`, `no_po`, `suplier`, `windows_os`, `pengguna_sebelumnya`, `jabatan`, `lokasi`, `tahun_pembelian`) 
                  VALUES (NULL, '".$jenis_perangkat."', '".$merk."', '".$type_or_seri."', '".$sn_perangkat."', '".$sn_charger."', '".$perlengkapan."', '".$spesifikasi."', '".$status_kebutuhan."', '".$user."', '".$department."', '".$serah_terima."', '".$keterangan."', '".$jlm_nb."', '".$jlm_pc."', '".$windows_ori."', '".$no_po."', '".$suplier."', '".$windows_os."', '".$pengguna_sebelumnya."', '".$jabatan."', '".$lokasi."', '".$tahun_pembelian."');";
      // Eksekusi $query
      mysqli_query($mysqli, $query);
    }
    $numrow++; // Tambah 1 setiap kali looping
  }
    unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}
// die("berhasil");
header('location: /reportIT'); // Redirect ke halaman awal