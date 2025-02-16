<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Products create</title>
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
        <!-- <h1>Products list</h1> -->
        <!-- <i class="fas fa-user-cog"></i> -->
      </div>

      <section class="attendance">
        <div class="attendance-list">
          <h1>Product Create</h1>
          <form action = "" method = "POST">
                <table class="table">
                    <tr>
                        <td>Product Name</td>
                        <td><input type = "text" name = "name" placeholder = "Ex: Almond"></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><select name = "category">
                        <?php
                        $s = "SELECT * from category";
                        $r = mysqli_query($c,$s);

                        while($row = mysqli_fetch_assoc($r)){
                            echo '<option value = "'. $row['category_id']. '" > '. $row['category_name'] .'</option>';
                          
                          }
                    ?>
                </select>
                        </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td><input name = "description" required> </td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td><input type = "number" name = "price" placeholder = "Ex: 200000" required></td>
                    </tr>
                    <tr>
                      <td>Stock Quantity</td>
                      <td><input type = "number" name = "stock" placeholder = "Ex: 10" required></td>
                    </tr>
                    <tr>
                      <td>Images</td>
                      <td><input type = "text" name = "images" placeholder = "Ex: image/almond.png" required></td>
                    </tr>
                    <!-- <tr>
                      <td>Nutrition Images</td>
                      <td><input type = "text" name = "nutrition_img" placeholder = "Ex: image/almond.png"></td>
                    </tr> -->
                </table>
                <button name = "btnSave">Add</button>
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
            // $nutrition_img = $_POST['nutrition_img'];
            // if($id == '') $loi .= '<p>ID is required.</p>';
            // if($fullname == '') $loi .= '<p>Full Name is required.</p>';
            // if($birthyear == '') $loi .= '<p>Birth Year is required.</p>';
            
            // if($loi == ''){
                $s = "INSERT into products(product_name,id_category,description,price,stock_quantity,images)
                values ('$name','$category','$description','$price','$stock','$images')";
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
