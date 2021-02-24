<?php
session_start();
require_once "dbconn.php";

$msg = '';
if(isset($_POST['submit'])){
$time = time() - 30;   
$ipAdress = getIpAddr(); 
$check_login_row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total_count FROM login_log WHERE try_time > $time and ip_address = '$ipAdress'"));
//print_r($check_login_row);
$total_count = ($check_login_row['total_count']);
if($total_count == 3){
    $msg = "Too many failed login attempts. Please wait 30 secs";
}else{

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);

    $query = "select id from temp_user where email='$email' and  pass='$password'";

    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        
        $msg = "Yes";
        
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $_SESSION['id'] = $id;
        $_SESSION['IS_LOGIN']='yes';
        $_SESSION['LAST_LOGIN_TIME'] = time();
        mysqli_query($conn,"DELETE FROM login_log where ip_address = '$ipAdress'");
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
      //   echo "<script>
      //   window.location.href='dashboard.php';
      //        </script>";
      header("location:dashboard.php");
      die();

    }else{
        
        $total_count++;
        $remain_attm = 3 - $total_count;
        if($remain_attm == 0){
            $msg = "Too many failed login attempts. Please wait 30 secs";
        }else{
            $msg = "Please enter correct details.<br/> {$remain_attm} attempts remaining";
        }
        $trytime = time();
        mysqli_query($conn,"INSERT INTO login_log(ip_address,try_time) VALUES ('$ipAdress','$trytime')");
        
    }
}
}

function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         body {margin: 0;padding: 0;background-color: rgb(243, 243, 243);height: 100vh;}
         #login .container #login-row #login-column #login-box {margin-top: 60px;max-width: 600px;height: 320px;border: 1px solid #9C9C9C;background-color: #EAEAEA;}
         #login .container #login-row #login-column #login-box #login-form {padding: 40px;}
		 #result{color:red;}
            
      </style>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <body>
         <div id="login">
            <h3 class="text-center text-white pt-5"><span style="color: #ea9595;">Login form</span> </h3>
            <div class="container">
               <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                     <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post" >
                           <div class="form-group">
                              <label for="email" class="text-info">Email:</label><br>
                              <input type="text" name="email" id="email" class="form-control" required>
                           </div>
                           <div class="form-group">
                              <label for="password" class="text-info">Password:</label><br>
                              <input type="password" name="password" id="password" class="form-control" required>
                           </div>
                           <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                              <!--<a href="index3.php" class="text-info" style="float: right;">Register here</a>-->
                           </div>
						   <div id="result"><?php echo $msg;?></div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
</html>