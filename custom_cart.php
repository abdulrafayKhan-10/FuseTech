<?php
include("connection.php");

if (isset($_POST['cart'])) {
  $id = $_POST['id'];
  $fetch_data = "SELECT * FROM tbl_products WHERE `p_id`= '$id'";
  $run = mysqli_query($con, $fetch_data);
  $row = mysqli_fetch_array($run);

  if (isset($_SESSION['customlist'])) {
    $myitems = array_column($_SESSION['customlist'], 'c_name');
    $myitems_cat = array_column($_SESSION['customlist'], 'c_cat');

    if (in_array($row['p_name'], $myitems)) {
      echo "<script>alert('item already added')</script>";
    //    session_unset();
    //    session_destroy();
    } elseif (in_array($row['p_cat'], $myitems_cat)) {
    //   echo "<script>alert('Item Replaced')</script>";
      foreach ($_SESSION["customlist"] as $key => $val) {

        if ($val["c_cat"] == $row['p_cat']) {
          $_SESSION["customlist"][$key] = array(
            'c_id' => $row['p_id'],
            'c_name' => $row['p_name'],
            'c_price' => $row['p_price'],
            'c_cat' => $row['p_cat'],
            'c_img' => $row['p_img']

          ); // Add this
        }

      }
    } else {
      $_SESSION['customlist'][] = array(
        'c_id' => $row['p_id'],
        'c_name' => $row['p_name'],
        'c_price' => $row['p_price'],
        'c_cat' => $row['p_cat'],
        'c_img' => $row['p_img']

      );

    //   print_r($_SESSION['customlist']);
      ?>

      <?php

    }
  } else {
    $_SESSION['customlist'][] = array(
      'c_id' => $row['p_id'],
      'c_name' => $row['p_name'],
      'c_price' => $row['p_price'],
      'c_cat' => $row['p_cat'],
      'c_img' => $row['p_img']

    );

    // print_r($_SESSION['customlist']);
    ?>

    <?php

  }
}
?>
<?php if(!empty($_SESSION['customlist'])){?>

<!-- <div class="col-sm-4 mt-5">
 
 <div class="text-center" data-aos="fade-right"><img src="./admin/img/<?php echo $_SESSION["customlist"][0]["c_img"];?>" alt="pics"
     height="100%" width="100%"></div>

</div> -->
<!-- product specs -->
<!-- <div class="col-sm-5 mt-5 d-flex align-items-center">
 <div class="mt-5" data-aos="fade-up">
   <h1 class="title"><?php echo $_SESSION["customlist"][0]["c_name"]?></h1>
   <h5 class="title mb-2">Product Description</h5>
   <p>A gaming PC case combines striking aesthetics with efficient cooling, supporting high-performance components and customizable RGB lighting to create an immersive gaming experience.</p>
   <h4 class="mt-2">Total :
                      <?php
         $myitems = array_column($_SESSION['customlist'], 'c_price');
         $sum = array_sum($myitems);
         echo "Rs " . $sum;
     
         ?>
         </h4>
   <div class="container">
<?php if(isset($_SESSION['check'])){?>
   <a href="place_order.php" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mt-5 w-50">Buy Now</a>
   <?php } else{ ?>
   <a href="login.php" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mt-5 w-50">Buy Now</a>
   <?php }?>


   </div>
 </div>
</div> -->
<!-- products selected by user to add -->
<!-- <div class="col-sm-3 comp mt-5"> -->
 <h5 class="title mt-3 text-center fs-bold">Components</h5>
 <hr>
 <!-- scroll d-flex  text-center -->
 <div class="p-3" data-aos="zoom-in">
    <ol class="list-group list-group-numbered scroll">
     <?php foreach ($_SESSION['customlist'] as $key => $value) { ?>
     
       <!-- <div class="col-12 cb">
               <div class=" card-body text-center">
                 <img src="<?php echo "./admin/img/" . $value['c_img'] ?>" alt="pics" height="100px">
                  <h6><?php echo $value['c_name'] ?></h6>
                  <p><?php echo "Rs. " . $value['c_price'] ?></p>
               </div>
             </div> -->

     
  
  <li class="list-group-item d-flex justify-content-between align-items-start " style="background:none">
    <div class="ms-2 me-auto">
      <div class="fw-bold">
       <h6> <?php echo $value['c_name'] ?></h6> 
      </div>
     <b> <?php echo "Rs. " . $value['c_price'] ?> </b>
    </div>
    <span class="badge bg-dark rounded-pill"><img src="<?php echo "./admin/img/" . $value['c_img'] ?>" alt="pics" height="50px" width="50px"></span>
  </li>
      <?php } ?>
 
</ol>




     
     <div class="text-right"><hr><br>
               <h6>Total :
                      <?php
         $myitems = array_column($_SESSION['customlist'], 'c_price');
         $sum = array_sum($myitems);
         echo "Rs " . $sum;
     
         ?>
         &nbsp; &nbsp; &nbsp;
         </h6>
             </div>
             <div class="text-left"><hr><br>
             
               <a href="place_order.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">Place Order</a>
             </div>



 </div>
</div>
<?php }else{?>
 <div class="col-sm-12 mt-5"><center><h5 class="text-center mb-5">Start Building Your PC</h><center>   </div>   

<?php }?>




         