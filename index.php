<?php include("connection.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
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

<body class="animsition">

	<?php include("nav.php");?>

	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1"
					style="background-image: url(images/pexels-roberto-nickson-7238759.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
							data-appear="fadeInDown">
							New Gadgets 2023
						</span>
						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
							data-appear="fadeInUp">
							New arrivals
						</h2>
						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">

							<a href="shop_allproducts.php"
								class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>
				<div class="item-slick1 item2-slick1"
					style="background-image: url(images/pexels-josh-sorenson-10782398.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
							data-appear="rollIn">
							Fresh Stock 2023
						</span>
						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
							data-appear="lightSpeedIn">
							New arrivals
						</h2>
						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">

							<a href="shop_allproducts.php"
								class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>
				<div class="item-slick1 item3-slick1" style="background-image: url(images/pexels-fox-1038916.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
							data-appear="rotateInDownLeft">
							New Collections 2023
						</span>
						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
							data-appear="rotateInUpRight">
							New arrivals
						</h2>
						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">

							<a href="shop_allproducts.php"
								class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto" id="cat">

					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/pexels-athena-2582937.jpg" alt="IMG-BENNER">
						<div class="block1-wrapbtn w-size2">

							<a href="products.php?id=2" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Motherboard
							</a>
						</div>
					</div>

					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/pexels-athena-2582936.jpg" alt="IMG-BENNER">
						<div class="block1-wrapbtn w-size2">

							<a href="products.php?id=1" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								RAM
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">

					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/pexels-nana-dua-8622911 (1).jpg" alt="IMG-BENNER">
						<div class="block1-wrapbtn w-size2">

							<a href="products.php?id=3" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								GPU
							</a>
						</div>
					</div>

					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/pexels-athena-2582935.jpg" alt="IMG-BENNER">
						<div class="block1-wrapbtn w-size2">

							<a href="products.php?id=4" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Processor
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">

					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/system.jpg" alt="IMG-BENNER">
						<div class="block1-wrapbtn w-size2">

							<a href="products.php?id=6" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Others
							</a>
						</div>
					</div>
					<?php     if(isset($_SESSION['check'])){?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/pexels-anete-lusina-4792733.jpg" alt="IMG-BENNER" style="height:310px">
						<div class="block1-wrapbtn w-size2">

							<a href="shop_allproducts.php" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								All
							</a>
						</div>
					</div>
					<?php }else{?>
					<div class="block2 wrap-pic-w pos-relative m-b-30">
						<img src="images/icons/bg-01.jpg" alt="IMG" style="height:310px">
						<div class="block2-content sizefull ab-t-l flex-col-c-m">
							<h4 class="m-text4 t-center w-size3 p-b-8">
								Sign up & get 20% off
							</h4>
							<p class="t-center w-size4">
								Be the frist to know about the latest products and get exclusive offers
							</p>
							<div class="w-size2 p-t-25">

								<a href="signup.php" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									Sign Up
								</a>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>

	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Latest Products
				</h3>
			</div>

			<div class="wrap-slick2">
				<div class="slick2">
					<?php 
					$select_products = "SELECT * FROM tbl_products ORDER BY `p_id` DESC LIMIT 8";
					$select_products_run = mysqli_query($con , $select_products);
					while($item = mysqli_fetch_array($select_products_run)){

						$cat_id = $item['p_cat'];
					?>

					<div class="item-slick2 p-l-15 p-r-15">

						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo 'admin/img/' . $item['p_img'];?>" alt="IMG-PRODUCT"
									style="height: 300px;">
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
								<a href="product_detail.php?id=<?php echo $item['p_id'];?>&&cat_id=<?php echo $cat_id;?>"
									class="block2-name dis-block s-text3 p-b-5">
									<?php echo $item['p_name'];?>
								</a>
								<span class="block2-price m-text6 p-r-5">
									Rs.
									<?php echo $item['p_price'];?>
								</span>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>

	<section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="images/pc.jpg" alt="IMG-BANNER" style="height: 430px;">
						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								New Items
							</span>
							<a href="shop_allproducts.php" class="s-text4 hov2 p-t-20 ">
								View All Products
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
						<img src="images/otherproduct.png" alt="IMG-BANNER" style="height: 430px;">
						<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
							<div class="t-center">
								<a href="products.php?id=6" class="dis-block s-text3 p-b-5">
									Others Components
								</a>
							</div>
							<div class="flex-c-m p-t-44 p-t-30-xl">
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 days">
										69
									</span>
									<span class="s-text5">
										days
									</span>
								</div>
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 hours">
										04
									</span>
									<span class="s-text5">
										hrs
									</span>
								</div>
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 minutes">
										32
									</span>
									<span class="s-text5">
										mins
									</span>
								</div>
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 seconds">
										05
									</span>
									<span class="s-text5">
										secs
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>
				<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>
				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
			</div>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>
				<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
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
	</script>

	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>

	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>

	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>

	<script src="js/main.js"></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
		integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
		data-cf-beacon='{"rayId":"7ec612f01f78896e","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
		crossorigin="anonymous"></script>
</body>

</html>