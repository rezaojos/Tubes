<?php
    require 'panggil.php';

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah')){
        // $id_transaksi = strip_tags($_POST['id_transaksi']);
        $id_obat = strip_tags($_POST['id_obat']);
        $id_admin = strip_tags($_POST['id_admin']);
        $id_customer = strip_tags($_POST['id_customer']);
        $jumlah_pembelian = strip_tags($_POST['jumlah_pembelian']);
        $harga_per_pcs = strip_tags($_POST['harga_per_pcs']);
        $total_pembelian = strip_tags($_POST['total_harga']);

        $tabel = 'transaksi';
        # proses insert
        $data[] = array(
            'id_obat'		    =>$id_obat,
            'id_admin'          =>$id_admin,
            'id_customer'       =>$id_customer,
            'jumlah_pembelian'  =>$jumlah_pembelian,
            'harga_per_pcs'     =>$harga_per_pcs,
            'total_pembelian'   =>$total_pembelian
        );
        $ObjDataCustomer->tambah_data($tabel,$data);
        if ($ObjDataCustomer){
            echo '<script>alert("Berhasil Memesan Obat");window.location="../view/index.php"</script>';
        }else{
            echo '<script>alert("Transaksi Gagal")</script>';
        }


    }
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus')){
        $tabel = 'obat';
        $where = 'id_obat';
        $id = strip_tags($_GET['hapusid']);
        $ObjDataObat->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../view/data-transaksi.php"</script>';
    }


?>