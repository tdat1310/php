<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // trinh bay voi bang html
  //load du lieu moi len dua vao bien result
  $result = $conn->query($sql);
  $result_all = $result->fetch_all(MYSQLI_ASSOC);
  //print_r($result_all);
  // trinh bay du lieu trong 1 bang html
  //tieu de bang
?>
  <h1>Bảng dữ liệu sinh viên</h1>
  <table border=1>
    <tr>
      <th>ID</th>
      <th>Họ tên</th>
      <th>email</th>
      <th>Ngày sinh</th>
      <th>Mã Major</th>
      <th>Major</th>
      <th colspan="2">Hành động</th>
    </tr>
    <?php
    // output data of each row
    foreach ($result_all as $row) {
      $id = $row['id'];
      $date = date_create($row['Birthday']);
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fullname"] . "</td><td>" . $row["email"] . "</td><td>" .
        $date->format('d-m-Y')
        . "</td>";
    ?>
      <?php require_once "connect.php" ?>
      <?php
      $a = $row["major_id"];
      $result = $conn->query("SELECT * FROM major WHERE id = $a");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<td style = 'text-align : center'>" . $a . "</td>";
          echo "<td>" . $row['name_major'] . "</td>";
        }
      }
      ?>
      <?php echo "<td>" ?>
      <form method="POST" action="xoa.php">
        <input type="submit" name="action" value="xoa" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
      </form>
      <?php
      echo "</td>";
      echo "<td>";
      ?>
      <form method="post" action="form_sua.php">
        <input type="submit" name="action" value="sua" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
      </form>
  <?php
      echo "</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 ket qua tra ve";
    $conn->query('ALTER TABLE student AUTO_INCREMENT = 1');
  }
  $conn->close();
  ?>