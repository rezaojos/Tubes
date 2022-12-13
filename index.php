<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TuBes IMPL Kelompok 5</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<?php 

?>
	<!-- header -->
	<header>
		<div class="container">
		<h1><a href="index.php"></a>Apotek Al-Huda</h1>
		<ul>
			<li><a href="keranjang.php">Keranjang</a></li>
			<li class="active"><a href="login.html">Login</a></li>
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
			<div class="card" style="width: 18rem;"> 
			
			include('koneksi.php');
			if(isset($_GET['id_gambar'])){
    			$query = mysqli_query($koneksi,"select * from apotekalhuda where obat='".$_GET['foto']."'");
				

  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Penanganan pertama untuk demam bayi</p>
    <tr>
	<td colspan="2">
                          <a href="transaksi.php" onclik = "window.print" class="btn btn-lg btn-success w-100"></a>
                        </td></tr>
  </div>
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