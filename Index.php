<?php include_once("includes/header.php"); ?>

    <div class="container">
        <div class="card mx-auto" style="width: 30rem;">
            <img class="card-img-top mx-auto" style="width: 240px; height: 240px;" src="images/person.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <span><a href="#">Register</a> </span>
                </form>
            </div>
            <div class="card-footer">
                <a href="#">Forgot Password ?</a>
            </div>
        </div>
    </div>

</body>
</html>