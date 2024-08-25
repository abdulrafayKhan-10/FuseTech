<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Pages</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseproducts"
                    aria-expanded="false" aria-controls="collapseproducts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseproducts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="addproduct.php">Maintain Product</a>
                        <a class="nav-link" href="viewproduct.php">View Product</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsebrand"
                    aria-expanded="false" aria-controls="collapsebrand">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Brands
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapsebrand" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="addbrand.php">Maintain Brands</a>
                        <a class="nav-link" href="viewbrand.php">View Brands</a>

                    </nav>
                </div>





                <a class="nav-link" href="viewuser.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    All User
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseorder"
                    aria-expanded="false" aria-controls="collapseorder">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Orders
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseorder" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="order.php">New Orders</a>
                        <a class="nav-link" href="orderhistory.php">Delivered Orders</a>
                    </nav>
                </div>


                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseordercustom"
                    aria-expanded="false" aria-controls="collapseordercustom">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Custom Orders
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseordercustom" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="customorder.php">New Orders</a>
                        <a class="nav-link" href="customorderhistory.php">Delivered Orders</a>
                    </nav>
                </div>

            </div>
        </div>

    </nav>
</div>