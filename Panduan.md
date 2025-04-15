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

Jika menggunakan chat-GPT untuk bantuan (misalkan memasangkan CSS) pastikan prompt/pertanyaan yang digunakan jelas agar dimengerti, contohnya pada link berikut https://chatgpt.com/share/67fb5519-8c54-800d-b93b-75f83325e066

# Panduan Menambahkan fitur Login dan Autentifikasi

### Yang harus ditambahkan & dikofigurasi saat menambah fitur login

sebelumnya pastikan tabelnya sudah siap, sementara kita gunakan dulu tabel pegawai dari ciapp, yang nantinya akan kita ganti dan sesuaikan menjadi user.

1. copy app/config/Filters.php dari repository ciapp (replace filenya saja).
2. modifikasi app/config/Routes.php (tambahkan bagian variabel filter, role, login dan $role pada halaman utama) contohnya lihat seperti yang ada pada repository ciapp.
3. tambahkan $role pada halaman tertentu (misalnya tugas) yang hanya dapat diakses oleh role user.
4. app/Controllers/Auth.php (tambahkan filenya sesuai di ciapp)
5. app/Controllers/Pegawai.php (untuk kelola data usernya)
6. copy folder Filters 
6. copy folder app/Views/Auth (dari ciapp)
7. tambahkan menu logout di menu.php
8. app/Views/Pegawai (untuk tampilan kelola user) sesuaikan tampilannya dengan css yang anda gunakan.

Sampai sini Coba dulu, kalo sudah berhasil :

1. Ubah nama tabel pegawai menjadi user, rubah isi bagian menjadi admin dan user saja
2. Ubah nama controller PegawaiController.php menjadi UserController.php, sesuaikan isinya jika ada yang harus dirubah
3. Ubah nama file model Pegawai.php menjadi User.php, sesuaikan juga isinya
4. Pada file Routes.php sesuaikan Variabel Role nya menjadi admin dan user saja, serta sesuaikan $filter yang dapat mengaksesnya
