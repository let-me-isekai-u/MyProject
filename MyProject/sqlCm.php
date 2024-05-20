<?php

    function Signup($username, $password, $repassword, $name, $email, $target_dir){
        if($password == $repassword){
            $conn = mysqli_connect("localhost", "root","123456a@","MyDatabase");
            $query = "insert into student (username, password) values ('$username', '$password')";
            if (mysqli_query($conn, $query)){
                echo "dk thanh cong";
                header("location: login.php");
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
    }else{
        echo "mat khau nhap lai khong giong";       
    }
    $query = "INSERT INTO student ( name, image, email) VALUES ( '$name', '$target_dir', '$email')";
    if (mysqli_query($conn, $query)){
        echo "Thêm thành công";
        header("location: login.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    
    }

    function View(){
        try{
            $conn = mysqli_connect("localhost", "root","123456a@","MyDatabase");
            $rows = mysqli_query($conn, "select id, name, email, image from student order by id limit 20");
            if(mysqli_num_rows($rows)==0){
                $rows=[];
            }
        }catch(Exception $e){
            echo"Error". $e->getMessage();
        }
        return $rows;
    }

    function NamMangj($searchHistory){
        $rows = [];

        foreach($searchHistory as $id){
            $conn = mysqli_connect("localhost", "root","123456a@","MyDatabase");
            $row = mysqli_query($conn, "SELECT * FROM student WHERE id = $id");
            if(mysqli_num_rows($row) != 0){
            //   echo var_dump($row) . '<br>';
            array_push($rows, $row -> fetch_row());
            }
        } return $rows;
    }
?>
