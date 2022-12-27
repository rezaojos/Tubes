<?php
    // session start();
    if(!empty($_SESSION)){ }else{ session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Apotek</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form method="POST" action="../proses/CRUD_LoginLogout.php?aksi=login" id="formlogin" class="login100-form validate-form" >
				<div id="logout">
					<?php if(isset($_GET['signout'])){?>
					<div class="alert alert-success">
						<small>Anda Berhasil Logout</small>
					</div>
					<?php }?>
					</div>
				<div id="notifikasi">
					<div class="alert alert-danger">
					<small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
					</div>
				</div>
					<span class="login100-form-title">
						Login
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="user" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="proses_login" type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Register
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Scripts below are for demo only -->
	<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
	// notifikasi gagal di hide
	<?php if(empty($_GET['get'])){?>
		$("#notifikasi").hide();
	<?php }?>
	var logingagal = function(){
		$("#logout").fadeOut('slow');
		$("#notifikasi").fadeOut('slow');
	};
	setTimeout(logingagal, 4000);
	</script>

</body>
</html>