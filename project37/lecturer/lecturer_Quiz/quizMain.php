

<html>
<link rel="stylesheet" type="text/css" href="../../stylesheet.css">
<style type="text/css">
	
/*    .assignviewwhite_content {
        display: none;
        position: fixed;
        top: 25%;
        left: 28%;
        width: 40%;
        height: 40%;
        padding: 16px;
        border: 16px solid #1E8449;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }


  .black_overlay{
        display: none;
        position: fixed;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }*/

</style>

<?php 


include "db.php";
	if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];

	$mod_Id = $_GET['modID'];
	
	
	
	?>
	


	<body>
		
			
<div id="content-list">


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
		
		<li><h3><a href ="qlist_view.php?quizId=<?php echo $quizId ?>&modID=<?php echo $mod_Id?>" > <?php echo $row['Qname']?></a></h3>

	<?php 


            if($pub=='0'){
              
               echo "<h4>Not published</h4><br>";
             }else{
                echo "<h4>Published</h4><br>";
          }
            echo "</li>"; 
            

        }

           




?>
<br>
</div>

</form >


  <?php

		}
		}
		else{
			echo "No quiz Available";
		} ?>
	


<br><br>
<button type="button" class="button btn-1" href = "javascript:void(0)" onclick = "document.getElementById('light3').style.display='block';document.getElementById('fade3').style.display='block'" >Create New Quiz</button>





<div id="fade3" class="quiz_black_overlay"></div>


<div id="light3" class="quiz_white_content">


 


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




?> 

    




<a href = "javascript:void(0)" onclick = "document.getElementById('light3').style.display='none';document.getElementById('fade3').style.display='none'">Cancel</a></div>



























<p><a href="ques_add.php?&modID='.$mod_Id. '">Add a new question</a></p>





	</body>	
</html>