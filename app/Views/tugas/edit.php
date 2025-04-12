<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<img src="<?= base_url('uploads/tugas/' . $tugas['foto']) ?>" width="50">
<br>
<form action="<?= site_url('tugas/update/' . $tugas['id']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="old_foto" value="<?= $tugas['foto'] ?>">

    <p>Tugas <input name="tugas" type="text" value="<?= $tugas['tugas'] ?>" required />

    <p>Tanggal <input type="date" name="tanggal" value="<?= $tugas['tanggal'] ?>" />

    <p>Waktu <input type="time" name="waktu" value="<?= $tugas['waktu'] ?>" />

    <p>Status
        <select name="status">
            <option value="To do" <?= $tugas['status'] == 'To do' ? 'selected' : '' ?>>To do</option>
            <option value="Berjalan" <?= $tugas['status'] == 'Berjalan' ? 'selected' : '' ?>>Berjalan</option>
            <option value="Selesai" <?= $tugas['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
            <option value="Batal" <?= $tugas['status'] == 'Batal' ? 'selected' : '' ?>>Batal</option>
        </select>

    <p>Foto <input name="foto" type="file" id="formFile" />

    <p><a href="<?= base_url('tugas'); ?>" type="button">Kembali</a>
        <button type="submit">Ubah Tugas</button>

</form>
<?= $this->endSection(); ?>