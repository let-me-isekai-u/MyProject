<?php
session_start(); // Bắt đầu session

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "123456a@", "MyDatabase");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Truy vấn cơ sở dữ liệu để lấy thông tin người dùng
    $query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Lưu thông tin người dùng vào session
        $_SESSION['username'] = $username;
        echo "Đăng nhập thành công!";
        header("Location: ViewList.php"); // Chuyển hướng đến trang welcome.php
        exit();
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu!";
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <form action="" method="post">
        Tài khoản: <input type="text" name="username" required> <br><br>
        Mật khẩu: <input type="password" name="password" required> <br><br>
        <button type="submit" name="submit">Đăng nhập</button>
    </form>
</body>
</html>
