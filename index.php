<?php
include "./include/header.php";
require 'validation.php';

$errfname = $errlname= $erremail = $errpass = $err_repass = $erraddr = $errmobile = $errgender = $errdob = $errlang = "";

$fname = $mname = $lname = $email = $pass = $repass = $addr = $mobile = $dob = $gender =  $lang ="";

$flag = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty($_POST['fname']) ){
        $errfname = "<span style = 'color:red'>*First Name is Required!</span>";
       
        }
        else {
            $fname = validation($_POST['fname']);
        }
        
        $mname = validation($_POST['mname']);

        if(empty($_POST['lname'])){
            $errlname = "<span style = 'color:red'>*Last Name is Required!</span>";
           
            }
            else {
                $lname = validation($_POST['lname']);
                
            }
            if(empty($_POST['email'])){
                $erremail = "<span style = 'color:red'>*Email is Required!</span>";
               }
               else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                $erremail = "<span style = 'color:red'>*Invalid Email format!</span>"; 
              } 
              else{
               $email = validation($_POST['email']); 
              }

           //password validation
              if(!empty($_POST["pass"]) && ($_POST["pass"] == $_POST["repass"])) {
                $pass = validation($_POST["pass"]);
                $repass = validation($_POST["repass"]);

                if (strlen($_POST["pass"]) < 6) {
                    $errpass = "<span style = 'color:red'>*Your Password Must Contain At Least 6 Characters!</span>";
                }
                /*
                elseif(!preg_match("#[0-9]+#",$password)) {
                    $errpass = "<span style = 'color:red'>*Your Password Must Contain At Least 1 Number!</span>";
                }
                elseif(!preg_match("#[A-Z]+#",$password)) {
                    $errpass = "<span style = 'color:red'>*Your Password Must Contain At Least 1 Capital Letter!</span>";
                }
                elseif(!preg_match("#[a-z]+#",$password)) {
                    $errpass = "<span style = 'color:red'>*Your Password Must Contain At Least 1 Lowercase Letter!</span>";
                }*/
            }
            elseif(!empty($_POST["pass"])) {
                $err_repass = "<span style = 'color:red'>*Please Check You've Entered Or Confirmed Your Password!</span>";
            } else {
                 $errpass = "<span style = 'color:red'>*Please enter password </span> ";
            }

           if(empty($_POST['address'])){
             $erraddr = "<span style = 'color:red'>*Please enter address </span> ";
           }
           else{
             $addr = validation($_POST["address"]);
           }
           
           if(empty($_POST['mobile'])){
            $errmobile = "<span style = 'color:red'>*Please enter mobile no </span> ";
          }
          // else if(!filter_var($_POST['mobile'],FILTER_VALIDATE_INT)){
          //   $errmobile = "<span style = 'color:red'>*Please enter numeric digit </span> ";
          // }
          else{
              if(strlen($_POST['mobile']) < 10 || strlen($_POST['mobile']) > 13){
                $errmobile = "<span style = 'color:red'>*Please enter 10 digit mobile no</span> ";
              }
              else{
                $mobile = validation($_POST["mobile"]);
              }
            
          }

          if(empty($_POST['datepicker'])){
            $errdob = "<span style = 'color:red'>*Please enter date of birth </span> ";
          }
          else{
            $dob = validation($_POST["datepicker"]);
          }

          if(empty($_POST['lang'])){
            $errlang = "<span style = 'color:red'>*Please choose any one </span> ";
          }
          else{
            $lang = $_POST["lang"];
          }
          
          $gender = $_POST['MyRadio'];
          $pass = md5($pass);

          $userData = array();
            //var_dump($lang);
        //  var_dump($gender);
             if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass) &&!empty($repass) && !empty($addr) && !empty($mobile) && !empty($dob) && !empty($lang) && !empty($gender)){

            //fname=$fname;&lname=$lname&email=$email&pass=$pass&addr=$addr&mobile=$mobile&dob=$dob&
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
 
 <script type="text/javascript" src="./js/myscript.js">
</script>

<section class="myheader">
<h2><?php echo "Registration Form";?></h2>
</section>
<section class="maincontent">
<div class="container">
        <form method='post' name="form1" >
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
        <div class="row">
    <div class="col">
      
      <input type="text" class="form-control" name = "fname" id = "fname" placeholder="First name"><?php echo $errfname;?>
    </div>
    <div class="col">
      <input type="text" class="form-control" name = "mname" placeholder="Middle name">
    </div>
    <div class="col">
    <input type="text" class="form-control" name = "lname" placeholder="Last name">
    <?php echo $errlname;?>
    </div>
        </div>
  </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>

            <input type="text" class="form-control" id="email" placeholder="name@example.com" autocomplete="on" name="email">
            <?php echo $erremail;?>
          </div>

          <div class="form-group">  
        <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Password</label>
      <input type="password" name = "pass" class="form-control" placeholder="Enter Password"><?php echo $errpass;?>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Retype password</label>
      <input type="password" name = "repass" class="form-control" placeholder="Retype password"><?php echo $err_repass;?>
    </div>
    </div>
  </div> 
          <div class="form-group">
            <label for="textarea">Address</label>
            <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter your Home address"></textarea><?php echo $erraddr;?>
          </div>

          <div class="form-group">
        <div class="row">    
    <div class="col">
    <label for="exampleFormControlInput1">Mobile</label>
      <input type="tel" class="form-control" name = "mobile" placeholder="123-4567-890" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}"><?php echo $errmobile;?><small>Format: 123-4567-890</small>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Date of birth</label>
    <i class="bi bi-calendar-date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
  <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg></i>
    <input data-date-format="dd/mm/yyyy" id="datepicker" class="form-control" name = "datepicker" placeholder="Choose Date of Birth" autocomplete = "off">
    <?php echo $errdob;?>
    </div>
        </div>
        </div>

       
<!--
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Course</label>
                <select class="form-control" id="selectcourse" name="courses">
                <option selected>Choose...</option>
                <option value="c">C</option>
                <option value="cpp">C++</option>
                <option value="java">Java</option>
                <option value="php">PHP</option>
                <option value="python">Python</option>
                </select>
          </div>
          -->

          <div class="form-group">  
        <div class="row">
    <div class="col-sm-3">
    <label for="exampleFormControlInput1">Language Known</label>
    </div>
    <div class="col-sm-6">
    
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
          <input type="submit" class="btn btn-primary btn-lg" value="Submit" name = "submit"/>
         <!-- <button type="submit" class="btn btn-primary" onclick="formSubmit()">Submit</button>-->
          <input type="reset" class="btn btn-secondary btn-lg" value="Clear"/>
          
        </div>
         <br/>

        </form>
      </div>

   
</section>
<?php
include "./include/footer.php";
?>