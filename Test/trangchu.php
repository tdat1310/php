
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    echo '<h1>'.'user : '.$_SESSION["username"].'</h1>';
    ?>
    <h1>DÔ ĐƯỢC GÒI NÈ</h1>
    <?php
    echo '<a href ="./logout">log out</a>'
    ?>
</body>
</html>