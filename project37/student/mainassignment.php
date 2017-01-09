<link rel="stylesheet" type="text/css" href="css/assignment.css">
<h1>&nbsp&nbsp&nbsp&nbsp&nbspAssignments</h1>

<?php


include '../db.php';



$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

$sql = "SELECT assignment_Id FROM give_assignment WHERE course_Id='$courseforAssignment;' AND batch_No='$batch_No' AND published!='0'";




//$sql = "SELECT assignment_Id,deadline,link FROM do_assignment WHERE course_Id='$courseforAssignment;' AND user_Id='$UserIDfordefault'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?> 
  
  <?php
  while($row= $result->fetch_assoc() ) {
    $assignment_IDfordefault=$row['assignment_Id'];
    //$_SESSION['assign_ID']=$assignment_IDfordefault;

   // $date=$row['deadline'] ;
    //$_SESSION['date']=$date;
    $sql2 = "SELECT assignment_title FROM assignment WHERE assignment_Id ='$assignment_IDfordefault' ";
    $result2 = $conn->query($sql2);


    if ($result2->num_rows > 0) {
    ?>
      
      <?php
      while($row2= $result2->fetch_assoc() ) {
       
      ?>
        
        <li id="assignmentname"><h3><a style="padding-top:5%;" href= "assignmentviewmain.php?asid=<?php echo $assignment_IDfordefault; ?> " target="_parent" ><?php echo $row2['assignment_title'] ;?></a><h3></li>
        <br>
     
        <?php
      
      }
      ?>  
      <?php
    }
  }
}else{
  ?>
  <h3 style="margin-left:20%; color:red; "><?php echo"No assignments published";?></h3><br>
  <?php
}
?>
<br>
<br>
