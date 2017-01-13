<html>
<?php 


include "db.php";
	
	
	$mod_Id = $_GET['modID']; 
	$courseID=$_SESSION['Course_ID'];

	
	?>
	

<!-- <a href='#' onclick="$('#whatever').toggle();return false;">show/hide</a>
<div id="whatever">
  Content
</div> -->
<script>
function hide_q() {
    document.getElementById("curr_q").style.visibility = "hidden";
}
</script>
	
	<body>
		<h3><a href="quizCreate.php?$courseID=<?php echo $courseID ?>&modID=<?php echo $mod_Id?>">Create New Quiz</a><h3>	
		<br>
			



		<h3>Available quizzes<h3>

	<?php 
		$sql = "SELECT quiz_Id, Qname FROM quiz WHERE Course_Id = '$courseID' AND module_Id = '$mod_Id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { 

			
		 while($row= $result->fetch_assoc() ) {
		 	$_SESSION['quiz_Id'] = $row['quiz_Id'];
		 	$_SESSION['Qname'] = $row['Qname'];
    
	?>
	
		<li><h4><a href ="qlist_view.php?quizId=<?php echo $_SESSION['quiz_Id'] ?>&modID=<?php echo $mod_Id?>" > <?php echo $row['Qname']?></a></h4></li>

	<?php 

		}
		}
		else{
			echo "No quiz Available";
		} ?>
	
<div id = "select_quiz">
		<h3>Select Quiz to publish<h3>
			
			
				
			<form action="quizmainview.php?quizId=<?php echo $_SESSION['quiz_Id'] ?>&modID=<?php echo $mod_Id?>" method="post">
				<select name = "qno" id="mytext">
					<?php 
		$sql1 = "SELECT quiz_Id, Qname FROM quiz WHERE Course_Id = '$courseID' AND module_Id = '$mod_Id'";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) { 

			
		 while($row1= $result1->fetch_assoc() ) {
		 	$_SESSION['quiz_Id'] = $row1['quiz_Id'];
    
	?>
        		<option value="<?php echo $row1['quiz_Id']?>"><?php echo $row1['Qname']?></option>

        		<?php 

		}
		} 

		?>
       			<!-- <option value="2">HTML Quiz 2</option> -->	
    		</select>

    		<input type="submit" name = "submit" value="Publish" id="hide">

		
    	</form>
    	    	<div>
    	<?php
    	$sql4="SELECT quiz_Id from quiz where Published ='1'";
  		$result4 = $conn->query($sql4);
  		if ($result4->num_rows > 0) { 

  		while($row4= $result4->fetch_assoc() ) {
		 		$curr_qno = $row4['quiz_Id'];

  				echo '<p id="mytext">currently published Quiz no '.$curr_qno .'</p>' ;
  				}
  			}

  		
?>
</div>
    	
<?php
		if(isset($_POST['submit'])){
    			

    			$quizID = $_POST['qno'];
    			

    			$sql2="UPDATE quiz SET Published='1' WHERE  module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id='$quizID' ";
    			$sql3 ="UPDATE quiz SET Published='0' WHERE  module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id!='$quizID' ";
    			
  		
  				if($conn->query($sql2)){
  					if($conn->query($sql3)){
						echo "Quiz ". $quizID . " is now published";

  						}else{
  							echo "error";
  					}

  				}
    			
  				}
  			

    		
    		  ?>
	</div>
	

	<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("h3").hide();
    });
    $("#show").click(function(){
        $("h3").show();
    });
});

		
	</body>	
</html>