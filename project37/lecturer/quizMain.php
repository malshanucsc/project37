

<html>
<?php 


include "../db.php";
	if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];

	$mod_Id = $_GET['modID'];
	
	
	
	?>
	


	<body>
		
			



		<h3>Available quizzes<h3>

<form method="post">

	<?php 
		$sql = "SELECT quiz_Id, Qname, Published FROM quiz WHERE Course_Id = '$courseID' AND module_Id = '$mod_Id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { 

			
		 while($row= $result->fetch_assoc() ) {
		 	$_SESSION['quiz_Id'] = $row['quiz_Id'];
		 	$quizId = $_SESSION['quiz_Id'];
		 	$_SESSION['Qname'] = $row['Qname'];
		 	$pub = $row['Published'];
    
	?>
		
		<li><h4><a href ="qlist_view.php?quizId=<?php echo $quizId ?>&modID=<?php echo $mod_Id?>" > <?php echo $row['Qname']?></a></h4>

	<?php 


            if($pub=='0'){
              
               echo "<h4 style='color:red;'>Not published</h4>";
             }else{
                echo "<h4 style='color:red;'>Published</h4>";
            }
            echo "</li>"; 
            

        }

           




?>


</form >


  <?php

		}
		}
		else{
			echo "No quiz Available";
		} ?>
	

	
<br><br>
<button><a href="#">Create New Quiz</a></button>

<form method="post" action="" name="frm">
			Quiz No: <input type="number" name="qno" value=""/> <br/>
      Quiz Name: <input type="text" name="Qname" value=""/> <br/></br>

      <button type="submit" name="sub" value="submit">Create Quiz</button>
      	</form>	

 <?php
if(isset($_POST['sub']))  {  



$quizId = $_POST['qno'];
$Qname = $_POST['Qname'];


$sql2 = "insert into quiz(Course_Id,module_Id,quiz_Id,Qname,Published) values('$courseID','$mod_Id','$quizId','$Qname','')";
$result2 = mysqli_query($conn,$sql2);



 
if($result2)  {  
      echo'<script>alert("Inserted Successfully")
      document.location.href = "quizmainview.php?modID='.$mod_Id.'";</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")
      document.location.href = "quizmainview.php?modID='.$mod_Id.'";</script>';   
   }  

}
echo '<p><a href="ques_add.php?&modID='.$mod_Id. '">Add a new question</a></p>' ;




?> 

	</body>	
</html>