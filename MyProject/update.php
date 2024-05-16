<html>
<form action="" method="post" enctype="multipart/form-data">
        <label for="id">id</label><br>
        <input type="text" name="id" id ="id"><br>
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
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $target_dir = "./". $image_name;

            if (move_uploaded_file($image_tmp, $target_dir)) {
                $query = "update student set name = '$name', email = '$email', image = '$target_dir' WHERE id = $id";
                echo $query;

                if (mysqli_query($conn, $query)){
                    echo "Update thành công";
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