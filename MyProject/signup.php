<html>


<form action="" method = "post" enctype="multipart/form-data">
    tai khoan<input type="text" name = "username" > <br> <br>
    mat khau<input type="password" name = "password" >
    nhap lai mat khau <input type="password" name = "repassword" >

    <br><br><br>
    <label for="name">Name</label><br>
        <input type="text" name="name" id ="name"><br>
        <label for="image">Image</label><br>
        <input type="file" name="image"><br/>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>
    <button type = "submit" name = "submit">submit</button>
    </form>

    <?php
    require('sqlCm.php');

    if(!isset($_POST['submit'])) return;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        $name = $_POST['name'];
        $email = $_POST['email'];

        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $target_dir = "./". $image_name;
        
        if (move_uploaded_file($image_tmp, $target_dir)) {
            Signup($username, $password, $repassword, $name, $email, $target_dir);
        } else {
            echo "Lỗi khi tải lên file ảnh.";
        }

       
      
    ?>

</html>
