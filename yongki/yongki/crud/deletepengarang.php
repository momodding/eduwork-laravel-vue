<?php
include_once("connect.php");
 
$id_pengarang = $_GET['id_pengarang'];
 
$result = mysqli_query($conn, "DELETE FROM buku WHERE id_pengarang='$id_pengarang'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pengarang.php");
?>