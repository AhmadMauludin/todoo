<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div>
    <a href="<?= site_url('tugas/create') ?>">Tambah</a>

    <!-- Search -->
    <div>
        <form action="<?= base_url('tugas') ?>" method="GET">
            <inputtype="text" name="keyword" value="<?= esc($_GET['keyword'] ?? '') ?>" placeholder="Cari" />
        </form>
    </div>
    <!-- /Search -->
</div>
<br>
<div>
    <table>
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
            <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
            <?php $nomor = 1; ?>
            <?php foreach ($tugas as $row): ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $row['tugas'] ?></td>
                    <td><?= $row['tanggal'] ?> | <?= $row['waktu'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><img src="<?= base_url('uploads/tugas/' . $row['foto']) ?>" width="50"></td>
                    <td>
                        <a href="<?= site_url('tugas/edit/' . $row['id']) ?>"> Edit</a>
                        <a href="<?= site_url('tugas/delete/' . $row['id']) ?>" onclick="return confirm('Hapus data?')">Delete</a>
                    </td>
                </tr>
            <?php
                $nomor++;
            endforeach; ?>
        </tbody>
    </table>
</div>
<p><?= $pager->links(); ?></p>
<?= $this->endSection(); ?>