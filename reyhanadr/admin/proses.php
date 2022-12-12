<?php
// Load file koneksi.php
include "config.php";

// Ambil Data yang Dikirim dari Form
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$umur = filter_input(INPUT_POST, 'umur', FILTER_SANITIZE_STRING);
$telepon = filter_input(INPUT_POST, 'telepon', FILTER_SANITIZE_STRING);
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../images/users/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$sql = $db->prepare
    ("INSERT INTO users(name, username, umur, telepon, password, email, foto) VALUES(:name,:username,:umur,:telepon,:password,:email,:foto)");
	$sql->bindParam(':name', $name);
	$sql->bindParam(':username', $username);
	$sql->bindParam(':umur', $umur);
	$sql->bindParam(':telepon', $telepon);
	$sql->bindParam(':password', $password);
    $sql->bindParam(':email', $email);
	$sql->bindParam(':foto', $fotobaru);
	$sql->execute(); // Eksekusi query insert

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: login.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
}else if ($foto == null && $tmp == null){
	// Proses simpan ke Database
	$sql = $db->prepare
    ("INSERT INTO users(name, username, umur, telepon, password, email) VALUES(:name,:username,:umur,:telepon,:password,:email)");
	$sql->bindParam(':name', $name);
	$sql->bindParam(':username', $username);
	$sql->bindParam(':umur', $umur);
	$sql->bindParam(':telepon', $telepon);
	$sql->bindParam(':password', $password);
    $sql->bindParam(':email', $email);
	$sql->execute(); // Eksekusi query insert

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: login.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
}
?>