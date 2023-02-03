<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị chuyên ngành</title>
</head>
<body>
<?php require_once 'connect.php'?>
<?php
$result = $conn->query("SELECT * FROM major");
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<ul
        style = "
        list-style : none;
        "
        >';
        echo '<li>'.$row['name_major'].'</li>';
        echo '</ul>';
    }
}
?>
</body>
</html>