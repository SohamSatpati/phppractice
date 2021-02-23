
<?php require_once "dbconn.php";
include "./include/header.php";
?>

<section class="myheader">
<h2><?php echo "User details";?></h2>
</section>

<section class="maincontent">

<div class="container">
<form method="post">

<p class="text-right"> 
<a href="index.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-plus"> Add</span>
        </a>
</p>
<div id="load_data">   
<table class="table table-striped table-condensed table-bordered">
    <thead>
      <tr>
        
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>D.O.B</th>
        <th>Language</th>
        <th>Gender</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
    </table>
</form>
</div>
</div><div id = "load_data_msg"></div>
</section>


<script>
$(document).ready(function(){
 var limit = 4;
 var start = 0;
 var action = false;

 function load_user_data(limit,start){
 $.ajax({
 url: 'fetch.php',
 method: "POST",
 data:{
   limit: limit,
   start: start  
 },
 cache: false,
 success: function(data){
     console.log(data);
  $('#load_data').append(data);

  if(!$.trim(data)){
    $('#load_data_msg').html("<p>No More data found!</p>").css("color","red"); 
    action = true; 
    
  }
  else{
      $('#load_data_msg').html("<p>Please Wait...</p>").css("color","green");
      action = false;
  }    
 }
 });    
 }
 if(action == false){
     action = true;
     load_user_data(limit,start);
 }
 $(window).scroll(function(){
 if($(window).scrollTop() + $(window).height() > $('#load_data').height() && action == false){
     action = true;
     start = start + limit;
     setTimeout(function(){
     load_user_data(limit,start);
     }, 1000);
 }
 });
});
</script>
<?php
$conn->close();
include "./include/footer.php";
?>
