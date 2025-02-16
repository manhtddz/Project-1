<?php
$c = mysqli_connect('localhost', 'root', '', 'maru');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Campaign</title>
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
      </div>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Campaign List</h1><br><br>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <!-- <th>Product Name</th> -->
                <th>Category Name</th>
                <th>Discount rate</th>
                <th>StartDate</th>
                <th>EndDate</th>
                <th>Status</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                $s = "SELECT * from campaign inner join category on
                id_category = category_id ";
                $r = mysqli_query($c, $s);
                while ($row = mysqli_fetch_assoc($r)) {
                  echo "<tr>";
                  echo "<td>" . $row['discount_id'] . "</td>";
                  echo "<td>" . $row['category_name'] . "</td>";
                  echo "<td>" . $row['discount_rate'] . "</td>";
                  echo "<td>" . $row['start_date'] . "</td>";
                  echo "<td>" . $row['end_date'] . "</td>";
                  if ($row['status'] == 0) {
                    echo "<td>" . 'Active' . "</td>";
                  } else {
                    echo "<td>" . 'Disabled' . "</td>";
                  }
                  echo "<td>";
                ?>
                  <?php
                  if ($row['status'] == 0) {
                  ?>
                    <button onclick="location.href='campaign_edit.php?<?php echo 'discount_id=' . $row['discount_id'] . '&id_category=' . $row['id_category'] ?>'">Edit</button>
                    <button onclick="location.href='campaign_delete.php?<?php echo 'discount_id=' . $row['discount_id'] ?>'">Disable</button>
                    </td>
                  <?php
                  } else {
                  ?>
                    <button onclick="location.href='campaign_edit.php?<?php echo 'discount_id=' . $row['discount_id'] . '&id_category=' . $row['id_category'] ?>'">Edit</button>
                    <button onclick="location.href='campaign_active.php?<?php echo 'discount_id=' . $row['discount_id'] ?>'">Active</button>
              </tr>
            <?php
                  }
            ?>
          <?php
                }
          ?>
          </tr>
            </tbody>
            </td>
          </table>
          <button onclick="location.href='campaign_create.php'">Add New</button>
        </div>
      </section>
    </section>
  </div>

</body>

</html>