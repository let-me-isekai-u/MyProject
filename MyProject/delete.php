<?php

$mysqli = new mysqli("localhost", "root", "123456a@", "MyDatabase");

if ($mysqli->connect_errno) {
    echo "Error connecting to database: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql_delete_student = "DELETE FROM student WHERE id = $id";
    if ($mysqli->query($sql_delete_student)) {
        echo "<script>alert('Xóa thành công!');</script>";
        header("location: ViewList.php");
    } else {
        echo "<script>alert('Xóa thất bại!');</script>";
        echo "<script>window.location.href = 'bai1.php';</script>";
    }
}

$mysqli->close();
?>