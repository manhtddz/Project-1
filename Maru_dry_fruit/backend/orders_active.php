<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }
    
    $s = "UPDATE orders SET del_flag = '0' where order_id = $order_id";
    mysqli_query($c,$s);
    mysqli_close($c);
    
    header('location:orders.php');
?>