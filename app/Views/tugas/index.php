<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="top-bar">
    <a href="<?= site_url('tugas/create') ?>" class="btn">Tambah</a>

    <!-- Search -->
    <form action="<?= base_url('tugas') ?>" method="GET" class="search-form">
        <input type="text" name="keyword" value="<?= esc($_GET['keyword'] ?? '') ?>" placeholder="Cari tugas..." />
    </form>
</div>

<br>

<div class="table-container">
    <table class="task-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tugas</th>
                <th>Tanggal | Waktu</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
            <?php foreach ($tugas as $row): ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $row['tugas'] ?></td>
                    <td><?= $row['tanggal'] ?> | <?= $row['waktu'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><img src="<?= base_url('uploads/tugas/' . $row['foto']) ?>" width="50"></td>
                    <td>
                        <a href="<?= site_url('tugas/edit/' . $row['id']) ?>" class="btn-small">Edit</a>
                        <a href="<?= site_url('tugas/delete/' . $row['id']) ?>" onclick="return confirm('Hapus data?')" class="btn-small btn-danger">Delete</a>
                    </td>
                </tr>
            <?php $nomor++;
            endforeach; ?>
        </tbody>
    </table>
</div>

<div class="pagination">
    <?= $pager->links(); ?>
</div>

<?= $this->endSection(); ?>