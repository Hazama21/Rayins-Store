<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RAYINS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
      <!-- Bootstrap icons-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  
    </head>
    <body>
    
        <header>
        <div class="page-holder bg-light">
      <!-- navbar-->
      <header class="header bg-white">
   
    <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="fw-bold text-uppercase text-dark">RAYINS</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="index.php">Home</a>
                </li>
             
              </ul>
              <ul class="navbar-nav ms-auto">               
              <li class="nav-item"><a class="nav-link" href="./keranjang.php"> 
                  <i class="fas fa-dolly-flatbed me-1 text-gray"></i>
                  Cart
                  <small class="text-gray fw-normal" id="cart-count">
                <?php
if (isset($_SESSION['produk']) && !empty($_SESSION['produk'])) {

echo count($_SESSION['produk']);

} else {
echo '0';
}
?> 
              </small>
              </a>
            </li>
              </ul>
            </div>
          </nav>
        </div>
        </header>
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
                <div class="w-50 mx-auto">
                    <h2 class="text-center fw-bolder text-primary">Konfirmasi Pesanan</h2>

                    <?php 
         

                    if(isset($_SESSION['pesananSekarang'])) {
                        echo '<h2 class="text-center">ID Pesanan :' . $_SESSION['pesananSekarang'] . '</h2>';
                    }
                 
            
                    ?>
             

                     <!-- <a href="http://wa.me/+62085651146866?text=" class="btn btn-success py-3 d-block fw-bold">  Konfirmasi Via WhatsApp</a>  -->
                     <a href="https://wa.me/+6281545724225/?text=<?php echo 'ID PESANAN : ' . $_SESSION['pesananSekarang'] . '%0ANama Produk : ' 
                     . $_SESSION['namaProduk'] . '%0ANama Pemesan : ' 
                     . $_SESSION['namaPemesan'] . '%0AAlamat Pemesan : ' 
                     . $_SESSION['alamatPemesan'] . '%0AEmail Pemesan : ' 
                     . $_SESSION['emailPemesan'] . '%0ATelphone Pemesan : ' 
                     . $_SESSION['telPemesan'] ?>" class="btn btn-success py-3 d-block fw-bold">  Konfirmasi Via WhatsApp</a>
                    <h3 class="text-center mt-4">Langkah Konfirmasi</h3>
                    <ul>
                        <li>Klik Tombol Konfirmasi Melalui WhatsApp</li>
                        <li>Anda akan diarahkan ke Akun WhatsApp admin toko ini, kemudian lanjut Chat</li>
                        <li>Berikan ID Pesanan yang tertera diatas.</li>
                        <li>Kemudian ikuti instruksi lebih lanjut yang diberikan oleh admin</li>
                        <li>Pesanan anda akan dikonfirmasi admin melalui sistem dan barang akan dikirim.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <footer class="fixed-bottom bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="bi bi-facebook"></i>
    </a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="bi bi-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="bi bi-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="bi bi-instagram"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="bi bi-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Rayins Store© 2023 Copyright:
  </div>
  <!-- Copyright -->
</footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
