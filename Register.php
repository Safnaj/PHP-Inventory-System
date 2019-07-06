<?php include_once("includes/Header.php"); ?>

<title>Register</title>

<div class="container">
    <br>
    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-header">
            <a href="#">Register User</a>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form id="register_form" onsubmit="return false" autocomplete="off">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
                    <small id="u_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="e_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password1" placeholder="Password">
                    <small id="p1_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Re-Enter Password</label>
                    <input type="password" class="form-control" id="password2" placeholder="Password">
                    <small id="p2_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="type">User Type</label>
                    <select name="type" class="form-control" id="type">
                        <option value="">Choose User type</option>
                        <option value="1">Admin</option>
                        <option value="0">Other</option>
                    </select>
                    <small id="t_error" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>