<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
    }

    $s_pro = "SELECT * from products where product_id = $id";
    $que_pro = mysqli_query($c,$s_pro);

    $row = mysqli_fetch_assoc($que_pro);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Products edit</title>
  <link rel="stylesheet" href="css/admin_crud.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
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
          <h1>Product Edit</h1>
          <form action = "" method = "POST">
                <table class="table">
                    <tr>
                        <td>Product Name</td>
                        <td><input type = "text" name = "name" value = "<?php echo $row['product_name'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><select name = "category">
                        <?php
                        $s_cate = "SELECT * from category where del_flag = '0' ";
                        $que_cate = mysqli_query($c,$s_cate);

                        while($row2 = mysqli_fetch_assoc($que_cate)){
                            if(isset($_GET['id_category']) && $_GET['id_category'] == $row2['category_id']){
                                echo '<option value = "'. $_GET['id_category']. '" selected> '. $row2['category_name'] .'</option>';
                            }else{
                                echo '<option value = "'. $row2['category_id']. '" > '. $row2['category_name'] .'</option>';
                            }
                        }
                    ?>
                </select>
                        </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td><input name = "description" value = "<?php echo $row['description'] ?>" required></textarea></td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td><input type = "number" name = "price" value = "<?php echo $row['price'] ?>" required></td>
                    </tr>
                    <tr>
                      <td>Stock Quantity</td>
                      <td><input type = "number" name = "stock" value = "<?php echo $row['stock_quantity'] ?>" required></td>
                    </tr>
                    <tr>
                      <td>Images</td>
                      <td><input type = "text" name = "images" value = "<?php echo $row['images'] ?>" required></td>
                    </tr>
                </table>
                <button name = "btnSave">Update</button>
            </form>

            <?php
        // $loi = '';
        if(isset($_POST['btnSave'])){
            $name = $_POST['name'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $images = $_POST['images'];
            // if($id == '') $loi .= '<p>ID is required.</p>';
            // if($fullname == '') $loi .= '<p>Full Name is required.</p>';
            // if($birthyear == '') $loi .= '<p>Birth Year is required.</p>';
            
            // if($loi == ''){
                $s = "UPDATE products SET product_name = '$name',id_category = '$category',description = '$description',
                price='$price', stock_quantity = '$stock', images = '$images' where product_id = $id";
                mysqli_query($c,$s);
                header('location:products.php');
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
