<?php
$id= $_GET['edit'];
?>
<form action="edit2.php?edit=<?php echo $id?>" method="POST" enctype="multipart/form-data">
    Naam: <br> <input type="text" name="naam"><br>
    plaatje:<input type="file" name="fileToUpload" id="fileToUpload"><br>
    Beschrijving: <input type="text" name="beschrijving"><br><br>
  <input type="submit" name="submit">  
</form>