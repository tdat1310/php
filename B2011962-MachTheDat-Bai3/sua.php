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

$id =  $_POST['id'];
$date = date_create($_POST["birth"]);
$majorArray = explode('-',$_POST["major"]); 
 $a = $majorArray[1];  
$sql = "UPDATE student set fullname = '".$_POST['fullname']."', email = '".$_POST['email']."',birthday = '".$date ->format('Y-m-d')."'".",major_id ='".$a."'";
$sql = $sql. " WHERE ID='".$id."'";
if ($conn->query($sql) == TRUE) {
  header('Location: taidulieu_bang1.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
