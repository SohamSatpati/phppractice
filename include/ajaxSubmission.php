<?php
sleep(3);
require ('C:\xampp\htdocs\projects\phppractice\dbconn.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


$name = ucfirst($_POST['fname'])." ".ucfirst($_POST['mname'])." ".ucfirst($_POST['lname']);

//echo $name. "<br/>";
$email = $_POST['email'];
//echo $email ."<br/>";
$pass = $_POST['pass'];
$pass = md5($pass);
//echo $pass;

$addr = $_POST['address'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$lang = $_POST['lang'];
//$lang = json_encode($lang);
//$lang = base64_encode(serialize($lang));
$gender = $_POST['gender'];
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
    echo "data inserted successfully";
     // echo "<script>window.location.href = 'http://localhost/projects/phppractice/userDetails.php';</script>";
    //header("Location: http://localhost/projects/phppractice/userDetails.php");
    
  }
  
  $conn->close();
  
?>