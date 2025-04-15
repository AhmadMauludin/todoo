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

Kita gunakan dulu tabel pegawai dari ciapp, import (hanya) bagian tabel pegawai dan isinya yang berasal dari file (berekstensi .sql) pada folder writtable/backup ciapp ke database todo1., 

Cara mengimportnya :
- Buka dulu file .sql nya di viscode
- Copy kode dalam file.sql tersebut mulai dari ``` -- Table structure for table `pegawai` -- ``` sampai ```UNLOCK TABLE;```
- Buka database todo1, Paste pada fitur SQL di phpmyadminnya. lalu GO. (Indikator keberhasilan import jika hasilnya hijau - hijau)

Nantinya Fitur dan tabel Pegawai tersebut akan kita ganti dan sesuaikan menjadi user. adapun sumber yang akan kita copykan juga berasal dari repository ciapp.

1. Copy app/config/Filters.php (replace filenya).
2. Modifikasi app/config/Routes.php (tambahkan bagian variabel filter, role, login dan $role pada halaman utama) contohnya lihat seperti yang ada pada file Routes.php repository ciapp.
3. Tambahkan $role pada halaman tertentu (misalnya tugas) yang hanya dapat diakses oleh role user.
4. Copy file app/Controllers/Auth.php
5. Copy app/Controllers/Pegawai.php (untuk kelola data usernya)
6. Copy folder app/Filters beserta 2 file di dalamnya
6. Copy folder app/Views/Auth beserta file di dalamnya
7. Tambahkan menu logout di menu.php
8. Copy app/Views/Pegawai (untuk tampilan kelola user) sesuaikan tampilannya dengan css yang anda gunakan.
9. Copy folder Uploads/pegawai beserta isinya.

Sampai sini Coba dulu login dengan username : maldin password : 12345., kalo sudah berhasil :

1. Ubah nama tabel pegawai menjadi user, rubah pilihan isi bagian menjadi admin dan user saja.
2. Ubah nama controller PegawaiController.php menjadi UserController.php, sesuaikan isinya menjadi user.
3. Ubah nama file model Pegawai.php menjadi User.php, sesuaikan juga isinya.
4. Pada file Routes.php ubah setiap tilisan pegawai menjadi user, serta sesuaikan Variabel Role nya menjadi admin dan user saja.
5. Ubah nama folder Pegawai (pada Views) menjadi user dan Modifikasi 3 filenya (Ubah setiap kata pegawai menjadi user).

Selanjutnya anda tinggal memikirkan alur penempatan halaman view usernya. saran saya karena konsep user management aplikasi todo list itu beda dengan ciapp maka :

- Halaman user/create.php dapat diakses sebelum pengguna melakukan login.

Logikanya, untuk pengguna yang belum punya akun pasti harus membuat akun dulu, maka harus ada akses ke halaman create.php misalkan dengan menambahkan link di tampilan login aplikasi (di bawah tombol login/masuk) untuk mengarah ke halaman daftar akun / create.php contoh penulisan linknya (pada halaman login.php)

```
<p>Belum memiliki akun?
<p><a href="<?= site_url('user/create') ?>"> <button>Daftar</button></a>
```

- Halaman user/index.php hanya bisa diakses oleh admin., namun admin tidak bisa membuat akun baru dan merubah data., maka untuk halaman user/index.php role yang yang bisa mengaksesnya hanya role $admin.

- Halaman user/edit.php hanya bisa diakses oleh user setelah login ke dalam aplikasi., maka role yang bisa mengaksesnya hanya role $user. anda bisa membuatkan link ```pengaturan akun``` pada layouts/menu.php untuk bisa mengarahkan pengguna ke halaman user/edit.php tentunya dengan menambahkan variabel id yang didapat dari session login yang digunakan. contoh penulisan linknya : 

```
<?php $idu = session('id'); ?> //membuat variabel id untuk dipanggil di bawah
<a href="<?= site_url('user/edit/' . $idu) ?>"> </a>
```

