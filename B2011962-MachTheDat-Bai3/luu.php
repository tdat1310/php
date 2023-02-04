<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$date = date_create($_POST["birth"]);
$major_array = explode("-", $_POST["major"]);
print $major_array[0];
$sql = "INSERT INTO student (fullname, email, birthday, major_id) VALUES ('".$_POST["name"] ."', '".$_POST["email"] ."', '".$date ->format('Y-m-d')."', '".$major_array[1]."')";

if ($conn->query($sql) == TRUE) {
  header('location: formnhap.php');
} else { 
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
