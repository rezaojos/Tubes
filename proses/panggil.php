<?php
    // panggil file
    include '../class/koneksi.php';
    include '../class/User.php';
    include '../class/DataObat.php';
    include '../class/DataCustomer.php';
    // cara panggil class di koneksi php
    $db = new Koneksi();
    // cara panggil koneksi di fungsi DBConnect()
    $koneksi =  $db->DBConnect();
    // panggil class Admin di file Admin.php
    $ObjUser = new User($koneksi);
    $ObjDataCustomer = new DataCustomer($koneksi);
    $ObjDataObat = new DataObat($koneksi);
    // menghilangkan pesan error
    error_reporting(0);
    // panggil session ID
    $id = $_SESSION['ADMIN']['id_customer'];
    $sesi = $ObjUser->tampil_data_id('customer','id_customer',$id);
?>