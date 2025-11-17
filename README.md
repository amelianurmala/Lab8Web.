# Lab8Web.

*Nama  : Amelia Nurmala Dewi*

*NIM   : 312410199*

*Kelas : TI.24.A2*


## **1. Membuat Tabel `data_barang`**

<img width="1366" height="768" alt="Screenshot (1171)" src="https://github.com/user-attachments/assets/91064b33-eab3-4452-931b-e1840898a0e5" />


Pada gambar pertama terlihat bahwa kita masuk ke menu **SQL** kemudian menjalankan perintah untuk membuat tabel.
Perintah SQL yang digunakan:

```sql
CREATE TABLE data_barang (
    id_barang int(10) auto_increment Primary Key,
    kategori varchar(30),
    nama varchar(30),
    gambar varchar(100),
    harga_beli decimal(10,0),
    harga_jual decimal(10,0),
    stok int(4)
);
```

Tabel ini berfungsi sebagai tempat menyimpan semua informasi barang,
mulai dari kategori, nama barang, harga beli, harga jual, stok, hingga nama file gambar.

---

## **2. Struktur Tabel Berhasil Dibuat**

<img width="1366" height="768" alt="Screenshot (1172)" src="https://github.com/user-attachments/assets/173fa2d5-68f9-4367-8481-d83fe81d1fa4" />


Pada gambar kedua, terlihat struktur tabel pada phpMyAdmin.
Setiap kolom berhasil dibuat sesuai perintah SQL:

* **id_barang** → auto increment, primary key
* **kategori** → varchar(30)
* **nama** → varchar(30)
* **gambar** → varchar(100)
* **harga_beli** → decimal(10,0)
* **harga_jual** → decimal(10,0)
* **stok** → int(4)

Hal ini memastikan database siap untuk menerima data barang dan digunakan dalam aplikasi.

---

## **3. Menambahkan Data Awal ke Tabel**

<img width="1366" height="768" alt="Screenshot (1173)" src="https://github.com/user-attachments/assets/8d6c042d-9ef5-412f-a0a5-ac13e903264a" />


Pada gambar ketiga, kita menambahkan data contoh ke tabel menggunakan perintah SQL berikut:

```sql
INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok) VALUES
('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);
```

Data ini akan digunakan sebagai contoh untuk ditampilkan pada halaman aplikasi.

---

## **4. Data Berhasil Masuk ke Table**

<img width="1366" height="768" alt="Screenshot (1174)" src="https://github.com/user-attachments/assets/cb485d61-c207-468d-9531-a28e4720900c" />


Pada gambar keempat, phpMyAdmin menampilkan hasil bahwa **ketiga data berhasil tersimpan** ke dalam tabel `data_barang`.

Data yang masuk meliputi:

* Nama barang
* Kategori
* Gambar (nama file gambar)
* Harga beli
* Harga jual
* Stok

Tampilan ini memastikan bahwa database sudah siap digunakan oleh aplikasi untuk proses CRUD (Create, Read, Update, Delete).

---

## **5. Membuat File Koneksi ke Database (koneksi.php)**

<img width="1366" height="589" alt="Screenshot (1177)" src="https://github.com/user-attachments/assets/593d5c4d-649f-4e30-81c5-a15219b7104d" />


Pada langkah ini, kita membuat file **koneksi.php** yang berfungsi sebagai penghubung antara aplikasi PHP dengan database MySQL.
File ini menjadi dasar untuk seluruh file lain seperti **index.php, tambah.php, ubah.php**, dan **hapus.php**, karena semuanya membutuhkan koneksi database.


### ** - Membuat File koneksi.php **

Kode yang digunakan untuk membuat koneksi:

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi Berhasil!!";
?>
```

Pada kode di atas:

* **$host** → alamat server database (localhost)
* **$user** → username MySQL (default: root)
* **$pass** → password MySQL (default: kosong)
* **$db** → nama database yang sudah dibuat sebelumnya (`latihan1`)
* **mysqli_connect()** → membuat koneksi ke MySQL
* Jika gagal → tampilkan pesan error
* Jika berhasil → tampilkan tulisan **"Koneksi Berhasil!!"**

### ** - Menguji Koneksi Melalui Browser **

Pada gambar yang kamu kirimkan, terlihat bahwa ketika file **koneksi.php** dibuka melalui URL:

```
http://localhost/lab8_php_database/koneksi.php
```

Browser menampilkan pesan:

```
Koneksi Berhasil!!
```

Ini berarti:
✔ PHP berhasil dijalankan
✔ Koneksi ke database `latihan1` berhasil
✔ File koneksi sudah siap digunakan di file-file lain dalam project


## **6. Membuat Halaman Data Barang (index.php)**

<img width="1366" height="677" alt="Screenshot (1187)" src="https://github.com/user-attachments/assets/0142b713-4439-463e-b793-9ceb253d692c" />


Pada langkah ini dibuat halaman utama yang berfungsi untuk menampilkan seluruh data dari tabel **data_barang**. Halaman ini akan menjadi pusat dari seluruh proses CRUD.

Pertama, halaman dihubungkan ke database menggunakan:

```
include("koneksi.php");
```

Setelah terhubung, halaman mengambil semua data barang dari database dengan perintah:

```
SELECT * FROM data_barang
```

Data yang berhasil diambil kemudian ditampilkan dalam bentuk tabel. Tabel ini memuat kolom:

* Gambar barang
* Nama barang
* Kategori
* Harga jual
* Harga beli
* Stok barang
* Aksi (Ubah dan Hapus)

File gambar ditampilkan dari folder **/gambar/** berdasarkan nama file yang disimpan di kolom `gambar`.
Di bagian atas halaman juga terdapat tombol **Tambah Barang** untuk mengarahkan ke halaman tambah data.

Dengan halaman ini, pengguna dapat melihat seluruh barang yang tersedia serta mengelola data melalui fitur ubah dan hapus.

---

## **7.Bagian Tambah Barang (tambah.php)**

<img width="1366" height="679" alt="Screenshot (1195)" src="https://github.com/user-attachments/assets/1a985430-1622-48c8-a8b1-ab14ef6c4e5e" />

<img width="1366" height="674" alt="Screenshot (1194)" src="https://github.com/user-attachments/assets/143a138a-26d1-4e7b-99ce-843c2c4b6dc2" />


Pada bagian ini dibuat halaman untuk menambahkan data baru ke dalam tabel **data_barang**.
Diawali dengan memanggil file koneksi:

```php
include_once 'koneksi.php';
```

Ketika tombol **Simpan** ditekan, halaman akan memproses data yang dikirim melalui method **POST**.
Semua input seperti nama, kategori, harga jual, harga beli, dan stok diambil dari form:

```php
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga_jual = $_POST['harga_jual'];
$harga_beli = $_POST['harga_beli'];
$stok = $_POST['stok'];
```

Jika pengguna meng-upload gambar, file tersebut akan disimpan pada folder:

```
gambar/
```

dengan kode:

```php
$filename = str_replace(' ', '_', $file_gambar['name']);
move_uploaded_file($file_gambar['tmp_name'], $destination);
```

Setelah semua data siap, data baru dimasukkan ke database menggunakan perintah:

```php
INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
```

Jika proses berhasil halaman akan diarahkan kembali ke:

```
index.php
```

Form pada halaman ini menyediakan input lengkap beserta upload gambar sehingga pengguna dapat menambahkan data barang baru secara langsung ke database.


Siap! Aku buatkan **penjelasan Ubah Barang (ubah.php)** untuk **LANGKAH 3**, format sama seperti sebelumnya:
✔ tidak terlalu panjang
✔ tidak terlalu pendek
✔ pakai potongan kode
✔ cocok untuk ditaruh di GitHub
✔ sesuai dengan struktur project kamu

---

## **8.Bagian Ubah Barang (ubah.php)**

<img width="1366" height="679" alt="Screenshot (1191)" src="https://github.com/user-attachments/assets/69b4102a-898d-4385-b2dd-33d1f3cb981f" />

<img width="1366" height="680" alt="Screenshot (1193)" src="https://github.com/user-attachments/assets/fb544b13-f8e5-4643-b317-44160a9cbf8f" />


Halaman **ubah.php** digunakan untuk mengedit data barang yang sudah ada di dalam tabel **data_barang**.
Saat halaman dibuka, data barang yang dipilih akan ditampilkan kembali di dalam form melalui `id` yang dikirim dari tombol **Ubah** pada halaman index.

Pertama, halaman mengambil data berdasarkan ID:

```php
$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '$id'";
```

Data yang didapat akan ditampilkan pada form agar pengguna bisa mengubahnya.

Ketika tombol **Update** ditekan, halaman memproses data baru menggunakan method **POST**.
Semua data yang diperbarui akan diambil menggunakan:

```php
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga_jual = $_POST['harga_jual'];
$harga_beli = $_POST['harga_beli'];
$stok = $_POST['stok'];
```

Jika pengguna mengganti gambar, file baru akan disimpan ke folder:

```
gambar/
```

menggunakan:

```php
move_uploaded_file($file_gambar['tmp_name'], $destination);
```

Kemudian data diperbarui ke database dengan perintah:

```php
UPDATE data_barang SET 
    nama='$nama', kategori='$kategori',
    harga_jual='$harga_jual', harga_beli='$harga_beli',
    stok='$stok', gambar='$gambar'
WHERE id_barang='$id';
```

Setelah proses selesai, halaman otomatis kembali ke:

```
index.php
```

Form ini memungkinkan pengguna memperbarui informasi barang yang sudah tersimpan dalam database.


## **9.Hapus Data (hapus.php)**

<img width="1366" height="675" alt="Screenshot (1196)" src="https://github.com/user-attachments/assets/decdbf1b-4348-41b1-a8d5-52aeea68ad87" />

<img width="1366" height="669" alt="Screenshot (1197)" src="https://github.com/user-attachments/assets/3bb69da4-c4ff-415e-88d6-f47e20fffd6e" />


Halaman **hapus.php** digunakan untuk menghapus data barang berdasarkan **id_barang** yang dikirim dari tombol **Hapus** pada halaman index.
ID barang diterima melalui URL dan diambil dengan:

```php
$id = $_GET['id'];
```

Setelah ID didapat, data akan dihapus dari tabel menggunakan:

```php
$sql = "DELETE FROM data_barang WHERE id_barang = '$id'";
mysqli_query($conn, $sql);
```

Halaman ini tidak memiliki tampilan atau HTML apa pun, sehingga ketika perintah penghapusan berhasil dijalankan, halaman hanya menampilkan layar putih.
Ini normal karena file hapus.php hanya berfungsi menjalankan proses DELETE tanpa menampilkan output.

Biasanya pengguna langsung kembali ke halaman utama secara otomatis menggunakan:

```php
header('location: index.php');
```

Dengan bagian ini, proses CRUD telah lengkap karena pengguna dapat menghapus data dari tabel barang.









