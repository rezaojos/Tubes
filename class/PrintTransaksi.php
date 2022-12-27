<?php 
class PrintTransaksi {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    // variable $tabel adalah isi dari nama table database yang ingin ditampilkan

    function tampil_data($tabel){
        $row = $this->db->prepare("SELECT * FROM $tabel");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    // variable $tabel adalah isi dari nama table database yang ingin ditampilkan
    // variable where adalah isi kolom tabel yang mau diambil
    // variable id adalah id yang mau di ambil
    
    function tampil_data_id($tabel,$where,$id){
        $row = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
        $row->execute(array($id));
        return $hasil = $row->fetch();
    }

    function edit_data($tabel,$data,$where,$id){
        // sumber kode 
        // https://stackoverflow.com/questions/23019219/creating-generic-update-function-using-php-mysql
        $setPart = array();
        foreach ($data as $key => $value)
        {
            $setPart[] = $key."=:".$key;
        }
        $sql = "UPDATE $tabel SET ".implode(', ', $setPart)." WHERE $where = :id";
        $row = $this->db->prepare($sql);
        //Bind our values.
        $row ->bindValue(':id',$id); // where
        foreach($data as $param => $val)
        {
            $row ->bindValue($param, $val);
        }
        return $row ->execute();
    }

    function hapus_data($tabel,$where,$id){
        $sql = "DELETE FROM $tabel WHERE $where = ?";
        $row = $this->db->prepare($sql);
        return $row ->execute(array($id));
    }

    
}