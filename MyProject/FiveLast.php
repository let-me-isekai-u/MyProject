<?php
    require('sqlCm.php');
    $searchHistory = json_decode($_COOKIE['search_history'], true);
    
    //echo var_dump($searchHistory); //var_dump: in các biến phức tạp

    $rows = NamMangj($searchHistory);

    foreach($rows as $student){

        $id = $student[0];
        $name = $student[1];
        $email = $student[2];
        $image = $student[3];
    
        
        
        // $image_name = $_FILES['image']['name'];
        // $image_tmp = $_FILES['image']['tmp_name'];
      

        // echo var_dump('student');
        echo $id . ',' . $name . ',' . $email . '<br>';
        echo "<br> <img src = '".$image."' width = '300px'>";
    }

?>