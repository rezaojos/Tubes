<?php
    require 'panggil.php';

    // login
    if(!empty($_GET['aksi'] == 'login')){   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class ObjAdmin()
        $result = $ObjUser->proses_login($user,$pass);
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
    
    // proses registrasi
    if(!empty($_GET['aksi'] == 'register')){
        $nama_customer = strip_tags($_POST['nama_customer']);
        $email_customer = strip_tags($_POST['email_customer']);
        $username_customer = strip_tags($_POST['username_customer']);
        $password_customer = strip_tags($_POST['password_customer']);

        $tabel = 'customer';
        # proses insert
        $data[] = array(
            'nama_customer'	        =>$nama_customer,
            'email_customer'	    =>$email_customer,
            'username_customer'	    =>$username_customer,
            'password_customer'	    =>md5($password_customer)
        );
        $ObjUser->proses_register($tabel,$data);
        if ($ObjUser){
            echo '<script>alert("Registrasi berhasil");window.location="../view/login.php"</script>';
        }else{
            echo '<script>alert("Registrasi Gagal")</script>';
        }

    }

    if(!empty($_GET['aksi'] == 'logout')){   
        $ObjUser->proses_logout();
    }
?>