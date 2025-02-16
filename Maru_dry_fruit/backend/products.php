<?php
$c = mysqli_connect('localhost', 'root', '', 'maru');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Products</title>
  <link rel="stylesheet" href="css/admin.css" />
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
        <!-- <h1>Products list</h1> -->
        <!-- <i class="fas fa-user-cog"></i> -->
      </div>

      <section class="attendance">
        <div class="attendance-list">
          <h1>Product List</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                <th>Images</th>
                <!-- <th>Nutritions</th> -->
                <th>Status</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $s = "SELECT products.product_id, products.product_name, products.id_category, category.category_name,
              products.description, products.price, products.stock_quantity, products.images,
              products.del_flag from products inner join category 
              on id_category = category_id";
              $r = mysqli_query($c, $s);
              while ($row = mysqli_fetch_assoc($r)) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td class='description'>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['stock_quantity'] . "</td>";
                echo "<td>" . $row['images'] . "</td>";
                if ($row['del_flag'] == 0) {
                  echo "<td>" . 'Active' . "</td>";
                } else {
                  echo "<td>" . 'Disabled' . "</td>";
                }
                echo "<td>";
              ?>
                <?php
                if ($row['del_flag'] == 0) {
                ?>
                  <button onclick="location.href='product_edit.php?<?php echo 'product_id=' . $row['product_id'] . '&id_category=' . $row['id_category'] ?>'">Edit</button>
                  <button onclick="location.href='product_delete.php?<?php echo 'product_id=' . $row['product_id'] ?>'">Disable</button>
                  </td>
                <?php
                } else {
                ?>
                  <button onclick="location.href='product_edit.php?<?php echo 'product_id=' . $row['product_id'] . '&id_category=' . $row['id_category'] ?>'">Edit</button>
                  <button onclick="location.href='product_active.php?<?php echo 'product_id=' . $row['product_id'] ?>'">Active</button>
                  </tr>
                <?php
                }
                ?>
              <?php
              }
              ?>
            </tbody>
          </table>
          <button onclick="location.href='product_create.php'">Add New</button>
        </div>
      </section>
    </section>
  </div>

</body>

</html>