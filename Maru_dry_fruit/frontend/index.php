<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$conn = mysqli_connect('localhost', 'root', '', 'maru');
$cate_que = mysqli_query($conn, "SELECT * FROM category where category_id !=1 and category.del_flag = 0 order by category_id LIMIT 4");
$top_pro_que = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
campaign.id_category = category_id 
inner join products on products.id_category = category_id where products.id_category not in (1,6) and products.del_flag = 0 order by products.product_id desc
 LIMIT 4"); //category !=1 là đẻ ko lấy phải combo, nếu để combo có cate_id là số khác thì sẽ có thể đổi
$combo_que = mysqli_query($conn, "SELECT product_id, product_name, products.images, price, discount_rate, status from campaign inner join category on
campaign.id_category = category_id 
inner join products on products.id_category = category_id where products.id_category = 1 and products.del_flag = 0 LIMIT 3"); //category =1 là đẻ lấy combo, nếu để combo có cate_id là số khác thì sẽ có thể đổi


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maru Dry Fruit Toppage</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>

    
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="main">
        <div class="slideShow">
            <div class="mySlides fade">
                <img src="image/system_img/banner_top1.png">
            </div>

            <div class="mySlides fade">
                <img src="image/system_img/banner_top6.png">
            </div>

            <div class="mySlides fade">
                <img src="image/system_img/banner_top5.png">
            </div>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
        <div class="heading_content_cat">Category</div>
        <hr class="hr_cat">
        <div class="cate">
            <?php
            while ($cate = mysqli_fetch_assoc($cate_que)) {
            ?>
                <div>
                    <a href="shop.php?cate=<?= $cate['category_id'] ?>"><img src="<?= $cate['images'] ?>"></a>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="heading_content_top_pro "><span class="pink_text">New</span> Products</div>
        <hr class="hr_top">

        <div class="top">
            <?php
            while ($top = mysqli_fetch_assoc($top_pro_que)) {
                $discounted_price = ($top['price'] * (100 - $top['discount_rate'])) / 100;
                if ($top['status'] == 1) {
                    echo '<div class="top_pro_container">
                    <a href="product_details.php?product_id=' . $top['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $top['images'] . '"></div>
                            <div class="product_name">' . $top['product_name'] . '</div>
                            <div class="price">' . number_format($top['price'], 0, ',', '.') . 'đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $top['product_id'] . '">
                        <input type="hidden" name="images" value="' . $top['images'] . '">
                        <input type="hidden" name="product_name" value="' . $top['product_name'] . '">
                        <input type="hidden" name="price" value="' . $top['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_home" value="Add To Cart">
                    </form>

                </div>';
                } else if ($top['status'] == 0) {
                    echo '<div class="top_pro_container">
                    <a href="product_details.php?product_id=' . $top['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $top['images'] . '"></div>
                            <div class="product_name">' . $top['product_name'] . '</div>
                            <div class="price"><del>' . number_format($top['price'], 0, ',', '.') . 'đ</del></div>
                            <div class="price" style="left:100px">' . number_format($discounted_price, 0, ',', '.') . 'đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $top['product_id'] . '">
                        <input type="hidden" name="images" value="' . $top['images'] . '">
                        <input type="hidden" name="product_name" value="' . $top['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_home" value="Add To Cart">
                    </form>

                </div>';
                }
            }
            ?>

        </div>

        <div class="heading_content_combo"><span class="pink_text">Saver</span> Combos</div>
        <hr class="hr_combo">
        <div class="combo">
            <?php
            while ($combo = mysqli_fetch_assoc($combo_que)) {
                $discounted_price = ($combo['price'] * (100 - $combo['discount_rate'])) / 100;
                if ($combo['status'] == 1) {
                    echo '<div class="combo_container">
                    <a href="product_details.php?product_id=' . $combo['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $combo['images'] . '"></div>
                            <div class="product_name">' . $combo['product_name'] . '</div>
                            <div class="price">' . number_format($combo['price'], 0, ',', '.') . 'đ</div>
                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $combo['product_id'] . '">
                        <input type="hidden" name="images" value="' . $combo['images'] . '">
                        <input type="hidden" name="product_name" value="' . $combo['product_name'] . '">
                        <input type="hidden" name="price" value="' . $combo['price'] . '">
                        <input class="add_butt" type="submit" name="add_to_cart_home" value="Add To Cart">
                    </form>

                </div>';
                } else if ($combo['status'] == 0) {
                    echo '<div class="combo_container">
                    <a href="product_details.php?product_id=' . $combo['product_id'] . '">
                        <div class="content">
                            <div class="pro_img"><img src="' . $combo['images'] . '"></div>
                            <div class="product_name">' . $combo['product_name'] . '</div>
                            <div class="price"><del>' . number_format($combo['price'], 0, ',', '.') . 'đ</del></div>
                            <div class="price" style="left:100px">' . number_format($discounted_price, 0, ',', '.') . 'đ</div>

                        </div>
                    </a>

                    <form method="post" action="cart.php">
                        <input type="number" class="number" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="product_id" value="' . $combo['product_id'] . '">
                        <input type="hidden" name="images" value="' . $combo['images'] . '">
                        <input type="hidden" name="product_name" value="' . $combo['product_name'] . '">
                        <input type="hidden" name="price" value="' . $discounted_price . '">
                        <input class="add_butt" type="submit" name="add_to_cart_home" value="Add To Cart">
                    </form>

                </div>';
                }
            }
            ?>
        </div>
        <div class="store_info">
            <img class="store_img" src="image/system_img/store_img.png">
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29799.7550693756!2d105.79961959999999!3d20.99386435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1687314611584!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            <p><strong style="font-size: 30px;">Visit our store !</strong><br><br>
                We are located in the heart of the city and easily accessible by public transport. <br><br>
                Here's our address:<br>
                <img src="image/system_img/icons8-address-32.png">19 Le Thanh Nghi - Hai Ba Trung - Ha Noi<br><br>
                If you're driving, there's plenty of parking available nearby.
            </p>
        </div>
        <div class="find_us"><span class="pink_text">Find us</span> on map</div>

        <hr class="hr_map">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.3830755152558!2d105.84706388109701!3d21.002009039966733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad5a833232d7%3A0x12d56445e2402bc4!2zTeG7mWMgQW4gQ29mZmVlICYgVGVh!5e0!3m2!1svi!2s!4v1687924592645!5m2!1svi!2s"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- <hr class="hr_faq"> -->

        <div class="faq_main">
            <?php
            include('faq_content.php');
            ?>
        </div>

        <hr class="hr_footer">
    </div>
    <div class="footer" style="top: 4900px !important; ;">
        <?php
        include('footer.php');
        ?>
    </div>
        <?php
        include('on_top.php')
        ?>
    
</body>

<script>
    //khai báo biến slideIndex đại diện cho slide hiện tại
    var slideIndex;
    // KHai bào hàm hiển thị slide
    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex].style.display = "block";
        dots[slideIndex].className += " active";
        //chuyển đến slide tiếp theo
        slideIndex++;
        //nếu đang ở slide cuối cùng thì chuyển về slide đầu
        if (slideIndex > slides.length - 1) {
            slideIndex = 0
        }
        //tự động chuyển đổi slide sau 5s
        setTimeout(showSlides, 5000);
    }
    //mặc định hiển thị slide đầu tiên 
    showSlides(slideIndex = 0);


    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
</script>





</html>