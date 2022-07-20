<?php

include_once("../database/config.php");

$id_barang = $_GET['barang'];
$id = $_GET['id'];

// $count = mysqli_query($mysqli, "SELECT COUNT(*) as jumlah FROM jenis_perangkat");
// $count_barangs = mysqli_fetch_assoc($count);

$query_barangs = mysqli_query($mysqli, "SELECT * FROM jenis_perangkat");
$query_kebutuhans = mysqli_query($mysqli, "SELECT * FROM kebutuhan");

// $query_barang = mysqli_query($mysqli, "SELECT * FROM jenis_perangkat WHERE id = $id_barang ORDER BY id DESC");
$query_barang = mysqli_query($mysqli, "SELECT * FROM jenis_perangkat WHERE id = $id_barang");
$query_details = mysqli_query($mysqli, "SELECT * FROM details_barang WHERE id = $id");

$data_barang = mysqli_fetch_array($query_barang);
$data_details = mysqli_fetch_array($query_details);


$query_kebutuhan_data_details = mysqli_query($mysqli, "SELECT * FROM kebutuhan WHERE id =" . $data_details['status_kebutuhan']);
$data_kebutuhan = mysqli_fetch_array($query_kebutuhan_data_details);

$dept_name = [
    'Board Of Director', 'Billing Support', 'Banking', 'Finance & Accounting',
    'Human Resource', 'HUB Operation', 'Legal', 'MP Upgrade', 'General Affair', 'Services Delivery',
    'Product Development', 'Purchasing', 'QMR', 'Sales & Marketing', 'Services', 'Warehouse & Logistic',
    'Workshop', 'Business Support', 'NIX', 'Bitnet'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?= $data_barang['nama_perangkat'] ?></title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/form.css" />

</head>

<body>
    <main class="moved-list-menu main-content">
        <section class="container">
            <h1 class="title-page" style="position:relative">
                Edit Data <?= $data_barang['nama_perangkat'] ?>
                <a href="data.php?barang=<?= $data_barang['id'] ?>" style="position:absolute; bottom:0; right:0; font-size: medium;">Back</a>
            </h1>
            <a href='show.php?barang=$id_barang&id=$barang[id]'></a>
            <form class="wrapper-column-create" method="post" action="../controller/update.php?barang=<?= $data_barang['id'] ?>&id=<?= $data_details['id'] ?>">
                <div class="column-create">
                    <label for="jenis_perangkat" class="description-data description-data--column-create">Jenis Perangkat</label>
                    <select name="jenis_perangkat" disabled id="jenis_perangkat" class="input">
                        <option value="<?php $data_barang['id'] ?>" selected disabled><?= $data_barang['nama_perangkat'] ?></option>
                        <?php while ($perangkat = mysqli_fetch_array($query_barangs)) { ?>
                            <option value="<?= $perangkat['id'] ?>"><?= $perangkat['nama_perangkat'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="column-create">
                    <label for="merk" class="description-data description-data--column-create">Merk </label>
                    <input type="text" class="input" id="merk" name="merk" value="<?= $data_details['merk'] ?>" />
                </div>
                <div class="column-create">
                    <label for="type_or_series" class="description-data description-data--column-create">Type/Series </label>
                    <input type="text" class="input" id="type_or_series" name="type_or_Seri" value="<?= $data_details['type_or_seri'] ?>" />
                </div>
                <div class="column-create">
                    <label for="sn_perangkat" class="description-data description-data--column-create">Serial Number </label>
                    <input type="text" class="input" id="sn_perangkat" name="sn_perangkat" value="<?= $data_details['sn_perangkat'] ?>" />
                </div>
                <div class="column-create">
                    <label for="sn_charger" class="description-data description-data--column-create">Charger Number</label>
                    <input type="text" class="input" id="sn_charger" name="sn_charger" value="<?= $data_details['sn_charger'] ?>" />
                </div>
                <div class="column-create">
                    <label for="spesifikasi" class="description-data description-data--column-create">Spesifikasi </label>
                    <input type="text" class="input" id="spesifikasi" name="spesifikasi" value="<?= $data_details['spesifikasi'] ?>" />
                </div>
                <!-- <div class="column-create">
                    <label for="status" class="description-data description-data--column-create">status </label>
                    <input type="text" class="input" required id="status" name="status" />
                </div> -->
                <div class="column-create">
                    <label for="status" class="description-data description-data--column-create">Status Kebutuhan</label>
                    <select name="status"  id="status" class="input">
                        <option value="<?php $data_kebutuhan['id'] ?> " selected ><?= $data_kebutuhan['nama_kebutuhan'] ?></option>
                        <?php while ($kebutuhan = mysqli_fetch_array($query_kebutuhans)) { ?>
                            <option value="<?= $kebutuhan['id'] ?>"><?= $kebutuhan['nama_kebutuhan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="column-create">
                    <label for="pengguna" class="description-data description-data--column-create">Pengguna </label>
                    <input type="text" class="input" required id="pengguna" name="pengguna" value="<?= $data_details['user'] ?>" />
                </div>
                <div class="column-create">
                    <label for="department" class="description-data description-data--column-create">Department</label>
                    <select name="department" disabled id="department" class="input">
                        <option value="<?php $data_details['department'] ?>" selected disabled><?= $data_details['department'] ?></option>
                        <?php for ($i = 0; $i < count($dept_name); $i++) { ?>
                            <option value="<?= $dept_name[$i] ?>"><?= $dept_name[$i] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="column-create">
                    <label for="serah_terima" class="description-data description-data--column-create">Serah Terima </label>
                    <input type="date" class="input" id="serah_terima" name="serah_terima" value="<?= $data_details['serah_terima'] ?>" />
                </div>
                <!-- #2 -->
                <div class="column-create">
                    <label for="perlengkapan" class="description-data description-data--column-create">Perlengkapan</label>
                    <input type="text" class="input" id="perlengkapan" name="perlengkapan" value="<?= $data_details['perlengkapan'] ?>" />
                </div>
                <div class="column-create">
                    <label for="jml_nb" class="description-data description-data--column-create">Jumlah Notebook</label>
                    <input type="number" class="input" id="jml_nb" name="jml_nb" value="<?= $data_details['jlm_nb'] ?>" />
                </div>
                <div class="column-create">
                    <label for="jml_pc" class="description-data description-data--column-create">Jumlah PC</label>
                    <input type="number" class="input" id="jml_pc" name="jml_pc" value="<?= $data_details['jlm_pc'] ?>" />
                </div>
                <div class="column-create">
                    <label for="windows_ori" class="description-data description-data--column-create">Windows Original</label>
                    <input type="text" class="input" id="windows_ori" name="windows_ori" value="<?= $data_details['windows_ori'] ?>" />
                </div>
                <div class="column-create">
                    <label for="no_po" class="description-data description-data--column-create">Nomor PO</label>
                    <input type="text" class="input" id="no_po" name="no_po" value="<?= $data_details['no_po'] ?>" />
                </div>
                <div class="column-create">
                    <label for="supplier" class="description-data description-data--column-create">Supplier</label>
                    <input type="text" class="input" id="supplier" name="supplier" value="<?= $data_details['suplier'] ?>" />
                </div>
                <div class="column-create">
                    <label for="operating_system" class="description-data description-data--column-create">Operating System</label>
                    <input type="text" class="input" id="operating_system" name="operating_system" value="<?= $data_details['windows_os'] ?>" />
                </div>
                <div class="column-create">
                    <label for="pengguna_sebelumnya" class="description-data description-data--column-create">Pengguna Sebelumnya </label>
                    <input type="text" class="input" id="pengguna_sebelumnya" name="pengguna_sebelumnya" value="<?= $data_details['pengguna_sebelumnya'] ?>" />
                </div>
                <div class="column-create">
                    <label for="jabatan" class="description-data description-data--column-create">Jabatan</label>
                    <input type="text" class="input" id="jabatan" name="jabatan" value="<?= $data_details['jabatan'] ?>" />
                </div>
                <div class="column-create">
                    <label for="lokasi" class="description-data description-data--column-create">Lokasi</label>
                    <input type="text" class="input" id="lokasi" name="lokasi" value="<?= $data_details['lokasi'] ?>" />
                </div>
                <div class="column-create">
                    <label for="tahun_pembelian" class="description-data description-data--column-create">Tahun Pembelian </label>
                    <input type="text" class="input" id="tahun_pembelian" name="tahun_pembelian" max="4" value="<?= $data_details['tahun_pembelian'] ?>" />
                </div>
                <div class="column-create">
                    <label for="keterangan" class="description-data description-data--column-create">Keterangan </label>
                    <input type="text" class="input" id="keterangan" name="keterangan" value="<?= $data_details['keterangan'] ?>" />
                </div>
                <!-- <div class="column-create">
                <label for="image1" class="description-data description-data--column-create">Image </label>
                <input type="file" class="input" id="image1" name="image1" accept="image/png, image/jpeg, image/jpg" />
            </div>
            <div class="column-create">
                <label for="image2" class="description-data description-data--column-create">Image </label>
                <input type="file" class="input" id="image2" name="image2" accept="image/png, image/jpeg, image/jpg" />
            </div> -->

                <button type="submit" name="edit" class="btn btn--check-in">Create Report</button>
            </form>
        </section>
    </main>
    <script src="../js/app.js"></script>
</body>

</html>


<!-- <sup class="required">*</sup></label> -->