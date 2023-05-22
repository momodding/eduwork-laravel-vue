<?php
    include_once("connect.php");
    $buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

   
</head>
 
<body>

<center>
    <style type="text/css">
    a {
      font: sans-serif;
      line-height: 1.70em;
      font-size: 30px;
      color: black;
    }
    </style>

    <nav class="navbar navbar-dark bg-info fixed-top">
    <a class="mx-auto" style="width: -100px;" href="index.php">Buku</a>
    <a class="mx-auto" style="width: -100px;"href="penerbit.php">Penerbit</a>
    <a class="mx-auto" style="width: -100px;"href="pengarang.php">Pengarang</a>
    <a class="mx-auto" style="width: -100px;"href="katalog.php">Katalog</a>

    </nav>
</center>
<br/><br/>
<br></br>

<a class="mx-auto" style="color: darkblue" style="font-size: 10px;" href="addbuku.php">Add New Buku</a>

 <div class="table-responsive">
    <table class="table table-striped" width='10%' border=1>
 
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
        while($buku_data = mysqli_fetch_array($buku)) {         
            echo "<tr>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a class='btn btn-primary' href='editbuku.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='deletebuku.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
    </div>
</body>
</html>