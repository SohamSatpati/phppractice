<?php
include_once "dbconn.php";
if(isset($_POST['email'])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $query = "SELECT email FROM user WHERE email = '".$email."'";
  $result = mysqli_query($conn, $query);
  echo mysqli_num_rows($result);
}
?>