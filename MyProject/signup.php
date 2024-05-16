<html>


<form action="" method = "post">
    tai khoan<input type="text" name = "username" > <br> <br>
    mat khau<input type="password" name = "password" >
    nhap lai mat khau <input type="password" name = "repassword" >
    <button type = "submit" name = "submit">submit</button>
    </form>

    <?php
    
    if(!isset($_POST['submit'])) return;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        
    if($password == $repassword){
            $conn = mysqli_connect("localhost", "root","123456a@","MyDatabase");
            $query = "insert into student (username1, password1) values ('$username', '$password')";
            if (mysqli_query($conn, $query)){
                echo "dk thanh cong";
                header("location: insert.php");
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
    }else{
        echo "mat khau nhap lai khong giong";       
    }
    ?>

</html>
