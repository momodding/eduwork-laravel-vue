<!DOCTYPE html>
<html lang="en">
    <?php
        include_once("connect.php");
        $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerbit</title>
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

<a href="addpenerbit.php">Tambah Penerbit</a><br><br>
    <table>
        <tr>
            <td>Id Penerbit</td>
            <td>Nama Penerbit</td>
            <td>Email</td>
            <td>Telp</td>
            <td>Alamat</td>
        </tr>

        <?php
            while($penerbit_data = mysqli_fetch_array($penerbit)){
                echo "<tr>";
                echo "<td>" .$penerbit_data['id_penerbit']."</td>";
                echo "<td>" .$penerbit_data['nama_penerbit']. "</td>";
                echo "<td>" .$penerbit_data['email']. "</td>";
                echo "<td>" .$penerbit_data['telp']. "</td>";
                echo "<td>" .$penerbit_data['alamat']. "</td>";
                echo "<td><a href='editpenerbit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a href='deletepenerbit.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td><br>";
            }
        ?>

    </table>
    
</body>
</html>