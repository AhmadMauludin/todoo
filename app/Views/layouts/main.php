<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>

<body>
    <div class="container">
        <h1>To Do List</h1>

        <!-- Menu Navigasi -->
        <?= view('layouts/menu') ?>
        <br>

        <!-- Konten Utama -->
        <?= $this->renderSection('content'); ?>
    </div>
</body>

</html>