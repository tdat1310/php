<?php
  session_start();
  if(isset($_POST['submit'])){
      $_name = htmlspecialchars($_POST['name']);
      $_password = htmlspecialchars($_POST['password']);
      if($_name == 'thế đạt' && $_password == '123'){
        $_SESSION['username'] = $_name;
        header('Location: ./trangchu.php');
      }else{
        echo '<script>alert("sai thông tin")</script>';
      }
  }
?>
<!DOCTYPE HTML>
<html>  
    <header>
        <style>
            input:nth-child(1){
                margin-left: 50px;
            }
            input:nth-child(4){
                margin-left: 27px;
            }
            input:nth-child(7){
                margin-left: 55px;
            }
        </style>
    </header>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
Name: <input type="text" name="name"><br><br>
Password: <input type="password" name="password"><br><br>
<input type="submit" name = 'submit'>
</form>

</body>
</html>
