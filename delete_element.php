<?php

include('connection.php');
    if (isset($_POST['item_name'])) {
        foreach ($_SESSION['products'] as $key => $value) {
           if ($value['productname'] == $_POST['item_name']) {
              unset($_SESSION['products'][$key]);
               array_values($_SESSION['products']);
               header('location:cart.php');

           }
        }
      }


?>