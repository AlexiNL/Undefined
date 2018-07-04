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
    $id = $_GET['delete'];
    $sql = "DELETE FROM producten WHERE id=".$id;
    if ($conn->query($sql)) {
        header("Location: Alexzon.php");
    } 
    else{
        header("delete2.php?delete=".id);
    }
}
?>