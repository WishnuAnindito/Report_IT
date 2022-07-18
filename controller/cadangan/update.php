<?php
// include database connection file
include_once("../database/config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['edit'])) {
    // $id_barang = $_GET['barang'];
    // $id = $_GET['id'];
    // $nama_perangkat = $_POST['nama_perangkat'];
    $merk = $_POST['merk'];
    $type_or_seri = $_POST['type_or_Seri'];
    $laptop_number = $_POST['sn_laptop'];
    $charger_number = $_POST['sn_charger'];
    $perlengkapan = $_POST['perlengkapan'];
    $spesifikasi = $_POST['spesifikasi'];
    $status = $_POST['status'];
    $pengguna = $_POST['pengguna'];
    $department = $_POST['department'];
    $serah_terima = $_POST['serah_terima'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE details_barang 
        SET merk = '$merk',
        type_or_seri = '$type_or_seri',
        sn_laptop = '$laptop_number',
        sn_charger = '$charger_number',
        perlengkapan = '$perlengkapan',
        spesifikasi = '$spesifikasi',
        status_kebutuhan = '$status',
        user = '$pengguna',
        department = '$department',
        serah_terima = '$serah_terima',
        keterangan = '$keterangan'    
        WHERE id = 12";

    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // header("Location:  ../view/data.php?barang=" . $id_barang);
        header("Location:  ../view/data.php?barang=1");
    } else {
        echo "Aneh";
    }

    // `jlm_nb` = '',
    // `windows_ori` = 'xzcdsfsgd',
    // `no_po` = '4344',
    // `suplier` = 'czedafew',
    // `windows_os` = 'aszxczsfg',
    // `pengguna_sebelumnya` = 'bcbcbgfhfzczx',
    // `jabatan` = 'zrgdrgrgrgr',
    // `lokasi` = 'zxcadfweeq', 
    // `tahun_pembelian` = '2012' 
    // Redirect to homepage to display updated user in list
}
