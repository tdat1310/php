<?php
$mysqli = new mysqli("localhost","root","","thongtinsv");
// Check connection
if ($mysqli -> connect_errno) {
  echo "Kết nối sql thất bại" . $mysqli -> connect_error;
  exit();
}
?>