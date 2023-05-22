<html>
<head>
	<title>Add Katalog</title>
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
 
	<form action="addkatalog.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Katalog</td>
				<td><input type="text" name="id_katalog"></td>
			</tr>
			<tr> 
				<td>Nama katalog</td>
				<td><input type="text" name="nama_katalog"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="Submit" name="Submit" value="Add"></td>
			</tr>
	 
	 <?php
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_katalog = $_POST['id_katlog'];
			$nama_katalog = $_POST['nama_katalog'];
	
			include_once("connect.php");

			$result = mysqli_query($conn, "INSERT INTO `katalog` ('id_katalog', 'nama_katalog') VALUES ('$idkatalog', '$namakatalog');");
			
            header("Location:katalog.php");
		}
	?>
</body>
</html>