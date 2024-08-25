<?php
include('../connection.php');
include('verification.php');


if(isset($_POST['submitbtn'])){
    $brand = $_POST['brand_name'];
    $query = "INSERT INTO `tbl_brand`( `brand_name`) VALUES ('$brand')";
    $query_run = mysqli_query($con , $query);
    header("location:addproduct.php");
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
                    <h3 class="mt-4 mb-2 text-center">Add a New Brand</h3>
                    <form method="post" >
                                <div class="mb-3">
                                 <label>Brand Name</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name" required>
                                </div>
                                 <input type="submit" value="Submit" name="submitbtn" class="btn btn-primary">
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