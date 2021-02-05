<?php
require_once "dbconn.php";

$str_arr = unserialize(urldecode($_GET['str']));
// echo "<pre>";
// print_r($str_arr);
// echo "</pre>";
// echo "<br/>";

$name = ucfirst($str_arr['fname'])." ".ucfirst($str_arr['mname'])." ".ucfirst($str_arr['lname']);

//echo $name. "<br/>";
$email = $str_arr['email'];
//echo $email ."<br/>";
$pass = $str_arr['pass'];
//echo $pass;

$addr = $str_arr['addr'];
$mobile = $str_arr['mobile'];
$dob = $str_arr['dob'];
$lang = $str_arr['lang'];
$lang = json_encode($lang);
//$lang = base64_encode(serialize($lang));
$gender = $str_arr['gender'];
//var_dump($lang);
//echo "Welcome  {$addr} {$mobile} {$dob} {$gender}";
$status = 1;
$flag1 = $flag2 = false;

$sql = "INSERT INTO temp_user (email, pass, status) VALUES ('$email','$pass','$status')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $flag1 = true;
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  
 $stmt = "INSERT INTO user (user_id,name,email,password,address,mobile,dob,lang,gender) VALUES ('$last_id','$name','$email','$pass','$addr','$mobile','$dob','$lang','$gender')";

 

 if ($conn->query($stmt) === TRUE) {
    //echo "New record created successfully";
    $flag2 = true;
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  if($flag1 == true && $flag2 == true){
    header("Location:userDetails.php");
  }
  
  $conn->close();
  
?>