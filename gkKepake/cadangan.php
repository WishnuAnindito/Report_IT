<?php include 'index.php';
<select name="department" id="department" class="input">
<option value="" selected disabled><?= $data_details['department'] ?></option>
<?php for ($i = 0; $i < count($dept_name); $i++) { ?>
    <option value="<?= $dept_name[$i] ?>"><?= $dept_name[$i] ?></option>
<?php } ?>
</select>


<div class="column-create">
<label for="nama_perangkat" class="description-data description-data--column-create">Jenis Perangkat
    <select name="nama_perangkat" id="nama_perangkat" class="input">
        <?php while ($row = mysqli_fetch_assoc($query_barangs)) { ?>
            <option value='<?= $row['id'] ?>'><?= $row['nama_perangkat'] ?></option>
        <?php } ?>
    </select>
</div>