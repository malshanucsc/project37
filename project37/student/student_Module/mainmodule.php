<link rel="stylesheet" type="text/css" href="../../stylesheet.css">




<h1>&nbsp&nbsp&nbsp&nbsp&nbspLessons</h1>
<div id="content-list">

<?php


include 'db.php';
$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
$sql = "SELECT module_Id,published FROM follow_module WHERE course_Id='$courseforAssignment' AND batch_No='$batch_No' AND published!='0'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row= $result->fetch_assoc() ) {

    $mo_ID=$row['module_Id'];
    $sql2 = "SELECT module_Title FROM module WHERE module_Id='$mo_ID'";
    $result2 = $conn->query($sql2);

      if ($result2->num_rows > 0) {
        ?>    
        <?php
        while($row2= $result2->fetch_assoc() ) {
          ?>

          <?php 
         // if($row2['link']!=''){
            ?>
            <li><a  href= "moduleviewmain.php?moduleID=<?php echo $mo_ID; ?> " target="_parent" > <?php echo $row2['module_Title'] ;?></a></li>
            <?php
            


            ?>
           
            <br>
            <?php
          //}
          ?>
       
          <?php
        
        }
        ?> 
        <?php
      }
    }
  }else{
    ?>
      <h3 style="margin-left:20%; color:red; "> <?php echo"No Lessons published";?></h3><br>
    <?php
  }
?>
</div>
<br>
<br>

