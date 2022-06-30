<html>
<head>
  <title>Add Penerbit</title>
</head>

<?php
  include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>
 
<body>
  <a href="penerbit.php">Go to Home</a>
  <br/><br/>
 
  <form action="addpenerbit.php" method="post" name="form1">
    <table width="25%" border="0">
      <tr> 
        <td>Penerbit</td>
        <td>
          <select name="id_penerbit">
            <?php 
                while($penerbit_data = mysqli_fetch_array($penerbit)) {         
                  echo "<option value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
                }
            ?>
          </select>
        </td>
      </tr>
      <tr> 
        <td>Nama Penerbit</td>
        <td><input type="text" name="nama_penerbit"></td>
      </tr>
      <tr> 
        <td>Email</td>
        <td><input type="text" name="email"></td>
      </tr>
      <tr> 
        <td>Telepon</td>
        <td><input type="text" name="telp"></td>
      </tr>
      <tr> 
        <td>Alamat</td>
        <td><input type="text" name="alamat"></td>
      </tr>
      <tr> 
        <td></td>
        <td><input type="submit" name="Submit" value="Add"></td>
      </tr>
    </table>
  </form>
  
  <?php
   
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
      $id_penerbit = $_POST['id_penerbit'];
      $nama_penerbit = $_POST['nama_penerbit'];
      $email = $_POST['email'];
      $telp = $_POST['telp'];
      $alamat = $_POST['alamat'];
      
      include_once("connect.php");

      $result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`);");
      
      header("Location:penerbit.php");
    }
  ?>
</body>
</html>