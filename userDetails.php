<?php require_once "dbconn.php";
include "./include/header.php";
?>
<?php
$status = $flag1 = $flag2= false;

$sql = "SELECT t.id,t.status, u.name, u.email, u.address, u.mobile, u.dob, u.lang, u.gender FROM temp_user t, user u WHERE t.id = u.user_id ";

$result = $conn->query($sql);

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
      <td><?php echo $row["status"];?></td>

        <td>
        <a href="updateuser.php?id=<?php echo $row['id'];?>">
        <button type="button" class="btn btn-primary btn-sm" formaction="">Update</button>
        </a>

       <?php
       if($row["status"] == 1){
       ?>
       <a href="statuschange.php?id=<?php echo $row['id'];?>&status=<?php echo $row["status"];?>">
        <button type="button" class="btn btn-success btn-sm">Active</button>
        </a>
        <?php
        }
        if($row["status"] == 0){
        ?>
        <a href="statuschange.php?id=<?php echo $row['id'];?>&status=<?php echo $row["status"];?>">
        <button type="button" class="btn btn-warning btn-sm">Inactive</button>
        </a>
        <?php
        }
        ?>
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
