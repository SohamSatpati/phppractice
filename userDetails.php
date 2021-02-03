<style>
.pagination {   
    display: inline-block;   
}   
.pagination a {   
    font-weight:bold;   
    font-size:18px;   
    color: black;   
    float: left;   
    padding: 8px 16px;   
    text-decoration: none;   
    border:1px solid black;   
}   
.pagination a.active {   
        background-color: pink;   
}   
.pagination a:hover:not(.active) {   
    background-color: skyblue;   
}
</style>
<?php require_once "dbconn.php";
include "./include/header.php";
?>
<?php
$status = $flag1 = $flag2= false;

        $per_page_record = 4;  // Number of entries to show in a page.   
        // Look for a GET variable page if not found default is 1.        
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;     
    
        // $query = "SELECT * FROM user LIMIT $start_from, $per_page_record";     
        // $rs_result = mysqli_query ($conn, $query); 

$sql = "SELECT t.id,t.status, u.name, u.email, u.address, u.mobile, u.dob, u.lang, u.gender FROM temp_user t, user u WHERE t.id = u.user_id LIMIT $start_from, $per_page_record";

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
        <a href="deleteuser.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')">
        <button type="button" class="btn btn-danger btn-sm">Delete</button>
        </a>
        </td>
      </tr>
      <?php
  }
} else {
  echo "0 results";
}

  ?>
    </tbody>
  </table>
  <div class="pagination">

  <?php
    $query = "SELECT COUNT(*) FROM user";     
    $rs_result = mysqli_query($conn, $query);     
    $row = mysqli_fetch_row($rs_result);     
    $total_records = $row[0];
    $total_pages = ceil($total_records / $per_page_record);     
    $pagLink = "";
    if($page>=2){   
      echo "<a href='userDetails.php?page=".($page-1)."'>  Prev </a>";   
  }       
             
  for ($i=1; $i<=$total_pages; $i++) {   
    if ($i == $page) {   
        $pagLink .= "<a class = 'active' href='userDetails.php?page="  
                                          .$i."'>".$i." </a>";   
    }               
    else  {   
        $pagLink .= "<a href='userDetails.php?page=".$i."'>   
                                          ".$i." </a>";     
    }   
  }    
  echo $pagLink;   

  if($page<$total_pages){   
      echo "<a href='userDetails.php?page=".($page+1)."'>  Next </a>";   
  }   

      
  ?>
           

</div>

  </form>
</div>
</section>
<?php
$conn->close();
include "./include/footer.php";
?>
