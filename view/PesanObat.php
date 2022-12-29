
<?php
  // session start
  if(!empty($_SESSION)){ }else{ session_start(); }
  //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:../login.php'); }
  // panggil file
  require '../proses/panggil.php';
  // tampilkan form edit
  $idGet = strip_tags($_GET['id']);
  $hasil = $ObjDataCustomer->tampil_data_id('obat','id_obat',$idGet);
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Apotek Al Huda</title>
  
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  
    <!-- Favicon
  ================================================== -->
    <link rel="icon" type="image/png" href="images/logo.png">
  
    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
  
  </head>
<body>
  <div class="body-inner">

  <!-- Header start -->
  <header id="header" class="header-two">
    <div class="site-navigation">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                  
                  <div class="logo">
                      <a class="d-block" href="index.php">
                        <img loading="lazy" src="images/logo_text.png" alt="OYO">
                      </a>
                  </div><!-- logo end -->

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  
                  <div id="navbar-collapse" class="collapse navbar-collapse">
                      <ul class="nav navbar-nav ml-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>                  

                        <div class="card">
                          <li class="nav-item dropdown">
                              <a href="#" class="nav-link " data-toggle="dropdown">
                              <?php echo $sesi['nama_customer'];?> <i class="fa fa-angle-down"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                  <li><a href="pesanan.php">Pesanan</a></li>
                                  <li>
                                    <form method="POST" action="../proses/CRUD_LoginLogout.php?aksi=logout">
                                      <button type="submit" name="proses_logout"> Logout
                                      </button>
                                    </form>
                                  </li>
                                  <li>

                                  </li>
                              </ul>
                          </li>
                        </div>
                      </ul>
                  </div>
                </nav>
            </div>
            <!--/ Col end -->
          </div>
          <!--/ Row end -->
      </div>
      <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
  </header>
  <!--/ Header end -->


<section id="main-container" class="main-container">
  <div class="container">

    <div class="gap-40"></div>

    <div class="row">
      <div class="col-md-12">
        <h3 class="column-title">Pesan Obat "<?php echo $hasil['nama_obat'];?>"</h3>

        <form id="contact-form" action="../proses/CRUD_DataTransaksi.php?aksi=tambah" method="POST" role="form">
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>ID Customer</label>
                <input class="form-control form-control-name" name="id_customer" id="name" value="<?php echo $sesi['id_customer'];?>" placeholder="id_obat" type="text"  >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>ID Admin</label>
                <input class="form-control form-control-name" name="id_admin" id="name" value="A0001" placeholder="id_obat" type="text"  >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>ID Obat</label>
                <input class="form-control form-control-name" name="id_obat" id="name" value="<?php echo $hasil['id_obat'];?>" placeholder="id_obat" type="text"  >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Obat</label>
                <input class="form-control form-control-email" name="nama_obat" id="name" value="<?php echo $hasil['nama_obat'];?>" type="text"  >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Harga</label>
                <input class="form-control form-control-subject" name="harga_per_pcs" value="<?php echo $hasil['harga_obat'];?>" id="harga_per_pcs"  >
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Jumlah Pembelian</label>
                  <input type="number" name="jumlah_pembelian" id="jumlah_pembelian" OnChange="sum()" class="form-control input-group-addon" onkeyup="sum()">	
            </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Total Harga</label>
                <div class="input-group date" id="tgl2">
                    <input type="text" name="total_harga" id="total_harga" class="form-control input-group-addon"  >	
                </div>
              </div>
            </div>
          </div>


          <div class="text-right"><br>
            <input type="submit" name="pesanan" id ="pesanan" class="btn btn-primary solid blank" value="Pesan"></input>
          </div>
        </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

<footer id="footer" class="footer bg-overlay">
  <div class="footer-main">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 footer-widget footer-about">
          <h3 class="widget-title">About Us</h3>
          <img loading="lazy" class="footer-logo" src="images/logo_text_bgwhite.png" alt="OYO">
          <p>Kami telah berdiri selama 100 tahun, sejak ibnu sina dilahirkan hingga perpustakaan Alexandria dibakar pasukan Mongol.
          </p>

        </div><!-- Col end -->

        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
          <a href="index.htm">
              <h3 class="widget-title">Home</h3>
          </a>
          <a href="product.html">
              <h3 class="widget-title">Product</h3>
          </a>
          <a href="tentang-kami.php">
              <h3 class="widget-title">Tentang Kami</h3>
          </a>

        </div><!-- Col end -->

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
          <h3 class="widget-title">Our Social Media</h3>
              <div class="footer-social">
                  <ul>
                  <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                          class="fab fa-facebook-f"></i></a></li>
                  <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i
                          class="fab fa-instagram"></i></a></li>
                  <li><a href="https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a></li>
                  </ul>
              </div><!-- Footer social end -->
        </div><!-- Col end -->
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Footer main end -->
</footer><!-- Footer end -->


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="../plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap jQuery -->
  <script src="../plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- Slick Carousel -->
  <script src="../plugins/slick/slick.min.js"></script>
  <script src="../plugins/slick/slick-animation.min.js"></script>
  <!-- Color box -->
  <script src="../plugins/colorbox/jquery.colorbox.js"></script>
  <!-- shuffle -->
  <script src="../plugins/shuffle/shuffle.min.js" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="../plugins/google-map/map.js" defer></script>

  <!-- Datetimepicker -->
  <script type="text/javascript" src="/session/js/script.js"></script>
  <script type="text/javascript" src="js/perkalian-auto.js"></script>


  </div><!-- Body inner end -->
  </body>

  </html>