<?php 
include("connection.php");
$get_id = $_GET['id'];
$cat_id = $_GET['cat_id'];
$select_query = "SELECT * FROM ((tbl_products INNER JOIN tbl_category ON tbl_products.p_cat = tbl_category.cat_id) INNER JOIN tbl_brand ON tbl_products.p_brand = tbl_brand.brand_id)WHERE `p_id` = $get_id ";
$query_run = mysqli_query($con , $select_query);
if(isset($_POST['btn_cart'])){
    if(isset($_SESSION['check'])){
	 if(isset($_SESSION['products'])){
		$abc = array_column($_SESSION['products'],"productname");

	   if(in_array($_POST['p_name'] , $abc)){
		   echo "<script>alert('product already added')</script>";
	   }
	   else{
	   $count = count($_SESSION['products']);
	   $_SESSION['products'][$count] =array(
		"productid"=> $_POST['p_id'],
	   "productname" => $_POST['p_name'],
	   "productprice" => $_POST['p_price'],
	   "productimage" => $_POST['p_image'],
	   "productdes" => $_POST['p_description'],
	   "producttotalprice" => 0,
	   "productquantity" => 1  );
      

	   }
	}
	else{
	   $_SESSION['products'][0]  = array( 
		              "productid"=> $_POST['p_id'],
		              "productname" => $_POST['p_name'],
					  "productprice" => $_POST['p_price'],
					  "productimage" => $_POST['p_image'],
	                  "producttotalprice" => 0,
					  "productdes" => $_POST['p_description'],
					  "productquantity" => 1 );
				   }

                }
                else{
                    header('location:login.php');
                }
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.png" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">

	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

	<?php include("nav.php");?>


	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">

	</div>
	<?php while($data = mysqli_fetch_array($query_run)){?>

	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="slick3">
						<div class="wrap-pic-w">
							<img src="<?php echo 'admin/img/' . $data['p_img'];?>" alt="IMG-PRODUCT">
						</div>
					</div>
				</div>
			</div>
			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $data['p_name'];?>
				</h4>
				<span class="m-text17">
					Rs.
					<?php echo $data['p_price'];?>

				</span>
				<p class="s-text8 p-t-10">
				 <?php echo $data['p_description'];?>
				</p>

				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">

								<form method="post">
								    <input type="hidden" name="p_id" value="<?php echo $data['p_id'];?>">

									<input type="hidden" name="p_price" value="<?php echo $data['p_price'];?>">

									<input type="hidden" name="p_image"
										value="<?php echo 'admin/img/'. $data['p_img'];?>">

									<input type="hidden" name="p_description"
										value="<?php echo $data['p_description'];?>">

									<input type="hidden" name="p_name" value="<?php echo $data['p_name'];?>">

									<input type="hidden" name="p_brand" value="<?php echo $data['p_brand'];?>">

									<input type="hidden" name="p_cat" value="<?php echo $data['p_cat'];?>">

									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="btn_cart"
										type="submit">
										Add to Cart
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="p-b-45">
					<span class="s-text8 m-r-35">Brand: <?php echo $data['brand_name'];?></span>
					<span class="s-text8">Category: <?php echo $data['cat_name'];?></span>
				</div>

				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>
					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $data['p_description'];?>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php }?>

	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<div class="wrap-slick2">

				
				<div class="slick2">
				<?php 
				$select_products = "SELECT * FROM tbl_products WHERE `p_cat` = $cat_id ORDER BY `p_id` DESC LIMIT 8";
				$select_products_run = mysqli_query($con , $select_products);
				while($item = mysqli_fetch_array($select_products_run)){
				?>
					<div class="item-slick2 p-l-15 p-r-15">

						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo 'admin/img/' . $item['p_img'];?>" alt="IMG-PRODUCT" style="height: 300px;">
								<div class="block2-overlay trans-0-4">
									<div class="block2-btn-addcart w-size1 trans-0-4">
									<a href="product_detail.php?id=<?php echo $item['p_id'];?>&&cat_id=<?php echo $cat_id;?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"
												name="btn_cart" type="submit">
												Details
					                        </a>
									</div>
								</div>
							</div>
							<div class="block2-txt p-t-20">
								<a href="product_detail.php?id=<?php echo $item['p_id'];?>&&cat_id=<?php echo $cat_id;?>" class="block2-name dis-block s-text3 p-b-5">
								<?php echo $item['p_name'];?>
								</a>
								<span class="block2-price m-text6 p-r-5">
								Rs. <?php echo $item['p_price'];?>
								</span>
							</div>
						</div>
					</div>
					<?php }?>
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

	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>

	<script src="js/main.js"></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
		integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
		data-cf-beacon='{"rayId":"7ec613960a9b896e","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
		crossorigin="anonymous"></script>
</body>

</html>