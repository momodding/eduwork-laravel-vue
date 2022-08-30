<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    die("Connection Failed : ". mysqli_connect_error());
}

// echo "Connected Successfully";
// mysqli_close($conn);

?>