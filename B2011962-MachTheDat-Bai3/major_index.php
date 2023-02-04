<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị major</title>
</head>
<body>
<?php require_once 'connect.php'?>
<?php
$result = $conn->query("SELECT * FROM major");
if($result->num_rows > 0){
     echo '<ul
        style = "
        list-style : none;
        "
        >';
    while($row = $result->fetch_assoc()){   
        echo '<li style = "margin : 10px">'.$row['name_major'].        '<button style = "margin-left : 10px">'.
        '<a style = "padding : 5px; text-decoration : none"'.
        'href='.'"./major_xoa.php?id='.$row['id'].'"'
        .'>'.'remove'.'</a>'.'</button>'.
        '<button style = "margin-left : 10px">'.
        '<a style = "padding : 5px; text-decoration : none ;"'.
        'href='.'"./major_edit.php?name_major='.$row['name_major'].'&id='.$row['id'].'"'
        .'>'.'Change'.'</a>'.'</button>'.'</li>'
        ;     
    }
    echo '</ul>';
}else {
    echo '<h1>Dữ liệu trống</h1>';
    $conn->query('ALTER TABLE major AUTO_INCREMENT = 1');
        echo "<button class='btn btn-primary'><a 
        href = './major_add.php'
        >Trở về trang nhập dữ liệu</a></button>";
}
?>
</body>
</html>