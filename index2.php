<?php
include "./include/header.php";
require 'validation.php';

$errfname = $errlname= $erremail = $errpass = $err_repass = $erraddr = $errmobile = $errgender = $errdob = $errlang = "";

$fname = $mname = $lname = $email = $pass = $repass = $addr = $mobile = $dob = $gender =  $lang ="";

$flag = false;

if(isset($_POST['submit'])){

  if(empty($_POST['fname']) ){
    $errfname = dispInpErrorMsg("First Name is Required");
      }
      else {
          $fname = validation($_POST['fname']);
      }

  if(empty($_POST['lang'])){
    echo "";
    $errlang = dispInpErrorMsg("Please choose any one");
    
  }
  else{
    $lang = $_POST["lang"];
  }

    $pass = md5($pass);

      $userData = array();

      if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass) &&!empty($repass) && !empty($addr) && !empty($mobile) && !empty($dob) && !empty($lang) && !empty($gender)){

            $flag = true;
            $userData = array(
                  "fname" => $fname,
                  "mname" => $mname,
                  "lname" => $lname,
                  "email" => $email,
                  "pass" => $pass,
                  "addr" => $addr,
                  "mobile" => $mobile,
                  "dob" => $dob,
                  "lang" => $lang,
                  "gender" => $gender
            );
           // header( "refresh:5;URL=process_customer.php?str=".urlencode(serialize($userData)) );  
             header("Location:process_customer.php?str=".urlencode(serialize($userData)));
             }
}
?>

<section class="myheader">
<h2><?php echo "Registration Form";?></h2>
</section>
<section class="maincontent">
<div class="container">
        <form method='post' id="form1" >
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
        <div class="row">
    <div class="col">
      
      <input type="text" class="form-control" name = "fname" id = "fname" placeholder="First name" value = "<?php echo $fname;?>"><?php echo $errfname;?>
      <span id="fnameErrorMsg"></span>
    </div>
    <div class="col">
      <input type="text" class="form-control" name = "mname" placeholder="Middle name" value = "<?php echo $mname;?>">
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
          </div>

          <div class="form-group">
        <div class="row">    
    <div class="col">
    <label for="exampleFormControlInput1">Mobile</label>
      <input type="tel" class="form-control" id = "mobile" name = "mobile" placeholder="123-4567-890" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" value = "<?php echo $mobile;?>"><small>Format: 123-4567-890</small>
    </div>

    <div class="col">
    <label for="exampleFormControlInput1">Date of birth</label>
    <i class="bi bi-calendar-date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
  <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg></i>
    <input data-date-format="dd/mm/yyyy" id="datepicker" class="form-control" name = "datepicker" placeholder="Choose Date of Birth" autocomplete = "off" value = "<?php echo $dob;?>">
    
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
    <label class="form-check-label" for="inlineCheckbox2"><?php echo $errlang;?></label>
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
                <input class="form-check-input" type="radio" id="inlineRadio1" name="MyRadio" value="male" checked = "true">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio2" name="MyRadio" value="female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio2" name="MyRadio" value="other">
                <label class="form-check-label" for="inlineRadio2">Other</label>
              </div>
           </div>
           </div>
           
           </div>
        
          <br/>
          <div class="form-group">
          <input id="add_submit" type="submit" class="btn btn-primary btn-lg" value="Submit" name = "submit"/>

         <input type="reset" class="btn btn-secondary btn-lg" value="Clear" name = "clear"/> 
          
        </div>
         <br/>

        </form>
      </div>

   
</section>
<?php
include "./include/footer.php";
?>