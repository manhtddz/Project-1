<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
    }
    
    $s = "UPDATE category SET del_flag = '1' where category_id = $category_id";
    mysqli_query($c,$s);
    mysqli_close($c);
    
    header('location:category.php');
?>