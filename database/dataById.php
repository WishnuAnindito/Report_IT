<?php
include_once("config.php");

// Decalre GET Data

$details_id = $_GET['detail'];
$image_id = $_GET['image'];
$kebutuhan_id = $_GET['kebutuhan'];


// Declare Query
$query_barang_by_id = "SELECT * FROM jenis_perangkat WHERE id =  $id_barang ORDER BY id DESC";

$query_details_barang_by_id = "SELECT * FROM details_barang WHERE details_barang =  $barang_id";

// Decalre Query Execution
$exec_query_barang_by_id = mysqli_query($mysqli, $query_barang_by_id);
$exec_query_details_barang_by_id = mysqli_query($mysqli, $query_details_barang_by_id);
