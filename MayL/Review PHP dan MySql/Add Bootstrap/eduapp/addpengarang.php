<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<a href="pengarang.php">Go to Pengarang</a>
    <br><br>
    <h2>Tambah Pengarang</h2>
    <form action="addpengarang.php" method="post" name="form1">
        <p>ID Pengarang</P>
        <input type="text" name="idPengarang">
        <p>Nama Pengarang</P>
        <input type="text" name="namaPengarang">
        <p>Email Pengarang</P>
        <input type="text" name="emailPengarang">
        <p>Telp Pengarang</P>
        <input type="text" name="telpPengarang">
        <p>Alamat Pengarang</P>
        <input type="text" name="alamatPengarang">
        <input type="submit" name="Submit" value="Add"></td>
    </form>
<?php
    // Check if form submitted, insert from data into users table.
    if(isset($_POST['Submit'])){
        $id_pengarang = $_POST['idPengarang'];
        $nama_pengarang = $_POST['namaPengarang'];
        $email_pengarang = $_POST['emailPengarang'];
        $telp_pengarang = $_POST['telpPengarang'];
        $alamat_pengarang = $_POST['alamatPengarang'];

        include_once("connect.php");

        $result = mysqli_query($mysqli, "INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`)
                                            VALUES ('$id_pengarang', '$nama_pengarang', '$email_pengarang', '$telp_pengarang', '$alamat_pengarang'); ");
        header("Location:pengarang.php");
    }
?>
</body>
</html>