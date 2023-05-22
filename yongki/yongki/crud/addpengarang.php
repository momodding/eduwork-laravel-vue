<html>
<head>
	<title>Add Pengarang</title>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="addpengarang.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Pengarang</td>
				<td><input type="text" name="id_pengarang"></td>
			</tr>
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>Telp</td>
				<td><input type="text" name="Telp"></td>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="Alamat"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="Submit" name="Submit" value="Add"></td>
			</tr>
	 
	 <?php
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_pengarang = $_POST['id_pengarang'];
			$nama_pengrang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "INSERT INTO `pengarang` ('id_pengarang', 'nama_pengarang', 'Email', 'Telp', 'Alamat') VALUES ('$idpengarang', '$namapengarang', '$email', '$telp', '$alamat');");
			
            header("Location:pengarang.php");
		}
	?>
</body>
</html>