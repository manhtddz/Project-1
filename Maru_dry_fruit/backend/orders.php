<?php
$c = mysqli_connect('localhost', 'root', '', 'maru');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Orders</title>
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
          <h1>Order List</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $s = "SELECT * FROM orders";
              $r = mysqli_query($c, $s);
              while ($row = mysqli_fetch_assoc($r)) {
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['cus_name'] . "</td>";
                echo "<td>" . $row['mail'] . "</td>";
                echo "<td>" .'0'. $row['phone'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
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
                  <button onclick="location.href='order_details.php?<?php echo 'order_id=' . $row['order_id'] ?>'">Details</button>
                  <button onclick="location.href='orders_delete.php?<?php echo 'order_id=' . $row['order_id'] ?>'">Disable</button>
                  </td>
                <?php
                } else {
                ?>
                  <button onclick="location.href='order_details.php?<?php echo 'order_id=' . $row['order_id'] ?>'">Details</button>
                  <button onclick="location.href='orders_active.php?<?php echo 'order_id=' . $row['order_id'] ?>'">Active</button>
                  </tr>
                <?php
                }
                ?>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>

</html>