<?php
$conn = mysqli_connect('localhost', 'root', '', 'maru');

session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (isset($_GET['del_cart']) && $_GET['del_cart'] == 1) unset($_SESSION['cart']);

if (isset($_GET['del_id']) && $_GET['del_id'] >= 0) {
    array_splice($_SESSION['cart'], $_GET['del_id'], 1);
};

if (isset($_POST['add_to_cart_home']) && ($_POST['add_to_cart_home'])) {
    $id = $_POST['product_id'];
    $images = $_POST['images'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //kiểm tra xem đã có sản phẩm trong mảng hay chưa
    $check_cart = 0; //bien kiem tra trung
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][2] == $name) {
            $check_cart = 1;
            $quantity_new = $quantity + $_SESSION['cart'][$i][4];
            $_SESSION['cart'][$i][4] = $quantity_new;
            echo '<script> window.location.href="index.php";</script>';
            break;
        }
    }

    if ($check_cart == 0) {
        //them sp
        $product = [$id, $images, $name, $price, $quantity];
        $_SESSION['cart'][] = $product;
        echo '<script> window.location.href="index.php";</script>';
    }
}
if (isset($_POST['add_to_cart_shop']) && ($_POST['add_to_cart_shop'])) {
    $id = $_POST['product_id'];
    $images = $_POST['images'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //kiểm tra xem đã có sản phẩm trong mảng hay chưa
    $check_cart = 0; //bien kiem tra trung
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][2] == $name) {
            $check_cart = 1;
            $quantity_new = $quantity + $_SESSION['cart'][$i][4];
            $_SESSION['cart'][$i][4] = $quantity_new;
            echo '<script> window.location.href="shop.php";</script>';
            break;
        }
    }

    if ($check_cart == 0) {
        //them sp
        $product = [$id, $images, $name, $price, $quantity];
        $_SESSION['cart'][] = $product;
        echo '<script> window.location.href="shop.php";</script>';
    }
}
if (isset($_POST['add_to_cart_detail']) && ($_POST['add_to_cart_detail'])) {
    $id = $_POST['product_id'];
    $images = $_POST['images'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //kiểm tra xem đã có sản phẩm trong mảng hay chưa
    $check_cart = 0; //bien kiem tra trung
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][2] == $name) {
            $check_cart = 1;
            $quantity_new = $quantity + $_SESSION['cart'][$i][4];
            $_SESSION['cart'][$i][4] = $quantity_new;
            echo '<script> window.location.href="product_details.php?product_id=' . $_SESSION['cart'][$i][0] . '";</script>';
            break;
        }
    }

    if ($check_cart == 0) {
        //them sp
        $product = [$id, $images, $name, $price, $quantity];
        $_SESSION['cart'][] = $product;
        echo '<script> window.location.href="product_details.php?product_id=' . $_SESSION['cart'][$i][0] . '";</script>';
    }
}
if (isset($_POST['buy_it_now']) && ($_POST['buy_it_now'])) {
    $id = $_POST['product_id'];
    $images = $_POST['images'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //kiểm tra xem đã có sản phẩm trong mảng hay chưa
    $check_cart = 0; //bien kiem tra trung
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][2] == $name) {
            $check_cart = 1;
            $quantity_new = $quantity + $_SESSION['cart'][$i][4];
            $_SESSION['cart'][$i][4] = $quantity_new;
            break;
        }
    }

    if ($check_cart == 0) {
        //them sp
        $product = [$id, $images, $name, $price, $quantity];
        $_SESSION['cart'][] = $product;
    }
}
if (isset($_POST['add_to_cart_combo']) && ($_POST['add_to_cart_combo'])) {
    $id = $_POST['product_id'];
    $images = $_POST['images'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //kiểm tra xem đã có sản phẩm trong mảng hay chưa
    $check_cart = 0; //bien kiem tra trung
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][2] == $name) {
            $check_cart = 1;
            $quantity_new = $quantity + $_SESSION['cart'][$i][4];
            $_SESSION['cart'][$i][4] = $quantity_new;
            echo '<script> window.location.href="saver_combos.php";</script>';
            break;
        }
    }

    if ($check_cart == 0) {
        //them sp
        $product = [$id, $images, $name, $price, $quantity];
        $_SESSION['cart'][] = $product;
        echo '<script> window.location.href="saver_combos.php";</script>';
    }
}
if (isset($_POST['add_to_cart_campaign']) && ($_POST['add_to_cart_campaign'])) {
    $id = $_POST['product_id'];
    $images = $_POST['images'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //kiểm tra xem đã có sản phẩm trong mảng hay chưa
    $check_cart = 0; //bien kiem tra trung
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][2] == $name) {
            $check_cart = 1;
            $quantity_new = $quantity + $_SESSION['cart'][$i][4];
            $_SESSION['cart'][$i][4] = $quantity_new;
            echo '<script> window.location.href="campaign.php";</script>';
            break;
        }
    }

    if ($check_cart == 0) {
        //them sp
        $product = [$id, $images, $name, $price, $quantity];
        $_SESSION['cart'][] = $product;
        echo '<script> window.location.href="campaign.php";</script>';
    }
}
function show_cart()
{
    if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {

        if (sizeof($_SESSION['cart']) > 0) {
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {

                echo '
                    <tr>
                        <td><img class = "prd_img" src = "' . $_SESSION['cart'][$i][1] . '"></td>                        
                        <td class = "prd_name" style = "width: 300px;">
                            <span class = "prd_name_2">' . $_SESSION['cart'][$i][2] . '</span>
                            <br>' . number_format($_SESSION['cart'][$i][3], 0, ',', '.') . ' đ<br>
                            <input type="hidden" class="iprice" value="' . $_SESSION['cart'][$i][3] . '">
                            <form method="post">
                                <input type="number" class="iquantity" name="Mod_Quantity" onchange="this.form.submit();" value="' . $_SESSION['cart'][$i][4] . '" min="1" max="10">
                                <input type="hidden" name="name" value="' . $_SESSION['cart'][$i][2] . '">
                            </form>
                        </td>
                        <td>
                            <span class="itotal">' . $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4] . '</span><span>đ</span>
                        </td>
                        <td class = "td_clear">
                            <a href="cart.php?del_id=' . $i . '"><img src = "image/system_img/icons8-delete-32 (1).png"></a>
                        </td>
                   </tr>';
            }
        } else {
            echo '<div class="err" style="position: absolute; top:100px; left:100px">
            
            Your cart is empty!
            
        </div>';
        }
    } else if (!isset($_SESSION['cart'])) {
        echo '<div class="err" style="position: absolute; top:100px; left:100px">
            
        Your cart is empty!
        
    </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>

</head>

<body>
    <?php include('header.php'); ?>
    <div class="container">
        <header>
            <span class="cart">Cart</span><span class="delivery">Delivery Information</span>
        </header>

        <section>
            <div class="cart_content">

                <table>

                    <?php
                    show_cart();
                    ?>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>
                            <span id="gtotal"></span><span>đ</span>
                        </th>
                    </tr>

                </table>
            </div>
            <article>
                <?php
                form()
                ?>
                <!-- <a href="cart.php?del_cart=1"><button>Clear cart</button></a> -->

            </article>
        </section>
    </div>
    <?php
    include('on_top.php')
    ?>
    <div class="footer" style="position: absolute; top: 1200px;">
        <?php include('footer.php'); ?>
    </div>
</body>

</html>

<script>
    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    function subTotal() {
        gt = 0;
        for (i = 0; i < iprice.length; i++) {
            itotal[i].innerText = (iprice[i].value * iquantity[i].value);
            gt = gt + (iprice[i].value * iquantity[i].value);

        }
        gtotal.innerText = gt;

    }
    subTotal();
</script>

<?php
function form()
{
    $conn = mysqli_connect('localhost', 'root', '', 'maru');

    if (isset($_COOKIE['mail'])) {
        $mail_ses = $_COOKIE['mail'];
        $take_info = mysqli_query($conn, "SELECT * FROM customers where mail = '$mail_ses'");
        $info = mysqli_fetch_assoc($take_info);

        echo '<form method="post">
            Full Name :<br>
            <input class="input100" type="text" name="name" value = "' . $info['cus_name'] . '" readonly ><br>
            Email :<br>
            <input class="input100" type="text" name="mail" value = "' . $info['mail'] . '" readonly ><br>
            Phone <span class="red_dot">*</span>:<br>
            <input class="input100" type="text" name="phone" value = "'.'0' . $info['phone'] . '" required  pattern="(\+84|0)\d{9,10}"><br>
            Address <span class="red_dot">*</span>:<br>
            <input class="input100" type="text" name="address" value = "' . $info['address'] . '" required><br>
            <input class="btn_Order" type="submit" name="purchase" value="Place Order">
        </form>';
        if (isset($_POST['purchase'])) {
            $id = $info['cus_id'];
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $que1 = "INSERT INTO orders(id_cus,cus_name,mail,phone,address)
            VALUES
            ('$id','$name','$mail','$phone','$address')";
            if (mysqli_query($conn, $que1)) {
                $id_order = mysqli_insert_id($conn);
                for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                    $id_product = $_SESSION['cart'][$i][0];
                    $Quantity_que = $_SESSION['cart'][$i][4];
                    $que2 = "INSERT INTO orders_detail(id_order,id_product,quantity)
                VALUES('$id_order','$id_product','$Quantity_que')";
                    $update_stock = "UPDATE products SET stock_quantity = stock_quantity - '$Quantity_que' where product_id = '$id_product';";
                    mysqli_query($conn, $que2);
                    mysqli_query($conn, $update_stock);
                }
                unset($_SESSION['cart']);
                echo '<script> window.location.href="success.php";</script>';
            }
        }
    } else {
        echo '<form method="post">
            Full Name <span class="red_dot">*</span>:<br>
            <input class="input100" type="text" name="name" placeholder="Ex: Anna Forger" required><br>
            Email <span class="red_dot">*</span>:<br>
            <input class="input100" type="text" name="mail" placeholder="Ex: anna@gmail.com" required><br>
            Phone <span class="red_dot">*</span>:<br>
            <input class="input100" type="text" name="phone" placeholder="Ex: 090-1234-567" required  pattern="(\+84|0)\d{9,10}"><br>
            Address <span class="red_dot">*</span>:<br>
            <input class="input100" type="text" name="address" placeholder="Ex: 10 Tay Ho, Ha Noi" required><br>
            <input class="btn_Order" type="submit" name="purchase" value="Place Order">
        </form>';
        if (isset($_POST['purchase'])) {
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $que1 = "INSERT INTO orders(cus_name,mail,phone,address)
            VALUES
            ('$name','$mail','$phone','$address')";
            if (mysqli_query($conn, $que1)) {
                $id_order = mysqli_insert_id($conn);
                for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                    $id_product = $_SESSION['cart'][$i][0];
                    $Quantity_que = $_SESSION['cart'][$i][4];
                    $que2 = "INSERT INTO orders_detail(id_order,id_product,quantity)
                VALUES('$id_order','$id_product','$Quantity_que')";
                    $update_stock = "UPDATE products SET stock_quantity = stock_quantity - '$Quantity_que' where product_id = '$id_product';";
                    mysqli_query($conn, $que2);
                    mysqli_query($conn, $update_stock);
                }
                unset($_SESSION['cart']);
                echo '<script> window.location.href="success.php";</script>';
            }
        }
    }
}
?>

</body>

</html>
<?php
if (isset($_POST['Mod_Quantity'])) {
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][2] == $_POST['name']) {
            $_SESSION['cart'][$i][4] = $_POST['Mod_Quantity'];
            echo '<script> window.location.href="cart.php";</script>';
        }
    }
}

?>