<?php
require_once("config.php");

if(isset($_POST['login'])){

    $username_customer = filter_input(INPUT_POST, 'username_customer', FILTER_SANITIZE_STRING);
    $password_customer = filter_input(INPUT_POST, 'password_customer', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM customer WHERE username_customer=:username_customer";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username_customer" => $username_customer
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: masuk.php");
        }else{
            header("location:login.php?pesan=gagal");
        }
    }else{
        header("location:login.php?pesan=notregister");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Apotek</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
				</div>

				<form method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Login Customer
					</span>
					<?php 
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "gagal"){
                                echo '<div style="color:red;">';
                                echo 'Password Salah!';
                                echo '</div>';
                            }else if($_GET['pesan'] == "notregister"){
                                echo '<div style="color:red;">';
                                echo 'Username/Email tidak terdaftar!';
                                echo '</div>';
                            }
                            else if($_GET['pesan'] == "logout"){
                                echo "Anda telah berhasil logout";
                            }
                        
                        }
                    ?>
					<div class="wrap-input100 validate-input" data-validate = "valid as reyhanadr">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="login" value="Login"></input>
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
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/login.js"></script>

</body>
</html>