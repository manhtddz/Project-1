<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/faq.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>

    <title>FAQ</title>
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="faq_main">
        <div class="faq_banner"><img src="image/system_img/FAQ.png"></div>
        <?php
        include('faq_content.php');
        ?>
    </div>
    <?php
    include('on_top.php')
    ?>
    <div class="footer" style="position: relative; top: 300px;">
        <?php
        include('footer.php');
        ?>
    </div>

</body>

</html>