<?php
    require 'panggil.php';

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah')){
        $nama_customer = strip_tags($_POST['nama_customer']);
        $email_customer = strip_tags($_POST['email_customer']);
        $username_customer = strip_tags($_POST['username_customer']);
        $password_customer = strip_tags($_POST['password_customer']);  

        $tabel = 'customer';
        # proses insert
        $data[] = array(
            'nama_customer'		=>$nama_customer,
            'email_customer'    =>$email_customer,
            'username_customer' =>$username_customer,
            'password_customer' =>md5($password_customer)
        );
        $ObjDataCustomer->tambah_data($tabel,$data);
        if ($ObjDataCustomer){
            echo '<script>alert("Tambah Data Berhasil");window.location="../view/data-customer.php"</script>';
        }else{
            echo '<script>alert("Tambah Data Gagal")</script>';
        }

    }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit')){
        $nama_customer = strip_tags($_POST['nama_customer']);
        $email_customer = strip_tags($_POST['email_customer']);
        $username_customer = strip_tags($_POST['username_customer']);
        $password_customer = strip_tags($_POST['password_customer']);  
		
        // jika password tidak diisi
        if($password_customer == '')
        {
            $data = array(
                'nama_customer'		=>$nama_customer,
                'email_customer'    =>$email_customer,
                'username_customer' =>$username_customer,
            );
        }else{

            $data = array(
                'nama_customer'		=>$nama_customer,
                'email_customer'    =>$email_customer,
                'username_customer' =>$username_customer,
                'password_customer' =>md5($password_customer)
            );
        }
        $tabel = 'customer';
        $where = 'id_customer';
        $id = strip_tags($_POST['id_customer']);
        $ObjDataCustomer->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../view/data-customer.php"</script>';
    }
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus')){
        $tabel = 'customer';
        $where = 'id_customer';
        $id = strip_tags($_GET['hapusid']);
        $ObjDataObat->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../view/data-customer.php"</script>';
    }

?>