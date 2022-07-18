<?php
include_once("../database/config.php");

// if (isset($_POST[''])) {
$id = $_GET['id'];
$id_barang = $_GET['barang'];

// update user data
$query = "DELETE FROM `details_barang` WHERE `details_barang`.`id` = $id";

if ($delete = mysqli_query($mysqli, $query)) {
    header("Location: ../view/data.php?barang=" . $id_barang);
    // echo "<alert>Data Berhasil Di Hapus</alert>";
    // die();
} else {
    echo "Data cannot be deleted";
}

    // Redirect to homepage to display updated user in list
// }
