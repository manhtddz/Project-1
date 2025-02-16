<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks</title>
    <link rel="stylesheet" href="css/cart.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>


</head>
<body>
    <?php
    include('header.php');
    ?>

    <div class="sc-container">
        <h1>Order Completed</h1>
        <p>Thanks for shopping with Maru.</p>
        <img src="image/system_img/success.png" alt="" /><br>
        <a class="sc-btn" href="order_history.php">Go to Order History to check your order details</a>
    </div>

    <div class="footer" style="position: relative; top: 350px;">
    <?php
    include('footer.php');
    ?>
    </div>
</body>
</html>