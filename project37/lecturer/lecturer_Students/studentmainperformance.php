<style>
/*table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

/*tr:nth-child(even){background-color: #DEFCC6     }*/

/*th {
    background-color: #229954  ;
    color: white;
}

#avg{
  background-color: #C6FCD1  ;
  color: black;
}

h1{
  font-size: 30px;
  color: #084214;
  text-decoration: none;
  padding-left: 10px;
}
h3{
  color: #084214;
  padding-left: 10px;

}**//

</style>



<div id="std_pform">
<h1>Assignments</h1>
<?php
include 'db.php';
$quizavg=$assignavg=0;
$User_IDforPerformance=$_SESSION['username'];

$courseforPerformance=$_SESSION['Course_ID'];
$totalasignmark=0;
$asgncount=0;
$sql = "SELECT * FROM do_assignment WHERE course_Id='$courseforPerformance' AND user_ID='$stid'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
  <table>
  <tr>
  
  <th>Assignment Title</th>
  <th>Marks</th>
  </tr>

	<?php
  while($row= $result->fetch_assoc() ) {
    $asgnId=$row['assignment_Id'];
    $sql2 = "SELECT * FROM assignment WHERE assignment_id='$asgnId'";
    $result2 = $conn->query($sql2);
    $row2= $result2->fetch_assoc();
  	?>
   
    <tr>
    
    <td><?php echo $row2['assignment_title']; ?></td>
    <td><?php echo $row['marks']; ?></td>
    </tr>

    <?php
    $totalasignmark=$totalasignmark+ $row['marks'];
    $asgncount=$asgncount+1;
      
  }
	?>
 <tr>
    <th id="avg">Average Assignment Marks</th>
  
    <td id="avg"><b><?php echo $totalasignmark/$asgncount; ?></b></td>
  </tr>
  </table> 
  
  
  <?php
  $assignavg=$totalasignmark/$asgncount;
  }else{
  ?>
  <h3>No assignments published.</h3>
<?php
}



  ?>

















  <br><h1>Quiz Marks</h1><br>
  
  <?php
  $sql = "SELECT * FROM do_quiz WHERE course_Id='$courseforPerformance' AND user_Id='$stid' AND batch_No=$batch_No";
  $result = $conn->query($sql);
  $totalquizmark=0;
  $quizcount=0;

  if ($result->num_rows > 0) {
  ?>
    
    <table>
    <tr>
      
      <th>Quiz Title</th>
      <th>Marks</th>
    </tr>

    <?php
    while($row= $result->fetch_assoc() ) {
  
      $modId=$row['module_Id'];
      $sql2 = "SELECT Qname FROM quiz WHERE Course_Id=$courseforPerformance AND module_Id=$modId AND batch_No=$batch_No AND Published=1";
      $result2 = $conn->query($sql2);
      $row2= $result2->fetch_assoc();
 
      ?>
      <tr>
      
      <td><?php echo $row2['Qname']; ?></td>
      <td><?php echo $row['marks']; ?></td>
      </tr>
    
      <?php
      $totalquizmark=$totalquizmark+ $row['marks'];
      $quizcount=$quizcount+1;
    }
    ?> 



     <tr>
      <th id="avg">Average Quiz Marks</th>
      
      <td id="avg"><b><?php echo $totalquizmark/$quizcount; ?></b></td>
    </tr>
    </table>
    

       
  
    <?php
    $quizavg=$totalquizmark/$quizcount;
  }else{
  ?>
  <h3>No quizes published.</h3>
<?php
}
?>





























<br><h1>Exam Marks</h1><br>

<?php
$sql = "SELECT final_Mcq,final_Practical FROM course_follow WHERE course_Id='$courseforPerformance' AND user_Id='$stid'";
$result = $conn->query($sql);
$totalexammark=0;

if ($result->num_rows > 0) {
  ?>
  
  <?php
  while($row= $result->fetch_assoc() ) {
       
    ?>
    <table>
    <tr>
    <th>Exam Name</th>
    <th>Marks</th>
    </tr>
    <tr>
    <td>Final MCQ</td>
    <td><?php echo $row['final_Mcq']; ?></td>
    </tr>
    <tr>
    <td>Final Practicle</td>
    <td><?php echo $row['final_Practical']; ?></td>
    </tr>
 <?php
    $totalexammark=$row['final_Mcq'] +$row['final_Practical'] ;
  }
  ?> 
    <tr>
      <th id="avg">Average Exam Marks</th>
      <td id="avg"><b><?php echo $totalexammark/2; ?><b></td> 
    </tr>




    </table>         
    

  <br>

  <h3>Course Average Without Exam<span> <?php echo ($quizavg + $assignavg)/2; ?></span></h3>
  <h3>Course Average With Exam<span><?php echo ($totalexammark/2 +$quizavg + $assignavg)/3; ?></span></h3>
    <?php
   
}else{
  ?>
  <h3>No details in final exam.</h3>
<?php
}

?>

</div>