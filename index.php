<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TuBes IMPL Kelompok </title>5
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </head>
  <body> 
    <!-- header -->
    <header>
      <div class="container">
        <h1>
          <a href="index.php"></a>Apotek Al-Huda
        </h1>
        <ul>
          <li>
            <a href="keranjang.php">Keranjang</a>
          </li>
          <li class="active">
            <a href="login.html">Login</a>
          </li>
        </ul>
      </div>
    </header>
    <!-- banner -->
    <section class="banner">
      <h2>Selamat Datang di Website Apotek Al-Huda</h2>
    </section>
    <section class="product">
      <div class="container">
        <h3>Produk Kami</h3>
		<div class="container text-center">
  <div class="row row-cols-4">
    <div class="col">Column</div>
    <div class="col">Column</div>
    <div class="col">Column</div>
    <div class="col">Column</div>
  </div>
</div>

		<?php
			include('koneksi.php');
    			$query = "SELECT nama_obat,foto from obat"; 
				$result = mysqli_query($conn,$query);
				if ($result != null) {
					while($row = mysqli_fetch_array($result)) {
						echo "<br><img src='img/".$row['foto']."'>"."</br> ".$row['nama_obat'];
					}
				}
			?>
          <!--<div class="card-body"><h4 class="card-title">Bye Bye Fever</h4><p class="card-text">Penanganan pertama untuk demam bayi</p><tr><td colspan="2"><a href="transaksi.php" onclik = "window.print" class="btn btn-lg btn-success w-100"></a></td></tr></div>-->
        </div>
      </div>
      </a>
      </div>
      </div>
      </div>
    </section>
    <!-- footer -->
    <footer>
      <div class="container">
        <small> Copyright &copy; 2022 - Kelompok 5, All Rights Reserved.</small>
      </div>
    </footer>
  </body>
</html>