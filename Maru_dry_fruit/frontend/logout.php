<?php
session_start();

    if(isset($_COOKIE['mail'])){
        setcookie('mail','',time()-3600);
    }
    header('location:index.php');   
?>