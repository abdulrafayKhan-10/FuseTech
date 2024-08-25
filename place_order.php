<?php 
include('connection.php');
if(!isset( $_SESSION['check'])){
    header('location:login.php');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

if (isset($_POST['submitbtn'])) {
   $user_id = $_SESSION["id"];
   $address = $_POST['address'];
   $message = $_POST['message'];
   $phone = $_POST['phone_number'];
    $date = date("Y-m-d-H-s");
    $email = $_SESSION['email'];
	$lname = $_SESSION['uname']. " " .$_SESSION['lastname'];
	$totalprice = $_POST['total_amount'];


    $query_i_order = "INSERT INTO `tbl_custompc_orders`( `order_date`, `user_id`, `order_address`, `order_message`, `order_phone_no`, `total_purchase`) VALUES ('$date','$user_id','$address','$message','$phone','$totalprice')";
    $query_i_order_run = mysqli_query($con,$query_i_order);
    $last_row = mysqli_insert_id($con);
    //   echo $last_row;
    foreach($_SESSION['customlist'] as $value){
     $p_name =   $value['c_name'];
     $p_price =   $value['c_price'];
	 $p_cat = $value['c_cat'];
	 $product_img = $value['c_img'];
	
     $query_i_items ="INSERT INTO `tbl_custompc_checkout`(`product_image`, `product_name`, `product_cat`, `product_price`, `order_id`) VALUES ('$product_img','$p_name','$p_cat','$p_price','$last_row')";
    $query_i_items_run = mysqli_query($con,$query_i_items);
    if ($query_i_items_run) {

        unset($_SESSION['customlist']);
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

    

    $body = "<p>Hello <b>" . $lname . "!</b></p><br><p><b>Call: +923362100225</b></p><h4>Your Total Amount Of your Custom Build PC Order:  Rs". $totalprice  ." </h4><br><br><p>Best Regards,<br>
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
	<title>Place Order</title>
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

</head>

<body>

<?php include("nav.php");?>


	<section class="bgwhite p-t-66 p-b-60 mt-5">
		<div class="container">
			<div class="row">

				<div class="col-md-12 p-b-30">
					<form class="leave-comment" method="post">
						<h4 class="m-text26 p-b-36 p-t-15">
							Place Your Order
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text"
								placeholder="Full Name" required  disabled value="<?php echo $_SESSION["uname"].'&nbsp;'.$_SESSION["lastname"] ;?>">
						</div>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email"
								placeholder="Email Address" required  disabled value="<?php echo $_SESSION["email"] ;?> ">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="tel" name="phone_number"
								placeholder="Phone Number" required>
						</div>
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message"
							placeholder="If you have any Specific Requirement, Let us know..."  required></textarea>
                            <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address"
							placeholder="Your Correct Address"  required></textarea>

                            <input type="hidden" name="total_amount" value="<?php
         $myitems = array_column($_SESSION['customlist'], 'c_price');
         $sum = array_sum($myitems);
         echo $sum;?>">
						<div class="w-size25">
							<input type="submit" value="Send" name="submitbtn" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php include("footer.php");?>

	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>

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

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>

	<script src="js/main.js"></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
		integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
		data-cf-beacon='{"rayId":"7ec613590f99896e","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
		crossorigin="anonymous"></script>
</body>

</html>