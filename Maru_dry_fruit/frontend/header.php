<?php
if(isset($_COOKIE['mail'])){
    echo 
    '<div class="header">
    <div class="menu_top">
        <i style = "color: white;">Welcome back, '.$_COOKIE['mail'].'</i>
        <a href="order_history.php">Order History</a>
        <a href="FAQ.php">FAQ</a>
        <a href="contact_us.php">Contact Us</a>
    </div>
    <div class="logo_header">
        <a href="index.php"><img src="image/system_img/maru_logo.png"></a>
    </div>
    <div class="search_bar">
        <form action = "shop.php" method="POST">
        <input class = "search_form_input" type ="text" name="search_info" placeholder="Search by product name">
        <input class = "search_form_submit" type="submit" value = "Q" style="width:25px; height:25px" name="search">
        </form>
        
    </div>
    <div class="icon">
        <a href="logout.php"><img src="image/system_img/logout-icon.png"></a>
        <a href="cart.php"><img src="image/system_img/icon-cart.png"></a> <span class="cart_size">('.sizeof($_SESSION['cart']).')</span>
    </div>
    <div class="nav" style="display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 50px;
    width: 100%;
    height: 42px;
    position: fixed;
    top: 158px;
    background: #000000;">
        <a href="index.php"><img width="35" height="35" src="https://img.icons8.com/flat-round/64/home--v1.png" alt="home--v1" /></a>
        <a href="shop.php">Shop</a>
        <a href="saver_combos.php">Saver Combos</a>
        <a href="campaign.php">Campaign</a>
        <a href="about_us.php">About Us</a>
        <a href="contact_us.php">Contact us</a>
    </div>
</div>';
}else{
    echo 
    '<div class="header">
    <div class="menu_top">
        <a href="order_history.php">Order History</a>
        <a href="FAQ.php">FAQ</a>
        <a href="contact_us.php">Contact Us</a>
    </div>
    <div class="logo_header">
        <a href="index.php"><img src="image/system_img/maru_logo.png"></a>
    </div>
    <div class="search_bar">
        <form action = "shop.php" method="POST">
        <input class = "search_form_input" type ="text" name="search_info" placeholder="Search by product name">
        <input class = "search_form_submit" type="submit" value = "Q" style="width:25px; height:25px" name="search">
        </form>
        
    </div>
    <div class="icon">
        <a href="login.php"><img src="image/system_img/icon-user.png"></a>
        <a href="cart.php"><img src="image/system_img/icon-cart.png"></a><span class="cart_size">('.sizeof($_SESSION['cart']).')</span>
    </div>
    <div class="nav" style="display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 50px;
    width: 100%;
    height: 42px;
    position: fixed;
    top: 158px;
    background: #000000;">
        <a href="index.php"><img width="35" height="35" src="https://img.icons8.com/flat-round/64/home--v1.png" alt="home--v1" /></a>
        <a href="shop.php">Shop</a>
        <a href="saver_combos.php">Saver Combos</a>
        <a href="campaign.php">Campaign</a>
        <a href="about_us.php">About Us</a>
        <a href="contact_us.php">Contact us</a>
    </div>
</div>';
}
    
?>