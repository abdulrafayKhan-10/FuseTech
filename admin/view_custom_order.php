<?php
include('../connection.php');
include('verification.php');
$order_id = $_GET['id'];
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
                    <h1 class="mt-4">View Order</h1>
                    <table class="table table-bordered text-center" id="datatablesSimple">
                        <thead>
                            <th>Component Image</th>
                            <th>Name</th>
                            <th>Component Category</th>
                            <th>Price</th>
                        </thead>

                        <?php 


$select_query = "SELECT * FROM tbl_custompc_checkout INNER JOIN tbl_category ON tbl_category.cat_id = tbl_custompc_checkout.product_cat  WHERE `order_id` = '$order_id'";

$select_query_run = mysqli_query($con, $select_query);
while($purchase = mysqli_fetch_array($select_query_run)){
?>
                        <tr>
                            <td><img src="img/<?php echo $purchase['product_image']; ?>" alt="product_img"
                                    style="height:100px;"></td>
                            <td><?php echo $purchase['product_name']; ?></td>
                            <td><?php echo $purchase['cat_name']; ?></td>
                            <td>Rs.<?php echo $purchase['product_price']; ?></td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>
            </main>
            <!-- footer -->
            <?php include('footer.php'); ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>