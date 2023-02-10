<?php
    include_once("connect.php");
    $buku = mysqli_query($mysqli, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog from buku
                                    LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                    LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                    LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
                                    ORDER BY judul ASC");
?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>

<div style="float-center;">
    <a href="index.php">Buku</a>
    <a href="penerbit.php">Penerbit</a>
    <a href="pengarang.php">Pengarang</a>
    <a href="katalog.php">Katalog</a>
</div>

<a href="add.php">Add New Book</a><br><br>

    <table width='80%'>
    
    <tr>
        <th>ISBN</th>
        <th>Judul</th>
        <th>Tahun</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Katalog</th>
        <th>Stok</th>
        <th>Harga Pinjam</th>
        <th>Aksi</th>
    </tr>
    <?php
        while($buku_data = mysqli_fetch_array($buku)){
            echo "<tr>";
            echo "<td>" .$buku_data['isbn']. "</td>";
            echo "<td>" .$buku_data['judul']. "</td>";
            echo "<td>" .$buku_data['tahun']. "</td>";
            echo "<td>" .$buku_data['nama_pengarang']. "</td>";
            echo "<td>" .$buku_data['nama_penerbit']. "</td>";
            echo "<td>" .$buku_data['nama_katalog']. "</td>";
            echo "<td>" .$buku_data['qty_stok']. "</td>";
            echo "<td>" .$buku_data['harga_pinjam']. "</td>";
            echo "<td><a href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td>";
            echo "</tr>"; 

        }
    ?>

</body>
</html>