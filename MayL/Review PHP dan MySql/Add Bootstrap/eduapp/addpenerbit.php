<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <a href="penerbit.php">Go to Penerbit</a>
    <br><br>
    <h2>Tambah Penerbit</h2>
    <form action="addpenerbit.php" method="post" name="form1">
        <p>ID Penerbit</P>
        <input type="text" name="idPenerbit">
        <p>Nama Penerbit</P>
        <input type="text" name="namaPenerbit">
        <p>Email Penerbit</P>
        <input type="text" name="emailPenerbit">
        <p>Telp Penerbit</P>
        <input type="text" name="telpPenerbit">
        <p>Alamat Penerbit</P>
        <input type="text" name="alamatPenerbit">
        <input type="submit" name="Submit" value="Add"></td>
    </form>
<?php
    // Check if form submitted, insert from data into users table.
    if(isset($_POST['Submit'])){
        $id_penerbit = $_POST['idPenerbit'];
        $nama_penerbit = $_POST['namaPenerbit'];
        $email_penerbit = $_POST['emailPenerbit'];
        $telp_penerbit = $_POST['telpPenerbit'];
        $alamat_penerbit = $_POST['alamatPenerbit'];

        include_once("connect.php");

        $result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`)
                                            VALUES ('$id_penerbit', '$nama_penerbit', '$email_penerbit', '$telp_penerbit', '$alamat_penerbit'); ");
        header("Location:penerbit.php");
    }
?>

</body>
</html>