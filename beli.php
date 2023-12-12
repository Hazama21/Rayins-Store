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
  <div class="page-holder bg-light">
      <!-- navbar-->
      <header class="header bg-white">
   
    <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="fw-bold text-uppercase text-dark">SHIPPING</span></a>
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
    <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shipping</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shipping</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5 bg-white">
       
        <form method="post" action="./checkout-handler.php" class='row'>
            <div class="col-10"> 
              
          <input type="hidden" name="daftar_produk" value="<?php echo $_SESSION['allProdukInCart']?>">
          <input type="hidden" name="total_harga" value="<?php  echo $_SESSION['total_harga']?> ?>">

          <div class="form-group">
            <label for="nama_pemesan">Nama Pemesan:</label>
            <input
              type="text"
              class="form-control"
              name="nama_pemesan"
              id="nama_pemesan"
            />
          </div>

          <div class="form-group">
            <label for="alamat_pemesan">Alamat Pemesan:</label>
            <input
              type="text"
              class="form-control"
              name="alamat_pemesan"
              id="alamat_pemesan"
            />
          </div>

          <div class="form-group">
            <label for="email_pemesan">Email Pemesan:</label>
            <input
              type="email"
              class="form-control"
              name="email_pemesan"
              id="email_pemesan"
            />
          </div>

          <div class="form-group">
            <label for="telepon_pemesan">Telepon Pemesan:</label>
            <input
              type="phone"
              class="form-control"
              name="telepon_pemesan"
              id="telepon_pemesan"
            />
          </div>

          
            </div>

            <div class="col-2"> 
              <div><strong>Daftar Produk</strong> : <?php echo $_SESSION['allProdukInCart']?></div>
           
              <h2>Rp <?php echo    number_format($_SESSION['total_harga'], 0, ',', '.')  ?></h2>
            <input type="submit" class="btn btn-primary d-block w-100 py-3" value="Beli" />
</div>
        </form>
      </div>
    </section>
    <!-- Footer-->
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
