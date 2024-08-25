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
                    <h1 class="mt-4">User Purchase</h1>
                    <table class="table table-bordered text-center">
                        <thead>
       
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Total</th>

                        </thead>

                        <?php 


$select_query = "SELECT * FROM `tbl_checkout` WHERE `o_id` = '$order_id'";
$select_query_run = mysqli_query($con, $select_query);
while($purchase = mysqli_fetch_array($select_query_run)){
?>
                        <tr>
                            <td><?php echo $purchase['p_name']; ?></td>
                            <td><?php echo $purchase['p_des']; ?></td>
                            <td>Rs.<?php echo $purchase['p_price']; ?></td>
                            <td><?php echo $purchase['p_qty']; ?></td>
                            <td><?php echo $purchase['p_price']; ?> x <?php echo $purchase['p_qty']; ?> = Rs.<?php $sumproduct = $purchase['p_price']*$purchase['p_qty'];
                    echo $sumproduct;?></td>







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