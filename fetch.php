<?php
include_once "dbconn.php";

if(isset($_POST['limit'], $_POST['start'])){

    $start_from = $_POST['start'];
    $limit = $_POST['limit'];

    

    $sql = "SELECT t.id,t.status, u.name, u.email, u.address, u.mobile, u.dob, u.lang, u.gender FROM temp_user t, user u WHERE t.id = u.user_id  ORDER BY t.id DESC LIMIT $start_from, $limit";

    $result = $conn->query($sql);
    
}
?>
    <?php
    
      // output data of each row
      while($row = $result->fetch_assoc()) {   
       
    ?>
      <tr>
        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["email"];?></td>
        <td><?php echo $row["address"];?></td>
        <td><?php echo $row["mobile"];?></td>
        <td><?php echo $row["dob"];?></td>

        <td>
        <?php
        // $arr = json_decode($row["lang"], TRUE);
        $arr = $row["lang"];
        $arr = explode(",",$arr);
      //remove the last comma from a PHP foreach loop
      //process-1:
        $lang_array = array();
        if (is_array($arr) || is_object($arr)){
        foreach ($arr as $val) {
            array_push($lang_array, $val);
          }
        echo implode(", ", $lang_array);
        }

        /*
        //Process-2:
        $num_of_items = count($arr);
        $num_count = 0;
       

        if (is_array($arr) || is_object($arr)){
          foreach ($arr as $val) {
            echo $val;
            $num_count = $num_count + 1;
            if ($num_count < $num_of_items) {
              echo ", ";
            }
          }
      }
      */
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

  ?>
    
  