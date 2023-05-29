<?php
    include_once("connect.php");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");
?>
 
<html>
<head>    
    <title>Katalog</title>
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

    
 <div class="table">
    <table class="table table-striped" width='80%' border=1>
 
    <tr>
        <th>ID Katalog</th> 
        <th>Nama</th>
        <th>Aksi</th> 
        
    </tr>
    <?php  
        while($katalog_data = mysqli_fetch_array($katalog)) {         
            echo "<tr>";
            echo "<td>".$katalog_data['id_katalog']."</td>";
            echo "<td>".$katalog_data['nama']."</td>";
             
            echo "<td><a class='btn btn-primary' href='editkatalog.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a class='btn btn-danger' href='deletekatalog.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";        
        }
    ?>
    </table>

</body>
</html>