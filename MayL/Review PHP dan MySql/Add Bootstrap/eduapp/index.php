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
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <a class="btn btn-primary" href="index.php">Buku</a>
    <a class="btn btn-primary"  href="penerbit.php">Penerbit</a>
    <a class="btn btn-primary"  href="pengarang.php">Pengarang</a>
    <a class="btn btn-primary"  href="katalog.php">Katalog</a>
</div>

<a class="btn btn-success" href="add.php">Add New Book</a><br><br>

    <table width='80%' class="table table-bordered">
    
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
            echo "<td><a class='btn btn-warning' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td>";
            echo "</tr>"; 
            
        }
    ?>
</table>  

</body>
</html>