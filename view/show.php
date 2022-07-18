<?php

include_once("../database/config.php");

$id_barang = $_GET['barang'];
$query_barang = mysqli_query($mysqli, "SELECT * FROM jenis_perangkat WHERE id =  $id_barang ORDER BY id DESC");
$data_barang = mysqli_fetch_array($query_barang);

$id = $_GET['id'];
$query_details = mysqli_query($mysqli, "SELECT * FROM details_barang WHERE id = $id");
$data_details = mysqli_fetch_array($query_details);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data_barang['nama_perangkat'] ?> Details</title>
    <!-- Bootstrap 5.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="position-relative">
            Details
            <a href="data.php?barang=<?= $data_barang['id'] ?>" class="position-absolute bottom-0 end-0 h5">Back</a>
        </h1>
        <div class="row mt-5 mb-3">
            <div class="col">
                <h4>Details Perangkat :</h4>
                <p>Jenis Perangkat : <?= $data_barang['nama_perangkat'] ?></p>
                <p>Merk : <?= $data_details['merk'] ?></p>
                <p>Type/Seri : <?= $data_details['type_or_seri'] ?></p>
                <p>Perlengkapan : <?= $data_details['perlengkapan'] ?></p>
                <p>Spesifikasi : <?= $data_details['spesifikasi'] ?></p>
                <p>Status : <?= $data_details['status_kebutuhan'] ?></p>
                <p>Serah Terima : <?= $data_details['serah_terima'] ?></p>
                <p>Keterangan : <?= $data_details['keterangan'] ?></p>
                <p>Windows ORI : <?= $data_details['windows_ori'] ?></p>
                <p>No PO : <?= $data_details['no_po'] ?></p>
                <p>Supplier : <?= $data_details['suplier'] ?></p>
                <p>Windows OS : <?= $data_details['windows_os'] ?></p>
                <p>Pengguna Sebelumnya : <?= $data_details['pengguna_sebelumnya'] ?></p>

                <p>Lokasi : <?= $data_details['lokasi'] ?></p>
                <p>Tahun Pembelian : <?= $data_details['tahun_pembelian'] ?></p>
            </div>
            <div class="col">
                <h4>Serial Number:</h4>
                <p>Laptop : <?= $data_details['sn_perangkat'] ?></p>
                <p>Charger : <?= $data_details['sn_charger'] ?></p>
                <br>
                <h4>User Details:</h4>
                <p>User : <?= $data_details['user'] ?></p>
                <p>Departement : <?= $data_details['department'] ?></p>
                <p>Jabatan : <?= $data_details['jabatan'] ?></p>
            </div>
        </div>


    </div>

    <!-- Bootstrap 5.1 Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>