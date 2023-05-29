<html>
<head>
	<title>Edit Pengarang</title>
</head>

<?php
	include_once("connect.php");
	$id_pengarang = $_GET['id_pengarang'];
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang where id_pengarang='$id_pengarang'");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
    	$id_pengarang = $pengarang_data['id_pengarang'];
    	$nama_pengarang = $pengarang_data['nama_pengarang'];
    	$email = $pengarang_data['email'];
    	$telp = $pengarang_data['telp'];
    	$alamat = $pengarang_data['alamat'];
    }
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="editpengarang.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>id_pengarang</td>
				<td style="font-size: 11pt;"><?php echo $id_pengarang; ?> </td>
			</tr>
			<tr> 
				<td>nama pengarang</td>
				<td><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="Email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>Telp</td>
				<td><input type="text" name="Telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="Alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_penerbit = $_GET['id_pengarang'];
			$nama_penerbit = $_POST['nama_pengarang'];
			$email = $_POST['Email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE buku SET id_pengarang = '$id_pengarang', nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' ;");
			
			header("Location:pengarang.php");
		}
	?>
</body>
</html>