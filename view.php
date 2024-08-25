<?php include("connection.php");
$order_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Purchases</title>
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
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/other.jpg);">
        <h2 class="l-text2 t-center">
            <?php echo $_SESSION["uname"].'&nbsp;'.$_SESSION["lastname"] ;?>
        </h2>

    </section>
    <div class="container mt-5 px-4">
    <a href="userprofile.php"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
        <h3 class="mt-4 text-center mb-5">Purchases</h3>
        <table class="table table-bordered text-center">
            <thead>

                <th class="text-center">Product Name</th>
                <th class="text-center">Product Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>

            </thead>

            <?php 


$select_query = "SELECT * FROM `tbl_checkout` WHERE `o_id` = '$order_id'";
$select_query_run = mysqli_query($con, $select_query);
while($purchase = mysqli_fetch_array($select_query_run)){
?>
            <tr>
                <td><?php echo $purchase['p_name']; ?></td>
                <td>Rs.<?php echo $purchase['p_price']; ?></td>
                <td><?php echo $purchase['p_qty']; ?></td>
                <td><?php echo $purchase['p_price']; ?> x <?php echo $purchase['p_qty']; ?> = Rs.<?php $sumproduct = $purchase['p_price']*$purchase['p_qty'];
                    echo $sumproduct;?></td>







            </tr>
            <?php } ?>

        </table>
    </div>












    <?php include("footer.php");?>

    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e29d9e7e1.js" crossorigin="anonymous"></script>
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

    <script src="js/main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
        integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
        data-cf-beacon='{"rayId":"7ec613504d73896e","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>