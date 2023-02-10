<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

// Create connection
//$conn = new mysqli($servername, $username, $password);
$mysqli = mysqli_connect($servername, $username, $password, $database);

/*
// Check connection
if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);

$sql = "SELECT * FROM anggota";
$result = $conn->query($sql);

if($result->num_rows > 0){
    //output data of each row
    while($row = $result->fetch_assoc()){
        echo "Nama : " . $row["nama"]. ". Role : " . $row["role"]. "<br>";
    }
}
else{
    echo "0 result";
}
$conn->close();
*/

?>