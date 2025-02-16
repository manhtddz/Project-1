<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'maru');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order history</title>
  <link rel="stylesheet" href="css/order_history.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>

</head>

<body>


  <?php
  include('header.php');
  ?>
  <div class="container">
    <div class="row_1">
      <div class="card-body">
        <p class="lead">Order History</p><br>
        <?php

        if (isset($_COOKIE['mail'])) {
          $mail_ses = $_COOKIE['mail'];
          $order_que = mysqli_query($conn, "SELECT * FROM orders where mail = '$mail_ses'");
          while ($order = mysqli_fetch_assoc($order_que)) {
            // $sub_id = 0;
            // $sub_id += 1;
            $id = $order['order_id'];
            echo ' 
            <div class="row">
              <div class="col_1">
                <p class="small">Date</p>
                <p>' . $order['order_date'] . '</p>
              </div>
              <div class="col_1">
                <p class="small">Order No.</p>
                <p>' . $id . '</p>
              </div>
            </div>';

            $get_detail = "SELECT product_name,price,discount_rate,quantity,status FROM orders_detail inner join products on
            id_product = product_id inner join category on
            products.id_category = category_id inner join campaign on
            campaign.id_category = category_id inner join orders on
            orders_detail.id_order  = orders.order_id
            where orders_detail.id_order = $id ;";
            $detail_que = mysqli_query($conn, $get_detail);
            $total = 0;
            while ($detail = mysqli_fetch_assoc($detail_que)) {
              $itotal = 0;
              if ($detail['status'] == 0) {
                $itotal = $detail['quantity'] * $detail['price'] * (100 - $detail['discount_rate']) / 100;
              } else {
                $itotal = $detail['quantity'] * $detail['price'];
              }
              echo '<div class="detail">
                <div class="product_name">
                  <p>' . $detail['product_name'] . ' ' . 'x' . $detail['quantity'] . ' : ' . number_format($itotal, 0, ',', '.') . ' vnđ</p>
                </div>
                
              </div>
            ';
              $total += $itotal;
            };
            echo '<div class="total">
                <p class="lead">Total: ' . number_format($total, 0, ',', '.') . ' vnđ</p>
            </div>
            <hr style = "width: 70%;">
            ';
          }
        } else {
          echo '<form method="post" style="position:absolute; top:150px">
        <br>Enter email : 
        <input type="email" name="mail" required autofocus>
        <input type="submit" name="track" value="Track">
      </form>';
          if (isset($_POST['track'])) {
            $mail = $_POST['mail'];
            $order_que = mysqli_query($conn, "SELECT * FROM orders where mail = '$mail'");
            while ($order = mysqli_fetch_assoc($order_que)) {
              $id = $order['order_id'];
              echo ' 
            <div class="row">
              <div class="col_1">
                <p class="small">Date</p>
                <p>' . $order['order_date'] . '</p>
              </div>
              <div class="col_1">
                <p class="small">Order No.</p>
                <p>' . $id . '</p>
              </div>
            </div>';
              $get_detail = "SELECT product_name,price,discount_rate,quantity,status FROM orders_detail inner join products on
            id_product = product_id inner join category on
            products.id_category = category_id inner join campaign on
            campaign.id_category = category_id inner join orders on
            orders_detail.id_order  = orders.order_id
            where orders_detail.id_order = $id ;";
              $detail_que = mysqli_query($conn, $get_detail);
              $total = 0;
              while ($detail = mysqli_fetch_assoc($detail_que)) {
                $itotal = 0;
                if ($detail['status'] == 0) {
                  $itotal = $detail['quantity'] * $detail['price'] * (100 - $detail['discount_rate']) / 100;
                } else {
                  $itotal = $detail['quantity'] * $detail['price'];
                }
                echo '<div class="detail">
                <div class="product_name">
                  <p>' . $detail['product_name'] . ' ' . 'x' . $detail['quantity'] . ' : ' . number_format($itotal, 0, ',', '.') . ' vnd</p>
                </div>
                
              </div>';
                $total += $itotal;
              };
              echo '<div class="total">
                <p class="lead">Total : ' . number_format($total, 0, ',', '.') . ' vnđ</p>
            </div>
            <hr style = "width: 70%;">';
            }
          }
        }

        ?>
        <p class="help">Want any help? <a href="contact.html" style="color: rgb(248, 90, 98);">Please contact
            us</a></p>

      </div>
    </div>
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