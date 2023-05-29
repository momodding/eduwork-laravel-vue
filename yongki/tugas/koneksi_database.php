<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "perpus_eduwork";

$connect = mysql_connect($host,$user,$pass);
$select = mysql_select_db($db,$connect);

if($select){
	echo"berhasi koneksi ke database";
}
else{
	echo"gagal koneksi ke database";
}
?>