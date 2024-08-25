<?php
include("connection.php");

$brand_id = $_POST['brand_id'];
$cat_id = $_POST['cat_id'];
$select_query = "SELECT * FROM `tbl_products` WHERE `p_cat` = $cat_id AND `p_brand` = $brand_id";
$query_run = mysqli_query($con , $select_query);
 while($data = mysqli_fetch_array($query_run)){?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative ">
									<img src="<?php echo 'admin/img/' . $data['p_img'];?>" alt="IMG-PRODUCT" style="height:250px;">
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
										Rs. <?php echo $data['p_price'];?>
									</span>
								</div>
							</div>
						</div>
						<?php }?>