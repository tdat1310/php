<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Major</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require_once 'connect.php'?>
    <?php 
    if(isset($_POST['submit'])){
        $data = trim($_POST['major']);    
        if(!empty($data)){
            $major = htmlspecialchars($_POST['major']); 
            $id = number_format($_POST['id']);
            if($conn->query("UPDATE major SET name_major = '$major' WHERE id = '$id'")){
                header('location: major_index.php');
            }
        }
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
          value = "<?php echo $_GET['name_major']?>"
         style = "width: 200px; margin-bottom :10px"
         placeholder="Type input"
         />
         <label>Id : </label>
         <input
         name = 'id' 
         class ="form-control"
          value = "<?php echo $_GET['id']?>"
         style = "width: 80px; margin-bottom :10px"
         />
        <input type = "submit" value = "Change" name = "submit"/>    
    </form>
</body>
</html>