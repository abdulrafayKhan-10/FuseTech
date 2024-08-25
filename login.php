<?php
include('connection.php');
if(isset($_POST['loginbtn'])){
    $useremail = $_POST['uname'];
    $userpassword = $_POST['upass'];
    $resultant = mysqli_query($con , "SELECT * FROM `tbl_user` WHERE uname = '$useremail' OR email = '$useremail'");
    $row = mysqli_fetch_assoc($resultant);

    if(mysqli_num_rows($resultant) > 0){


        if($userpassword == $row["password"]){
            $_SESSION['check'] = true;
            $_SESSION["id"] = $row['id'];
            $_SESSION["email"] = $row["email"];
            $_SESSION["uname"] = $row['uname'];
            $_SESSION["lastname"] = $row["lastname"];
            $_SESSION["upic"] = $row["user_pic"];

            $_SESSION["login"] = true;

            header('location:index.php');
        }
        else{
        echo "<script> alert('Wrong Password')</script>";
        }
    }
    else{
        echo "<script> alert('User not Registered')</script>";
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>LOGIN</title>

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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>


	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/other.jpg);">

		<h2 class="l-text2 t-center">
		LOGIN
		</h2>

	
	</section>

	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">

		<a href="index.php"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
    <div class="container-fluid">
        <form method="POST">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input type="text" name="uname" class="form-control form-control-user" placeholder="Enter Email Address"
                    required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="upass" class="form-control form-control-user" placeholder="Password"
                    required>
            </div>

            <input value="Login" type="submit" name="loginbtn"
                class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
            <hr>

            <div class="text-center">
                Don't have an Account? <a  href="signup.php">Create an Account!</a>
            </div>
        </form>
    </div>
    </div>
</section>




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

  
</script>
</body>

</html>