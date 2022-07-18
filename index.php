<?php
include_once("database/config.php");
$query_barangs = mysqli_query($mysqli, "SELECT * FROM jenis_perangkat");
$i = 5;
$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <?php
    echo '<ul>';
    while ($data = mysqli_fetch_array($query_barangs)) {
        echo "<li style='--i:" . $i . ";'>";
        echo  "<a href='view/data.php?barang=" . $data['id'] . "'>" . $data['nama_perangkat'] . "</a>";
        echo "</li>";
        $i--;
        if ($i == 0) {
            $i = 5;
            echo '</ul><ul>';
        }
        // echo $data['id'] . $data['nama_perangkat'];
    }
    echo '</ul>';
    ?>
</body>

</html>