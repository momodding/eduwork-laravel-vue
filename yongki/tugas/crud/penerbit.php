<?php
    include_once("connect.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY id_penerbit ASC");
?>
 
<html>
<head>    
    <title>Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
    <table class="table table-striped" width='80%' border=1>
 
    <tr>
        <th>ID penerbit</th> 
        <th>Nama penerbit</th> 
        <th>Email</th> 
        <th>Telp</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id_penerbit']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";    
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";    
              
            echo "<td><a class='btn btn-primary' href='editpenerbit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='deletepenerbit.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
    </div>
</body>
</html>