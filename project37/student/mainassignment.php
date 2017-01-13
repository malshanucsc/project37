<link rel="stylesheet" type="text/css" href="../stylesheet.css">



<h1>&nbsp&nbsp&nbsp&nbsp&nbspAssignments</h1>

<div id="content-list">

<?php

//including db file

include '../db.php';


//session variables for assinment

$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

//selecting the assignment list for student id,batch,course and published

$sql = "SELECT assignment_Id FROM give_assignment WHERE course_Id='$courseforAssignment;' AND batch_No='$batch_No' AND published!='0'";

//taking result set


$result = $conn->query($sql);

if ($result->num_rows > 0) {


//if there are any assinments that are published

  while($row= $result->fetch_assoc() ) {
    $assignment_IDfordefault=$row['assignment_Id'];

//selecting assignment details

    $sql2 = "SELECT assignment_title FROM assignment WHERE assignment_Id ='$assignment_IDfordefault' ";
    $result2 = $conn->query($sql2);

//if there are assigment details and if the query is okay

    if ($result2->num_rows > 0) {
    ?>
      
      <?php
      while($row2= $result2->fetch_assoc() ) {
 
//fetching assignment details  , Assignment lists is shown one by one    
   
      ?>
        
        <li id="assignmentname"><a href= "student_Assignment/assignmentviewmain.php?asid=<?php echo $assignment_IDfordefault; ?> " target="_parent" ><?php echo $row2['assignment_title'] ;?></a></li>
        <br>
     
        <?php
      
      }
      ?>  
      <?php
    }
  }
}else{
//if there are no assignments published
  ?>
  <h3 style="margin-left:20%; color:red; "><?php echo"No assignments published";?></h3><br>
  <?php
}
?>

</div>
<br>
<br>
