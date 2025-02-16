<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'maru');


$que1 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where status = 0 and products.del_flag = 0 LIMIT 4");
$que2 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where status = 0 and products.del_flag = 0 LIMIT 4,4");
$que3 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where status = 0 and products.del_flag = 0 LIMIT 8,4");
$que4 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where status = 0 and products.del_flag = 0 LIMIT 12,4");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign</title>
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>

</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="main">
        <div class="cpn_banner">
            <img src="image/system_img/cpn_banner.jpg">
        </div>
        <div class="line1">
            <?php
            while ($line1 = mysqli_fetch_assoc($que1)) {
                $discounted_price = ($line1['price'] * (100 - $line1['discount_rate'])) / 100;
            ?>
                <div class="pro_container">
                    <a href="product_details.php?product_id=<?= $line1['product_id'] ?>">
                        <div class="content">
                            <div class="pro_img"><img src="<?= $line1['images'] ?>"></div>
                            <div class="product_name"><?= $line1['product_name'] ?></div>
                            <div class="price"><del><?= $line1['price'] ?>đ</del></div>
                            <div class="price1"><?= number_format($discounted_price, 0, ',', '.') ?>đ</div>
                        </div>
                    </a>
                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="<?= $line1['product_id'] ?>">
                        <input type="hidden" name="images" value="<?= $line1['images'] ?>">
                        <input type="hidden" name="product_name" value="<?= $line1['product_name'] ?>">
                        <input type="hidden" name="price" value="<?= $discounted_price ?>">
                        <input class="add_butt" type="submit" name="add_to_cart_campaign" value="Add To Cart">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="line2">
            <?php
            while ($line2 = mysqli_fetch_assoc($que2)) {
                $discounted_price = ($line2['price'] * (100 - $line2['discount_rate'])) / 100;

            ?>
                <div class="pro_container">
                    <a href="product_details.php?product_id=<?= $line2['product_id'] ?>">
                        <div class="content">
                            <div class="pro_img"><img src="<?= $line2['images'] ?>"></div>
                            <div class="product_name"><?= $line2['product_name'] ?></div>
                            <div class="price"><del><?= $line2['price'] ?>đ</del></div>
                            <div class="price1"><?= number_format($discounted_price, 0, ',', '.') ?>đ</div>

                        </div>
                    </a>
                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="<?= $line2['product_id'] ?>">
                        <input type="hidden" name="images" value="<?= $line2['images'] ?>">
                        <input type="hidden" name="product_name" value="<?= $line2['product_name'] ?>">
                        <input type="hidden" name="price" value="<?= $discounted_price ?>">
                        <input class="add_butt" type="submit" name="add_to_cart_campaign" value="Add To Cart">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="line3">
            <?php
            while ($line3 = mysqli_fetch_assoc($que3)) {
                $discounted_price = ($line3['price'] * (100 - $line3['discount_rate'])) / 100;

            ?>
                <div class="pro_container">
                    <a href="product_details.php?product_id=<?= $line3['product_id'] ?>">
                        <div class="content">
                            <div class="pro_img"><img src="<?= $line3['images'] ?>"></div>
                            <div class="product_name"><?= $line3['product_name'] ?></div>
                            <div class="price"><del><?= $line3['price'] ?>đ</del></div>
                            <div class="price1"><?= number_format($discounted_price, 0, ',', '.') ?>đ</div>

                        </div>
                    </a>
                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="<?= $line3['product_id'] ?>">
                        <input type="hidden" name="images" value="<?= $line3['images'] ?>">
                        <input type="hidden" name="product_name" value="<?= $line3['product_name'] ?>">
                        <input type="hidden" name="price" value="<?= $discounted_price ?>">
                        <input class="add_butt" type="submit" name="add_to_cart_campaign" value="Add To Cart">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="line4">
            <?php
            while ($line4 = mysqli_fetch_assoc($que4)) {
                $discounted_price = ($line4['price'] * (100 - $line4['discount_rate'])) / 100;

            ?>
                <div class="pro_container">
                    <a href="product_details.php?product_id=<?= $line4['product_id'] ?>">
                        <div class="content">
                            <div class="pro_img"><img src="<?= $line4['images'] ?>"></div>
                            <div class="product_name"><?= $line4['product_name'] ?></div>
                            <div class="price"><del><?= $line4['price'] ?>đ</del></div>
                            <div class="price1"><?= number_format($discounted_price, 0, ',', '.') ?>đ</div>

                        </div>
                    </a>
                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="<?= $line4['product_id'] ?>">
                        <input type="hidden" name="images" value="<?= $line4['images'] ?>">
                        <input type="hidden" name="product_name" value="<?= $line4['product_name'] ?>">
                        <input type="hidden" name="price" value="<?= $discounted_price ?>">
                        <input class="add_butt" type="submit" name="add_to_cart_campaign" value="Add To Cart">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include('on_top.php')
    ?>
    <div class="footer">
        <?php
        include('footer.php');
        ?>
    </div>
</body>