<?php
include_once("../database/config.php");

if (isset($_POST['create'])) {
    $merk = $_POST['merk'];
    $type_or_Seri = $_POST['type_or_Seri'];
    $sn_laptop = $_POST['sn_laptop'];
    $sn_charger = $_POST['sn_charger'];
    $perlengkapan = $_POST['perlengkapan'];
    $spesifikasi = $_POST['spesifikasi'];
    $status = $_POST['status'];
    $pengguna = $_POST['pengguna'];
    $department = $_POST['department'];
    $serah_terima = $_POST['serah_terima'];
    $keterangan = $_POST['keterangan'];

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO details_barang 
        (jenis_perangkat,merk,type_or_seri,sn_laptop,sn_charger,perlengkapan,
        spesifikasi,status_kebutuhan,user,department,serah_terima,keterangan) 
        VALUES(1,'$merk','$type_or_Seri', '$sn_laptop','$sn_charger','$perlengkapan', 
        '$spesifikasi','$status','$pengguna', '$department',
        '$serah_terima','$keterangan')");

    // Show message when user added
    if ($result) {
        echo "User added successfully. <a href='index.php'>View Users</a>";
    } else {
        echo "gagal";
    }
}
?>
</body>

</html>