<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <title>Transaksi</title>
</head>
<body>
     <!--NAVBAR-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">APOTEK</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text center" id="navbarText">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Produk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
            </ul>
                <a class="navbar-brand" href="#">
                  <img src="img/logo-keranjang.svg" alt="" width="40" height="40">
                </a>
                <a class="navbar-brand" href="#">
                    <img src="img/logo-akun.svg" alt="" width="40" height="40">
                  </a>
          </div>
        </div>
      </nav>


      <!--KONEKSI-->
      <?
      include 'koneksi.php';
      $no=1;
      $ambildata = mysqli_query($koneksi,"select * from barang");
      while($tampil = mysqli_fetch_array($ambildata)){
          echo "
          <tr>
              <td>$no</td>
              <td>$tampil[kode_barang]</td>
              <td>$tampil[nama_barang]</td>
              <td>$tampil[harga_barang]</td>
              <td><a href='?kode=$tampil[kode_barang]'> Hapus </a></td>
              <td><a href='barang-ubah.php?kode=$tampil[kode_barang]'> Ubah </a></td>
          <tr>";
          $no++;
      }
      ?>

      <!--TABEL-->
      <div class = "container-fluid py-5">
        <div class = "container">
            <table class="table">
                <h2>Nota Pembayaran</h2>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                
                  
                </tbody>

                
              </table>
              <!-- BUTTON PRINT -->
              <div class="row">
                <div class="col-md-5 ms-auto">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <td colspan="2">
                          <a href="transaksi.php" onclik = "window.print" class="btn btn-lg btn-success w-100">Print</a>
                        </td>
                      </tr>
                    </table>
                  </div>
          
                </div>
        </div>
      </div>



      <!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"></section>

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>APOTEK AL - HUDA
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->


        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i> Cimahi Selatan, Jawa Barat</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            alhuda@gmail.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> + 080000000</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> + 081111111</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2022 Copyright
    <!-- <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a> -->
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>