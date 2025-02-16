<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }
    
    $s = "UPDATE products SET del_flag = '0' where product_id = $product_id";
    mysqli_query($c,$s);
    mysqli_close($c);
    
    header('location:products.php');
?>