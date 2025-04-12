<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
</head>

<body>
    <p>Tugas</p>
    <?= view('layouts/menu') ?>
    <br>

    <?= $this->renderSection('content'); ?>

</body>

</html>