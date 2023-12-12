<?php
session_start();

// Fungsi untuk menghitung total harga
function calculateTotalPrice($products)
{
  $totalPrice = 0;
  foreach ($products as $produk) {
    $totalPrice += $produk['harga'] * $produk['jumlah'];
  }
  return $totalPrice;
}

if (isset($_SESSION['produk'])) {
  // Menginisialisasi total harga dan jumlah produk
  $totalHarga = calculateTotalPrice($_SESSION['produk']);
  $jumlahProduk = count($_SESSION['produk']);


  // Mendapatkan daftar semua nama produk
  $allProdukInCart = '';
  foreach ($_SESSION['produk'] as $key => $produk) {
    $allProdukInCart .= $produk['nama'] . $produk['jumlah'] . 'x' . ' (ID: ' . $produk['id'] . '), ';
  }

  // Menghapus koma terakhir
  $allProdukInCart = rtrim($allProdukInCart, ', ');

  // Menyimpan daftar semua nama produk dalam session
  $_SESSION['allProdukInCart'] = $allProdukInCart;



  // Memeriksa apakah ada perubahan jumlah produk melalui JavaScript
  if (isset($_POST['jumlah_produk'])) {
    $produkIndex = $_POST['produk_index'];
    $newQuantity = $_POST['jumlah_produk'];
    $_SESSION['produk'][$produkIndex]['jumlah'] = $newQuantity;
    $totalHarga = calculateTotalPrice($_SESSION['produk']);
  }



  // Output the total price including the updated quantity


  // Update total price and number of products in session
  $_SESSION['total_harga'] = $totalHarga;
  $_SESSION['jumlah_produk'] = $jumlahProduk;
} else {

}
?>

<?php
if (isset($_POST['hapus_keranjang'])) {
  unset($_SESSION['produk']);
  header('Location: keranjang.php');
  exit();
}
?>



<script>
    // Fungsi untuk mengirim permintaan POST dan memperbarui jumlah produk secara dinamis
    function updateQuantity(produkIndex, newQuantity) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "keranjang.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Jika permintaan POST berhasil, refresh halaman untuk memperbarui keranjang
                location.reload();
            }
        };
        xhr.send("produk_index=" + produkIndex + "&jumlah_produk=" + newQuantity);
    }
</script>

<script>
function clearCart() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "keranjang.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Jika permintaan POST berhasil, refresh halaman untuk memperbarui keranjang
            location.reload();
        }
    };
    xhr.send("hapus_keranjang=1");
}
  </script>

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
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="fw-bold text-uppercase text-dark">CHECKOUT</span></a>
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
    <!-- Header-->
    <header>
    <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Cart</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
    </header>
    <section class="py-5">
      <div class="container px-3 px-lg-5 mt-5">
      <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
      <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="table-responsive mb-4">
                <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Produk</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Harga</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                    </tr>
                  </thead>
                  <?php
            if (isset($_SESSION['produk']) && !empty($_SESSION['produk'])) {

              // Iterate over each product in the 'produk' array
              foreach ($_SESSION['produk'] as $key => $produk) {

                $jumlah = isset($produk['jumlah']) ? $produk['jumlah'] : 1;
                ?>
                  <tbody class="border-0">
                    <tr>
                      <th class="ps-0 py-3 border-light" scope="row">
                        <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link"><img src="./admins/uploads/<?php echo $produk['gambar'] ?>"  alt="..." width="70"/></a>
                          <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link"><?php echo $produk['nama'] ?></a></strong></div>
                        </div>
                      </th>
                      <td class="p-3 align-middle border-light"><p class="mb-0 small"><?php echo $produk['harga'] ?></p></td>
                      <td class="p-3 align-middle border-light">


                          <div class="d-flex gap-3 align-items-center">
                      <?php echo '<input type="number" name="jumlah_produk" min="1" value="' . $jumlah . '" onchange="updateQuantity(' . $key . ', this.value)" class="form-control">'; ?>
                      <?php echo '<form class="m-0" method="post" action="hapus_produk.php">';
                      echo '<input type="hidden" name="produk_index" value="' . $key . '">';
                      echo '<input type="submit" class="btn btn-danger" value="Hapus">';
                      echo '</form>'; ?>
                  </div>
                </div>
                <?php
              }
            }
            ?>
 
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm"></a></div>
                  <div class="col-md-6 text-md-end">
                  
                  </a>
                </div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-3">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart total</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="border-bottom my-2">
                   
                    </li>
                    <?php
      

      // Check if 'produk' session exists
      if (isset($_SESSION['produk'])) {
        // 'produk' session exists, continue with the code
        // ...
      
        // Display total price only if 'produk' session is not empty
        if (!empty($_SESSION['produk'])) {
          echo ' <li class="d-flex align-items-center justify-content-between mb-4">';
          echo '<strong class="text-uppercase small font-weight-bold">Total Rp. ' . number_format($totalHarga, 0, ',', '.') . '</strong>';
        } else {
          echo '<span> Rp. 0</span>';
        }
      } else {
        echo 'Keranjang kosong';
      }
      ?>
                   
                  
                  </ul>
                  <a href="./beli.php" class="btn btn-primary">Beli</a>
                    <a href="#" class="btn btn-danger" name="hapus_keranjang" onclick="clearCart()">Bersihkan Keranjang</a>
 
                </div>
              </div>
            </div>
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
     <!-- JavaScript files-->
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    


  </body>
</html>
