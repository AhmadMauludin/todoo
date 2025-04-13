<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2>Tambah Tugas Baru</h2>

<form action="<?= site_url('tugas/store') ?>" method="post" enctype="multipart/form-data" class="form-container">
    <div class="form-group">
        <label for="tugas">Tugas</label>
        <input name="tugas" type="text" id="tugas" required />
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" />
    </div>

    <div class="form-group">
        <label for="waktu">Waktu</label>
        <input type="time" name="waktu" id="waktu" />
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="To do">To do</option>
            <option value="Berjalan">Berjalan</option>
            <option value="Selesai">Selesai</option>
            <option value="Batal">Batal</option>
        </select>
    </div>

    <div class="form-group">
        <label for="foto">Foto</label>
        <input name="foto" type="file" id="foto" />
    </div>
    <br>
    <div class="form-actions">
        <a href="<?= base_url('tugas'); ?>" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn">Tambah Tugas</button>
    </div>
</form>

<?= $this->endSection(); ?>