<?php


require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Data</title>
    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Sembunyikan alert validasi kosong
            $("#kosong").hide();
        });
    </script>
</head>
<body>
    <form action="excel.php" enctype="multipart/form-data" method="post">
        <a href="../Format.xlsx">Download Format</a>
        <br><br>

        <input type="file" name="file">
        <button type="submit" name="preview">Preview</button>
    </form>
    <hr>
    <?php
    // Jika user telah mengklik tombol Preview
    if (isset($_POST['preview'])) {
        $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
        $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';
        // Cek apakah terdapat file data.xlsx pada folder tmp
        if (is_file('../tmp/' . $nama_file_baru)) // Jika file tersebut ada
            unlink('../tmp/' . $nama_file_baru); // Hapus file tersebut
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['file']['tmp_name'];
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if ($ext == "xlsx") {
            // Upload file yang dipilih ke folder tmp
            // dan rename file tersebut menjadi data{tglsekarang}.xlsx
            // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
            // Contoh nama file setelah di rename : data20210814192500.xlsx
            move_uploaded_file($tmp_file, '../tmp/' . $nama_file_baru);
            $reader = new Xlsx();
            $spreadsheet = $reader->load('../tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            // Buat sebuah tag form untuk proses import data ke database
            echo "<form method='post' action='../controller/import.php'>";
            // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
            // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
            echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";
            // Buat sebuah div untuk alert validasi kosong
        //     echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
        //   Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
        //         </div>";
            echo "<table border='1' cellpadding='5'>
          <tr>
            <th colspan='5' class='text-center'>Preview Data</th>
          </tr>
          <tr>
            <th>Jenis Perangkat</th>
            <th>Merk</th>
            <th>Type/Seri</th>
            <th>Serial Number Perangkat</th>
            <th>Serial Number Charger</th>
            <th>Perlengkapan</th>
            <th>Spesifikasi</th>
            <th>Status</th>
            <th>User</th>
            <th>Department</th>
            <th>Serah Terima</th>
            <th>Keterangan</th>
            <th>Jlm NB</th>
            <th>Jlm PC</th>
            <th>Windows Ori</th>
            <th>No PO</th>
            <th>Suplier</th>
            <th>Windows OS</th>
            <th>Pengguna Sebelumnya</th>
            <th>Jabatan</th>
            <th>Lokasi</th>
            <th>Tahun Pembelian</th>
          </tr>";
            $numrow = 1;
            $kosong = 0;
            $jenis_perangkat = 0;
            foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
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
                $status_kebutuhan = $row['I'];
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
                // Cek jika semua data tidak diisi
                if ($jenis_perangkat_td == "" && $merk == "" && $type_or_seri == "" && $sn_perangkat == "" && $sn_charger == "" && $perlengkapan == "" && $spesifikasi == "" && $status_kebutuhan == "" && $user == "" && $department == "" && $serah_terima == "" && $keterangan == "" && $jlm_nb == "" && $jlm_pc == "" && $windows_ori == "" && $no_po == "" && $suplier == "" && $windows_os == "" && $pengguna_sebelumnya == "" && $jabatan == "" && $lokasi == "" && $tahun_pembelian == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if ($numrow > 1) {
                    // Validasi apakah semua data telah diisi
                    // $jenis_perangkat_td = (!empty($jenis_perangkat)) ? "" : " style='background: #E07171;'"; 
                    // $merk_td = (!empty($merk)) ? "" : " style='background: #E07171;'"; 
                    // $type_td = (!empty($type_or_seri)) ? "" : " style='background: #E07171;'"; 
                    // $sn_perangkat_td = (!empty($sn_perangkat)) ? "" : " style='background: #E07171;'"; 
                    // $sn_charger_td = (!empty($sn_charger)) ? "" : " style='background: #E07171;'"; 
                    // $perlengkapan_td = (!empty($perlengkapan)) ? "" : " style='background: #E07171;'"; 
                    // Jika salah satu data ada yang kosong
                    // if ($jenis_perangkat_td == "" or $merk == "" or $type_or_seri == "" or $sn_perangkat == "" or $sn_charger == "" or $perlengkapan == "" or $spesifikasi == "" or $status_kebutuhan == "" or $user == "" or $department == "" or $serah_terima == "" or $keterangan == "" or $jlm_nb == "" or $jlm_pc == "" or $windows_ori == "" or $no_po == "" or $suplier == "" or $windows_os == "" or $pengguna_sebelumnya == "" or $jabatan == "" or $lokasi == "" or $tahun_pembelian == "") {
                    //     $kosong++; // Tambah 1 variabel $kosong
                    // }
                    echo "<tr>";
                    echo "<td>" . $jenis_perangkat . "</td>";
                    echo "<td>" . $merk . "</td>";
                    echo "<td>" . $type_or_seri . "</td>";
                    echo "<td>" . $sn_perangkat . "</td>";
                    echo "<td>" . $sn_charger . "</td>";
                    echo "<td>" . $perlengkapan . "</td>";
                    echo "<td>" . $spesifikasi . "</td>";
                    echo "<td>" . $status_kebutuhan . "</td>";
                    echo "<td>" . $user . "</td>";
                    echo "<td>" . $department . "</td>";
                    echo "<td>" . $serah_terima . "</td>";
                    echo "<td>" . $keterangan . "</td>";
                    echo "<td>" . $jlm_nb . "</td>";
                    echo "<td>" . $jlm_pc . "</td>";
                    echo "<td>" . $windows_ori . "</td>";
                    echo "<td>" . $no_po . "</td>";
                    echo "<td>" . $suplier . "</td>";
                    echo "<td>" . $windows_os . "</td>";
                    echo "<td>" . $pengguna_sebelumnya . "</td>";
                    echo "<td>" . $jabatan . "</td>";
                    echo "<td>" . $lokasi . "</td>";
                    echo "<td>" . $tahun_pembelian . "</td>";
                    echo "</tr>";
                }
                $numrow++; // Tambah 1 setiap kali looping
            }
            echo "</table>";
            // Cek apakah variabel kosong lebih dari 0
            // Jika lebih dari 0, berarti ada data yang masih kosong
            // if ($kosong > 0) {
    ?>
                <script>
                    // $(document).ready(function() {
                    //     // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                    //     $("#jumlah_kosong").html('echo $kosong;');
                    //     $("#kosong").show(); // Munculkan alert validasi kosong
                    // });
                </script>
     <?php
            // } else { // Jika semua data sudah diisi
                echo "<hr>";
                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import'>Import</button>";
            // }
            echo "</form>";
        } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
            // Munculkan pesan validasi
            echo "<div style='color: red;margin-bottom: 10px;'>
          Hanya File Excel 2007 (.xlsx) yang diperbolehkan
                </div>";
        }
    }
    ?>
</body>
</html>