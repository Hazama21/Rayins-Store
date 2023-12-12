<?php
session_start();


// Mengambil data dari form
 
$daftar_produk = $_POST['daftar_produk'];
$total_harga = $_POST['total_harga'];
$status = 'Pending';
$nama_pemesan = $_POST['nama_pemesan'];
$alamat_pemesan = $_POST['alamat_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$telepon_pemesan = $_POST['telepon_pemesan'];

// Melakukan koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rayins";
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


// Fungsi untuk menghasilkan ID unik yang belum digunakan 

// Mengenerate ID unik
$id_pesanan = uniqid();


 

// Menyimpan data ke dalam tabel SQL
$sql = "INSERT INTO checkout (id_pesanan, daftar_produk, total_harga, status, nama_pemesan, alamat_pemesan, email_pemesan, telepon_pemesan)
        VALUES ('$id_pesanan', '$daftar_produk', '$total_harga', '$status', '$nama_pemesan', '$alamat_pemesan', '$email_pemesan', '$telepon_pemesan')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['pesananSekarang'] = $id_pesanan;
    $_SESSION['namaProduk'] = $daftar_produk;
    $_SESSION['harga'] = $total_harga;
    $_SESSION['namaPemesan'] = $nama_pemesan;
    $_SESSION['alamatPemesan'] = $alamat_pemesan;
    $_SESSION['emailPemesan'] = $email_pemesan;
    $_SESSION['telPemesan'] = $telepon_pemesan;
    echo "Mohon tunggu sebentar, anda akan dialihkan.";
    header("refresh:2; url=konfirmasi.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>