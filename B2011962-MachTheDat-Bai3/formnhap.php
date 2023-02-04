<!DOCTYPE HTML>
<html>  
<body>
<?php require_once 'connect.php'?>
<form action="luu.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Birthday: <input type="date" name="birth"><br>
Major : <select name="major">
  <?php
  $result = $conn->query("SELECT * FROM major");
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<option>';
        echo $row['name_major']."-".$row['id'];  
        echo '</option>';
    }
  }
  ?>  
</select>
<input type="submit">
</form>

</body>
</html>
