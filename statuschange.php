<?php
require_once "dbconn.php";
echo "this is status change page <br/>";
$id = $_GET['id'];
$statuspassed = $_GET['status'];
echo "id: ".$id."status:{$statuspassed}";
// $flag1 = $flag2 = false;

if($statuspassed == 1){
    $sql = "UPDATE temp_user SET status = '0' where id = '$id'";
}
if($statuspassed == 0){
    $sql = "UPDATE temp_user SET status = '1' where id = '$id'";
}

if (($conn->query($sql) === TRUE)) {
    //echo "New record created successfully";
    header("Location:userDetails.php");
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
?>