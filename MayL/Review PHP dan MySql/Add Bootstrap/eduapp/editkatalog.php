<?php
include_once("connect.php");
$id_katalog = $_GET['id_katalog'];

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog where id_katalog='$id_katalog'");

while ($katalog_data = mysqli_fetch_array($katalog)) {
    $id_katalog = $katalog_data['id_katalog'];
    $nama_katalog = $katalog_data['nama'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <a href="katalog.php" class="btn btn-primary">Katalog</a>
    <br>

    <form action="editkatalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
        <table>
            <tr>
                <td>Id Katalog</td>
                <td style="font-size:11pt;"><?php echo $id_katalog; ?></td>
            </tr>
            <tr>
                <td>Nama Katalog</td>
                <td><input type="text" name="namakatalog" value="<?php echo $nama_katalog; ?>"></td>
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

        $id_katalog = $_GET['id_katalog'];
        $nama_katalog = $_POST['namakatalog'];

        include_once("connect.php");

        $result = mysqli_query($mysqli, "UPDATE katalog SET nama_katalog = '$nama_katalog' WHERE id_katalog = '$id_katalog';");

        header("Location:katalog.php");
    }
    ?>
</body>
</html>