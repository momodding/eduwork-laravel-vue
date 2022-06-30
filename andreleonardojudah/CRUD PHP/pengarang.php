<?php
    include_once("connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang ORDER BY nama_pengarang ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>

<center>
    <a href="buku.php">Buku</a> |
    <a href="penerbit.php">Penerbit</a> |
    <a href="pengarang.php">Pengarang</a> |
    <a href="katalog.php">Katalog</a>
    <hr>
</center>

<a href="addpengarang.php">Add New Pengarang</a><br/><br/>
 
    <table class="table table-striped table-hover" width='80%' border=1>
 
    <tr>
        <th><div class = "text-center">ID Pengarang</div></th> 
        <th><div class = "text-center">Nama Pengarang</div></th> 
        <th><div class = "text-center">Email</div></th> 
        <th><div class = "text-center">Telepon</div></th>
        <th><div class = "text-center">Alamat</div></th>
        <th><div class = "text-center">Aksi</div></th>
    </tr>
    <?php  
        while($pengarang_data = mysqli_fetch_array($pengarang)) {         
            echo "<tr>";
            echo "<td>".$pengarang_data['id_pengarang']."</td>";
            echo "<td>".$pengarang_data['nama_pengarang']."</td>";
            echo "<td>".$pengarang_data['email']."</td>";    
            echo "<td>".$pengarang_data['telp']."</td>";    
            echo "<td>".$pengarang_data['alamat']."</td>";    
            echo "<td><a class='btn btn-primary' href='editpengarang.php?id_pengarang=$pengarang_data[id_pengarang]'>Edit</a> | <a class='btn btn-danger' href='deletepengarang.php?id_pengarang=$pengarang_data[id_pengarang]'>Delete</a></td></tr>";       
        }
    ?>
    </table>

    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Andre Leonardo Judah
      </div>
      <!-- Copyright -->
    </footer>
</body>
</html>