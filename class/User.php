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

        function proses_register($tabel,$data){
            // buat array untuk isi values insert sumber kode 
            // http://thisinterestsme.com/pdo-prepared-multi-inserts/
            $rowsSQL = array();
            // buat bind param Prepared Statement
            $toBind = array();
            // list nama kolom
            $columnNames = array_keys($data[0]);
            // looping untuk mengambil isi dari kolom / values
            foreach($data as $arrayIndex => $row){
                $params = array();
                foreach($row as $columnName => $columnValue){
                    $param = ":" . $columnName . $arrayIndex;
                    $params[] = $param;
                    $toBind[$param] = $columnValue;
                }
                $rowsSQL[] = "(" . implode(", ", $params) . ")";
            }
            $sql = "INSERT INTO $tabel (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
            $row = $this->db->prepare($sql);
            //Bind our values.
            foreach($toBind as $param => $val){
                $row ->bindValue($param, $val);
            }
            //Execute our statement (i.e. insert the data).
            return $row ->execute();
        }
    
        function proses_logout(){
            session_start();
            session_destroy();
            header("location:../view/login.php?signout=sukses"); 
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