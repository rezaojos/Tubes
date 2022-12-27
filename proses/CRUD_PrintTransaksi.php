<?php
    require 'panggil.php';

    // proses tambah
    // if(!empty($_GET['aksi'] == 'tambah')){
    //     $id_obat = strip_tags($_POST['id_obat']);
    //     $nama_obat = strip_tags($_POST['nama_obat']);
    //     $stok = strip_tags($_POST['stok']);
    //     $ket_obat = strip_tags($_POST['ket_obat']);
    //     $harga_obat = strip_tags($_POST['harga_obat']);
    //     $foto = $_FILES['foto']['name'];
    //     $tmp = $_FILES['foto']['tmp_name'];

    //     // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    //     $rename_foto = date('dmYHis').$foto;

    //     // Set path folder tempat menyimpan fotonya
    //     $path = "../view/images/obat/".$rename_foto;   

    //     $tabel = 'obat';
    //     # proses insert
    //     if(move_uploaded_file($tmp, $path)){
    //         // move_uploaded_file($tmp, '../images/obat/'.$foto);
    //         $data[] = array(
    //             'id_obat'	    =>$id_obat,
    //             'nama_obat'		=>$nama_obat,
    //             'stok'		    =>$stok,
    //             'ket_obat'		=>$ket_obat,
    //             'foto'		    =>$rename_foto,
    //             'harga_obat'    =>$harga_obat
    //         );
    //         $ObjDataObat->tambah_data($tabel,$data);
    //         if ($ObjDataObat){
    //             echo '<script>alert("Tambah Data Berhasil");window.location="../view/data_obat.php"</script>';
    //         }else{
    //             echo '<script>alert("Tambah Data Gagal")</script>';
    //         }
    //     }else{
    //         echo '<script>alert("Gagal Upload Foto")</script>';
    //     }


    // }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit')){
        $id_transaksi = strip_tags($_POST['id_transaksi']);
        $id_obat = strip_tags($_POST['id_obat']);
        $id_admin = strip_tags($_POST['id_admin']);
        $id_customer = strip_tags($_POST['id_customer']);
        $jumlah_pembelian = strip_tags($_POST['jumlah_pembelian']);
        $harga_per_pcs = strip_tags($_POST['harga_per_pcs']);
        $total_pembelian = strip_tags($_POST['total_pembelian']);
        $status = strip_tags($_POST['status']);
		
        // jika password tidak diisi
        if($status == ''){
            $data = array(
                'id_transaksi'	    =>$id_transaksi,
                'id_obat'		    =>$id_obat,
                'id_admin'		    =>$id_admin,
                'id_customer'		=>$id_customer,
                'jumlah_pembelian'  =>$jumlah_pembelian,
                'harga_per_pcs'     =>$harga_per_pcs,
                'total_pembelian'   =>$total_pembelian
            );
        }else{
            $data = array(
                'id_transaksi'	    =>$id_transaksi,
                'id_obat'		    =>$id_obat,
                'id_admin'		    =>$id_admin,
                'id_customer'		=>$id_customer,
                'jumlah_pembelian'  =>$jumlah_pembelian,
                'harga_per_pcs'     =>$harga_per_pcs,
                'total_pembelian'   =>$total_pembelian,
                'status'            =>$status
            );
        }
        $tabel = 'transaksi';
        $where = 'id_transaksi';
        $id = strip_tags($_POST['id_transaksi']);
        $ObjDataTransaksi->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../view/data-transaksi.php"</script>';
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