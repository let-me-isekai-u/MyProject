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
    session_start(); 


    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); 
        exit();
    }
    
?>

        <?php

try{
    $conn = mysqli_connect("localhost", "root","123456a@","MyDatabase");
    if($conn->connect_error) 
    die("không kết nối được". $conn->connect_error);
  
    $rows = mysqli_query($conn, "select id, name, email from student order by id limit 20");
    if(mysqli_num_rows($rows)==0){
        $row=[];
    }
}catch(Exception $e){
    echo"Error". $e->getMessage();
}if(!empty($rows));

        // $conn = mysqli_connect("localhost","root","123456a@","MyDatabase");
        // if($conn->connect_error) 
        // die("không kết nối được". $conn->connect_error);
      
       
    

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

        foreach($rows as $student){
            $id = $student['id'];
            $name = $student['name'];
            $email = $student['email'];
            echo $id . ',' . $name . ',' . $email . '<br>';
            
        }
        
        mysqli_close($conn);
    ?>  
    </body>
</html>
