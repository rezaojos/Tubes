<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/favicon.png"/>
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
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/oyo-logo2.png" alt="IMG">
				</div>

				<form action="proses.php" method="POST" class="login100-form validate-form" enctype="multipart/form-data">
					<span class="login100-form-title">
						Register
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Field is Required">
						<input class="input100" type="text" name="name" placeholder="Nama Lengkap">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Field is Required">
						<input class="input100" type="number" name="umur" placeholder="Umur" min="18">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Field is Required">
						<input class="input100" type="tel" name="telepon" placeholder="telepon" min="18">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone-square" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Field is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-plus" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
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

					<!-- <span class="login100-form-title2">
						Mau Nambahin Foto Profil?
					</span> -->

					<!-- <center class="my-3">
						<img src="../default.png" id="preview" class="img-thumbnail img-responsive cropp" onclick="crop()">
                    </center> -->

                    <div class="input-group my-3">
                        <input type="text" class="form-control" disabled value="Upload Foto Profil" id="file" >
                        <div class="input-group-append">
                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">
								<input type="file" name="foto" id="pilih_gambar" style="opacity:0; position: absolute;" >
								Pilih Gambar
							</button>
						</div>
                    </div>


					<div class="wrap-input100" >
						<input style="margin-right: 10px;" type="checkbox" name="agreement" value="agree">I Agree Terms and Conditions
					
					</div>
					
					<div class="container-login100-form-btn">
						<input class="login100-form-btn crop" type="submit" name="register" value="Register" >
							
						</input>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
						
						</span>
						<a class="txt2" href="#">
							
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.html">
							
							
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
<!--===============================================================================================-->
	<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
    <script src="/admin/js/jquery-cropper.js"></script>    
	<!-- Crop Gambar -->
	<!--<script>
		function crop(){
			var $image = $('.cropp');
	
			$image.cropper({
				aspectRatio: 1 / 1,
			});

			$('.crop').on('click', function(){
				var $image = $('.cropp');
				var cropper = $image.data('cropper');
				var url = cropper.getCroppedCanvas().toDataURL('image/jpeg').replace(/^data:image\/[^;]+/, 'data:application/octet-stream');
				$(this).attr('href', url);
			})
		}-->


	</script>
	<!-- Click Otomatis Muncul Gambar -->
	<script>
		$(document).on("click", "#pilih_gambar", function() {
		var file = $(this).parents().find(".file");
		file.trigger("click");
		});

		$('input[type="file"]').change(function(e) {
		var fileName = e.target.files[0].name;
		$("#file").val(fileName);

		var reader = new FileReader();
		reader.onload = function(e) {
			// get loaded data and render thumbnail.
			document.getElementById("preview").src = e.target.result;
		};
		// read the image file as a data URL.
		reader.readAsDataURL(this.files[0]);
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>