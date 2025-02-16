<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
    if(isset($_GET['discount_id'])){
        $discount_id = $_GET['discount_id'];
    }
    
    $s = "UPDATE campaign SET status = '1' where discount_id = $discount_id";
    mysqli_query($c,$s);
    mysqli_close($c);
    
    header('location:campaign.php');
?>