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
</head>
<body>
<div style="float-center;">
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
                echo "<td><a href='editpenerbit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td><br>";
            }
        ?>

    </table>
    
</body>
</html>