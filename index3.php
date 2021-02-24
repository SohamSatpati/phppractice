<?php
include "./include/header.php";
require 'validation.php';

$errfname = $errlname= $erremail = $errpass = $err_repass = $erraddr = $errmobile = $errgender = $errdob = $errlang = "";

$fname = $mname = $lname = $email = $pass = $repass = $addr = $mobile = $dob = $gender =  $lang ="";

$flag = false;

if(isset($_POST['submit'])){

  $fname  = validation($_POST['fname']);
  $mname  = validation($_POST['mname']);
  $lname  = validation($_POST['lname']);
  $pass   = validation($_POST['pass']);
  $email  = validation($_POST['email']); 
  $addr   = validation($_POST["address"]);
  $mobile = validation($_POST["mobile"]);
  $dob    = validation($_POST["datepicker"]);

  

  if(empty($_POST['lang'])){
    
    $errlang = dispInpErrorMsg("Please choose any one");
    
  }
  else{
    $lang = $_POST["lang"];
  }

  
  $gender = $_POST['MyRadio'];

 
 }
?>

<section class="myheader">
<h2><?php echo "Registration Form";?></h2>
</section>

<section class="maincontent">
<div class="container">
        <form method='post' id="form1" action = ""> 
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
        <div class="row">
    <div class="col">
      
      <input type="text" class="form-control" name = "fname" id = "fname" placeholder="First name" value = "<?php echo $fname = $fname ?: "";?>">
      <span id="fnameErrorMsg"></span>
    </div>
    <div class="col">
      <input type="text" class="form-control" name = "mname" id = "mname" placeholder="Middle name" value = "<?php echo $mname;?>">
    </div>
    <div class="col">
    <input type="text" class="form-control" name = "lname" id="lname" placeholder="Last name" value = "<?php echo $lname;?>"><span id="lnameErrorMsg"></span> 
    </div>
  </div>
  </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>

            <input type="text" class="form-control" id="email" placeholder="name@example.com" autocomplete="on" name="email" value = "<?php echo $email;?>">
            <span id="emailErrorMsg"></span> 
          </div>

          <div class="form-group">  
        <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Password</label>
      <input type="password" id = "pass" name = "pass" class="form-control" placeholder="Enter Password" value = "">
      <span id="passErrorMsg"></span>
    </div>

    <div class="col">
    <label for="exampleFormControlInput1">Retype password</label>
      <input type="password" id = "repass" name = "repass" class="form-control" placeholder="Retype password" value = "">
      <span id="repassErrorMsg"></span>
    </div>
    </div>
  </div> 
          <div class="form-group">
            <label for="textarea">Address</label>
            <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter your Home address"><?php echo $addr;?></textarea>
            <span id="addressErrorMsg"></span>
          </div>

    <div class="form-group">
    <div class="row">    
    <div class="col">
    <label for="exampleFormControlInput1">Mobile</label>
      <input type="text" class="form-control" id = "mobile" name = "mobile" placeholder="123-4567-890" value = "<?php echo $mobile;?>">
      <small>Format: 123-4567-890</small><br/>
      <span id="mobileErrorMsg"></span>
    </div>

    <div class="col">
    <label for="exampleFormControlInput1">Date of birth</label>
    <i class="bi bi-calendar-date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
  <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg></i>
    <input data-date-format="dd/mm/yyyy" id="datepicker" class="form-control" name = "datepicker" placeholder="Choose Date of Birth" autocomplete = "off" value = "<?php echo $dob;?>"><span id="dobErrorMsg"></span>
    
    </div>
        </div>
        </div>

          <div class="form-group">  
        <div class="row">
    <div class="col-sm-3">
    <label for="exampleFormControlInput1">Language Known</label>
    
    </div>

    <div class="col-sm-6">
    <?php 
    if(empty($_POST['lang'])){
    
     $lang = array();
    ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="C">
            <label class="form-check-label" for="inlineCheckbox1">C</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="Cpp">
            <label class="form-check-label" for="inlineCheckbox2">Cpp</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="Java">
            <label class="form-check-label" for="inlineCheckbox2">Java</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="Python">
            <label class="form-check-label" for="inlineCheckbox2">Python</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="PHP">
            <label class="form-check-label" for="inlineCheckbox2">PHP</label>
          </div>
    
    <?php
    }
    if(!empty($_POST['lang'])){
    
    ?>
    <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="C" <?php if(in_array("C", $lang)) {?> checked="checked"<?php } ?>>
            <label class="form-check-label" for="inlineCheckbox1">C</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="Cpp" <?php if(in_array("Cpp", $lang)) {?> checked="checked"<?php } ?>>
            <label class="form-check-label" for="inlineCheckbox2">Cpp</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="Java" <?php if(in_array("Java", $lang)) {?> checked="checked"<?php } ?>>
            <label class="form-check-label" for="inlineCheckbox2">Java</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="Python" <?php if(in_array("Python", $lang)) {?> checked="checked"<?php } ?>>
            <label class="form-check-label" for="inlineCheckbox2">Python</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="Checkbox1" name="lang[]" value="PHP" <?php if(in_array("PHP", $lang)) {?> checked="checked"<?php } ?>>
            <label class="form-check-label" for="inlineCheckbox2">PHP</label>
          </div>
          <?php
    }
          ?>
          </div>
    <div class="col-sm-3">
    <label class="form-check-label" for="inlineCheckbox2"><?php echo $errlang;?></label><span id="langErrorMsg"></span>
    </div>
    </div>
  </div>

           <div class="form-group">
           <div class="row">
           <div class="col-sm-3">
           <label for="exampleFormControlInput1">Gender</label>
           </div>
           <div class="col-sm-9">
           <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="gender" name="MyRadio" value="male" checked = "true">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="gender" name="MyRadio" value="female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="gender" name="MyRadio" value="other">
                <label class="form-check-label" for="inlineRadio2">Other</label>
              </div>
              <span id="testErrorMsg"></span>
           </div>
           </div>
           
           </div>
        
          <br/>
          <div class="form-group">
          <input id="add_submit" type="button" class="btn btn-primary btn-lg" value="Submit" name = "submit"/>

         <input type="reset" class="btn btn-secondary btn-lg" value="Clear" name = "clear"/> 
          
        </div>
         <br/>

        </form>
      </div>
  
</section>
<div id="divLoading">
 
</div>


<section class="myfooter">
<h3>&copy Soham Satpati <?php echo date('Y');?></h3>
</section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style type="text/css">
       
        .datepicker {
            font-size: 0.875em;
        }
        /* solution 2: the original datepicker use 20px so replace with the following:*/
        
        .datepicker td, .datepicker th {
            width: 1.5em;
            height: 1.5em;
        }

    #divLoading	{

		display : none;
    }

    #divLoading.show{
		display : block;
		position : fixed;
		z-index: 100;
		background-image : url('https://media.giphy.com/media/6036p0cTnjUrNFpAlr/giphy.gif');
		background-color:#E1E1E1;
		opacity : 0.4;
		background-repeat : no-repeat;
		background-position : center;
		left : 0;
		bottom : 0;
		right : 0;
		top : 0;
	}
	#loadinggif.show {left : 50%;
		top : 50%;
		position : absolute;
		z-index : 101;
		width : 32px;
		height : 32px;
		margin-left : -16px;
		margin-top : -16px;
	}
	
</style>

<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        startDate: "01-01-1970",
        endDate: "09-15-2003",
    });
    //$('#datepicker').datepicker("setDate", new Date());
</script>

</body>
</html>

<script>

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

var addr_regex = /^(\w*\s*[\#\-\,\/\.\(\)\&]*)+$/;

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
  
  var email = $("#email").val();
  $.ajax({
   url: 'check_email.php',
   method: "POST",
   data:{email:email},
   success:function(data){
     if(data != '0'){
       $('#emailErrorMsg').html("Email not Available").css("color","red");
   }else{
    $('#emailErrorMsg').html("Email Available").css("color","green");
   }
  }
  });

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
  
  else if((!addr.match(addr_regex)) || (addr.length < 3)){
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

$("#form1").on("click","#add_submit",function(){

  var fname  = $("#fname").val();
  var mname  = $("#mname").val();
  var lname  = $("#lname").val();
  var email  = $("#email").val();
  var pass   = $("#pass").val();
  var repass = $("#repass").val();
  var addr   = $("#address").val();
  var mobile = $("#mobile").val();
  var dob    = $("#datepicker").val();

  var lang = [];
  $('input[name="lang[]"]:checked').each(function(){
    lang.push($(this).val());
});
 lang = lang.toString();
  var gender = $('input[name="MyRadio"]:checked').val();

 // $(".form-control").html('');
  
  if((fname == "" || fname == null) && (lname == "" || lname == null) && (email == "" || email == null) && (pass == "" || pass == null) && (repass == "" || repass == null) && (addr == "" || addr == null) && (mobile == "" || mobile == null) && (dob == "" || dob == null) && (lang == "" || lang == null)){

    $("#fnameErrorMsg").html("*First name required!").css("color", "red");
    $("#lnameErrorMsg").html("*Last name required!").css("color", "red");
    $("#emailErrorMsg").html("*Email required!").css("color", "red");
    $("#passErrorMsg").html("*Password required!").css("color", "red");
    $("#repassErrorMsg").html("*Repassword required!").css("color","red");
    $("#addressErrorMsg").html("*Address is required!").css("color","red");
    $("#mobileErrorMsg").html("*Mobile number is required").css("color","red");
    $("#dobErrorMsg").html("*Dob is required").css("color","red");
    $("#langErrorMsg").html("*lang is required").css("color","red");
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
     $("#divLoading").addClass('show');
    $.ajax({
        type: "POST",
        url: "./include/ajaxSubmission.php",
        //contentType: "application/json",
        //dataType: "json",
        data: {
            fname: fname,
            mname: mname,
            lname: lname,
            email: email,
            mobile: mobile,
            pass: pass,
            address: addr,
            dob: dob,
            gender: gender,
            lang: lang//JSON.stringify(lang)
        },

        success: function(response){
          //$("#form1")[0].reset();
         // $(".form-control").html('');
          $("#divLoading").removeClass('show');
          $("#add_submit").attr('disabled',false);
          window.location.replace('http://localhost/projects/phppractice/index3.php');
          
        },
        
        error: function(response) {
            console.log(response);
        }
    });
     //return true;
  }

  

});
});


</script>