<?php include("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

if (isset($_POST['btn_checkout'])) {
   $user_id = $_SESSION["id"];
   $address = $_POST['address'];
    $date = date("Y-m-d-H-s");
    $email = $_SESSION['email'];
	$lname = $_SESSION['uname']. " " .$_SESSION['lastname'];
	$totalprice = $_POST['totalprice'];


    $query_i_order = "INSERT INTO `tbl_order`(`o_date`, `u_id`,`address`,`total_purchase`) VALUES ('$date','$user_id' , '$address','$totalprice')";
    $query_i_order_run = mysqli_query($con,$query_i_order);
    $last_row = mysqli_insert_id($con);
    //   echo $last_row;
    foreach($_SESSION['products'] as $value){
     $p_name =   $value['productname'];
     $p_price =   $value['productprice'];
	 $p_quantity = $value['productquantity'];
	 $product_des = $value['productdes'];
    

    $query_i_items = "INSERT INTO `tbl_checkout`(`p_price`, `p_name`, `p_qty`,`p_des`, `o_id`) VALUES ('$p_price','$p_name','$p_quantity','$product_des','$last_row')";
    $query_i_items_run = mysqli_query($con,$query_i_items);
    if ($query_i_items_run) {

        unset($_SESSION['products']);
    }

    
}
try {
    //Server settings
    // $mail->SMTPDebug = 2; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    // $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'huzaifairfan2144@gmail.com'; //SMTP username
    $mail->Password = 'vsxltzenjsgoezjh'; //SMTP password
    // $mail->Password = 'admin_sarim_786$$$@';
    $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`



    //Recipients
    $mail->setFrom('huzaifairfan2144@gmail.com', 'FuseTech');
    $mail->addAddress($email , $lname); //Add a recipient

    

    $body = "<p>Hello <b>" . $lname . "!</b></p><br><p><b>Call: +923362100225</b></p><h4>Your Total Amount Of Order:  Rs". $totalprice  ." </h4><br><br><p>Best Regards,<br>
     <b>FuseTech</b></p><h1>Thanks For Shopping</h1>";

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Order Details | FuseTech';
    $mail->Body = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
  
	
	
	echo '<script>alert("Order Placed");
    
	window.location.href = "index.php";
   
   </script>';
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.png" />

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
	.loader {
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid #3498db;
  border-right: 6px solid green;
   border-bottom: 6px solid red;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.Cl_OuterLoader{
	background: #000000a3;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center;
	overflow:hidden;
}
#ID_Loader{
	display: none;
}
</style>

</head>

<body>

	<?php include("nav.php");?>
	<div class="Cl_OuterLoader" id="ID_Loader">
	<div class="loader" ></div>
</div>
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/other.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<section class="cart bgwhite p-t-70 p-b-100">
		<?php if(empty($_SESSION['products']))
                            { echo "<center><h3>Your Cart is Empty!</h3></center>";
                                }
                                else{?>
		<div class="container">

			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
							<th class="column-1"></th>
						</tr>
						<?php foreach($_SESSION['products'] as $key => $value){
							// $updated_qty = 
							?>
							
						<tr class="table-row">
							<td class="column-1">

								<div class="cart-img-product b-rad-4 o-f-hidden me-5">
									<img src="<?php echo  $value['productimage']?>" alt="IMG-PRODUCT" style="height: 80px; width:100%;">
								</div>
							</td>
							<td class="column-2">

										<?php echo $value['productname'];?>
									
							</td>
							<td class="column-3" >RS. 
								<?php echo $value['productprice'];?>
							</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
								<!-- btn-num-product-down  btn-num-product-up-->
								
									<button type="button" class=" color1 flex-c-m size7 bg8 eff2" onclick="btnDec(<?php echo $value['productid']  ?> , <?php echo $value['productprice'];?>)">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>
									<input min="1" id="ID_qty<?php echo $value['productid'];?>" class="size8 m-text18 t-center num-product" type="number" name="update_qty"
										value="<?php echo $value['productquantity'];?>">
										
									<button type="button" class=" color1 flex-c-m size7 bg8 eff2" onclick="btnInc(<?php echo $value['productid']  ?> , <?php echo $value['productprice'];?>)">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
						
								</div>
							</td>
							<td class="column-5" id="ID_price<?php echo $value['productid'];?>"> 
							<?php if($value['producttotalprice'] == 0){
								echo 'Rs.'.$value['productprice'];
							}else{
								echo  'Rs.'.$value['producttotalprice'];
							}
								?>
							</td>
							<td class="column-5">
							
								<form action="delete_element.php" method="post">
									<input type="hidden" name="item_name" value="<?php echo $value['productname'];?>">
								<button class="btn btn-outline-danger" type="submit" ><i class="fa-solid fa-xmark fa-lg"></i>&nbsp; Delete from Cart</button>
								</form>





</td>

						</tr>
						<?php }?>

					</table>
				</div>
			</div>
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<form action="deletecart.php" method="post">
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-1" type="submit"
								name="btn_deleteall">
								Empty Cart
							</button>
						</form>
					</div>
				</div>
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<form action="">

						<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-1" onclick="btnUpdate()">
							Update
						</button>
					</form>
				
						
					
				</div>
			</div>

			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24" id="checkout">
					Cart Totals
				</h5>

				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>
					<span class="m-text21 w-size20 w-full-sm">
				Rs.	<?php 
					if($GLOBALS['totalsum'] == 0){
					echo  $GLOBALS['totalsumof1']; }
					else{
					echo  $GLOBALS['totalsum'];
					}?>

					</span>
				</div>
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Delivery Charges:
					</span>
					<span class="m-text21 w-size20 w-full-sm">
						FREE DELIVERY
					</span>
				</div>


				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span id="ID_totalsum" class="m-text21 w-size20 w-full-sm">
					Rs. <?php 
					if($GLOBALS['totalsum'] == 0){
					echo  $GLOBALS['totalsumof1']; }
					else{
					echo  $GLOBALS['totalsum'];
					}?>
					</span>
				</div>
				<div class="size15 trans-0-4">
                  <form  method="post">

				  <span class="m-text22 w-size19 w-full-sm">
						Address:
					</span>
					<textarea class="form-control form-control-user" name="address" cols="" rows="2" placeholder="Enter Your Correct Address...." required></textarea><br>
					<input type="hidden" name="totalprice" value="
					<?php 
					if($GLOBALS['totalsum'] == 0){
					echo  $GLOBALS['totalsumof1']; }
					else{
					echo  $GLOBALS['totalsum'];
					}?>">
					<button type="submit" name="btn_checkout" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-2">
						Proceed to Checkout
					</button>
					</form>
				</div>
			</div>
		</div>

		<?php }?>
	</section>

	<?php include("footer.php");?>

	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
	
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

	<script>
	// this.p_id = 1
	function btnDec(id , price){
		// alert(price)
		this.p_id = id;
		var Id_qty = document.getElementById('ID_qty'+ id);
		var ID_price = document.getElementById('ID_price' + id);
		if(Id_qty.value > 1)
		Id_qty.value--;
		ID_price.innerHTML = Id_qty.value * price;
		debugger
	
		$.ajax({
			type:'POST',
			url: 'update_cart.php',
			data :{
				update_cart : 'update_cart',
				p_id : id,
				p_price : price,
				p_qty :Id_qty.value
			},
			success: function (data){
				
					// alert(data);
				
			},
			async: false 

		})
	}
	function btnInc(id,price){
		// alert(price)
		this.p_id = id;
		var Id_qty = document.getElementById('ID_qty'+ id);
		var ID_price = document.getElementById('ID_price' + id);
		if(Id_qty.value >= 1)
		Id_qty.value++;
		debugger
		ID_price.innerHTML = Id_qty.value * price;
		debugger
		$.ajax({
			type:'POST',
			url: 'update_cart.php',
			data :{
				update_cart : 'update_cart',
				p_id : id,
				p_price : price,
				p_qty :Id_qty.value
			},
			success: function (data){
				// alert(data);
				
			// document.getElementById("ID_totalsum").innerHTML = data;
				
			},
			async: false 
		})

	}

</script>
	
	
	
	<script src="https://kit.fontawesome.com/9e29d9e7e1.js" crossorigin="anonymous"></script>
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	

	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>

	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>

	<script src="js/main.js"></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
		integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
		data-cf-beacon='{"rayId":"7ec613504d73896e","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
		crossorigin="anonymous"></script>
</body>

</html>