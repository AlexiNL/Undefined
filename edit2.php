<?php
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "alexzon";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($_SERVER['REQUEST_METHOD'] = 'POST'){
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $filename = basename($_FILES["fileToUpload"]["name"]);
        $naam = $_POST['naam'];
        $beschrijving = $_POST['beschrijving'];
        $id = $_GET['edit'];
        $sql = "UPDATE producten SET naam='$naam',img='$filename', beschrijving='$beschrijving' WHERE id=$id";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        if ($conn->query($sql)) {
            header("Location: Alexzon.php");
        } 
        else {
            header("Location: edit.php?edit=".$id);
        }
    }
}

$conn->close();
?>