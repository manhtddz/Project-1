<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Contact us</title>
    <link rel="stylesheet" href="css/contact.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>

</head>

<body>
    <?php include('header.php'); ?>
    <div class="limiter">
        <div class="cpn_banner">
            <img src="contact/Contact_us_1510___350.jpg">
        </div>
        <div class="container">
            <header>
                <span class="address_header">We're Here</span><span class="contact_form">Let's Talk!</span>
            </header>
            <section>
                <div class="contact_address">
                    <div class="slogan">Our door is always open for the best dry fruits</div>
                    <div class="office">Our Office</div>
                    <div class="address">19 Le Thanh Nghi - Hai Ba Trung - Ha Noi</div>
                </div>
                <article>
                    <div class="contact_content">
                        <form action="contact/process.php" method="post">
                            <input class="input100" type="text" name="uname" placeholder="User name" required><br>
                            <input class="input100" type="email" name="email" id="" placeholder="Email"><br>
                            <input class="input100" type="text" name="subject" placeholder="Subject"><br>
                            <textarea name="message" placeholder="Write The Message" cols="45" rows="10" required></textarea><br>
                            <button class="btn_send" name="send" type="submit">Send</button>
                        </form>
                    </div>
                </article>            
            </section>
            <div class="gg_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.3830755152558!2d105.84706388109701!3d21.002009039966733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad5a833232d7%3A0x12d56445e2402bc4!2zTeG7mWMgQW4gQ29mZmVlICYgVGVh!5e0!3m2!1svi!2s!4v1687924592645!5m2!1svi!2s"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>  
        </div>

    </div>

    <!-- <?php
            $message = "";
            if (isset($_GET['error'])) {
                $message = "lam on nhap lieu";
                echo '<div class="error">' . $message . '</div>';
            }
            if (isset($_GET['cuscess'])) {
                $message = "nhap lieu thanh cong";
                echo '<div class="cuscess">' . $message . '</div>';
            }
            ?> -->

    <?php
    include('on_top.php')
    ?>
    <div class="footer" style="position: relative; top: 400px;">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>