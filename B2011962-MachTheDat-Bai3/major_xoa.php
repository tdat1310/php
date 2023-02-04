    <?php require_once 'connect.php'?>
    <?php
    $id = number_format($_GET['id']);
    $delete = "DELETE FROM major WHERE id = $id";
    if($conn->query($delete)){
        $conn->query("UPDATE major
        SET id = id - 1
        WHERE id >  $id;");
        header('location: ./major_index.php');
    }else echo '<script>alert("Xóa thông tin thất bại")</script>';
    ?>
