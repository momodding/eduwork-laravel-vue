<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
	die("Connection failed: " .$mysqli->connect_error());
 	}

// echo "Connected successfully";
// mysqli_close($conn);

$sql = "SELECT * FROM anggota";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "anggota : " . $row["nama"]. " " . $row["alamat"]. "<br>";
	}
} else {
  echo "0 results";
}
$conn->close();


?>