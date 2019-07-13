<?php require_once("database/DBConnection.php"); ?>
<?php include_once("includes/Update-Product.php"); ?>
<?php include_once("includes/Header.php"); ?>

<div class="container">
    <br/>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Added Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="get_product">
        <!--<tr>
          <td>1</td>
          <td>Electronics</td>
          <td>Root</td>
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