<!DOCTYPE html>
<html lang="en">
    <?php
        include_once("connect.php");
        $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
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

<a href="addkatalog.php">Tambah Katalog</a><br><br>
    <table>
        <tr>
            <td>Id Katalog</td>
            <td>Nama Katalog</td>
        </tr>

        <?php
            while($katalog_data = mysqli_fetch_array($katalog)){
                echo "<tr>";
                echo "<td>" .$katalog_data['id_katalog']."</td>";
                echo "<td>" .$katalog_data['nama']. "</td>";
                echo "<td><a href='editkatalog.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a href='deletekatalog.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td><br>";
            }
        ?>

    </table>
</body>
</html>