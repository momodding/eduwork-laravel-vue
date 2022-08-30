<?php
include "connect.php";
$tahun = 2014;

$sql2 = "SELECT buku.isbn, buku.judul, penerbit.nama_penerbit, pengarang.nama_pengarang, buku.qty_stok, buku.harga_pinjam FROM buku 
JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit 
JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang WHERE tahun > $tahun AND harga_pinjam > 7000";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()){
        echo "Buku : ".$row["isbn"]." ".$row["judul"]." ".$row["nama_penerbit"]." ".$row["nama_pengarang"]." ".$row["qty_stok"]." ".$row["harga_pinjam"]."<br>";
    }
}else{
    echo "0 result";
}
$conn->close();