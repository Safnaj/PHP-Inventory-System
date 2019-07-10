$(document).ready(function () {

    var DOMAIN = "http://localhost/php-inventory-system/";

    //Mange Category
    manageCategory(1);
    function manageCategory(pn){
        $.ajax({
            url :  DOMAIN+"controller/CategoryController",
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
        var did = $(this).attr("did");
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
                        alert("Something Went Wrong..!");
                    }

                }
            })
        }else{
            //
        }
    })

})
