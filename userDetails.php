<?php require_once "dbconn.php";
include "./include/header.php";
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>
<body>
<div class="jumbotron">
  <div class="container">
  <h1 class="display-4">User Details</h1>      
  <p class="text-lg-left">Left aligned text on viewports sized LG (large) or wider.</p>
  </div>
</div>
-->
<?php
$status = $flag1 = $flag2= false;


$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if(isset($_POST['add'])){
  echo "<script language=Javascript>document.location.href='index.php'</script>";
}

?>
<section class="myheader">
<h2><?php echo "User details";?></h2>
</section>
<section class="maincontent">
<div class="container">
<form method="post"> 
<button type="submit" class="btn btn-light" name="add" value="add">Add</button>         
  <table class="table table-bordered">
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
    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        
        //echo "id: " . $row["id"]. "  Name: " . $row["name"]. " Email " . $row["email"]. "<br>";   
       
    ?>
      <tr>
        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["email"];?></td>
        <td><?php echo $row["address"];?></td>
        <td><?php echo $row["mobile"];?></td>
        <td><?php echo $row["dob"];?></td>
        <td>
        <?php
        $arr = json_decode($row["lang"], TRUE);
        if (is_array($arr) || is_object($arr)){
        foreach($arr as $key=>$value){
          echo $value.",";
        }
      }
        ?>
         </td>
        <td><?php echo $row["gender"];?></td>
        <td>status goes here</td>
        <td>
        <a href="updateuser.php?id=<?php echo $row['id'];?>">
        <button type="button" class="btn btn-primary btn-sm" formaction="">Update</button>
        </a>

        <button type="button" class="btn btn-warning btn-sm">Change</button>
        <button type="button" class="btn btn-success btn-sm">Success</button>

        <a href="deleteuser.php?id=<?php echo $row['id'];?>">
        <button type="button" class="btn btn-danger btn-sm">Delete</button>
        </a>
        </td>
      </tr>
      <?php
  }
} else {
  echo "0 results";
}
$conn->close();
  ?>
    </tbody>
  </table>
  </form>
</div>
</section>
<?php
include "./include/footer.php";
?>
