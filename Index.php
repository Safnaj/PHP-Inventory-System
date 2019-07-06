<?php include_once("includes/Header.php"); ?>

<title>Login</title>

    <div class="container">
        <!--Notifications-->
        <?php
            if(isset($_GET["msg"]) AND !empty($_GET["msg"]))
            { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    <?php echo $_GET["msg"] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
           <?php
            }
            ?>
        <!--Notifications-->
        <div class="card mx-auto" style="width: 30rem; margin-top: 10px;">
            <img class="card-img-top mx-auto" style="width: 240px; height: 240px;" src="public/images/person.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form id="login_form" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <small id="p_error" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <span><a href="Register.php">Register</a> </span> |
                    <span><a href="Dashboard.php">Dashboard</a> </span>
                </form>
            </div>
            <div class="card-footer">
                <a href="#">Forgot Password ?</a>
            </div>
        </div>
    </div>

</body>
</html>