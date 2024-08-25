<?php
include('../connection.php');
include('verification.php');
  $query = "SELECT * FROM `tbl_category` ";
  $query_run = mysqli_query($con , $query);
  
  $select_query = "SELECT * FROM `tbl_brand`";
  $select_query_run = mysqli_query($con , $select_query);
  
  if(isset($_POST['btn_submit'])){
  
    $product_name = $_POST['p_name'];
    $product_price = $_POST['p_price'];
    $product_description = $_POST['p_description'];
    $product_brand = $_POST['brand'];
    $product_category = $_POST['category'];
    $product_quantity = $_POST['p_qty'];
    $product_image = $_FILES['p_img']['name']. date('Y-m-d-H-s');
    $image_tmp = $_FILES['p_img']['tmp_name'];
    $img_path = './img/' .$product_image;
    move_uploaded_file($image_tmp,$img_path);
  
    $query_insert = "INSERT INTO `tbl_products`( `p_name`, `p_brand`, `p_price`, `p_img`, `p_description`,`p_cat`,`p_qty`) VALUES ('$product_name','$product_brand','$product_price','$product_image','$product_description','$product_category','$product_quantity')";
    $query_insert_run = mysqli_query($con , $query_insert);
    echo "<script>alert('component added !')</script>";
  
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
   <!-- navbar -->
   <?php include('navbar.php'); ?>
    <div id="layoutSidenav">
       <!-- sidebar -->
   <?php include('sidenav.php'); ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h3 class="mt-4 mb-2 text-center">Add a New Product</h3>
                    <form method="post" enctype="multipart/form-data">
                         <div class="row">
                <div class="mb-3 col-lg-6">
                  <label>Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="p_name">
                </div>
                <div class="mb-3 col-lg-6">
                  <label>Brand</label>
                  <select class="form-select" id="inputGroupSelect01" name="brand">
                    <?php while($brand = mysqli_fetch_array($select_query_run)){?>
                    <option value="<?php echo $brand['brand_id'];?>">
                      <?php echo $brand['brand_name'];?>
                    </option>
                    <?php } ?>
                  </select>

                </div>
                <div class="mb-3 col-lg-6">
                  <label>Price</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="p_price">
                </div>
                <div class="mb-3 col-lg-6">
                  <label>Image</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" name="p_img">
                </div>

                <div class="mb-3 col-lg-6">
                  <label>Quantity</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="p_qty">
                </div>
                <div class="mb-3 col-lg-6">
                  <label>Category</label>
                  <select class="form-select" id="inputGroupSelect01" name="category">
                    <?php while($data = mysqli_fetch_array($query_run)){?>
                    <option value="<?php echo $data['cat_id'];?>">
                      <?php echo $data['cat_name']; ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3 col-lg-12">
                  <label>Description</label>
                  <textarea type="text" class="form-control" id="exampleInputEmail1" name="p_description"></textarea>
                </div>

                <input type="submit" value="Submit" name="btn_submit" class="btn btn-primary">
            </div>
              </form>
                </div>
            </main>
          <!-- footer -->
   <?php include('footer.php'); ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>