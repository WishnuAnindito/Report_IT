<?php
// include database connection file
include_once("../database/config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['edit'])) {
    $id_barang = $_GET['barang'];
    $id = $_GET['id'];
    // $nama_perangkat = $_POST['nama_perangkat'];
    $merk = $_POST['merk'];
    $type_or_seri = $_POST['type_or_Seri'];
    $sn_perangkat = $_POST['sn_perangkat'];
    $charger_number = $_POST['sn_charger'];
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

    $query = "UPDATE details_barang 
        SET merk = '$merk',
        type_or_seri = '$type_or_seri',
        sn_perangkat = '$sn_perangkat',
        sn_charger = '$charger_number',
        perlengkapan = '$perlengkapan',
        spesifikasi = '$spesifikasi',
        status_kebutuhan = '$status',
        user = '$pengguna',
        department = '$department',
        serah_terima = '$serah_terima',
        keterangan = '$keterangan',   
        jlm_nb = '$jml_nb',   
        jlm_pc = '$jml_pc',   
        windows_ori = '$windows_ori',   
        no_po = '$no_po',   
        suplier = '$suplier',
        windows_os = '$windows_os',   
        pengguna_sebelumnya = '$pengguna_sebelumnya',   
        jabatan = '$jabatan',   
        lokasi = '$lokasi',   
        tahun_pembelian = '$tahun_pembelian' 
        WHERE id = $id";

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
