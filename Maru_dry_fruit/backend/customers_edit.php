<?php
$c = mysqli_connect('localhost', 'root', '', 'maru');
if (isset($_GET['cus_id'])) {
    $cus_id = $_GET['cus_id'];
}

$s_cus = "SELECT * from customers where cus_id = $cus_id";
$que_cus = mysqli_query($c, $s_cus);

$row = mysqli_fetch_assoc($que_cus);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Customers edit</title>
    <link rel="stylesheet" href="css/admin_crud.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li class="logo">
                    <!-- <img src="maru_logo.png"> -->
                    <span class="nav-item">Maru Dry Fruits</span>
                </li>
                <li><a href="products.php">
                        <i class="fas fa-box-open"></i>
                        <span class="nav-item">Products</span>
                    </a></li>
                <li><a href="category.php">
                        <i class="fas fa-book-open"></i>
                        <span class="nav-item">Category</span>
                    </a></li>
                <li><a href="customers.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Customers</span>
                    </a></li>
                <li><a href="orders.php">
                        <i class="fas fa-sticky-note"></i>
                        <span class="nav-item">Orders</span>
                    </a></li>
                <li><a href="campaign.php">
                        <i class="fas fa-pizza-slice"></i>
                        <span class="nav-item">Campaign</span>
                    </a></li>
            </ul>
        </nav>


        <section class="main">
            <div class="main-top">
            </div>

            <section class="attendance">
                <div class="attendance-list">
                    <h1>Customers Edit</h1>
                    <form action="" method="POST">
                        <table class="table">
                            <tr>
                                <td>Customers Name</td>
                                <td>
                                    <input type="text" name="cus_name" value="<?php echo $row['cus_name'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Mail</td>
                                <td>
                                    <input type="email" name="mail" value="<?php echo $row['mail'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>
                                    <input type="text" name="phone" value="0<?php echo $row['phone'] ?>" required pattern="(\+84|0)\d{9,10}">
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>
                                    <input type="text" name="address" value="<?php echo $row['address'] ?>" required>
                                </td>
                            </tr>
                        </table>
                        <button name="btnSave">Update</button>
                    </form>

                    <?php
                    // $loi = '';
                    if (isset($_POST['btnSave'])) {
                        $cus_name = $_POST['cus_name'];
                        $mail = $_POST['mail'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        // if($id == '') $loi .= '<p>ID is required.</p>';
                        // if($fullname == '') $loi .= '<p>Full Name is required.</p>';
                        // if($birthyear == '') $loi .= '<p>Birth Year is required.</p>';

                        // if($loi == ''){
                        $s = "UPDATE customers SET cus_name = '$cus_name', mail = '$mail', phone = '$phone', 
                        address = '$address'
                        where cus_id = $cus_id";
                        mysqli_query($c, $s);
                        header('location:customers.php');
                    }
                    // }
                    // echo $loi;
                    ?>

                </div>
            </section>
        </section>
    </div>

</body>

</html>