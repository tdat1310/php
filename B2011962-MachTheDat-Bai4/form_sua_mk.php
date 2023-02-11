<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Mật khẩu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        input {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php
    $conn = new mysqli("localhost",  "root", '', "qlbanhang");
    if (isset($_POST['submit'])) {
        $prev_pw = md5($_POST['prev_pw']);
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM customers where id = $id");
        $row = $result->fetch_assoc();
        if ($prev_pw == $row['password']) {
            $right = true;
            if ($_POST['new_pw'] == $_POST['new_pw_retype']) {
                $right = true;
                $new_pw = md5($_POST['new_pw']);
                $newId = $_GET['id'];
                if ($conn->query("UPDATE customers SET password = '$new_pw' WHERE id = '$newId' "))  $right = true;
            } else $error2 = true;
        } else $error1 = true;
    }
    ?>
    <form style='width : 20%; margin : 10px auto' class="form-group" action="./form_sua_mk.php?<?php echo 'id='.$_GET['id'] ?>" method="POST">
        <h1>Sửa mật khẩu</h1>
        <input type='password' placeholder="Nhập mật khẩu cũ" name='prev_pw' class='form-control
          <?php echo $error1 ? 'is-invalid' : '' ?>
          <?php echo $right ? 'is-valid' : '' ?>
         '>
        <input type='password' placeholder="Nhập mật khẩu mới" name='new_pw' ; class=' form-control
          <?php echo $error2 ? 'is-invalid' : '' ?>
        <?php echo $right ? 'is-valid' : '' ?>
        '>
        <input type='password' placeholder="nhập lại mật khẩu mới" name='new_pw_retype' class=' form-control
        <?php echo $error2 ? 'is-invalid' : '' ?>
        <?php echo $right ? 'is-valid' : '' ?>'>
        <button type="submit" name='submit' class="btn btn-primary" style='margin : 10px 90px'>Cập nhật</button>
    </form>
</body>

</html>