<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require '../proses/panggil.php';
    if(!empty($_SESSION['ADMIN'])){
?>
<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin Apotek</title>
  
		<!-- BOOTSTRAP 4-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <!-- DATATABLES BS 4-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  
  
    
    <!-- Tailwind is included -->
    <link rel="stylesheet" href="css/main.css?v=1628755089081">
  
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>
  
    <meta name="description" content="Admin One - free Tailwind dashboard">
  
</head>
<body>

<div id="app">

  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-menu" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item dropdown has-divider">
        </div>
      
        <a href="profile.html" class="navbar-item">
          <span class="icon"><i class="mdi mdi-account"></i></span>
          <span><?php echo $sesi['nama_admin'];?></span>
        </a>
        <a href="https://justboil.me/tailwind-admin-templates" class="navbar-item has-divider desktop-icon-only">
          <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
          <span>About</span>
        </a>
        <form method="POST" action="../proses/CRUD_LoginLogout.php?aksi=logout" class="navbar-item desktop-icon-only">
          <button type="submit" name="proses_logout" class="mdi mdi-logout">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
          </button>
        </form>
      </div>
    </div>
  </nav>

<!-- Side Bar -->
<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Admin <b class="font-black">Apotek</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="--set-active-profile-html">
        <a href="index.php">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Data-Data</p>
    <ul class="menu-list">
      <li class="active">
        <a href="data_obat.php">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Data Obat</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="data-customer.php">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Data Customer</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="data-transaksi.php">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Data Transaksi</span>
        </a>
      </li>
  </div>
</aside>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Data Obat</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Data Obat
    </h1>
  </div>
</section>

  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Obat-Obat
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                  <thead>
                    <tr>
                      <th width="50px">No</th>
                      <th>ID Obat</th>
                      <th>Nama Obat</th>
                      <th>Stok</th>
                      <th>Foto</th>
                      <th>Keterangan</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      $hasil = $ObjDataObat->tampil_data('obat');
                      foreach($hasil as $isi){
                    ?>
                    <tr>
                      <td> <?php echo $no; ?></td>
                      <td><?php echo $isi['id_obat']?></td>
                      <td><?php echo $isi['nama_obat'];?></td>
                      <td><?php echo $isi['stok'];?></td>
                      <td><?php echo "<img src='images/obat/$isi[foto]' width='100'/>";?></td>
                      <td><?php echo $isi['ket_obat'];?></td>
                      <td style="text-align: center;">
                        <a href="EditDataObat.php?id=<?php echo $isi['id_obat'];?>" class="button green">
                          <span class="fa fa-edit"></span>
                        </a>
                        <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../proses/CRUD_DataObat.php?aksi=hapus&hapusid=<?php echo $isi['id_obat'];?>" class="button red">
                          <span class="fa fa-trash"></span>
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
            </div>
            <br>
            <a href="TambahObat.php" class="btn btn-success btn-md">
              <span class="fa fa-plus"></span> Tambah 
            </a>
         <?php }else{?><br/>
              <div class="alert alert-info"><h3> Maaf Anda Belum Dapat Akses CRUD, Silahkan Login Terlebih Dahulu !</h3><hr/>
                <p><a href="login.php">Login Disini</a>
                </p>
              </div>
              <?php }?>
          </div>
        </div>
      </div>
    </div>
  </section>

<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2023, ApotekAlHuda.com
      </div>
    </div>
  </div>
</footer>

</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

<!-- jQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<!-- DATATABLES BS 4-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- BOOTSTRAP 4-->
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
  $('#mytable').dataTable();
</script>

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
