<html>
<head>
	<title>Edit Katalog</title>
</head>

<?php
	include_once("connect.php");
	$id_katalog = $_GET['id_katalog'];
    $katalog = mysqli_query($conn, "SELECT * FROM katalog where id_katalog='$id_katalog'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$id_katalog = $katalog_data['id_katalog'];
    	$nama = $katalog_data['nama'];
    }
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="editkatalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>id_katalog</td>
				<td style="font-size: 11pt;"><?php echo $id_katalog; ?> </td>
			</tr>
			<tr> 
				<td>nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_katalog = $_GET['id_katalog'];
			$nama = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE buku SET id_katalog = '$id_katalog', nama = '$nama' ;");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>