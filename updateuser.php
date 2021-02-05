<?php
include "./include/header.php";
require 'validation.php';
require_once "dbconn.php";

$errfname = $errlname= $erremail = $errpass = $err_repass = $erraddr = $errmobile = $errgender = $errdob = $errlang = "";

$fname = $mname = $lname = $email = $pass = $repass = $addr = $mobile = $dob = $gender =  $lang ="";

$flag = false;

$id = $_GET['id'];

if(isset($_POST['back'])){
  header("Location: userDetails.php");
}

if(isset($_POST['update'])){

  if(empty($_POST['name']) ){
      $errfname = "<span style = 'color:red'>*Full Name is Required!</span>";
     
      }
      else {
          $fname = validation($_POST['name']);
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

         

         if(empty($_POST['address'])){
           $erraddr = "<span style = 'color:red'>*Please enter address </span> ";
         }
         else{
           $addr = validation($_POST["address"]);
         }
         
         if(empty($_POST['mobile'])){
          $errmobile = "<span style = 'color:red'>*Please enter mobile no </span> ";
        }
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
        //print_r($_POST['lang']);
        if(!isset($_POST['lang']) || empty($_POST['lang'])){
          $errlang = "<span style = 'color:red'>*Please choose any one </span> ";
          $lang = "";
        }
        else{
          $lang = $_POST["lang"];
          $lang = json_encode($lang);
        }

        

        $gender = $_POST['MyRadio'];
        
        if(!empty($fname) && !empty($email) && !empty($addr) && !empty($mobile) && !empty($dob) && !empty($lang) && !empty($gender)){

          $sql = "UPDATE user SET name='$fname',email='$email',address='$addr', mobile='$mobile',dob='$dob',lang='$lang',gender='$gender' WHERE id='$id'";

          if ($conn->query($sql) === TRUE) {
            //echo "REcord updated";
           
            echo "<script language=Javascript>document.location.href='userDetails.php'</script>";
          } else {
            echo "Error updating record: " . $conn->error;
          }
        }

}


$sql = "SELECT * FROM user where id = '$id'";
$result = $conn->query($sql);

?>
<script type="text/javascript" src="./js/myscript.js">
</script>

<section class="myheader">
<h2><?php echo "My Update Form";?></h2>
</section>
<section class="maincontent">
<div class="container">
        <form method='post' name="form2" >

<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>

            <div class="form-group">
            <label for="exampleFormControlInput1">Full name</label>

            <input type="text" class="form-control" id="name" placeholder="Enter your name" autocomplete="on" name="name" value="<?php echo $row['name'];?>">
            <?php echo $errfname;?>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="text" class="form-control" id="email" placeholder="name@example.com" autocomplete="on" name="email" value="<?php echo $row['email'];?>">
            <?php echo $erremail;?>
          </div>

          <div class="form-group">
            <label for="textarea">Address</label>
            <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter your Home address"><?php echo $row['address'];?></textarea><?php echo $erraddr;?>
          </div>

          <div class="form-group">
        <div class="row">    
    <div class="col">
    <label for="exampleFormControlInput1">Mobile</label>
      <input type="tel" class="form-control" name = "mobile" placeholder="123-4567-890" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" value="<?php echo $row['mobile'];?>"><?php echo $errmobile;?><small>Format: 123-4567-890</small>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Date of birth</label>
    <i class="bi bi-calendar-date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
  <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg></i>
    <input data-date-format="dd/mm/yyyy" id="datepicker" class="form-control" name = "datepicker" placeholder="Choose Date of Birth" autocomplete = "off" value="<?php echo $row['dob'];?>">
    <?php echo $errdob;?>
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
    if(!empty($row["lang"])){//echo "Hiiiii";
    $arr = json_decode($row["lang"], TRUE);
    }else{
      $arr = array();
    }
    // foreach($arr as $key=>$value){
    //   echo $value.",";
    // }
    //echo count($arr);
    if(count($arr) > 0){
    ?>
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" <?php if(in_array("C", $arr)) {?> checked="checked"<?php } ?> name="lang[]" value="C"/>
            <label class="form-check-label" for="inlineCheckbox1">C</label>
          </div>

          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" <?php if(in_array("Cpp", $arr)) {?> checked="checked"<?php } ?> name="lang[]" value="Cpp"/>
            <label class="form-check-label" for="inlineCheckbox1">Cpp</label>
          </div>

          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" <?php if(in_array("Java", $arr)) {?> checked="checked"<?php } ?> name="lang[]" value="Java"/>
            <label class="form-check-label" for="inlineCheckbox1">Java</label>
          </div>

          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" <?php if(in_array("Python", $arr)) {?> checked="checked"<?php } ?> name="lang[]" value="Python"/>
            <label class="form-check-label" for="inlineCheckbox1">Python</label>
          </div>

          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" <?php if(in_array("PHP", $arr)) {?> checked="checked"<?php } ?> name="lang[]" value="PHP"/>
            <label class="form-check-label" for="inlineCheckbox1">PHP</label>
          </div>
          <?php
    }
     if(empty($row['lang'])){
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
           <?php
           if($row['gender'] == "male"){
           ?>
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
              <?php
           }
           else if($row['gender'] == "female"){
              ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio1" name="MyRadio" value="male" >
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio2" name="MyRadio" value="female" checked = "true">
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio2" name="MyRadio" value="other">
                <label class="form-check-label" for="inlineRadio2">Other</label>
              </div>
              <?php
           }
           else if($row['gender'] == "other"){
           
              ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio1" name="MyRadio" value="male" >
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio2" name="MyRadio" value="female" >
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio2" name="MyRadio" value="other" checked = "true">
                <label class="form-check-label" for="inlineRadio2">Other</label>
              </div>
              <?php
           }
            ?>
           </div>
           </div>
           </div>
        
          <br/>
          <div class="form-group">
          <div class="row">
           <div class="col-sm-3">
           </div>
           <div class="col-sm-6">
           <input type="submit" class="btn btn-primary btn-lg" value="Update" name = "update"/>
           <button type="submit" class="btn btn-dark btn-lg" name="back">Back</button>
           </div>
           <div class="col-sm-3">
           </div>
           </div>
        </div>
         <br/>

        </form>
      </div>

   
</section>
<?php
}
} 
else {
  echo "0 results";
}


include "./include/footer.php";
$conn->close();
?>