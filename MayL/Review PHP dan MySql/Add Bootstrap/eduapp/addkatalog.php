<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<a href="katalog.php">Go to Katalog</a>
    <br><br>
    <h2>Tambah Katalog</h2>
    <form action="addkatalog.php" method="post" name="form1">
        <p>ID Katalog</P>
        <input type="text" name="idKatalog">
        <p>Nama Katalog</P>
        <input type="text" name="namaKatalog">
        
        <input type="submit" name="Submit" value="Add"></td>
    </form>
<?php
    // Check if form submitted, insert from data into users table.
    if(isset($_POST['Submit'])){
        $id_katalog = $_POST['idKatalog'];
        $nama_katalog = $_POST['namaKatalog'];

        include_once("connect.php");

        $result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`)
                                            VALUES ('$id_katalog', '$nama'); ");
        header("Location:katalog.php");
    }
?>
</body>
</html>