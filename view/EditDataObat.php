<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';
    
    // tampilkan form edit
    $idGet = strip_tags($_GET['id']);
    $hasil = $ObjDataObat->tampil_data_id('obat','id_obat',$idGet);
?>

<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulir - Admin Apotek</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="css/main.css?v=1628755089081">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>

<div id="app">

  <!-- Navbar -->
  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-menu" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item dropdown has-divider">
        </div>
        
        <a href="profile.php" class="navbar-item">
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
      <li>Edit Data </li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Formulir Edit Data Obat <?php echo $hasil['id_obat'];?>
    </h1>
  </div>
</section>

  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Edit Data
        </p>
      </header>
      <div class="card-content">
        <form action="../proses/CRUD_DataObat.php?aksi=edit" method="POST" enctype="multipart/form-data">
          <div class="field">
            <label class="label">ID Obat</label>
            <div class="control">
              <input name="id_obat" class="input" type="text" value="<?php echo $hasil['id_obat'];?>" placeholder="e.g. B0001" required>
            </div>
          </div>
          <div class="field">
            <label class="label">Nama Obat</label>
            <div class="control">
              <input name="nama_obat" class="input" type="text" value="<?php echo $hasil['nama_obat'];?>" placeholder="e.g. Alphazolam" required>
            </div>
          </div>
          <div class="field">
            <label class="label">Stok</label>
            <div class="control">
              <input name="stok" class="input" type="text" value="<?php echo $hasil['stok'];?>" placeholder="e.g. 100" required>
            </div>
          </div>
          <div class="field">
            <label class="label">File</label>
              <div class="control">
                <input name="foto" type="file" value="<?php echo $hasil['foto'];?>" >
              </div>
          </div>
          <div class="field">
            <label class="label">Keterangan Obat</label>
            <div class="control">
              <textarea name="ket_obat" value="<?php echo $hasil['ket_obat'];?>" class="textarea" placeholder="Keterangan Obat yang ingin ditambahkan" required></textarea>
            </div>
          </div>

          <div class="field grouped">
            <div class="control">
              <button name="create" type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
          </div>
        </form>
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

<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button red --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button blue --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>


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
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
