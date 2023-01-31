<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Hiển thị dữ liệu</title>
</head>
<body>
    <?php require_once 'connect.php'?>
    <?php
    $result = $mysqli->query('SELECT * FROM sinhvien');
    if($result->num_rows > 0){
        echo '<ul
        style = "
        list-style : none;
        "
        >';
        while($row = $result->fetch_assoc()) {
            echo "<li
            style = '
            border : 1px solid black;
            width : 170px;
            padding : 10px;
            margin-bottom : 10px;
            '
            >". $row["ten"]. "</br>Lớp : " . $row["lop"]. "</li>".'<button 
            type="button" 
            class="btn btn-primary"
            style = "margin-bottom: 10px;
            color : white;"         
            >'.'<a
            style="color : white;"
            href = "'.'./removeData.php?id='.$row["msv"].'"'.
            '>Xóa data '. $row["msv"].'</a></button>';
          }
          echo '</ul>';
    }else {
        echo "<h1>Dữ liệu trống</h1>";
        $mysqli->query('ALTER TABLE sinhvien AUTO_INCREMENT = 1');
        echo "<button class='btn btn-primary'><a 
        href = './addData.php'
        style = 'color : white;'
        >Trở về trang nhập dữ liệu</a></button>";
      }
    ?>
</body>
</html>