<?php 
 include("../connection.php");

 $select_query = "SELECT * FROM `tbl_admin`";
 $select_query_run = mysqli_query($con,$select_query);       
 $fetch = mysqli_fetch_array($select_query_run);
 
 if(isset($_POST['login_btn'])){
 $username = $_POST['u_name'];
 $password = $_POST['pass'];

   if(($fetch['username'] == $username) && ($fetch['password'] == $password)){
    $_SESSION['admin_loggedin'] = True; 
    $_SESSION['admin_name'] = $username;
     header('location:index.php');
   }
   else{
     echo"<script>alert('username and password is not correct plz Try again')</script>";
   }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-center mt-3 mb-3"><img src="../images/icons/web-logo.png" alt="" style="height:50px;"></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                            <input type="text" name="u_name" class="form-control">
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input type="text" name="pass" class="form-control ">
                                                <label for="inputPassword">Password</label>
                                            </div>
                                          
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
                                                <input type="submit" value="Login" name="login_btn" class="btn btn-dark mt-3 w-100">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
