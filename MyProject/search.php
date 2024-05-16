<?php
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $id = $_GET['id'];
            try{
                $conn = mysqli_connect("localhost", "root","123456a@","MyDatabase");
                $rows = mysqli_query($conn,"select * from student where id = $id");
                $student=[];
                if(mysqli_num_rows($rows)>0){
                    $student = mysqli_fetch_array($rows);
                }
                mysqli_close($conn);
        
            }catch(Exception $e){
                echo"Error". $e->getMessage();
            }
        }
        if($student){
            echo "Họ và tên: " .$student["name"] ."<br>";
            echo "Email: " . $student["email"] ."<br>";
            echo "<p>Image: <img src='" . $student['image'] . "' alt='Student Image'></p>";
        }else{
            echo "Không tìm thấy thông tin";
        }
        
    ?>