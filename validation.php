<?php

 function validation($data){
    $data = htmlentities($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data;
  }

?>