
$(function (){

  $("fnameErrorMsg").hide();
  
  var error_fname = false;
  var error_lname = false;
  var error_email = false;
  var error_pass  = false;
  var error_repass  = false;
  var error_addr = false;
  var error_mob = false;
  var error_dob = false;

  var name_regex = /^[a-zA-Z]+$/;

  var email_regex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})$/;

  
  /*
  Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:

"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"

  */
  
  var mob_regex = /^[0-9]{3}-[0-9]{4}-[0-9]{3}$/;

  
  

  $("#fname").focusout(function(){
    check_fname();
  });

  $("#lname").focusout(function(){
    check_lname();
  });

  $("#email").focusout(function(){
    check_email();
  });

  $("#pass").focusout(function(){
    check_pass();
  });

  $("#repass").focusout(function(){
    check_repass();
  });

  $("#address").focusout(function(){
    check_address();
  });

  $("#mobile").focusout(function(){
    check_mobile();
  });

  $("#datepicker").focusout(function(){
    check_dob();
  });

  function check_fname(){
    
    var fname_length = $("#fname").val().length;

    if(fname_length < 3 || fname_length > 20){
      $("#fnameErrorMsg").html("Should be 3 to 20 characters").css("color", "red");
    }
    else if(!$("#fname").val().match(name_regex)){
          $("#fnameErrorMsg").html("Should be alphabets").css("color", "red");
    }
    else{
      $("#fnameErrorMsg").html("*First name Accepted").css("color", "green");;
      
    }
    error_fname = true;
  }

  function check_lname(){
    
    var fname_length = $("#lname").val().length;

    if(fname_length < 3 || fname_length > 20){
      $("#lnameErrorMsg").html("Should be 3 to 20 characters").css("color", "red");
    }
    else if(!$("#lname").val().match(name_regex)){
          $("#lnameErrorMsg").html("Should be alphabets").css("color", "red");
    }
    else{
      $("#lnameErrorMsg").html("*Last name Accepted").css("color", "green");;
      
    }
    error_lname = true;
  }

  function check_email(){

     if(!$("#email").val().match(email_regex)){
      $("#emailErrorMsg").html("Invalid Email Address!").css("color", "red");
    }

    else{
      $("#emailErrorMsg").html("*Email Accepted").css("color", "green");;
      
    }
    error_email = true;
  }

  function check_pass(){
   var pass_val = $("#pass").val();
   var repass_val= $("#repass").val();

   if(pass_val.length < 3 ){
    $("#passErrorMsg").html("Password should be 3 characters minimum!").css("color", "red");
      if(pass_val != repass_val){
        $("#repassErrorMsg").html("*Password doesn't match").css("color","red");
      }
   }else{
    $("#passErrorMsg").html("*Password accepted!").css("color", "green");
   }
   
    error_pass = true;
  }

  function check_repass(){
    var pass_val   = $("#pass").val();
    var repass_val = $("#repass").val();

    if((pass_val == null || pass_val == "") && (repass_val == null || repass_val == "")){
      $("#passErrorMsg").html("Password should be 3 characters minimum!").css("color", "red");
    }
 
    else if(pass_val != repass_val){
         $("#repassErrorMsg").html("*Password doesn't match").css("color","red");
    }
    else{
      $("#repassErrorMsg").html("*Password matched!").css("color", "green");
    }
    
     error_repass = true;
   }

  function check_address(){
    var addr = $("#address").val();

    if((addr == "" || addr == null)){
      $("#addressErrorMsg").html("*Address is required!").css("color", "red");
    }
    
    else if(addr.length < 3){
      $("#addressErrorMsg").html("Minimum 3 characters required!").css("color", "red");
    }
    else{
      $("#addressErrorMsg").html("*Address Accepted").css("color", "green");;
      
    }
    error_addr = true;
  }

  function check_mobile(){
    var mob = $("#mobile").val();
    if(mob == "" || mob == null){
      $("#mobileErrorMsg").html("Mobile number required").css("color","red");
    }
    else if(mob.length < 10 || mob.length > 12){
      $("#mobileErrorMsg").html("Enter only digits").css("color","red");
    }
    else if(!mob.match(mob_regex)){
      $("#mobileErrorMsg").html("Please choose required format!").css("color","red");
    }
    else{
      $("#mobileErrorMsg").html("*Mobile number accepted").css("color","green");
    }
    error_mob = true;
  }

  function check_dob(){
    var dob    = $("#datepicker").val();
    if(dob == "" || dob == null){
      $("#dobErrorMsg").html("*Dob is required").css("color","red");
    }
    else{
      $("#dobErrorMsg").html("*Dob is accepted").css("color","green");
    }
    error_dob = true;
  }

  $(document).on("click","#add_submit",function(){

    var fname  = $("#fname").val();
    var lname  = $("#lname").val();
    var email  = $("#email").val();
    var pass   = $("#pass").val();
    var repass = $("#repass").val();
    var addr   = $("#address").val();
    var mobile = $("#mobile").val();
    var dob    = $("#datepicker").val();


    if((fname == "" || fname == null) && (lname == "" || lname == null) && (email == "" || email == null) && (pass == "" || pass == null) && (repass == "" || repass == null) && (addr == "" || addr == null) && (mobile == "" || mobile == null) &&(dob == "" || dob == null) ){

      $("#fnameErrorMsg").html("*First name required!").css("color", "red");
      $("#lnameErrorMsg").html("*Last name required!").css("color", "red");
      $("#emailErrorMsg").html("*Email required!").css("color", "red");
      $("#passErrorMsg").html("*Password required!").css("color", "red");
      $("#repassErrorMsg").html("*Repassword required!").css("color","red");
      $("#addressErrorMsg").html("*Address is required!").css("color","red");
      $("#mobileErrorMsg").html("*Mobile number is required").css("color","red");
      $("#dobErrorMsg").html("*Dob is required").css("color","red");
     
      return false;

    }

    else if(fname == "" || fname == null){
      $("#fnameErrorMsg").html("*First name required!").css("color", "red");
      return false;
     }
  
     else if(lname == "" || lname == null){
      $("#lnameErrorMsg").html("*Last name required!").css("color", "red");
      return false;
     }

     else if(email == "" || email == null){
      $("#emailErrorMsg").html("*Email required!").css("color", "red");
       return false;
     }

     else if(pass == "" || pass == null){

      $("#passErrorMsg").html("*Password required!").css("color", "red");
       return false;
     }

     else if(repass == "" || repass == null){

      $("#repassErrorMsg").html("*Repassword required!").css("color","red");
       return false;
     }

     else if(addr == "" || addr == null){
      $("#addressErrorMsg").html("*Address is required!").css("color","red");
       return false;
     }

     else if(mobile == "" || mobile == null){
      $("#mobileErrorMsg").html("*Mobile number is required").css("color","red");
       return false;
     }

     else if(dob == "" || dob == null){
      $("#dobErrorMsg").html("*Dob is required").css("color","red");
       return false;
     }
    else{
      // $("#testErrorMsg").html("*required").css("color","red");
       return true;
    }

    // else if(lname == "" || lname == null){
    //   check_lname();
    //   $("#lname").focus();
    //   return false;
    // }
    // else if(email == "" || email == null){
    //   check_email();
    //   $("#email").focus();
    //   return false;
    // }

    // if($("Checkbox1").prop("checked", false)) {
    // alert("not check");
    // return false;
    // }

  });
});

/*
  $("#form1").submit(function(){
    if(error_fname == false){
      check_fname();
      return true;
    }else{
      return false;
    }
  });
 
});
*/
/*$(document).ready(function(){
  alert("Hellooooo");
})*/

/*
$(document).on("click","#add_submit",function(){
  var error_fname = false;

  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var email = $("#email").val();
  var pass = $("#pass").val();
  var repass = $("#repass").val();
  var addr = $("#address").val();
  var mobile = $("#mobile").val();
  var dob = $("#datepicker").val();

  if(fname =="" || fname ==null){
    
    $("#fnameErrorMsg").html("Please enter first name").css("color", "red");
    $("#fname").focus();
    
    //check_fname();
    return false;
  }

  else if(fname != ""){
    var fname_length = $("#fname").val().lenght();
    if(fname_length < 5 || fname_length > 20){
      $("#fnameErrorMsg").html("Should be 5 to 20 characters").css("color", "red");
    }
    return false;
  }

  else if(lname =="" || lname ==null){
    alert("Please enter last name");
    $("#lname").focus();
    return false;
  }

  else if(email == "" || email == null){
    alert("Please enter email name");
    $("#email").focus();
    return false;
  }

  else if(pass == "" || pass == null){
    alert("Please enter password");
    $("#pass").focus();
    return false;
  }

  else if(repass == "" || repass == null){
    alert("Please enter retype password");
    $("#repass").focus();
    return false;
  }

else if(addr == "" || addr == null){
  alert("Please enter address");
  $("#address").focus();
    return false;
}

else if(mobile == "" || mobile == null){
  alert("Please enter mobile");
  $("#mobile").focus();
    return false;
}

else if(dob == "" || dob == null){
  alert("Please enter date of birth");
  $("#datepicker").focus();
    return false;
}

function check_fname(){

  var fname_length = $("#fname").val().lenght();
  if(fname_length < 5 || fname_length > 20){
    $("#fnameErrorMsg").html("Should be 5 to 20 characters").css("color", "red");
  }
}


})*/