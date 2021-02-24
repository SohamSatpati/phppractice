<?php
session_start();

if(isset($_POST['type']) && $_POST['type'] == 'ajax'){
    
    if(time()- $_SESSION['LAST_LOGIN_TIME'] > 10){
        echo "logout";
    }
}else{
    if(isset($_SESSION['LAST_LOGIN_TIME'])){
    if(time()- $_SESSION['LAST_LOGIN_TIME'] > 10){
        header("location:logout.php");
        die();
    }
   }
$_SESSION['LAST_LOGIN_TIME'] = time();
}

//print_r($_SESSION);
?>