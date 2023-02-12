<!DOCTYPE html>
<html lang="en">
    <?php
        include_once("connect.php");
        $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <a href="index.php">Buku</a>
    <a href="penerbit.php">Penerbit</a>
    <a href="pengarang.php">Pengarang</a>
    <a href="katalog.php">Katalog</a>
</div>

<a href="addpengarang.php">Tambah Pengarang</a><br><br>
    <table>
        <tr>
            <td>Id Pengarang</td>
            <td>Nama Pengarang</td>
            <td>Email</td>
            <td>Telp</td>
            <td>Alamat</td>
        </tr>

        <?php
            while($pengarang_data = mysqli_fetch_array($pengarang)){
                echo "<tr>";
                echo "<td>" .$pengarang_data['id_pengarang']."</td>";
                echo "<td>" .$pengarang_data['nama_pengarang']. "</td>";
                echo "<td>" .$pengarang_data['email']. "</td>";
                echo "<td>" .$pengarang_data['telp']. "</td>";
                echo "<td>" .$pengarang_data['alamat']. "</td>";
                echo "<td><a href='editpengarang.php?id_pengarang=$pengarang_data[id_pengarang]'>Edit</a> | <a href='deletepengarang.php?id_pengarang=$pengarang_data[id_pengarang]'>Delete</a></td><br>";
            }
        ?>

    </table>
    
</body>
</html>