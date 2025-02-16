<?php
    $c = mysqli_connect('localhost', 'root', '','maru');
    if(isset($_GET['discount_id'])){
        $id = $_GET['discount_id'];
    }

    $s_cam = "SELECT * from campaign where discount_id = $id";
    $que_cam = mysqli_query($c,$s_cam);

    $row = mysqli_fetch_assoc($que_cam);
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
          <h1>Campaign Edit</h1>
          <form action = "" method = "POST">
                <table class="table">
                    <tr>
                        <td>Category</td>
                        <td><select name = "category">
                        <?php
                        $s_cate = "SELECT * from category where del_flag = '0' ";
                        $que_cate = mysqli_query($c,$s_cate);

                        while($row2 = mysqli_fetch_assoc($que_cate)){
                            if(isset($_GET['discount_id']) && $_GET['id_category'] == $row2['category_id']){
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
                      <td>Start Date</td>
                      <td><input type = "date" name = "start_date" value="<?php echo $row['start_date']?>" required></td>
                    </tr>
                    <tr>
                      <td>End Date</td>
                      <td><input type = "date" name = "end_date" value="<?php echo $row['end_date']?>" required></td>
                    </tr>
                    <tr>
                      <td>Discount rate</td>
                      <td><input style="width:100px" type = "number" name = "discount_rate" value="<?php echo $row['discount_rate']?>" required> %</td>
                    </tr>
                </table>
                <button name = "btnSave">Update</button>
            </form>

            <?php
        // $loi = '';
        if(isset($_POST['btnSave'])){
            $category = $_POST['category'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $discount_rate = $_POST['discount_rate'];
            $status = $_POST['status'];
            // if($id == '') $loi .= '<p>ID is required.</p>';
            // if($fullname == '') $loi .= '<p>Full Name is required.</p>';
            // if($birthyear == '') $loi .= '<p>Birth Year is required.</p>';
            
            // if($loi == ''){
                $s = "UPDATE campaign SET id_category = '$category',start_date = '$start_date',
                end_date='$end_date',discount_rate = '$discount_rate'  where discount_id = $id";
                mysqli_query($c,$s);
                header('location:campaign.php');
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
