<?php
include_once("connect.php");
$id_penerbit = $_GET['id_penerbit'];

$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit where id_penerbit='$id_penerbit'");

while ($penerbit_data = mysqli_fetch_array($penerbit)) {
    $id_penerbit = $penerbit_data['id_penerbit'];
    $nama_penerbit = $penerbit_data['nama_penerbit'];
    $email = $penerbit_data['email'];
    $telp = $penerbit_data['telp'];
    $alamat = $penerbit_data['alamat'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
    <a href="penerbit.php" class="btn btn-primary">Penerbit</a>
    <br>

    <form action="editpenerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
        <table>
            <tr>
                <td>Id Penerbit</td>
                <td style="font-size:11pt;"><?php echo $id_penerbit; ?></td>
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td><input type="text" name="namaPenerbit" value="<?php echo $nama_penerbit; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="emailPenerbit" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telpPenerbit" value="<?php echo $telp; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamatPenerbit" value="<?php echo $alamat; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="update" class="btn btn-success"></td>
            </tr>
        </table>
    </form>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['update'])) {

        $id_penerbit = $_GET['id_penerbit'];
        $nama_penerbit = $_POST['namaPenerbit'];
        $email = $_POST['emailPenerbit'];
        $telp = $_POST['telpPenerbit'];
        $alamat = $_POST['alamatPenerbit'];

        include_once("connect.php");

        $result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit';");

        header("Location:penerbit.php");
    }
    ?>
</body>

</html>