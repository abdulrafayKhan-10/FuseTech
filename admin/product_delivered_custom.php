<?php
include("../connection.php");
$order_id = $_GET['corder_id'];
$update_deliver_query = "UPDATE `tbl_custompc_orders` SET `status`='1' WHERE `order_id` = $order_id";
$query_run_update = mysqli_query($con,$update_deliver_query);
header('location:customorder.php');



?>