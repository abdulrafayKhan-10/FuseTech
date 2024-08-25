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

                <div class="container-fluid px-4 mt-5">
                <h4 class="mt-4 text-center">Recently Delivered Products</h4>
                    <table class="table table-bordered text-center" id="datatablesSimple">
                <thead>
  
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Phone no.</th>
                    <th>Total Purchase</th>
                    <th></th>



                

                </thead>
            
                    <?php 

                     $select_query_delivered = "SELECT * FROM tbl_custompc_orders INNER JOIN tbl_user ON tbl_user.id = tbl_custompc_orders.user_id WHERE `status` = '1' ORDER BY `order_id` DESC ";
                     $deliver_query_run = mysqli_query($con, $select_query_delivered);
                      while($purchase_delivered = mysqli_fetch_array($deliver_query_run)){
                       ?>
                <tr>

                    <td><?php echo $purchase_delivered['order_date']; ?></td>
                    <td><?php echo $purchase_delivered['uname'].$purchase_delivered['lastname']; ?></td>
                    <td><?php echo $purchase_delivered['email']; ?></td>
                    <td><?php echo $purchase_delivered['order_address']; ?></td>
                    <td><?php echo $purchase_delivered['order_message']; ?></td>
                    <td><?php echo $purchase_delivered['order_phone_no']; ?></td>
                    <td>Rs.<?php echo $purchase_delivered['total_purchase']; ?></td>

                    <td><a href="view_custom_order.php?id=<?php echo $purchase_delivered['order_id']; ?>" class="btn btn-primary">View Data</a>

                </td>




                </tr>
<?php } ?>

            </table>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>