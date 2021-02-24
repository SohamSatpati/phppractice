<?php
require "user_auth.php";
require_once 'dbconn.php';


if(isset($_SESSION['IS_LOGIN'])){
 $id = $_SESSION['id'];
$sql = "SELECT *FROM user WHERE user_id = '$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
}
}
else{
?>
<script>
		window.location.href='index3.php';
	</script>
<?php
}
?>
<a href="logout.php">Logout</a> <br/>
<a href="dashboard.php">Dashboard</a>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
setInterval(function(){
 check_user();
},2000);

function check_user(){
$.ajax({
  url:'user_auth.php',
  type: 'post',
  data: 'type=ajax',
  success: function(result){
   if(result == 'logout'){
       alert("Your Session expired. Login again");
       window.location.href = 'logout.php';
   }
  }
});
}
</script>