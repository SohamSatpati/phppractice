<?php

 function validation($data){
    $data = htmlentities($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data;
  }
  
  function dispInpErrorMsg($msg){
    $actualMsg = "<span style = 'color:red'>*{$msg}!</span>";
    return $actualMsg;
  }
?>