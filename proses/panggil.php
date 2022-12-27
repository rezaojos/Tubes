<?php
    // panggil file
    // include '../class/koneksi.php';
    // include '../class/Admin.php';
    // include '../class/DataObat.php';
    // include '../class/DataCustomer.php';
    include '../class/DataTransaksi.php';
    // cara panggil class di koneksi php
    $db = new Koneksi();
    // cara panggil koneksi di fungsi DBConnect()
    $koneksi =  $db->DBConnect();
    // panggil class Admin di file Admin.php
    $ObjAdmin = new Admin($koneksi);
    // panggil class
    $ObjDataObat = new DataObat($koneksi);
    $ObjDataCustomer = new DataCustomer($koneksi);
    $ObjDataTransaksi = new DataTransaksi($koneksi);
    // menghilangkan pesan error
    error_reporting(0);
    // panggil session ID
    $id = $_SESSION['ADMIN']['id_admin'];
    $sesi = $ObjAdmin->tampil_data_id('admin','id_admin',$id);
?>