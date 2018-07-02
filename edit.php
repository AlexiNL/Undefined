<?php
  session_start();
     $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $dbname = "alexzon";
      $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (mysqli_connect_errno()) {
          die("Database connection failed: " .
            mysqli_connect_error() . 
            " (" . mysqli_connect_errno() . ")"
          );
        }
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $naam ="UPDATE producten SET naam=" . $_POST['naam'] . "WHERE id=" . $_GET['edit'];
  $beschrijving ="UPDATE producten SET beschrijving=". $_POST['beschrijving']."WHERE id =". $_GET['edit'];
  if ($connection->query($naam) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $connection->error;
  }
  if ($connection->query($beschrijving) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $connection->error;
  }
}
$connection->close();
?>

<form action="edit.php?edit=<?php echo $_GET['edit']?>" method="POST" enctype="multipart/form-data">
  Naam: <br> <input type="text" name="naam"><br>
  Plaatje: <br><input type="file" name="fileToUpload" id="fileToUpload"><br>
  Beschrijving:<br> <input type="text" name="beschrijving"><br><br>
  <input type="submit" name="submit">
</form>