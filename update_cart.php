<?php
// include('connection.php');
session_start();
$totalsumglobal = 0;

// make sure previous value has been deleted // <--- not needed
// unset($_SESSION['products']);
if(isset($_POST['update_cart'])){
	$update_item_with_id = $_POST['p_id']; 
	$update_price = $_POST['p_price'];
	 $update_qty= $_POST['p_qty'];

	// echo $update_qty . '<br>';
	// echo $update_item_with_id . '<br>';

	foreach ($_SESSION['products'] as $key => $stored_product) {
        
        if($update_item_with_id == $stored_product['productid']){
            $_SESSION['products'][$key]['productquantity'] = $update_qty; 
            $_SESSION['products'][$key]['producttotalprice'] = $_SESSION['products'][$key]['productprice'] * $_SESSION['products'][$key]['productquantity']; 

            $_SESSION['products'][$key]['productprice'] = $update_price; 

            // $totalsumglobal += $stored_product['producttotalprice']  ;
            
            $totalsumglobal +=   $_SESSION['products'][$key]['producttotalprice'];
        }
        
        
       
   }
   session_write_close();
   echo $totalsumglobal;
  
// print_r($_SESSION['products']);
//    exit();
   //    $sum = $totalsumglobal;
//    echo $sum ;
// print_r($_SESSION['products']);
}


?>