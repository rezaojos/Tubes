<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';
    
    // tampilkan form edit
    $idGet = strip_tags($_GET['id']);
    $hasil = $ObjDataCustomer->tampil_data_id('transaksi','id',$idGet);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <br><br>
    <div class="container">
        <img src="images/header_print.png"  style="display:block; margin:auto; height:150px;">
    </div>
    <br><br>
    <div class="container">
        <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">ID Admin</th>
                <th scope="col">ID Customer</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">ID Obat</th>
                <th scope="col">Jumlah Pembelian</th>
                <th scope="col">Harga per Pcs</th>
                <th scope="col">Total Biaya</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $hasil['id_admin'];?></td>
                <td><?php echo $hasil['id_customer'];?></td>
                <td><?php echo $sesi['nama_customer'];?></td>
                <td><?php echo $hasil['id_obat'];?></td>
                <td><?php echo $hasil['jumlah_pembelian'];?></td>
                <td><?php echo $hasil['harga_per_pcs'];?></td>
                <td><?php echo $hasil['total_pembelian'];?></td>
              </tr>
            </tbody>
          </table>
    </div>
    <div class="container">
        <img src="images/footer_print.png"  style="display:block; margin:auto; height:80px;">
    </div>
  <script>
    window.print();
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>