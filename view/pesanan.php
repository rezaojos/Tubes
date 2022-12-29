<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require '../proses/panggil.php';
    if(!empty($_SESSION['ADMIN'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Apotek Al-Huda</title>

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
                      <a class="d-block" href="index.html">
                        <img loading="lazy" src="images/logo_text.png" alt="OYO">
                      </a>
                  </div><!-- logo end -->

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  
                  <div id="navbar-collapse" class="collapse navbar-collapse">
                      <ul class="nav navbar-nav ml-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>

                        <li class="nav-item"><a class="nav-link" href="produk.html">Produk</a></li>                  

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

  <div id="banner-area" class="banner-area" style="background-image:url(images/background.png)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">PESANAN</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Profil</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end --> 

<section id="main-container" class="main-container">
    <div class="container">
    <div class="gap-40"></div>
        <div class="row">
        <div class="col-md-12">
            <div class="table-container">
                <table class="table " style="text-align: center;">
                    <thead>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">ID Obat</th>
                        <th scope="col">ID Admin</th>
                        <th scope="col">ID Customer</th>
                        <th scope="col">Jumlah Pembelian</th>
                        <th scope="col">Harga Per Pcs</th>
                        <th scope="col">Total Pembelian</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                          $no=1;
                          $id_customer = "id_customer";
                          $hasil = $ObjDataCustomer->tampil_data('transaksi',$id_customer,$sesi['id_customer']);
                          foreach($hasil as $isi){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $isi['id']?></th>
                            <td><?php echo $isi['id_obat'];?></td>
                            <td><?php echo $isi['id_admin'];?> <br></td>
                            <td><?php echo $isi['id_customer'];?></td>
                            <td><?php echo $isi['jumlah_pembelian'];?></td>
                            <td><?php echo $isi['harga_per_pcs'];?></td>
                            <td><?php echo $isi['total_pembelian'];?></td>
                            <td style="text-align: center;">
                              <a href="print.php?id=<?php echo $isi['id'];?>" >
                                <span class="fa fa-print"> Cetak</span>
                              </a>
                              </a>
                            </td>
                          </tr>
                          <?php
                            $no++;
                          }
                          ?>
                      </tbody>

                </table>
            </div>
            <?php }else{?><br/>
              <div class="alert alert-info"><h3> Maaf Anda Belum Dapat Akses CRUD, Silahkan Login Terlebih Dahulu !</h3><hr/>
                <p><a href="login.php">Login Disini</a>
                </p>
              </div>
            <?php }?>
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
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap jQuery -->
  <script src="plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- Slick Carousel -->
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/slick/slick-animation.min.js"></script>
  <!-- Color box -->
  <script src="plugins/colorbox/jquery.colorbox.js"></script>
  <!-- shuffle -->
  <script src="plugins/shuffle/shuffle.min.js" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="plugins/google-map/map.js" defer></script>

  <!-- Datetimepicker -->
  <script type="text/javascript" src="js/script.js"></script>
  <script src="js/corousel.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment-with-locales.js"></script>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap-datetimepicker.js"></script>

  </div><!-- Body inner end -->
  </body>

  </html>