<?php
require_once "dbconn.php";
echo "this is DELETE page <br/>";
$id = $conn->real_escape_string( $_GET['id']);
$flag1 = $flag2 = false;

$sql1 = "DELETE FROM user where id = '$id'";
$sql2 = "DELETE FROM temp_user where id = '$id'";
if (($conn->query($sql1) === TRUE) && ($conn->query($sql2) === TRUE)) {
    //echo "New record created successfully";
    header("Location:userDetails.php");
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
?>