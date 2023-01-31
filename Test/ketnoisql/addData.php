<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Thêm sv</title>
</head>
<body>
    <?php require_once 'connect.php' ?>
<?php
    if(isset($_POST['submit'])){
        if(empty($_POST['hoten']) && empty($_POST['lop'])){$error1 = true;$error2 = true;}
        else if(empty($_POST['lop'])) $error2 = true;    
        else if(empty($_POST['hoten'])) $error1 = true;  
        else if(!is_numeric($_POST['lop']))  $error2 = true;  
        else if(is_numeric($_POST['hoten']))  $error1 = true;       
        else {$hoten = htmlspecialchars($_POST['hoten']);
            $right = true;
        $lop = htmlspecialchars($_POST['lop']);
         $result = $mysqli->query('SELECT * FROM sinhvien');  
        if($mysqli->query("INSERT INTO sinhvien(ten,lop) VALUES (N'$hoten', N'$lop')")){
            echo '<script>alert("Thêm thông tin thành công")</script>';     
        }else echo '<script>alert("Thêm thông tin thất bại")</script>';
     }   
    }
?> 
<div class="container">
    <form method = 'POST' action = '<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>'>
      <div class="form-group">
        <label for="exampleInputPassword1">Họ tên</label>
        <input type="text" name='hoten'class="
         form-control
         <?php echo $error1?'is-invalid':''?>
         <?php echo $right?'is-valid':''?>" id="exampleInputPassword1" placeholder="Nhập họ tên">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Lớp</label>
        <input type="text" name= 'lop' class="
        form-control 
        <?php echo $error2?'is-invalid':''?>
        <?php echo $right?'is-valid':''?>
        " id="exampleInputPassword1" placeholder="Nhập lớp">
      </div>
      <button type="submit" name ='submit' class="btn btn-primary">Submit</button>
      
      <button class='btn btn-primary'><a 
        href = './dataList.php'
        style = 'color : white;'
        >Xem dữ liệu</a></button>
    </form>
</div>
</body>
</html>