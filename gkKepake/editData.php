<?php
include_once("../database/config.php");

$id = $_GET['barang'];
$id_details = $_GET['id'];
$query_perangkat =  mysqli_query($mysqli, "SELECT * FROM jenis_perangkat WHERE id = $id");
$query_kebutuhan  =  mysqli_query($mysqli, "SELECT * FROM kebutuhan");
$query_details = mysqli_query($mysqli, "SELECT * FROM details_perangkat WHERE id = $id_details");

$data = mysqli_fetch_array($query_perangkat);
$data_details = mysqli_fetch_array($query_details);

$dept_name = [
    'Board Of Director', 'Billing Support', 'Banking', 'Finance & Accounting',
    'Human Resource', 'HUB Operation', 'Legal', 'MP Upgrade', 'General Affair', 'Services Delivery',
    'Product Development', 'Purchasing', 'QMR', 'Sales & Marketing', 'Services', 'Warehouse & Logistic',
    'Workshop', 'Business Support', 'NIX', 'Bitnet'
];
?>

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="../css/form.css" />

<main class="moved-list-menu main-content">
    <section class="container">
        <h1 class="title-page">Edit Data <?= $data['nama_perangkat'] ?></h1>
        <!-- Form -->
        <?php
        if ($data['nama_perangkat'] == 'Laptop') {
            include "laptopEdit.php";
        } elseif ($data['nama_perangkat'] == 'PC') {
            include 'pc.php';
        }
        ?>
    </section>
</main>

<script src="../../js/app.js"></script>