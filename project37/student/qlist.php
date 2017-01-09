<html>
<?php 
session_start();

include "../db.php";
	
	$courseforQuiz=$_SESSION['Course_ID'];
	$id=$_SESSION['username'];
	$mod_Id = $_GET['modID']; 



	
	
	?>
	<head>
		<title>Quiz page</title>
	</head>	

	


	<body>
		<h3>Chapter <?php echo $mod_Id; ?></h3>
			
		<br>

		<p>
			Click here to begin the quiz. This quiz contain 10 questions and time allocated for one question is 30 seconds. 
		</p> 
		<!-- quizzes publish krla natthan meka hide wenna one. hide wela yata thynawa No quizzes has published kyla ekak. eka show wenna one. -->

	<?php 
		$sql = "SELECT quiz_Id, Qname FROM quiz WHERE module_Id ='$mod_Id' AND course_Id = '$courseforQuiz' AND Published = '1'";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) { 
			

			
		 while($row= $result->fetch_assoc() ) {
		 	$quizId = $row['quiz_Id'];
		 	
    
	?>
	
		<li><h4><a href ="questionsheet.php?quizId=<?php echo $quizId ?>&modID=<?php echo $mod_Id?>" > <?php echo $row['Qname']?></h4></li>

		<div id="marks" class="">

			<?php 
			$sql1 = "SELECT marks from do_quiz where user_Id = $id and module_Id=$mod_Id and course_Id=$courseforQuiz";
			$result1= mysqli_query($conn,$sql1);

			if($result1){

			 while($row= $result->fetch_assoc() ) {

			$score = $row['marks'];

			echo "Your result is ".$score;
		}
	}

			?>

			


	</div>	

		<?php 

		}
		} 
		else{
			echo "No Quiz has been Published"; #meka show weddi kalin kwwa eka hide wenna one.
		}

		if(isset($_SESSION['done'])){


		}?>
	
	<div>




	</div>	
		
	</body>	
</html>