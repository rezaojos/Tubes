<!DOCTYPE html>
<html>
<head>
    <title>Tutorial Membuat Cetak Print Data Dari Database Dengan PHP</title>
</head>
<body>
    <center>
        <h2>LAPORAN DATA BARANG MASUK</h2>
        <hr />
    </center>
    <table border="1" style="width: 100%">
        <tr>
            <!-- <th width="1%">No</th> -->
            
            <th>Id Transaksi</th>
                <th>Id Obat</th>
                <th>Id Admin</th>
                <th>Id Customer</th>
                <th>Jumlah Pembelian</th>
                <th>Harga per pcs</th>
                <th>Total Pembelian</th>
            <th width="5%">Jumlah</th>
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
    <script>
        window.print();
    </script>
</body>
</html>