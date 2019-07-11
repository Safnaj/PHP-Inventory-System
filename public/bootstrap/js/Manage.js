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
                $("#select_cat").html(choose+data);
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
        var eid = $(this).attr("editId");
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


})
