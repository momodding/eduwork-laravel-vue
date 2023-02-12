<?php
include_once("connect.php");
$id_pengarang = $_GET['id_pengarang'];

$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang where id_pengarang='$id_pengarang'");

while ($pengarang_data = mysqli_fetch_array($pengarang)) {
    $id_pengarang = $pengarang_data['id_pengarang'];
    $nama_pengarang = $pengarang_data['nama_pengarang'];
    $email = $pengarang_data['email'];
    $telp = $pengarang_data['telp'];
    $alamat = $pengarang_data['alamat'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<a href="pengarang.php">Pengarang</a>
    <br>

    <form action="editpengarang.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
        <table>
            <tr>
                <td>Id pengarang</td>
                <td style="font-size:11pt;"><?php echo $id_pengarang; ?></td>
            </tr>
            <tr>
                <td>Nama pengarang</td>
                <td><input type="text" name="namaPengarang" value="<?php echo $nama_pengarang; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="emailPengarang" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telpPengarang" value="<?php echo $telp; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamatPengarang" value="<?php echo $alamat; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['update'])) {

        $id_pengarang = $_GET['id_pengarang'];
        $nama_pengarang = $_POST['namaPengarang'];
        $email = $_POST['emailPengarang'];
        $telp = $_POST['telpPengarang'];
        $alamat = $_POST['alamatPengarang'];

        include_once("connect.php");

        $result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang';");

        header("Location:pengarang.php");
    }
    ?>
</body>
</html>