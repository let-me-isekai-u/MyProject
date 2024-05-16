<html>
<form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name</label><br>
        <input type="text" name="name" id ="name"><br>
        <label for="image">Image</label><br>
        <input type="file" name="image"><br/>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>
        <input type="submit" name="submit" value="Submit">

    </form>
    <body>
        <?php
        $conn = mysqli_connect("localhost","root","123456a@","MyDatabase");
        if($conn->connect_error) 
        die("không kết nối được". $conn->connect_error);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];

            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $target_dir = "./". $image_name;

            if (move_uploaded_file($image_tmp, $target_dir)) {
                $query = "INSERT INTO student ( name, image, email) VALUES ( '$name', '$target_dir', '$email')";
                if (mysqli_query($conn, $query)){
                    echo "Thêm thành công";
                    header("location: ViewList.php");
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            } else {
                echo "Lỗi khi tải lên file ảnh.";
            }
        }
        
        mysqli_close($conn);
    ?>  
    </body>
</html>