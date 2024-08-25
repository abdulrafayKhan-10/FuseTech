<?php
include("../connection.php");
$order_id = $_GET['order_id'];
$update_deliver_query = "UPDATE `tbl_order` SET `status`='1' WHERE `o_id` = $order_id";
$query_run_update = mysqli_query($con,$update_deliver_query);
header('location:order.php');



?>