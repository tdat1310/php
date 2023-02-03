<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Major</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require_once 'connect.php'?>
    <?php 
    if(isset($_POST['submit'])){
        $data = trim($_POST['major']);
        if(!empty($data)){
            $major = htmlspecialchars($_POST['major']); 
            if($conn->query("INSERT INTO major(name_major) VALUES (N'$major')")) $success = true;
        }else $error = true;
    }
    ?>
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"
    style = "padding : 20px"
    >
        <label>Ngành học : </label>
        <input
         name = 'major' 
         class ="form-control
          <?php echo $success?'is-valid':''?>
          <?php echo $error?'is-invalid':''?>
          "
         style = "width: 200px; margin-bottom :10px"
         placeholder="Type input"
         />
        <input type = "submit" value = "Add" name = "submit"/>    
    </form>
</body>
</html>