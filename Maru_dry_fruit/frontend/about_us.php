<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="css/about_us.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="wraper">
        <p>
            <strong>MARU Co., Ltd. (LTTH)</strong>is a manufacturer and exporter of dried
            fruits and nuts and other food products in Vietnam. We process dried jackfruit,
            dried mangoes, dried pomelo peel, dried passion fruit, dried oranges, dried
            coconut, dried guava, dried sweet potatoes, dried soursop, dried pineapple,
            dried apple with honey, and dried papaya. We also process dried and roasted
            sacha inchi nuts and their variants (sacha inchi nuts coated with coffee,
            sacha inchi nuts coated with coconut milk, sacha inchi nuts coated with
            chili garlic), roasted peanuts and their variants (peanuts coated with
            coconut milk, peanuts coated with chilli garlic), and roasted cashew
            nuts and their variants (cashew nuts coated with chocolate, cashew
            nuts coated with chili garlic).
        </p>
        <div class="image">
            <img src="image/system_img/store_img.png" width="350">
        </div>
        <div>
            <strong>Our mission</strong>
        </div>

        <p>
            Our mission is to process and provide healthier products that also keep up with the consumers modern-life
            needs.
            We are motivated to bring Vietnam's best agricultural and food products to the World.
        </p>
        <br>
        <div>
            <strong>Our vision</strong>
        </div>
        <ul>
            <li>
                Be a trusted partner to provide Vietnamese agricultural products, including dried tropical fruits and nuts, to
                other countries.
            </li>
            <li>
                Ensure satisfaction of customers and partners with professionalism, sincerity and creativity.
            </li><br>

            <li>
                Continuously research and apply new knowledge and technology to improve product quality and taste.
            </li>
            <li>
                Develop into a strong and sustainable business in the field of dried fruits and agricultural products.
            </li>
        </ul>

    </div>

    <div class="footer" style="top: 1300px;">
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>