<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'maru');
$cate_que = mysqli_query($conn, "SELECT * FROM category where del_flag = 0 and category_id != 1 order by category_id");
$cate_des_que = mysqli_query($conn, "SELECT category_id, category_name, description FROM category where del_flag = 0 and category_id != 1 order by category_id");
if (isset($_POST['search'])) {
    $key = $_POST['search_info'];
    $que1 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and product_name like '%$key%' and products.del_flag = 0 LIMIT 4");
    $que2 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and product_name like '%$key%' and products.del_flag = 0 LIMIT 4,4");
    $que3 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and product_name like '%$key%' and products.del_flag = 0 LIMIT 8,4");
    $que4 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and product_name like '%$key%' and products.del_flag = 0 LIMIT 12,4");
} else {
    $que1 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 4");
    $que2 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 4,4");
    $que3 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 8,4");
    $que4 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 12,4");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maru Dry Fruit Toppage</title>
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png" />
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="main">
        <?php

        while ($cate_des = mysqli_fetch_assoc($cate_des_que)) {

            if (isset($_GET['cate']) && $_GET['cate'] == $cate_des['category_id']) {

                echo '
                <div class="fruit_des">
                    <h1>' . $cate_des['category_name'] . '</h1>
                    <p>' . $cate_des['description'] . '</p>
                </div>';
            }else if(!isset($_GET['cate'])){
                echo '<div class = "fruit_des">
                <h1>Dry Fruits And Their Health Benefits</h1>
                <p>Dry fruits provide essential nutrients that boost immunity, relieve oxidative stress, 
                    aid in weight loss, improve gut health, promote healthy skin, support heart health, 
                    enhance bone health, assist in type-2 diabetes management, and help prevent cancer. 
                    Almonds, with their magnesium content, can help regulate blood pressure. 
                    Including dry fruits in your diet can have a positive impact on overall well-being.</p>
            </div>';
            }
        }
        ?>
        <div class="cate">
            <?php
            while ($cate = mysqli_fetch_assoc($cate_que)) {
            ?>
                <div>
                    <a href="?cate=<?= $cate['category_id'] ?>"><img src="<?= $cate['images'] ?>" alt=""></a>
                </div>

            <?php
                if (isset($_GET['cate']) && $_GET['cate']==$cate['category_id']) {
                    $que1 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                    campaign.id_category = category_id 
                    inner join products on products.id_category = category_id where products.id_category = " . $cate['category_id'] . " and products.del_flag = 0 LIMIT 4");
                    $que2 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                    campaign.id_category = category_id 
                    inner join products on products.id_category = category_id where products.id_category = " . $cate['category_id'] . " and products.del_flag = 0 LIMIT 4,4");
                    $que3 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                    campaign.id_category = category_id 
                    inner join products on products.id_category = category_id where products.id_category = " . $cate['category_id'] . " and products.del_flag = 0 LIMIT 8,4");
                    $que4 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                    campaign.id_category = category_id 
                    inner join products on products.id_category = category_id where products.id_category = " . $cate['category_id'] . " and products.del_flag = 0 LIMIT 12,4");
                } else {
                    if (isset($_GET['page2'])) {
                        $que1 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 16,4");
                        $que2 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 20,4");
                        $que3 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 24,4");
                        $que4 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 28,4");
                    } else if (isset($_GET['page1'])) {
                        $que1 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 4");
                        $que2 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 4,4");
                        $que3 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 8,4");
                        $que4 = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
                        campaign.id_category = category_id 
                        inner join products on products.id_category = category_id where products.id_category != 1 and products.del_flag = 0 LIMIT 12,4");
                    }
                }
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
                            <div class="price">' . number_format($line1['price'], 0, ',', '.') . ' đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line1['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line1['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line1['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line1['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line1['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line1['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line1['images'] . '"></div>
                            <div class="product_name">' . $line1['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line1['price'], 0, ',', '.') . ' đ</del></div>
                            <div class="price1">' . number_format($line1['price'], 0, ',', '.') . ' đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line1['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line1['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line1['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
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
                            <div class="price">' . number_format($line2['price'], 0, ',', '.') . ' đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line2['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line2['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line2['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line2['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line2['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line2['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line2['images'] . '"></div>
                            <div class="product_name">' . $line2['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line2['price'], 0, ',', '.') . ' đ</del></div>
                            <div class="price1">' . number_format($discounted_price, 0, ',', '.') . ' đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line2['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line2['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line2['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
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
                            <div class="price">' . number_format($line3['price'], 0, ',', '.') . ' đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line3['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line3['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line3['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line3['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line3['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line3['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line3['images'] . '"></div>
                            <div class="product_name">' . $line3['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line3['price'], 0, ',', '.') . ' đ</del></div>
                            <div class="price" style="left:100px">' . number_format($discounted_price, 0, ',', '.') . ' đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line3['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line3['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line3['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
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
                            <div class="price">' . number_format($line4['price'], 0, ',', '.') . ' đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line4['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line4['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line4['product_name'] . '">
                        <input type="hidden" name="price" value="' . $line4['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
                    </form>

                </div>';
                } else if ($line4['status'] == 0) {
                    echo '<div class="pro_container">
                    <a href="product_details.php?product_id=' . $line4['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $line4['images'] . '"></div>
                            <div class="product_name">' . $line4['product_name'] . '</div>
                            <div class="price"><del>' . number_format($line4['price'], 0, ',', '.') . ' đ</del></div>
                            <div class="price" style="left:100px">' . number_format($discounted_price, 0, ',', '.') . ' đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $line4['product_id'] . '">
                        <input type="hidden" name="images" value="' . $line4['images'] . '">
                        <input type="hidden" name="product_name" value="' . $line4['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_shop" value="Add To Cart">
                    </form>

                </div>';
                }
            }
            ?>
        </div>
        <?php
        include('on_top.php')
        ?>
        <form method="get" class="page">
            <button name="page1">1</button>
            <button name="page2">2</button>
        </form>
        <div class="cmt">

        </div>
        <div class="footer">
            <?php
            include('footer.php');
            ?>
        </div>

    </div>

</body>

</html>