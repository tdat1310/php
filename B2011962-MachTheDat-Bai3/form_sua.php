<!DOCTYPE HTML>
<html>
<body>
  <?php require_once "connect.php" ?>
  <?php
 
    $id = $_POST['id'];
  
  $result = $conn->query("SELECT * FROM student WHERE id= $id");
  $row = $result->fetch_assoc(); 
  ?>
  
  <form action="sua.php" method="POST">
    ID:<input type="text" name="id" value="<?php echo $row['id']; ?>"><br>
    Name: <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"><br>
    E-mail: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
    Birthday: <input type="date" name="birth" value="<?php echo $row['Birthday']; ?>"><br>
    Major : <select name="major">
      <?php
      $result = $conn->query("SELECT * FROM major");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<option>';
          echo $row['name_major'] . "-" . $row['id'];
          echo '</option>';
        }
      }
      ?>
    </select>
    <input type="submit">
  </form>

</body>

</html>