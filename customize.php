<?php include("connection.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <title>Customize</title>
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

<style>
  .scroll {
    margin: 4px, 4px;
    padding: 4px;
    width: 100%;
    height: 250px;
    overflow-x: hidden;
    overflow-y: scroll;
    text-align: justify;
  }
  /* width */
.scroll::-webkit-scrollbar {
  width: 8px;
}

/* Track */
.scroll::-webkit-scrollbar-track {
  background: #f1f1f1; 
  border-radius: 20px
}
 
/* Handle */
.scroll::-webkit-scrollbar-thumb {
  background: #888; 
  border-radius: 20px

}

/* Handle on hover */
.scroll::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
  #ID_cartList{
    background: #111111;
    color: white;
    border-radius: 11px;
  }

  @media screen and (max-width: 480px) {

    .categories{

      overflow-x: scroll;
      overflow-y: hidden;

      display: flex;
    }



}

</style>

<body class="animsition">



  <?php include("nav.php");?>

  <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/other.jpg);">
    <h2 class="l-text2 t-center">
      Built Your PC
    </h2>
  </section>
	<section class="newproduct bgwhite p-t-45 p-b-105">

  <div class="categories text-center mb-3">

  <button type="button" onclick="default_cat(5)" class="s-text13 btn btn-outline-dark active">PC Cases</button>&nbsp;

  <?php
  // if(!empty($_SESSION['customlist'])){
  $select_cat = "SELECT * FROM `tbl_category` LIMIT 4";
							$select_cat_run = mysqli_query($con , $select_cat);
							while($category = mysqli_fetch_array($select_cat_run)){?>

								<button type="button" onclick="cat_func(<?php echo $category['cat_id'] ?>)" class="s-text13 btn btn-outline-dark">
									<?php echo $category['cat_name'];?>
              </button>&nbsp;

							<?php }
              // }
              ?>
  </div>
  <hr>
  <div class="container-fluid" >
    <div class="row mt-5">

      <div class="col-lg-8 p-0"  id="fetch_cat"></div>         
  <div   class=" p-0 col-lg-4" id="ID_cartList"></div>
 
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
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
    integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
    data-cf-beacon='{"rayId":"7ec6134a2ea9896e","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
    crossorigin="anonymous"></script>


<script>
    //for default category dough
    FetchData();

 default_cat(5);   
function default_cat(id) {
    //  $('#show').show();
   $.ajax({
     url : 'default_cat.php',
     type : 'POST',
     data : {
      
      abc: id
     },
     success : function (data){
       // console.log(data);
       $('#fetch_cat').html(data);
     }
   })
   
 }
//for default category dough

// for category wise fetch

function cat_func(catid) {
   
   $.ajax({
     url : 'category_custom.php',
     type : 'POST',
     data : {
      
       catid : catid
     },
     success : function (data){
       // console.log(data);
       $('#fetch_cat').html(data);
     }
   })
   
 }

// for category wise fetch

function cat_function(id) {
  
$.ajax({
  url : 'custom_cart.php',
  type : 'POST',
  data : {
    cart : 'cart',
    id : id
  },
  success : function (data){
    console.log(data);
    $('#ID_cartList').html(data);
  }
})

}
function FetchData(){

$.ajax({
  url : 'custom_cart.php',
  type : 'POST',
  
  success : function (data){
    console.log(data);
    $('#ID_cartList').html(data);
  }
})
}

</script>
</body>

</html>