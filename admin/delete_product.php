<?php
include("../connection.php");

if(!isset( $_SESSION['admin_loggedin'])){
    header('location:login.php');
}
$get_id =  $_GET['id'];
$delete_query = "DELETE FROM `tbl_products` WHERE `p_id` = '$get_id'";
$run_query= mysqli_query($con , $delete_query);
if($run_query){
    echo '<script>alert("data deleted");
    
     window.location.href = "viewproduct.php";
    
    </script>
    ';
    // header("location:viewproduct.php");
}
?>