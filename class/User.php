<?php
    class User{
        protected $db;
        function __construct($db){
            $this->db = $db;
        }
        
        function proses_login($user,$pass){
            // untuk password kita enkrip dengan md5
            $row = $this->db->prepare('SELECT * FROM customer WHERE username_customer=? AND password_customer=md5(?)');
            $row->execute(array($user,$pass));
            $count = $row->rowCount();
            if($count > 0)
            {
                return $hasil = $row->fetch();
            }else{
                return 'gagal';
            }
        }
    
        function proses_logout(){
            session_start();
            session_destroy();
            header("location:../login.php?signout=sukses"); 
        }

        // variable $tabel adalah isi dari nama table database yang ingin ditampilkan
        // variable where adalah isi kolom tabel yang mau diambil
        // variable id adalah id yang mau di ambil
        
        function tampil_data_id($tabel,$where,$id){
            $row = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
            $row->execute(array($id));
            return $hasil = $row->fetch();
        }
    }
?>