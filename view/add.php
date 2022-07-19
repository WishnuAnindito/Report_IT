<?php
include_once("../database/config.php");

// $id = $_GET['barang'];
// $query_perangkat =  mysqli_query($mysqli, "SELECT * FROM jenis_perangkat WHERE id = $id");
$query_data_perangkat = mysqli_query($mysqli, "SELECT * FROM jenis_perangkat");
// $data = mysqli_fetch_array($query_data_perangkat);
$query_kebutuhan  =  mysqli_query($mysqli, "SELECT * FROM kebutuhan");


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
  <title>Add New Data</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/form.css" />
</head>
<body>
    <main class="moved-list-menu main-content">
        <section class="container">
            <h1 class="title-page" style="position:relative">
                Add New Data 
                <a href="/reportIT" style="position:absolute; bottom:0; right:0; font-size: medium;">Back</a>
            </h1>
            <!-- Form -->
            <form class="wrapper-column-create" method="post" action="../controller/create.php">
                <div class="column-create">
                    <label for="jenis_perangkat" class="description-data description-data--column-create">Jenis Perangkat<sup class="required">*</sup></label>
                    <select name="jenis_perangkat" id="jenis_perangkat" class="input" required>
                        <option value="" selected disabled>Jenis Perangkat</option>
                        <?php while ($perangkat = mysqli_fetch_array($query_data_perangkat)) { ?>
                            <option value="<?= $perangkat['id'] ?>"><?= $perangkat['nama_perangkat'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="column-create">
                    <label for="merk" class="description-data description-data--column-create">Merk <sup class="required">*</sup></label>
                    <input type="text" class="input" required id="merk" name="merk" />
                </div>
                <div class="column-create">
                    <label for="type_or_series" class="description-data description-data--column-create">Type/Series <sup class="required">*</sup></label>
                    <input type="text" class="input" required id="type_or_series" name="type_or_Seri" />
                </div>
                <div class="column-create">
                    <label for="sn_perangkat" class="description-data description-data--column-create">Serial Number <sup class="required">*</sup></label>
                    <input type="text" class="input" required id="sn_perangkat" name="sn_perangkat" />
                </div>
                <div class="column-create">
                    <label for="sn_charger" class="description-data description-data--column-create">Charger Number</label>
                    <input type="text" class="input" id="sn_charger" name="sn_charger" />
                </div>
                <div class="column-create">
                    <label for="spesifikasi" class="description-data description-data--column-create">Spesifikasi <sup class="required">*</sup></label>
                    <input type="text" class="input" required id="spesifikasi" name="spesifikasi" />
                </div>
                <!-- <div class="column-create">
                        <label for="status" class="description-data description-data--column-create">status <sup class="required">*</sup></label>
                        <input type="text" class="input" required id="status" name="status" />
                    </div> -->
                <div class="column-create">
                    <label for="status" class="description-data description-data--column-create">Status Kebutuhan<sup class="required">*</sup></label>
                    <select name="status" id="status" class="input">
                        <option value="" selected disabled>Status Kebutuhan</option>
                        <?php while ($kebutuhan = mysqli_fetch_array($query_kebutuhan)) { ?>
                            <option value="<?= $kebutuhan['id'] ?>"><?= $kebutuhan['nama_kebutuhan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="column-create">
                    <label for="pengguna" class="description-data description-data--column-create">Pengguna <sup class="required">*</sup></label>
                    <input type="text" class="input" required id="pengguna" name="pengguna" />
                </div>
                <div class="column-create">
                    <label for="department" class="description-data description-data--column-create">Department<sup class="required">*</sup></label>
                    <select name="department" id="department" class="input">
                        <option value="" selected disabled>Department</option>
                        <?php for ($i = 0; $i < count($dept_name); $i++) { ?>
                            <option value="<?= $dept_name[$i] ?>"><?= $dept_name[$i] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="column-create">
                    <label for="serah_terima" class="description-data description-data--column-create">Serah Terima <sup class="required">*</sup></label>
                    <input type="date" class="input" required id="serah_terima" name="serah_terima" />
                </div>
                <!-- #2 -->
                <div class="column-create">
                    <label for="perlengkapan" class="description-data description-data--column-create">Perlengkapan</label>
                    <input type="text" class="input" id="perlengkapan" name="perlengkapan" />
                </div>
                <div class="column-create">
                    <label for="jml_nb" class="description-data description-data--column-create">Jumlah Notebook</label>
                    <input type="number" class="input" id="jml_nb" name="jml_nb" />
                </div>
                <div class="column-create">
                    <label for="jml_pc" class="description-data description-data--column-create">Jumlah PC</label>
                    <input type="number" class="input" id="jml_pc" name="jml_pc" />
                </div>
                <div class="column-create">
                    <label for="windows_ori" class="description-data description-data--column-create">Windows Original</label>
                    <input type="text" class="input" id="windows_ori" name="windows_ori" />
                </div>
                <div class="column-create">
                    <label for="no_po" class="description-data description-data--column-create">Nomor PO</label>
                    <input type="text" class="input" id="no_po" name="no_po" />
                </div>
                <div class="column-create">
                    <label for="supplier" class="description-data description-data--column-create">Supplier</label>
                    <input type="text" class="input" id="supplier" name="supplier" />
                </div>
                <div class="column-create">
                    <label for="operating_system" class="description-data description-data--column-create">Operating System</label>
                    <input type="text" class="input" id="operating_system" name="operating_system" />
                </div>
                <div class="column-create">
                    <label for="pengguna_sebelumnya" class="description-data description-data--column-create">Pengguna Sebelumnya </label>
                    <input type="text" class="input" id="pengguna_sebelumnya" name="pengguna_sebelumnya" />
                </div>
                <div class="column-create">
                    <label for="jabatan" class="description-data description-data--column-create">Jabatan</label>
                    <input type="text" class="input" id="jabatan" name="jabatan" />
                </div>
                <div class="column-create">
                    <label for="lokasi" class="description-data description-data--column-create">Lokasi</label>
                    <input type="text" class="input" id="lokasi" name="lokasi" />
                </div>
                <div class="column-create">
                    <label for="tahun_pembelian" class="description-data description-data--column-create">Tahun Pembelian </label>
                    <input type="text" class="input" id="tahun_pembelian" name="tahun_pembelian" max="4" />
                </div>
                <div class="column-create">
                    <label for="keterangan" class="description-data description-data--column-create">Keterangan </label>
                    <input type="text" class="input" id="keterangan" name="keterangan" />
                </div>
                <!-- <div class="column-create">
                    <label for="image1" class="description-data description-data--column-create">Image </label>
                    <input type="file" class="input" id="image1" name="image1" accept="image/png, image/jpeg, image/jpg" />
                </div>
                <div class="column-create">
                    <label for="image2" class="description-data description-data--column-create">Image </label>
                    <input type="file" class="input" id="image2" name="image2" accept="image/png, image/jpeg, image/jpg" />
                </div> -->
    
                <button type="submit" name="create" class="btn btn--check-in">Create Report</button>
            </form>
        </section>
    </main>
    
    <script src="../../js/app.js"></script>
</body>
</html>


