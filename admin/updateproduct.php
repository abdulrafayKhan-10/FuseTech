<?php
include('../connection.php');
include('verification.php');
  $get_id = $_GET['id'];
  $select_data = "SELECT * fROM `tbl_products` WHERE `p_id` = '$get_id'  ";
  $select_data_run = mysqli_query($con , $select_data);
  $product_data = mysqli_fetch_array($select_data_run);

  

  
  if(isset($_POST['btn_submit'])){
  
    $product_name = $_POST['p_name'];
    $product_price = $_POST['p_price'];
    $product_description = $_POST['p_description'];
    $product_brand = $_POST['brand'];
    $product_category = $_POST['category'];
    $product_qty = $_POST['p_qty'];
    $product_image = $_FILES['p_img']['name'];
    $image_tmp = $_FILES['p_img']['tmp_name'];
    $img_path = './img/' . $product_image;
    move_uploaded_file($image_tmp,$img_path);
  
    $query_insert = "UPDATE `tbl_products` SET `p_name`='$product_name',`p_brand`='$product_brand',`p_price`='$product_price',`p_img`='$product_image',`p_description`='$product_description',`p_cat`='$product_category',`p_qty`='$product_qty' WHERE `p_id`= '$get_id'";
    $query_insert_run = mysqli_query($con , $query_insert);
    if($query_insert_run){
    echo "<script>alert('product Updated !')</script>";
    header('location:showproducts.php');
    }
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
                    <h1 class="mt-4">Update Product</h1>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label>Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="p_name"
                                    value="<?php echo $product_data['p_name'];?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label>Brand</label>
                                <select class="form-select" id="inputGroupSelect01" name="brand">
                                    <?php 
                                      $select_query = "SELECT * FROM `tbl_brand`";
                                      $select_query_run = mysqli_query($con , $select_query);
                                    while($brand = mysqli_fetch_array($select_query_run)){?>
                                    <option value="<?php echo $brand['brand_id'];?>"><?php echo $brand['brand_name'];?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="mb-3 col-lg-6">
                                <label>Price</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="p_price"
                                    value="<?php echo $product_data['p_price'];?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label>Image</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" name="p_img"
                                    value="<?php echo $product_data['p_img'];?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label>Quantity</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="p_qty"
                                    value="<?php echo $product_data['p_qty'];?>" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label>Category</label>
                                <select class="form-select" id="inputGroupSelect01" name="category">
                                    <?php
                                      $query = "SELECT * FROM `tbl_category` ";
                                      $query_run = mysqli_query($con , $query);
                                      while($data = mysqli_fetch_array($query_run)){?>
                                    <option value="<?php echo $data['cat_id'];?>"><?php echo $data['cat_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label>Description</label>
                                <textarea type="text" class="form-control" id="exampleInputEmail1" name="p_description"
                                    required><?php echo $product_data['p_description'];?></textarea>
                            </div>

                            <input type="submit" value="Update" name="btn_submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </main>
            <!-- footer -->
            <?php include('footer.php'); ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>