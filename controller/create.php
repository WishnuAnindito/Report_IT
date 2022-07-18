<?php
include_once("../database/config.php");

if (isset($_POST['create'])) {
    $jenis_perangkat = $_POST['jenis_perangkat'];
    $merk = $_POST['merk'];
    $type_or_Seri = $_POST['type_or_Seri'];
    $sn_perangkat = $_POST['sn_perangkat'];
    $sn_charger = $_POST['sn_charger'];
    $perlengkapan = $_POST['perlengkapan'];
    $spesifikasi = $_POST['spesifikasi'];
    $status = $_POST['status'];
    $pengguna = $_POST['pengguna'];
    $department = $_POST['department'];
    $serah_terima = $_POST['serah_terima'];
    $keterangan = $_POST['keterangan'];

    $jml_nb = $_POST['jml_nb'];
    $jml_pc = $_POST['jml_pc'];
    $windows_ori = $_POST['windows_ori'];
    $no_po = $_POST['no_po'];
    $supplier = $_POST['supplier'];
    $operating_system = $_POST['operating_system'];
    $pengguna_sebelumnya = $_POST['pengguna_sebelumnya'];
    $jabatan = $_POST['jabatan'];
    $lokasi = $_POST['lokasi'];
    $tahun_pembelian = $_POST['tahun_pembelian'];

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO details_barang 
        (jenis_perangkat,merk,type_or_seri,sn_perangkat,sn_charger,perlengkapan,
        spesifikasi,status_kebutuhan,user,department,serah_terima,keterangan,jlm_nb,jlm_pc,
        windows_ori,no_po,suplier,windows_os,pengguna_sebelumnya,jabatan,lokasi,tahun_pembelian) 
        VALUES
        ($jenis_perangkat,'$merk','$type_or_Seri', '$sn_perangkat','$sn_charger','$perlengkapan', 
        '$spesifikasi',$status,'$pengguna', '$department','$serah_terima','$keterangan', 
        $jml_nb,$jml_pc,'$windows_ori','$no_po','$supplier','$operating_system',
        '$pengguna_sebelumnya','$jabatan','$lokasi','$tahun_pembelian')");

    // Show message when user added
    if ($result) {
        echo "User added successfully. <a href='../view/data.php?barang=$jenis_perangkat'>View Users</a>";
    } else {
        echo "gagal";
    }
}
