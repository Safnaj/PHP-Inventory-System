<?php include_once("includes/Header.php"); ?>

<title>Dashboard</title>

<div class="container">
    <div class="row" style="padding-top: 10px;">
        <div class="col-md-4">
            <div class="card mx-auto">
                <img class="card-img-top" style="width: 40%;" src="public/images/avatar.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Profile Info</h4>
                    <p class="card-text">Ahamed Safnaj</p>
                    <p class="card-text">Admin</p>
                    <p class="card-text">Last Login : xxxx-xx-xx</p>
                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="jumbotron" style="width: 100%; height: 100%;">
                <h2>Welcome Admin</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <iframe src="http://free.timeanddate.com/clock/i6rcpp5d/n389/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <p class="card-text">Make Invoices and Create New Orders.</p>
                                <a href="#" class="btn btn-primary">New Orders</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text">Here You Can Manage Your Categories</p>
                    <a href="#" data-toggle="modal" data-target="#category" class="btn btn-primary">Add</a>
                    <a href="Manage-Category.php" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Brands</h5>
					<!--Data-Target id will be called in Brands.pjp-->
                    <p class="card-text">Here You Can Manage Your Brands</p>
                    <a href="#" data-toggle="modal" data-target="#brands" class="btn btn-primary">Add</a>
                    <a href="Manage-Brand.php" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Here You Can Manage Your Products</p>
                    <a href="#" data-toggle="modal" data-target="#products" class="btn btn-primary">Add</a>
                    <a href="Manage-Product.php" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!--Category Page Model-->
<?php include_once("includes/Category.php"); ?>
<!--Brands Page Model-->
<?php include_once("includes/Brands.php"); ?>
<!--Products Page Model-->
<?php include_once("includes/Products.php"); ?>
</body>
</html>