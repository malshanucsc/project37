 <?php

          ?>



<?php
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<div id="content-list">
 <h3>Currently completed lessons</h3> 
<?php


include '../db.php';




$UserIDfordefault=$_SESSION['username'];


$sql = "SELECT module_Id,published FROM follow_module WHERE course_Id='$courseID' AND batch_No='$batch_No'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    
    
   

     while($row= $result->fetch_assoc() ) {
  
    $mod_Id=$row['module_Id'];
    $sql2 = "SELECT module_Title FROM module WHERE module_Id='$mod_Id'";
    $result2 = $conn->query($sql2);

      if ($result2->num_rows > 0) {
       
        while($row2= $result2->fetch_assoc() ) {
          ?>
    
    
    
    
    

     <li ><a href="lecturer_Quiz/quizmainview.php?modID=<?php echo $mod_Id ?>" ><?php echo $row2['module_Title'] ?></a></li>
<br>
    <?php
      
    }

    ?>  
    <?php
}
}
}
else{
  echo "<h3> No Quizzes available</h3>";
}

?>


</div>





</body>
</html>
