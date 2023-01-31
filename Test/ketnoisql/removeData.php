<?php require_once 'connect.php'?>
<?php
$id = number_format($_GET['id']);
$delete = "DELETE FROM sinhvien WHERE msv = $id";
if ($mysqli->query($delete)===true){
    $mysqli->query("UPDATE sinhvien
    SET msv = msv - 1
    WHERE msv >  $id;");
    echo '<script>alert("Xóa thông tin thành công")</script>';
    header('location: ./DataList.php');
}else echo '<script>alert("Xóa thông tin thất bại")</script>';
?>