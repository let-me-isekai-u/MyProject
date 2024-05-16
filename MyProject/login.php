<?php
session_start(); 


if (isset($_SESSION['username'])) {
  
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $conn = mysqli_connect("localhost", "root", "123456a@", "MyDatabase");

  
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

  
    $query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
       
        $_SESSION['username'] = $username;
        echo "Đăng nhập thành công!";
        header("Location: ViewList.php"); 
        exit();
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu!";
    }


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
