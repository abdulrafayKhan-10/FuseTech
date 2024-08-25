<?php

 include('connection.php');
$cat_id = $_POST['abc'];
$select_query = "SELECT * FROM `tbl_products` WHERE `p_cat` = $cat_id";
$select_query_run = mysqli_query($con , $select_query); ?>



<div class="row container">

    <?php while ($row = mysqli_fetch_array($select_query_run)) { ?>

        <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-2" >


 
            <div class="card" >
        <img src="<?php echo './admin/img/'.$row['p_img'];?>" class="card-img-top" alt="..." style="height: 200px;">
        <div class="card-body">
        <h6 class="card-title" style="height: 20px;"><?php echo $row['p_name'];?></h6>
        <p class="card-text">Rs.<?php echo $row['p_price'];?></p>
        
        
        <button type="button" onclick="cat_function(<?php echo $row['p_id'];?>)" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mt-5 w-100" >ADD</button>
        </div>
        </div>
        
          

        </div>


<?php  } ?>

    </div>

