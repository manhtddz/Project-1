<?php
$c = mysqli_connect('localhost', 'root', '', 'maru');
if (isset($_GET['order_id'])) {
  $id = $_GET['order_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Order details</title>
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
          <h1>Order Details</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Product Name</th> 
                <th>Quantity</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $s = "SELECT products.product_id, products.product_name,
              products.price, orders_detail.quantity , discount_rate, id_order, status from products inner join category 
              on products.id_category = category.category_id 
              inner join orders_detail on product_id = id_product
              inner join campaign on campaign.id_category = category.category_id  where id_order = $id";
              $r = mysqli_query($c, $s);
              while ($row = mysqli_fetch_assoc($r)) {
                if($row['status']==1){
                  $price = $row['quantity'] * $row['price'];
                }else{
                  $price = (($row['quantity'] * $row['price'])*(100 - $row['discount_rate'])) / 100;
                }
                echo "<tr>";
                echo "<td>" . $row['id_order'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $price . "</td>";
                $total_price[] = $price;
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
          <?php
          echo 'Total: ' . array_sum($total_price);
          ?>
        </div>
      </section>
    </section>
  </div>

</body>

</html>