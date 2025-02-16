<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
    if(isset($_GET['cus_id'])){
        $cus_id = $_GET['cus_id'];
    }
    
    $s = "UPDATE customers SET del_flag = '1' where cus_id = $cus_id";
    mysqli_query($c,$s);
    mysqli_close($c);
    
    header('location:customers.php');
?>