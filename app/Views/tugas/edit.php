<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="form-container">
    <h2 style="text-align:center; color:#273c75;">Edit Data Tugas</h2>

    <div style="text-align:center; margin-bottom: 15px;">
        <img src="<?= base_url('uploads/tugas/' . $tugas['foto']) ?>" width="80" style="border-radius: 8px;">
    </div>

    <form action="<?= site_url('tugas/update/' . $tugas['id']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_foto" value="<?= $tugas['foto'] ?>">

        <div class="form-group">
            <label for="tugas">Tugas</label>
            <input name="tugas" id="tugas" type="text" value="<?= $tugas['tugas'] ?>" required>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="<?= $tugas['tanggal'] ?>">
        </div>

        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="time" name="waktu" id="waktu" value="<?= $tugas['waktu'] ?>">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="To do" <?= $tugas['status'] == 'To do' ? 'selected' : '' ?>>To do</option>
                <option value="Berjalan" <?= $tugas['status'] == 'Berjalan' ? 'selected' : '' ?>>Berjalan</option>
                <option value="Selesai" <?= $tugas['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                <option value="Batal" <?= $tugas['status'] == 'Batal' ? 'selected' : '' ?>>Batal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="formFile">Foto Baru (Opsional)</label>
            <input name="foto" type="file" id="formFile">
        </div>

        <div class="form-actions">
            <a href="<?= base_url('tugas'); ?>" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn">Ubah Tugas</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>