<?php
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            session_destroy();
            echo "Your session has expired! <a href='../login.php'>Login here</a>";
        }
        else{
            $_SESSION['start']=time();
          ?>






<html>		
<?php 


include "../db.php";

if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];

	
	$quizId = $_GET['quizId'];
	$mod_Id = $_GET['modID']; 
  $Qname = $_SESSION['Qname'];

	
	?>
<body>


		<form method="post" action="" name="frm">
			<!-- Quiz No: <input type="number" name="qno" value=""/> <br/>
      Quiz Name: <input type="text" name="Qname" value=""/> <br/></br> -->

     
			
			<h3>Select questions to add to the quiz</h3>
			
			<?php







$sql = "SELECT * FROM question where module_Id = '$mod_Id'";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) { 


?>



 <div  class="tbl-header">
    
    <table cellpadding="1" cellspacing="1" border="1">
    <thead>
     <tr>
  	<th></th>
    <th>qId</th>
    <th>Questions</th>
    
    <th>Answer 1</th>
    <th>Answer 2</th>
    <th>Answer 3</th>
    <th>Answer 4</th>
    <th>Correct answer</th>
    
    </tr>
    </thead>
    





<?php while ($row = mysqli_fetch_assoc($result)) { 

    ?>


    



  <tbody><tr>

  <td><input type="checkbox" name="check[]"  value="<?php echo $row['question_Id']; ?>"  /></td>

<td> <?php echo $row['question_Id'] ;?></td>

<td><?php echo $row['question'] ;?></td>

<td><?php echo  htmlspecialchars($row['answer1']) ;?></td>
<td><?php echo htmlspecialchars($row['answer2']) ;?></td>
<td><?php echo htmlspecialchars($row['answer3']) ;?></td>
<td> <?php echo htmlspecialchars($row['answer4']) ;?></td>
<td><?php echo htmlspecialchars($row['answer_No']) ;?></td>


</tr>

</tbody>
<?php } 
} 
else{
  echo "No questions available<br>";
   }?>

 <tr><td colspan = 8><button type="submit" name="sub" value="submit">Create Quiz</button></td> </tr>
</table>



		</form>

<?php
if(isset($_POST['sub']))  {  





$question=$_POST['check'];

$sql2 = "insert into quiz(Course_Id,module_Id,quiz_Id,Qname,Published) values('$courseID','$mod_Id','$quizId','$Qname','')";
$result2 = mysqli_query($conn,$sql2);

$values = '';
foreach($question as $q=> $value){

$sql1 = "INSERT INTO quiz_questions(Course_Id,module_Id, quiz_Id,question_Id) VALUES ('$courseID','$mod_Id','$quizId','$value')";

$result1 = mysqli_query($conn,$sql1);

}
 
if($result1)  {  
      echo'<script>alert("Inserted Successfully")
      document.location.href = "qlist_view.php?quizId='.$quizId.'&modID='.$mod_Id.'";</script>';

   }  
else  
   {  
      echo'<script>alert("Failed To Insert")
      document.location.href = "qlist_view.php?quizId='.$quizId.'&modID='.$mod_Id.'";</script>';  
   } 


 
}  

}
}
?> 
</body>
</html>