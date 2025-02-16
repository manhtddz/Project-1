<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'maru');
$cate_que = mysqli_query($conn, "SELECT * FROM category where category_id != 1 AND del_flag = 0 order by category_id");

$que1 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category = 1 and products.del_flag = 0 LIMIT 4");
$que2 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category = 1 and products.del_flag = 0 LIMIT 4,4");
$que3 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category = 1 and products.del_flag = 0 LIMIT 8,4");
$que4 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category = 1 and products.del_flag = 0 LIMIT 12,4");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saver Combos</title>
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
        <?php
        $get_combo_des = mysqli_query($conn, "SELECT * FROM category where category_id = 1");
        $combo_des = mysqli_fetch_assoc($get_combo_des);
        echo '
            <div class="fruit_des">
                <h1>' . $combo_des['category_name'] . '</h1>
                <p>' . $combo_des['description'] . '</p>
            </div>';
        ?>
        <div class="cate">
            <?php
            while ($cate = mysqli_fetch_assoc($cate_que)) {
            ?>
                <div>
                    <a href="shop.php?cate=<?= $cate['category_id'] ?>"><img src="<?= $cate['images'] ?>" alt=""></a>
                </div>
            <?php
            }
            ?>
        </div>

        <hr style="position:absolute; left: 15%; top: 600px; width: 70%;">

        <div class="line1">
            <?php
            while ($line1 = mysqli_fetch_assoc($que1)) {
                $discounted_price = ($line1['price'] * (100 - $line1['discount_rate'])) / 100;
                if ($line1['status'] == 1) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line1['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line1['images'] . '"></div>
                            <div class="product_name">' . $line1['product_name'] . '</div>
                            <div class="price">' . number_format($line1['price'], 0, ',', '.') . 'đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line1['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line1['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line1['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line1['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line1['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line1['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line1['images'] . '"></div>
                            <div class="product_name">' . $line1['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line1['price'], 0, ',', '.') . 'đ</del></div>
                            <div class="price" style="left:100px">' . number_format($line1['price'], 0, ',', '.') . 'đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line1['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line1['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line1['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                }
            }
            ?>

        </div>
        <div class="line2">
            <?php
            while ($line2 = mysqli_fetch_assoc($que2)) {
                $discounted_price = ($line2['price'] * (100 - $line2['discount_rate'])) / 100;
                if ($line2['status'] == 1) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line2['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line2['images'] . '"></div>
                            <div class="product_name">' . $line2['product_name'] . '</div>
                            <div class="price">' . number_format($line2['price'], 0, ',', '.') . 'đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line2['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line2['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line2['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line2['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line2['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line2['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line2['images'] . '"></div>
                            <div class="product_name">' . $line2['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line2['price'], 0, ',', '.') . 'đ</del></div>
                            <div class="price" style="left:100px">' . number_format($discounted_price, 0, ',', '.') . 'đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line2['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line2['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line2['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                }
            }
            ?>
        </div>
        <div class="line3">
            <?php
            while ($line3 = mysqli_fetch_assoc($que3)) {
                $discounted_price = ($line3['price'] * (100 - $line3['discount_rate'])) / 100;
                if ($line3['status'] == 1) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line3['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line3['images'] . '"></div>
                            <div class="product_name">' . $line3['product_name'] . '</div>
                            <div class="price">' . number_format($line3['price'], 0, ',', '.') . 'đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line3['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line3['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line3['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line3['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line3['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line3['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line3['images'] . '"></div>
                            <div class="product_name">' . $line3['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line3['price'], 0, ',', '.') . 'đ</del></div>
                            <div class="price" style="left:100px">' . number_format($discounted_price, 0, ',', '.') . 'đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line3['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line3['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line3['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                }
            }
            ?>
        </div>
        <div class="line4">
            <?php
            while ($line4 = mysqli_fetch_assoc($que4)) {
                $discounted_price = ($line4['price'] * (100 - $line4['discount_rate'])) / 100;
                if ($line4['status'] == 1) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line4['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line4['images'] . '"></div>
                            <div class="product_name">' . $line4['product_name'] . '</div>
                            <div class="price">' . number_format($line4['price'], 0, ',', '.') . 'đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line4['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line4['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line4['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line4['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line4['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line4['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line4['images'] . '"></div>
                            <div class="product_name">' . $line4['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line4['price'], 0, ',', '.') . 'đ</del></div>
                            <div class="price" style="left:100px">' . number_format($discounted_price, 0, ',', '.') . 'đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line4['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line4['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line4['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_combo" value="Add To Cart">
                    </form>

                </div>';
                }
            }
            ?>
        </div>
        <?php
        include('on_top.php')
        ?>

        <div class="cmt">

        </div>
        <div class="footer">

            <?php
            include('footer.php');
            ?>
        </div>
    </div>