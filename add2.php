<?php
// Create connection
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "alexzon";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = basename($_FILES["fileToUpload"]["name"]);
$naam = $_POST['naam'];
$beschrijving = $_POST['beschrijving'];

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	$sql = "INSERT INTO producten (naam, img, beschrijving)
	VALUES ('$naam', '$filename', '$beschrijving')";
	if ($conn->query($sql) === TRUE) {
	    header("Location: Alexzon.php");
	} else {
		header("Location: add.php");
}
} else {
    echo "Sorry, there was an error uploading your file.";
}
$conn->close();
?>