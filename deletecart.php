<?php
include("connection.php");
if(isset($_POST['btn_deleteall'])){
    if(!empty($_SESSION['products'])){
        unset($_SESSION['products']);
        header('location:cart.php');
    }

}

?>