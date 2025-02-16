<?php
$c = mysqli_connect('localhost', 'root', '', 'maru');
if (isset($_GET['category_id'])) {
  $id = $_GET['category_id'];
}

$s_pro = "SELECT * from category where category_id = $id";
$que_pro = mysqli_query($c, $s_pro);

$row = mysqli_fetch_assoc($que_pro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Category edit</title>
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
          <h1>Category Edit</h1>
          <form action="" method="POST">
            <table class="table">
              <tr>
                <td>Category</td>
                <td>
                  <input type="text" name="category_name" value="<?php echo $row['category_name'] ?>" required>
                </td>
              </tr>
              <tr>
                <td>Images</td>
                <td><input type="text" name="images" value="<?php echo $row['images'] ?>" required></td>
              </tr>
              <tr>
                <td>Description</td>
                <td><input name = "description" value="<?php echo $row['description'] ?>" required></td>
              </tr>
            </table>
            <button name="btnSave">Update</button>
          </form>

          <?php
          // $loi = '';
          if (isset($_POST['btnSave'])) {
            $category_name = $_POST['category_name'];
            $images = $_POST['images'];
            $description = $_POST['description'];
            // if($id == '') $loi .= '<p>ID is required.</p>';
            // if($fullname == '') $loi .= '<p>Full Name is required.</p>';
            // if($birthyear == '') $loi .= '<p>Birth Year is required.</p>';

            // if($loi == ''){
            $s = "UPDATE category SET category_name = '$category_name', images = '$images',
                description = '$description'  where category_id = $id";
            mysqli_query($c, $s);
            header('location:category.php');
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