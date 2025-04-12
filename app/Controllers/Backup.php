<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Backup extends Controller
{
    public function database()
    {
        $db      = \Config\Database::connect();
        $dbName  = $db->getDatabase();
        $user    = env('database.default.username');
        $pass    = env('database.default.password');
        $host    = env('database.default.hostname');
        $backupFile = WRITEPATH . 'backup/backup-' . date('Y-m-d_H-i-s') . '.sql';

        // Pastikan folder backup ada
        if (!is_dir(WRITEPATH . 'backup')) {
            mkdir(WRITEPATH . 'backup', 0777, true);
        }

        // Path ke mysqldump (sesuaikan dengan lokasi di sistem Anda)
        $mysqldumpPath = 'C:\xampp\mysql\bin\mysqldump'; // Windows
        // $mysqldumpPath = '/usr/bin/mysqldump'; // Linux/Mac

        // Buat perintah mysqldump
        $command = "{$mysqldumpPath} --user={$user} --password={$pass} --host={$host} {$dbName} > {$backupFile}";

        // Jalankan perintah
        system($command, $output);

        // Cek apakah file backup berhasil dibuat
        if (file_exists($backupFile) && filesize($backupFile) > 0) {
            return $this->response->download($backupFile, null);
        } else {
            return "Backup gagal. Periksa konfigurasi database Anda atau perintah mysqldump.";
        }
    }
}
