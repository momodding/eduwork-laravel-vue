<?php
include "connect.php";

$sql1 = "SELECT * FROM buku WHERE tahun > 2014";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()){
        echo "Buku : ".$row["isbn"]." ".$row["judul"]." "."<br>";
    }
}else{
    echo "0 result";
}
$conn->close();