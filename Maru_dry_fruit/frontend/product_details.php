<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'maru');

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    $que = mysqli_query($conn, "SELECT product_id, product_name, products.description, products.images, price, discount_rate, status from campaign inner join category on
    campaign.id_category = category_id 
    inner join products on products.id_category = category_id where product_id = $id");
    $product = mysqli_fetch_assoc($que);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product details</title>
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>


</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="main">
        <div class="main_space">
            <div class="product_space">
                <div class="pro_img">
                    <img src="<?= $product['images'] ?>" alt="No image">
                </div>
                <div class="details">

                    <?php
                    $discounted_price = ($product['price'] * (100 - $product['discount_rate'])) / 100;
                    if ($product['status'] == 1) {
                        echo '
                        <div class="main_details">
                            <div class="pro_name">' . $product['product_name'] . '</div>
                            <div class="price">' . number_format($product['price'], 0, ',', '.') . 'đ</div>
                            
                        </div>
                        <div class="quantity">
                            <div>Quantity</div>
                            
                        </div>
                        <form action="cart.php" method="post">
                            <input type="number" class="quantity_number" name="quantity" min="1" max="10" value="1">
                            <input type="hidden" name="product_id" value="' . $product['product_id'] . '">
                            <input type="hidden" name="images" value="' . $product['images'] . '">
                            <input type="hidden" name="product_name" value="' . $product['product_name'] . '">
                            <input type="hidden" name="price" value="' . $product['price'] . '">
                            <input type="submit" class="add_butt" name="add_to_cart_detail" value="Add To Cart">
                            <input type="submit" class="buy_butt" name="buy_it_now" value="BUY IT NOW">
                        </form>

                </div>';
                    } else if ($product['status'] == 0) {
                        echo '
                        <div class="main_details">
                            <div class="pro_name">' . $product['product_name'] . '</div>
                            <div class="price"><del>' . number_format($product['price'], 0, ',', '.'). 'đ</del></div>
                            <div class="price1">' . number_format($discounted_price, 0, ',', '.') . 'đ</div>
                        </div>
                    <div class="quantity">
                        <div>Quantity</div>
                        
                    </div>

                    <form action="cart.php" method="post">
                            <input type="number" class="quantity_number" name="quantity" min="1" max="10" value="1">
                            <input type="hidden" name="product_id" value="' . $product['product_id'] . '">
                            <input type="hidden" name="images" value="' . $product['images'] . '">
                            <input type="hidden" name="product_name" value="' . $product['product_name'] . '">
                            <input type="hidden" name="price" value="' . $discounted_price . '">
                            <input type="submit" class="add_butt" name="add_to_cart_detail" value="Add To Cart">
                            <input type="submit" class="buy_butt" name="buy_it_now" value="BUY IT NOW">
                        </form>

                </div>';
                    }

                    ?>
                </div>
            </div>
        </div>
        <div class="des_title">Description</div>
        <div class="description">
            <?= $product['description'] ?>
        </div>

        <div class="footer" style="position: relative; top: 1000px;">
            <?php
            include('footer.php');
            ?>
        </div>
    </div>
    </div>
</body>

</html>