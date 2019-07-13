<?php require_once("database/DBConnection.php"); ?>
<?php include_once("includes/Header.php"); ?>
<?php include_once("includes/Update-Brand.php"); ?>


<div class="container">
    <br/>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="get_brand">
        <!--<tr>
          <td>1</td>
          <td>Electronics</td>
          <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
          <td>
              <a href="#" class="btn btn-danger btn-sm">Delete</a>
              <a href="#" class="btn btn-info btn-sm">Edit</a>
          </td>
        </tr>-->
        </tbody>
    </table>
</div>

</body>
</html>