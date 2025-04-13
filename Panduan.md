# Panduan
Panduan ini dapat langsung dilakukan tanpa perlu proses instalasi CI4, tanpa mengkonfigurasi file .env serta tanpa memindahkan dan mengedit file dari folder public ke dalam rootfolder.

1. Download sourcecode repositori ini
2. Ekstrak hasil download, Rename nama rootfolder yang tadinya todoo-main menjadi todoo, lalu tempatkan pada folder htdocs
3. Buat database baru dengan nama todo1, lalu import isinya (tabelnya) dari salahsatu file (berekstensi .sql) yang ada dalam folder writable/backup.
4. Jalankan (panggil aplikasinya di browser dengan mengetik localhost/todoo

Ini hanyalah tutorial aplikasi todo list paling sederhana tanpa CSS serta dengan tabel task/tugas yang sederhana (hanya ada id, tugas, tanggal, waktu, status & foto).

Selanjutnya yang harus anda lakukan adalah : Fahami script pada file Routes.php serta semua file yang ada dalam folder Controllers (kecuali BaseController tidak perlu karena bawaan CI4), Model dan Views (kecuali folder errors, karena bawaan CI4).

Jika sudah difahami, anda dapat melanjutkan untuk :
1. Menyesuaikan (melengkapi inputan data) dengan basis data lengkap yang telah dibuat sebelumnya (full version)
2. Menambahkan tampilan CSS.
3. Menambahkan fitur lainnya (seperti kelola data user, attachment, groups, member, shared dll.)
4. Menambah fitur autentifikasi (login & logout)

Silahkan gunakan referensi dari repositori yang telah saya buat sebelumnya (seperti CI4 dan ciapp) atau referensi eksternal lain dari google atau chat-GPT., selamat berkarya dan bereksperimen.
