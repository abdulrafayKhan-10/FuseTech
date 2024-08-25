<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<header class="header">

    <div class="container-menu-header">

        <div class="wrap_header">

            <a href="index.php" class="logo">
                <img src="images/icons/web-logo.png" alt="IMG-LOGO">
            </a>

            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop_allproducts.php">Shop</a>
                        </li>
                        <li class="sale-noti">
                            <a href="customize.php">Built PC</a>
                        </li>
                            
                        <li>
                            <a href="cart.php">Cart</a>
                        </li>

                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="header-icons">
                <?php     if(isset($_SESSION['check'])){?>
                <a href="userprofile.php" class="header-wrapicon1 dis-block">
                    <span class="header-icons">
                        <?php echo $_SESSION["uname"].'&nbsp;'.$_SESSION["lastname"] ;?>
                    </span>
                    <img src="images/<?php echo $_SESSION["upic"]; ?>" class="header-icon1 rounded-circle" alt="ICON">
                </a><span class="linedivide1"></span>
                <a href="logout.php"  onclick="return confirm('Are you sure you want to logout?')">LOG OUT</a>
                <?php }else{
                    ?>
                <a href="login.php" class="header-wrapicon1 dis-block">
                    <span class="header-icons">
                        LOGIN
                    </span>
                    <img src="images/icons/icon-header-03.png" class="header-icon1" alt="ICON">
                </a>
                <?php }?>
                <span class="linedivide1"></span>
                <div class="header-wrapicon2">
                    <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">
                        <?php 
                    if(empty($_SESSION['products'])){

                        echo "0";
                    }
                    else{
                        $count = count($_SESSION['products']);
                        echo $count;
                    }
                            ?>
                    </span>

                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php 
                            $totalsumof1 = 0;
                            $totalsum = 0;
                            if(empty($_SESSION['products']))
                            { echo "<h5>Your Cart is Empty!</h5>";
                            }
                            
                            else{
                                
                                foreach($_SESSION['products'] as $key => $value){
                                    $totalsumof1 += $value['productprice'];
                                    $totalsum +=  $value['producttotalprice'];

                                    ?>
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo  $value['productimage']?>" alt="IMG" style="height: 70px;">
                                </div>
                                <div class="header-cart-item-txt">
                                    <p href="#" class="header-cart-item-name">
                                        <?php echo $value['productname'];?>
                                    </p>
                                    <span class="header-cart-item-info">
                                        Rs.
                                        <?php echo $value['productprice'];?>
                                        
                                    </span>
                                </div>
                            </li>
                            <?php }}?>
                        </ul>
                        <div class="header-cart-total">


                            Total: Rs.
                            <?php echo $totalsumof1;?>
                        </div>
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">

                                <a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>
                            <div class="header-cart-wrapbtn">

                                <a href="cart.php#checkout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap_header_mobile">

        <a href="index.php" class="logo-mobile">
            <img src="images/icons/web-logo.png" alt="IMG-LOGO">
        </a>

        <div class="btn-show-menu">

            <div class="header-icons-mobile">
                <a class="header-wrapicon1 dis-block">
                <?php if(isset($_SESSION['check'])){?>
                    <a href="userprofile.php"><img src="images/<?php echo $_SESSION['upic'];?>" class="header-icon1 rounded-circle" alt="ICON" style="height:30px; width:30px;"></a>
                    <?php }else{?>
                    <img src="images/icons/icon-header-03.png" class="header-icon1" alt="ICON" >
                     <?php }?>
                </a>
                <span class="linedivide2"></span>
                <div class="header-wrapicon2">

                    <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">
                        <?php 
                    if(empty($_SESSION['products'])){

                        echo "0";
                    }
                    else{
                        $count = count($_SESSION['products']);
                        echo $count;
                    }
                            ?>

                    </span>

                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php 
                            $total = 0;
                            if(empty($_SESSION['products']))
                            { echo "<h5>Your Cart is Empty!</h5>";
                            }
                            
                            else{
                                
                                foreach($_SESSION['products'] as $key => $value){
                                    $total = $total + $value['productprice']; ?>
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo  $value['productimage']?>" alt="IMG">
                                </div>
                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        <?php echo $value['productname'];?>
                                    </a>
                                    <span class="header-cart-item-info">
                                        Rs.
                                        <?php echo $value['productprice'];?>.00
                                    </span>
                                </div>
                            </li>
                            <?php }}?>
                        </ul>
                        <div class="header-cart-total">
                            Total: Rs.
                            <?php echo $total;?>.00
                        </div>
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">

                                <a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>
                            <div class="header-cart-wrapbtn">

                                <a href="cart.php#checkout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">

                <li class="item-menu-mobile">
                    <a href="index.php">Home</a>
                </li>
                <li class="item-menu-mobile ">
                    <a href="shop_allproducts.php">Shop</a>
                </li>
                <li class="item-menu-mobile sale-noti">
                    <a href="customize.php">Built PC</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="cart.php">Cart</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="contact.php">Contact</a>
                </li>
                <?php     if(isset($_SESSION['check'])){?>
                    <li class="item-menu-mobile">
                    <a href="login.php"  onclick="return confirm('Are you sure you want to logout?')"> Log Out</a>
                </li>
                <?php }else{?>
                    <li class="item-menu-mobile">
                    <a href="login.php">Sign In</a>
                </li>
                <?php }?>
            </ul>
        </nav>
    </div>
</header>