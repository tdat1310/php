<?php
    if(isset($_POST['submit'])){
      $file_name = $_FILES['upload']['name'];
    if(!empty($_FILES['upload']['name'])){ 
        $data_type = ['txt', 'png', 'jpg'];
        $array_file = explode('.', $_FILES['upload']['name']);
        $file = strtolower(end($array_file));
        $file_destination = "upload/".time().'-'.$file_name;
        $file_tmp_name = $_FILES['upload']['tmp_name'];
        if(in_array($file, $data_type)){
            move_uploaded_file($file_tmp_name,$file_destination);
            if($file === 'txt'){         
             $data_read  = fopen("./upload/".$file_name, 'r');
            $data = fread($data_read, filesize("./upload/".$file_name));
            fclose($data_read);
            $message = '<h3 style="color : Green">In file text thành công</h3>';
            echo $file.'<br/>';
            echo $data;
              }else if($file === 'png' || $file === 'jpg'){
                echo $file.'<br/>';
                 $img_file = '<img src='.$file_destination.' width="100" height="132">';
                $message = '<h3 style="color : Green">lưu file ảnh thành công</h3>';   
            }
        }else {
            $message = '<h3 style="color : red">sai dạng file</h3>';
        }
    }else {
        $message = '<h3 style="color : red">file không tồn tại</h3>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"
          method="POST"
          enctype="multipart/form-data"
    >
        <input type="file" name="upload">
        <br/>
        <br/>
        <input type="submit" value="Tải tệp lên" name = "submit">
    </form>
    <?php
    echo $img_file ?? '';
    echo  $message ?? '';
    ?>
    
</body>
</html>