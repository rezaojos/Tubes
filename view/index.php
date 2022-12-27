<!DOCTYPE html>
<html>
<head>
    <title>Tutorial Membuat Cetak Print Data Dari Database Dengan PHP</title>
</head>
<body>
    <center>
        <h2>Membuat Cetak Print Data Dari Database Dengan PHP</h2>
        <hr />
        <strong>LAPORAN BARANG MASUK</strong>
        <br />
        <br />
        <table border="1">
            <tr>
                <th>Id Transaksi</th>
                <th>Id Obat</th>
                <th>Id Admin</th>
                <th>Id Customer</th>
                <th>Jumlah Pembelian</th>
                <th>Harga per pcs</th>
                <th>Total Pembelian</th>
            </tr>
            <?php 
            $koneksi2 = mysqli_connect('localhost','root','1','apotek');
            $no = 1;
            $query = mysqli_query($koneksi2,"SELECT * FROM transaksi");
            while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $data['id_transaksi']; ?></td>
                <td><?php echo $data['id_obat']; ?></td>
                <td><?php echo $data['id_admin']; ?></td>
                <td><?php echo $data['id_customer']; ?></td>
                <td><?php echo $data['jumlah_pembelian']; ?></td>
                <td><?php echo $data['harga_per_pcs']; ?></td>
                <td><?php echo $data['total_pembelian']; ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        <br/>
        <a href="print.php" target="_blank">CETAK</a>
    </center>
</body>
</html>