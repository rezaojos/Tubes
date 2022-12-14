<?php
// Load file koneksi.php
include "config.php";

// Ambil Data yang Dikirim dari Form
$id_admin = filter_input(INPUT_POST, 'id_admin', FILTER_SANITIZE_STRING);
$nama_admin = filter_input(INPUT_POST, 'nama_admin', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Proses upload
	// Proses simpan ke Database
	$sql = $db->prepare
    ("INSERT INTO admin(id_admin, nama_admin, username, password) VALUES(:id_admin, :nama_admin,:username,:password)");
	$sql->bindParam(':id_admin', $id_admin);
	$sql->bindParam(':nama_admin', $nama_admin);
	$sql->bindParam(':username', $username);
	$sql->bindParam(':password', $password);
	$sql->execute(); // Eksekusi query insert

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: masuk.html"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
?>