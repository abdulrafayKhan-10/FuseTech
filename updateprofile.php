<?php include("connection.php");
$get_id = $_GET['id'];
$select_data = "SELECT * FROM `tbl_user` WHERE `id` = '$get_id'";
$select_data_run = mysqli_query($con , $select_data);
$user = mysqli_fetch_array($select_data_run);
if(isset($_POST['updatebtn'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $user_image = $_FILES['pic']['name']. date('Y-m-d-H-s');
    $image_tmp = $_FILES['pic']['tmp_name'];
    $img_path = './images/' .$user_image;
    move_uploaded_file($image_tmp,$img_path);
    $update_query = "UPDATE `tbl_user` SET `uname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`user_pic`='$user_image' WHERE `id` = '$get_id'";
    $query_run = mysqli_query($con , $update_query);
    echo "<script>alert('Profile Updated')</script>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Profile</title>
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
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-sm-8 col-md-8 mt-5 mb-5">

            <form class="leave-comment" method="post" enctype="multipart/form-data">
                <h4 class="m-text26 p-b-36 p-t-15">
                    Update your Profile
                </h4>

                <label>First Name</label>
                <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="fname" required
                        value="<?php echo $user['uname'];?>">
                </div>
                <label>Last Name</label>
                <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="lname" required
                        value="<?php echo $user['lastname'];?>">
                </div>
                <label>Email Address</label>
                <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" required
                        value="<?php echo $user['email'];?>">
                </div>
                <label>Profile Picture</label>
                <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="file" name="pic" required>
                </div>
                <label>Password</label>
                <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="pass" required
                        value="<?php echo $user['password'];?>">
                </div>
                <div class="w-size25">
                    <input type="submit" value="Update" name="updatebtn"
                        class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">

                </div>
            </form>

        </div>
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
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
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