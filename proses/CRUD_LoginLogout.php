<?php
    require 'panggil.php';

    // login
    if(!empty($_GET['aksi'] == 'login')){   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class ObjAdmin()
        $result = $ObjAdmin->proses_login($user,$pass);
        if($result == 'gagal'){
            echo "<script>window.location='../view/login.php?get=gagal';</script>";
        }else{
            // status yang diberikan 
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan 
            echo "<script>window.location='../view/index.php';</script>";
        }
    }

    if(!empty($_GET['aksi'] == 'logout')){   
        $ObjAdmin->proses_logout();
    }
?>