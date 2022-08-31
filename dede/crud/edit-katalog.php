<html>
<head>
	<title>Edit Katalog</title>
</head>

<?php
	include_once("connect.php");
	$id_katalog = $_GET['id_katalog'];

	// $buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE isbn='$isbn'");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");
    // $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
    // $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$id_katalog = $katalog_data['id_katalog'];
    	$nama_katalog = $katalog_data['nama'];
    }
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit-katalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Kode katalog</td>
				<td style="font-size: 11pt;"><?php echo $id_katalog; ?> </td>
			</tr>
			<tr> 
				<td>Nama katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama_katalog; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update-katalog" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update-katalog'])) {

			$id_katalog = $_GET['id_katalog'];
			$nama_katalog = $_POST['nama'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama_katalog', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_katalog = '$id_katalog';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>