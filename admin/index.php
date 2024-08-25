<?php
include('../connection.php');
include('verification.php');

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
                    <!-- <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">View Data</li>
                    </ol> -->
                    <div class="row mt-5">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                    Total
                                    <?php 
                                    $p_count_query = "SELECT p_name FROM tbl_products";
                                    $query_count_run = mysqli_query($con , $p_count_query);
                                    $p_count = mysqli_num_rows($query_count_run);
                                    echo $p_count;
                                    ?> Products

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="viewproduct.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                Total
                                    <?php 
                                    $c_count_query = "SELECT cat_name FROM tbl_category";
                                    $c_count_run = mysqli_query($con , $c_count_query);
                                    $c_count = mysqli_num_rows($c_count_run);
                                    echo $c_count;
                                    ?> Categories

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="viewbrand.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                Total
                                    <?php 
                                    $order_count_query = "SELECT `address` FROM tbl_order WHERE `status` = '0'";
                                    $order_count_run = mysqli_query($con , $order_count_query);
                                    $order_count = mysqli_num_rows($order_count_run);
                                    echo $order_count;
                                    ?> Orders
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="order.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                Total
                                    <?php 
                                    $order_custom_count_query = "SELECT `order_id` FROM tbl_custompc_orders WHERE `status` = '0'";
                                    $order_custom_count_run = mysqli_query($con , $order_custom_count_query);
                                    $order_custom_count = mysqli_num_rows($order_custom_count_run);
                                    echo $order_custom_count;
                                    ?> Custom Orders
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="customorder.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            User Contacts
                        </div>
                        <div class="card-body">
                            <!-- id datatablesSimple -->
                            <table class="table table-bordered text-center" id="datatablesSimple">
                      
    <thead>

        <th class="text-center">Username</th>
        <th class="text-center">Phone No</th>
        <th class="text-center">Email</th>
        <th class="text-center">Message</th>



    </thead>

<?php 

$select_team_query = "SELECT * FROM `tbl_usercontact` ORDER BY `id` DESC";
$select_query_run = mysqli_query($con, $select_team_query);
while($user_cont = mysqli_fetch_array($select_query_run)){
?>
    <tr>
     <td><?php echo $user_cont['u_name']?></td>
     <td><?php echo $user_cont['phone_no']?></td>
     <td><?php echo $user_cont['email']?></td>
     <td><?php echo $user_cont['message']?></td>
        

    </tr>
<?php } ?>

</table>
                        </div>
                    </div>
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