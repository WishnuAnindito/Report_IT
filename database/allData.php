<?php
include_once("config.php");


$query_kebutuhan = mysqli_query($mysqli, "SELECT * FROM kebutuhan");
// $query_department = mysqli_query($mysqli, "SELECT * FROM department");
$query_image = mysqli_query($mysqli, "SELECT * FROM image");
