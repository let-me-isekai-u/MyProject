<html>
    <form action="./search.php" method = "get">
    <input type="text" name="id" >
    <button type="submit">Search</button>
    </form>

    <form action="./update.php" method="get">
        <button type = "submit" >Update</button>
    </form>

    <form action="./delete.php" method = "post">
        <input type="text" name = "id">
        <button type = "submit"> Xóa đi</button>
    </form>

        <form action="./logout.php" method = "post">
            <button type = "submit">log out</button>
        </form>
    <?php
    try{
        $conn = mysqli_connect("localhost", "root","123456a@","MyDatabase");
        $rows = mysqli_query($conn, "select id, name, email, image from student order by id limit 20");
        if(mysqli_num_rows($rows)==0){
            $row=[];
        }
    }catch(Exception $e){
        echo"Error". $e->getMessage();
    }if(!empty($rows));

    foreach($rows as $student){
        $id = $student['id'];
        $name = $student['name'];
        $email = $student['email'];
        $image = $student['image'];
    

        // $image_name = $_FILES['image']['name'];
        // $image_tmp = $_FILES['image']['tmp_name'];
      


        echo $id . ',' . $name . ',' . $email . '<br>';
        echo "<br> <img src = '".$image."' width = '300px'>";
    }
    ?>
</html>
