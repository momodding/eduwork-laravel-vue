 <?php
$servername = "localhost";
$database = "perpus_eduwork";
$username = "root";
$password = "";

// create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (!$conn) {
	die("connection failed: ".mysql_connect_error());
}

//echo "connected successfully";
//mysqli_close($conn);

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//output data of each num_rows
	while($row = $result->fetch_assoc()) {
	echo "Buku : " . $row["isbn"]. " " . $row["judul"]. "<br>";
	}
}else {
	echo "0 result";
}
$conn->close();

?>