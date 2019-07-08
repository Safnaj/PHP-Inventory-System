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
})
