$(document).ready(function () {

    var DOMAIN = "http://localhost/php-inventory-system/";


    //Fetch category
    fetch_category();
    function fetch_category(){
        $.ajax({
            url : DOMAIN+"/controller/CategoryController.php",
            method : "POST",
            data : {getCategory:1},
            success : function(data){
                var root = "<option value='0'>Root</option>";
                var choose = "<option value=''>Choose Category</option>";
                $("#parent_cat").html(root+data);
                //$("#select_cat").html(choose+data);
            }
        })
    }

    //Mange Category
    manageCategory(1);
    function manageCategory(pn){
        $.ajax({
            url : DOMAIN+"controller/CategoryController",
            method : "POST",
            data : {manageCategory:1,pageno:pn},
            success : function(data){
               // alert(data);
                $("#get_category").html(data);
            }
        })
    }

    //Navigation Click
    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        //alert(pn);
        manageCategory(pn);
    })

    $("body").delegate(".del_cat","click",function(){
        var did = $(this).attr("deleteId");
        if (confirm("Are you sure ? You want to delete..!")) {
            $.ajax({
                url : DOMAIN+"controller/CategoryController",
                method : "POST",
                data : {deleteCategory:1,id:did},
                success : function(data){
                    if (data == "DEPENDENT_CATEGORY") {
                        alert("Sorry ! this Category is dependent on other sub categories");
                    }else if(data == "CATEGORY_DELETED"){
                        alert("Category Deleted Successfully..!");
                        manageCategory(1);
                    }else if(data == "DELETED"){
                        alert("Deleted Successfully");
                    }else{
                        alert("Something Went Wront..!");
                    }
                }
            })
        }else{
            //else part
        }
    })

    //Update Category
    $("body").delegate(".edit_cat","click",function(){
        var eid = $(this).attr("eid");
        //alert(eid);
        $.ajax({
            url : DOMAIN+"controller/CategoryController",
            method : "POST",
            dataType : "json",
            data : {updateCategory:1,id:eid},
            success : function(data){
                //alert(data);
                console.log(data);
                $("#cid").val(data["cid"]);
                $("#update_category").val(data["category_name"]);
                $("#parent_cat").val(data["parent_cat"]);
            }
        })
    })

    //Updating Category
    $("#update_category_form").on("submit",function(){
        if ($("#update_category").val() == "") {
            $("#update_category").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>");
        }else{
            $.ajax({
                url : DOMAIN+"controller/CategoryController",
                method : "POST",
                data  : $("#update_category_form").serialize(),
                success : function(data){
                    alert("Category Updated Successfully..!");
                    //$("#cat_error").html("<span class='text-success'>Category Updated Successfully</span>");
                    window.location.href = "";
                }
            })
        }
    })

    /*-------------------------------------------------------BRANDS---------------------------------------------------*/

    manageBrand(1);
    function manageBrand(pn){
        $.ajax({
            url : DOMAIN+"controller/BrandController",
            method : "POST",
            data : {manageBrand:1,pageno:pn},
            success : function(data){
                $("#get_brand").html(data);
            }
        })
    }

    //Navigation Click
    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        //alert(pn);
        manageBrand(pn);
    })

    //Delete Brand
    $("body").delegate(".del_brand","click",function(){
        var did = $(this).attr("did");
        if (confirm("Are you sure ? You want to delete..!")) {
            $.ajax({
                url : DOMAIN+"controller/BrandController",
                method : "POST",
                data : {deleteBrand:1,id:did},
                success : function(data){
                    if (data == "DELETED") {
                        alert("Brand is deleted");
                        manageBrand(1);
                    }else{
                        alert(data);
                    }

                }
            })
        }
    })

    //Select Brand for Update
    $("body").delegate(".edit_brand","click",function(){
        var eid = $(this).attr("eid");
        //alert(eid);
        $.ajax({
            url : DOMAIN+"controller/BrandController",
            method : "POST",
            dataType : "json",
            data : {updateBrand:1,id:eid},
            success : function(data){
                //console.log(data);
                //alert(data["brand_name"]);
                $("#bid").val(data["bid"]);
                $("#brandUpdate").val(data["brand_name"]);
            }
        })
    })

    $("#update_brand_form").on("submit",function(){
        if ($("#brandUpdate").val() == "") {
            $("#brandUpdate").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>");
        }else{
            $.ajax({
                url : DOMAIN+"controller/BrandController",
                method : "POST",
                data  : $("#update_brand_form").serialize(),
                success : function(data){
                    //alert(data);
                    alert("Category Updated Successfully..!");
                    //$("#brand_error").html("<span class='text-success'>Please Enter Brand Name</span>");
                    window.location.href = "";
                }
            })
        }
    })

    /*-------------------------------------------------------PRODUCTS---------------------------------------------------*/

    manageProduct(1);
    function manageProduct(pn){
        $.ajax({
            url : DOMAIN+"controller/ProductController",
            method : "POST",
            data : {manageProduct:1,pageno:pn},
            success : function(data){
                $("#get_product").html(data);
            }
        })
    }

    //Navigation Click
    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        manageProduct(pn);
    })

    $("body").delegate(".del_product","click",function(){
        var did = $(this).attr("did");
        if (confirm("Are you sure ? You want to delete..!")) {
            $.ajax({
                url : DOMAIN+"controller/ProductController",
                method : "POST",
                data : {deleteProduct:1,id:did},
                success : function(data){
                    if (data == "DELETED") {
                        alert("Product is deleted");
                        manageProduct(1);
                    }else{
                        alert(data);
                    }

                }
            })
        }
    })

    //Update product
    $("body").delegate(".edit_product","click",function(){
        var eid = $(this).attr("eid");
        $.ajax({
            url : DOMAIN+"controller/ProductController",
            method : "POST",
            dataType : "json",
            data : {updateProduct:1,id:eid},
            success : function(data){
                console.log(data);
                $("#pid").val(data["pid"]);
                $("#update_product").val(data["product_name"]);
                $("#select_cat").val(data["cid"]);
                $("#select_brand").val(data["bid"]);
                $("#product_price").val(data["product_price"]);
                $("#product_qty").val(data["product_stock"]);

            }
        })
    })

})
