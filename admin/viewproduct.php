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
                    <h3 class="mt-4 mb-2 text-center">Products</h3>
                    <table class="table table-bordered text-center" id="datatablesSimple">
                        <thead>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>image </th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Action</th>


                        </thead>

                        <?php 

$select_team_query = "SELECT * FROM `tbl_products` INNER JOIN `tbl_brand` ON tbl_products.p_brand = tbl_brand.brand_id INNER JOIN `tbl_category` ON tbl_products.p_cat=tbl_category.cat_id ORDER BY `p_id` DESC";
$select_query_run = mysqli_query($con, $select_team_query);
while($products = mysqli_fetch_array($select_query_run)){
?>
                        <tr>
                            <td><?php echo $products['p_name']?></td>
                            <td><?php echo $products['brand_name']?></td>
                            <td><?php echo $products['p_price']?></td>
                            <td><img src="./img/<?php echo $products['p_img']?>" style="width:100px;height:100px;"></td>
                            <td><?php echo $products['p_description']?></td>
                            <td><?php echo $products['cat_name']?></td>
                            <td><?php echo $products['p_qty']?></td>
                            <td><a href="updateproduct.php?id=<?php echo $products['p_id']?>"
                                    class="btn btn-success">Update</a>
                                <a href="delete_product.php?id=<?php echo $products['p_id']?>"
                                    class="btn btn-danger mt-2">Delete</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>