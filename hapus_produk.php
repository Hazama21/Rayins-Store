<?php
session_start();
if (isset($_POST['produk_index'])) {
    $produk_index = $_POST['produk_index'];

    if (isset($_SESSION['produk'][$produk_index])) {
        // Hapus produk dari array sesuai indeks yang diberikan
        unset($_SESSION['produk'][$produk_index]);

        // Reset kembali indeks array
        $_SESSION['produk'] = array_values($_SESSION['produk']);
    }
}

// Redirect kembali ke halaman keranjang setelah menghapus produk
header("Location: keranjang.php");
exit();
?>