<?php 
include("connection.php");
$select_query = "SELECT * FROM `tbl_products`";
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
	   $_SESSION['products'][$count] = array(
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
	<title>All Products</title>
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

	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

	<?php include("nav.php");?>

	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/other.jpg);">
		<h2 class="l-text2 t-center">
			Shop
		</h2>
	</section>

	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-8 col-lg-12 p-b-100">

					<div class="flex p-b-35">
						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product"
								placeholder="Search Products..." onkeyup="functionsearch()" id="search">
							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
                     <div class="row" id="show"></div>
					<div class="row" id="hide">
					<?php while($data = mysqli_fetch_array($query_run)){
						$cat_id = $data['p_cat'];?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative ">
									<img src="<?php echo 'admin/img/' . $data['p_img'];?>" alt="IMG-PRODUCT" style="height:300px;">
									<div class="block2-overlay trans-0-4">

										<div class="block2-btn-addcart w-size1 trans-0-4">

											<form method="post">

											    <input type="hidden" name="p_id"
													value="<?php echo $data['p_id'];?>">

												<input type="hidden" name="p_price"
													value="<?php echo $data['p_price'];?>">

												<input type="hidden" name="p_image"
													value="<?php echo 'admin/img/'. $data['p_img'];?>">

												<input type="hidden" name="p_description"
													value="<?php echo $data['p_description'];?>">

												<input type="hidden" name="p_name"
													value="<?php echo $data['p_name'];?>">

												<input type="hidden" name="p_brand"
													value="<?php echo $data['p_brand'];?>">

												<input type="hidden" name="p_cat" value="<?php echo $data['p_cat'];?>">

												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"
													name="btn_cart" type="submit">
													Add to Cart
												</button>
											</form>
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="product_detail.php?id=<?php echo $data['p_id'];?>&&cat_id=<?php echo $cat_id;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $data['p_name'];?>
									</a>
									<span class="block2-price m-text6 p-r-5">
										<?php echo "Rs. " .$data['p_price'];?>
									</span>
								</div>
							</div>
						</div>
						<?php }?>

					</div>


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

	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>

	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>


	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
		===========================================================*/
		var filterBar = document.getElementById('filter-bar');

		noUiSlider.create(filterBar, {
			start: [50, 200],
			connect: true,
			range: {
				'min': 50,
				'max': 200
			}
		});

		var skipValues = [
			document.getElementById('value-lower'),
			document.getElementById('value-upper')
		];

		filterBar.noUiSlider.on('update', function (values, handle) {
			skipValues[handle].innerHTML = Math.round(values[handle]);
		});
	</script>

	<script src="js/main.js"></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
		integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
		data-cf-beacon='{"rayId":"7ec6134a2ea9896e","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
		crossorigin="anonymous"></script>

		<script>
			
      function functionsearch() {
        $("#hide").hide();
       var word =  $("#search").val();
      $.ajax({
        url: "searchallproduct.php",
        type: "POST",
        data: {
          search_word: word,
        },
        // cache: false,
        success: function(Result) {


          $("#show").html(Result);


        }
      });

    }

	$(document).ready(function() {
	  $.ajax({
			  url: "shopproducts_data.php",
			  type: "GET",

			  // cache: false,
			  success: function(Result) {
	  
	  
				$("#hide").html(Result);
	  
	  
			  }
			});
	});
  

		</script>
</body>

</html>