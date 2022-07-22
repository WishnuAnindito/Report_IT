<?php

include_once("../database/config.php");


// $id_barang = $_GET['barang'];
$query_barangs = mysqli_query($mysqli, "SELECT * FROM jenis_perangkat");
$data_barang = mysqli_fetch_array($query_barangs);
$id_barang = $data_barang['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data_barang['nama_perangkat'] ?> Data List</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Vendors DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.css" />
    <!-- Vendor Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/styles.css" />
    <!-- Bootstrap 5.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="moved-list-menu main-content">
        <section class="container">
            <h1 class="title-page">Perangkat Rusak<a href="/reportIT" class="h5 float-end">Back</a></h1>
            <div class="wrapper-table-attendance wrapper-table-attendance--not-border">
                <!-- <a href="excel.php" class="btn btn-success">Import Excel</a> -->
                <table id="reports" width='80%' border=1>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Jenis Perangkat</td>
                            <td>Merk</td>
                            <td>User</td>
                            <td>Department</td>
                            <td>Keterangan</td>
                            <td>Action </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $query =  "SELECT * from details_barang WHERE
                            id =" . $id_barang . "AND (
                            merk LIKE '%" . $search . "%' OR 
                            type_or_seri  LIKE '%" . $search . "%' OR
                            user LIKE '%" . $search . "%' OR 
                            department LIKE '%" . $search . "%' OR
                            keterangan LIKE '%" . $search . "%')";
                            $data = mysqli_query($mysqli, $query);
                        } else {
                            $query = "SELECT 
                                        details_barang.jenis_perangkat AS perangkat_id, 
                                        details_barang.id AS details_id,
                                        nama_perangkat,
                                        merk,
                                        user,
                                        department,
                                        keterangan
                                     FROM details_barang JOIN jenis_perangkat ON details_barang.jenis_perangkat = jenis_perangkat.id WHERE status_kebutuhan = 3 ORDER BY details_barang.id DESC";
                            $data = mysqli_query($mysqli, $query);
                        }

                        $no = 1;
                        while ($barang = mysqli_fetch_array($data)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $barang['nama_perangkat'] . "</td>";
                            echo "<td>" . $barang['merk'] . "</td>";
                            echo "<td>" . $barang['user'] . "</td>";
                            echo "<td>" . $barang['department'] . "</td>";
                            echo "<td>" . $barang['keterangan'] . "</td>";
                            // echo "<td><a href='edit.php?id=$barang[id]'>Edit</a> | <a href='delete.php?id=$barang[id]'>Delete</a></td></tr>";
                            echo "<td class='d-flex flex-row'>
                                    <a href='show.php?barang=$barang[perangkat_id]&id=$barang[details_id]' class='btn btn-warning d-flex justify-content-center align-items-center me-1' style='width:30px; height: 30px;'><i class='fa fa-eye' aria-hidden='true'></i></a>
                                    <a href='edit.php?barang=$barang[perangkat_id]&id=$barang[details_id]' class='btn btn-success d-flex justify-content-center align-items-center' style='width:30px; height: 30px;'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                    <a href='../controller/delete.php?barang=$barang[perangkat_id]&id=$barang[details_id]' class='btn btn-danger d-flex justify-content-center align-items-center ms-1' style='width:30px; height: 30px;'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                    </td>";
                        }
                        ?>
                        <!-- <form action='/controller/delete.php?barang=$id_barang?id=$barang[id]' method='POST' class='d-flex flex-row'>
                                    <button type='submit' class='btn btn-danger d-flex justify-content-center align-items-center ms-1' style='width:30px; height: 30px;'><i class='fa fa-trash-o' aria-hidden='true'></i></button>
                                </form> -->

                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Bundle Bootstrap 5.1 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Vendors DataTable & Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.js"></script>

    <!-- Buat export -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/app.js"></script>
    <script src="../js/data-tables.js"></script>
</body>

</html>