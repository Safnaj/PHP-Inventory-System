//Custom Javascripts

$(document).ready(function () {

    var DOMAIN = "http://localhost/PHP-Inventory-System";

    /*---------------------------------------------------- Register-------------------------------------------------- */
   $("#register_form").on("submit",function () {
       var status = false;
       var name = $("#username");
       var email = $("#email");
       var password1 = $("#password1");
       var password2 = $("#password2");
       var type = $("#type");
       var n_patt = new RegExp(/^[A-Za-z ]+$/);
       var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

        //Username Validation
        if (name.val()==""){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please Enter Your Name</span>");
            status = false;
        }else{
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }

       //Email Validation
       if (email.val()==""){
           email.addClass("border-danger");
           $("#e_error").html("<span class='text-danger'>Please Enter Your Email</span>");
           status = false;
       }else if(!e_patt.test(email.val())){
           email.addClass("border-danger");
           $("#e_error").html("<span class='text-danger'>Please Enter a Valid Email</span>");
           status = false;
       }else{
           email.removeClass("border-danger");
           $("#e_error").html("");
           status = true;
       }

       //Password1 Validation
       if (password1.val()=="") {
           password1.addClass("border-danger");
           $("#p1_error").html("<span class='text-danger'>Please Enter Password</span>");
           status = false;
       }else if(password1.val().length < 8){
           password1.addClass("border-danger");
           $("#p1_error").html("<span class='text-danger'>Password Length Must be more than 9 characters</span>");
           status = false;
       }else{
           password1.removeClass("border-danger");
           $("#p1_error").html("");
           status = true;
       }

       //Password2 Validation
       if (password2.val()=="") {
           password2.addClass("border-danger");
           $("#p2_error").html("<span class='text-danger'>Please Re-Enter Password</span>");
           status = false;
       }else if(password2.val().length < 8){
           password2.addClass("border-danger");
           $("#p2_error").html("<span class='text-danger'>Password Length Must be more than 9 characters</span>");
           status = false;
       }else{
           password2.removeClass("border-danger");
           $("#p2_error").html("");
           status = true;
       }

       //Type Validation
       if (type.val()=="") {
           type.addClass("border-danger");
           $("#t_error").html("<span class='text-danger'>Please Select User Type</span>");
           status = false;
       }else{
           type.removeClass("border-danger");
           $("#t_error").html("");
           status = true;
       }

       //Password Matches Validation
       if(password1.val()!= password2.val()){
           password2.addClass("border-danger");
           $("#p2_error").html("<span class='text-danger'>Password Not Matched</span>");
           status = false;
       }else if(password1.val() == password2.val() && status == true) {
           //window.alert("Everything OK");

           $(".overlay").show();
           $.ajax({
               url : DOMAIN+"/controller/UserController.php",
               method : "POST",
               data : $("#register_form").serialize(),
               success : function(data){                            //Response == data
                   if (data == "EMAIL_ALREADY_EXISTS") {
                       $(".overlay").hide();
                       alert("It seems like you email is already used");
                   }else if(data == "SOME_ERROR"){
                       $(".overlay").hide();
                       alert("Something Wrong");
                   }else{
                       $(".overlay").hide();
                       window.location.href = encodeURI(DOMAIN+"/Index.php?msg=You are registered Now you can login");
                   }
               }
           })
       }

   })

    /*------------------------------------------------------- LOGIN-------------------------------------------------- */

    $('#login_form').on("submit",function () {
        var email = $("#email");
        var password = $("#password");
        var status = false;

        if (email.val() == "") {
            email.addClass("borer-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter Email</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true
        }
        if (password.val() == "") {
            password.addClass("borer-danger");
            $("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
            status = false;
        } else {
            password.removeClass("border-danger");
            $("#p_error").html("");
            status = true
        }
        if (status == true) {
            alert("Ready");
        }
    })


})