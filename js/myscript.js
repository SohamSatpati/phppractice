
/*$(function (){

  $("fnameErrorMsg").hide();
  
  var error_fname = false;
  $("#fname").focusout(function(){
    check_fname();
  });

  function check_fname(){
    var fname_length = $("#fname").val().lenght()  ;
    $("fnameErrorMsg").html("herllo").show();
    error_fname = true;
  }

  $("#form1").submit(function(){alert("huuu");
    if(error_fname == false){
      return true;
    }else{
      return false;
    }
  });
 
});*/
/*$(document).ready(function(){
  alert("Hellooooo");
})*/

$(document).on("click","#add_submit",function(){
  
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var email = $("#email").val();
  var pass = $("#pass").val();
  var repass = $("#repass").val();
  var addr = $("#address").val();
  var mobile = $("#mobile").val();
  var dob = $("#datepicker").val();

  if(fname =="" || fname ==null){
    alert("Please enter first name");
    $("#fname").focus();
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

})