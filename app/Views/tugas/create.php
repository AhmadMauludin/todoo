<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<form action="<?= site_url('tugas/store') ?>" method="post" enctype="multipart/form-data">
    <div> Tugas <input name="tugas" type="text" value="" required /> </div>
    <div>Tanggal<input type="date" name="tanggal" value="" /> </div>
    <div>Waktu <input type="time" name="waktu" value="" /> </div>
    <div> Status
        <select name="status">
            <option value="To do">To do</option>
            <option value="Berjalan">Berjalan</option>
            <option value="Selesai">Selesai</option>
            <option value="Batal">Batal</option>
        </select>
    </div>
    <div> Foto <input name="foto" type="file" id="formFile" /> </div>
    <div><a href="<?= base_url('tugas'); ?>" type="button">Kembali</a>
        <button type="submit">Tambah Tugas</button>
    </div>
</form>
<?= $this->endSection(); ?>