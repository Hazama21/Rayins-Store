<?php session_start() ?>
<!DOCTYPE html>
<html>
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
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="fw-bold text-uppercase text-dark">PRODUK</span></a>
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

        <!-- Section-->
        <section class="py-5">
            <div class="container">

 
               <?php
               $servername = "localhost";
               $username = "root";
               $password = "";
               $database = "db_rayins";

               $conn = mysqli_connect($servername, $username, $password, $database);


               // Ambil ID produk dari parameter URL
               $id = $_GET['id'];

               // Kode SQL untuk mengambil data produk berdasarkan ID
               $sql = "SELECT * FROM produk WHERE id = $id";
               $result = mysqli_query($conn, $sql);

               if (mysqli_num_rows($result) > 0) {
                   $row = mysqli_fetch_assoc($result);
                   $gambarproduk = $row['gambarproduk'];
                   $judulproduk = $row['namaproduk'];
                   $deskripsiproduk = $row['deskripsiproduk'];
                   $kategoriproduk = $row['kategoriproduk'];
                   $hargaproduk = $row['hargaproduk'];

               }


               if (isset($_GET['action']) && $_GET['action'] === 'tambahkanproduk') {
                   // Get the ID of the product to be added
                   $id = $_GET['id'];

                   // Check if the 'produk' array already exists in the session
                   if (!isset($_SESSION['produk'])) {
                       $_SESSION['produk'] = array();
                   }

                   // Check if the product with the same ID already exists in the 'produk' array
                   $produkExists = false;
                   foreach ($_SESSION['produk'] as $produk) {
                       if ($produk['id'] === $id) {
                           $produkExists = true;
                           break;
                       }
                   }

                   if ($produkExists) {
                       // Display an error message if the product already exists in the cart
                       echo '<div class="alert alert-warning" role="alert">
                      Produk sudah ada di dalam keranjang.
                  </div>';
                   } else {
                       // Create the product array
                       $produk = array(
                           'id' => $id,
                           'gambar' => $gambarproduk,
                           'nama' => $judulproduk,
                           'harga' => $hargaproduk,
                           'jumlah' => 1,
                       );

                       // Add the product to the 'produk' array in the session
                       $_SESSION['produk'][] = $produk;

                       // Display a success message or any other relevant information
                       echo '<div class="alert alert-success" role="alert">
                      Produk berhasil ditambahkan ke dalam keranjang.
                  </div>';
                   }
               }
               ?>


            <?php



            if (mysqli_num_rows($result) > 0) {






                // Tampilkan produk dalam bentuk HTML
                echo '<div class="row mb-5">';
                echo '<div class="col-lg-6">';
                echo ' <div class="row m-sm-0">';
                echo ' <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">';
                echo ' <div class="swiper product-slider-thumbs">';
                echo '  </div>';
                echo ' </div>';
                echo '<div class="col-sm-10 order-1 order-sm-2">';
                echo '<div class="swiper product-slider">';
                echo ' <div class="swiper-wrapper">';
                echo '<div class="swiper-slide h-auto">';
                echo '<img class="img-fluid" src="./admins/uploads/' . $gambarproduk . '" alt="...">';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo'</div>';
                echo'</div>';
                echo '<div class="col-lg-6">';
                echo ' <h1>' . $judulproduk . '</h1>';
                echo ' <p class="text-muted lead"> Rp ' . number_format($hargaproduk, 0, ',', '.') . '</p>';
                echo '<p class="text-sm mb-4">' . $deskripsiproduk . '</p>';
                echo ' <div class="col-sm-3 pl-sm-0">';
                echo '<a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="produk.php?id=' . $id . '&action=tambahkanproduk"' . '>Add to cart</a>';
                echo '</div>';
                echo '  <ul class="list-unstyled small d-inline-block">';
                echo ' <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ms-2">' . $kategoriproduk . '</a></li>';
                echo '</ul>';
                echo '</div>';

                echo '</div>';
                echo '';
                echo '';
                echo '';



            }


            ?>

                </div>
        </section>
        <!-- Footer-->
        <footer class="bg-dark text-center text-white">
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

                    <!-- JavaScript code to update the cart count dynamically -->
                    <script>
                // Get the cart count element
                var cartCountElement = document.getElementById('cart-count');

                // Update the cart count
                function updateCartCount(count) {
                    cartCountElement.innerHTML = count;
                }

                // Call the function to update the cart count initially
                updateCartCount(<?php echo count($_SESSION['produk']); ?>);
            </script>
    </body>
</html>
