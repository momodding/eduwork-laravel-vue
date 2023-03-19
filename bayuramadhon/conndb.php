<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    die("connection failed: " .  mysqli_connect_error());
}

// echo "berhasil";
// mysqli_close($conn);

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Buku :" . $row["isbn"]." ".$row["judul"]." ".$row["tahun"]. "<br>";
    }
}else{
    echo "0 results";
    }
$conn->close();
 ?>