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
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Re-Enter Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="usertype">User Type</label>
                    <select name="usertype" class="form-control" id="usertype">
                        <option value="1">Admin</option>
                        <option value="0">Other</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>