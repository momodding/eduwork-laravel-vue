<html>
<head>
  <title>Edit Pengarang</title>
</head>

<?php
  include_once("connect.php");
  $id_pengarang = $_GET['id_pengarang'];

  $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
      $id_pengarang = $pengarang_data['id_pengarang'];
      $nama_pengarang = $pengarang_data['nama_pengarang'];
      $email = $pengarang_data['email'];
      $telp = $pengarang_data['telp'];
      $alamat = $pengarang_data['alamat'];
    }
?>
 
<body>
  <a href="pengarang.php">Go to Home</a>
  <br/><br/>
 
  <form action="editpengarang.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
    <table width="25%" border="0">
       <tr> 
        <td>Pengarang</td>
        <td><input type="text" name="id_pengarang" value="<?php echo $id_pengarang; ?>"></td>
      </tr>
      <tr> 
        <td>Nama Pengarang</td>
        <td><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"></td>
      </tr>
      <tr> 
        <td>Email</td>
        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
      </tr>
      <tr> 
        <td>Telepon</td>
        <td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
      </tr>
      <tr> 
        <td>Alamat</td>
        <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
      </tr>
    </table>
  </form>
  
  <?php
   
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['update'])) {

      $id_pengarang = $_POST['id_pengarang'];
      $nama_pengarang = $_POST['nama_pengarang'];
      $email = $_POST['email'];
      $telp = $_POST['telp'];
      $alamat = $_POST['alamat'];
      
      include_once("connect.php");

      $result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp` WHERE id_pengarang = '$id_pengarang';");
      
      header("Location:pengarang.php");
    }
  ?>
</body>
</html>