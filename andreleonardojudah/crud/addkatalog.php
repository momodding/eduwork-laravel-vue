<html>
<head>
  <title>Add Katalog</title>
</head>

<?php
  include_once("connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
 
<body>
  <a href="katalog.php">Go to Home</a>
  <br/><br/>
 
  <form action="addkatalog.php" method="post" name="form1">
    <table width="25%" border="0">
      <tr> 
        <td>Katalog</td>
        <td>
          <select name="id_katalog">
            <?php 
                while($katalog_data = mysqli_fetch_array($katalog)) {         
                  echo "<option value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
                }
            ?>
          </select>
        </td>
      </tr>
      <tr> 
        <td>Nama</td>
        <td><input type="text" name="nama"></td>
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
      $id_katalog = $_POST['id_katalog'];
      $nama = $_POST['nama'];
      
      include_once("connect.php");

      $result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`);");
      
      header("Location:katalog.php");
    }
  ?>
</body>
</html>