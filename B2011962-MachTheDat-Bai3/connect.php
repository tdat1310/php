<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    ?>
    