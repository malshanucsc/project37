<html>
<title>Uploading Assignment</title>

<link rel="stylesheet" type="text/css" href="menustyles.css">
<head>
<script type="text/javascript">
	
	function closeWin() {
    window.close();
}



</script>	
<style type="text/css">
	input[type=number]{
    width: 15%;
} 
</style>
</head>
<body>


	<?php

function insert($AsId,$title,$guide,$yy,$mm,$dd,$hr,$mi,$sec,$u_Id,$C_Id,$link,$batch_No){
     

  $datetime=$yy.'/'.$mm.'/'.$dd.' '.$hr.'/'.$mi.'/'.$sec;

  include '../db.php';
  if ($conn->connect_error) {
  
    die("Connection failed: " . $conn->connect_error);
  }   
  
  $sql="INSERT INTO assignment (assignment_id,assignment_title,link,guide,course,lecturer) VALUES ('{$AsId}','{$title}','{$link}' ,'{$guide}','{$C_Id}','{$u_Id}')";
  $sql2 = "SELECT user_Id FROM course_follow WHERE course_Id='{$C_Id}' AND batch_No='$batch_No'";

  $result2 = $conn->query($sql2);

  if ($result2->num_rows > 0) {
  ?>
        
    <?php
    while($row2= $result2->fetch_assoc() ) {
    	$uid=$row2['user_Id'];
    	
    	$sql4="INSERT INTO do_assignment (assignment_id,user_Id,course_Id,deadline) VALUES ('{$AsId}','{$uid}','{$C_Id}','{$datetime}' )";

    	

      $conn->query($sql4);
      $conn->query($sql5);


    }

  }
  $sql5="INSERT INTO give_assignment (assignment_id,user_Id,course_Id,batch_No) VALUES ('{$AsId}','{$u_Id}','{$C_Id}',{$batch_No} )";
   $conn->query($sql5);
if ($conn->query($sql) === TRUE) {
       echo '<script type="text/javascript">',
     'alert("Updated Successfully!");',
     '</script>';

}else{

  echo '<script type="text/javascript">',
  'alert("Updated Error!");',
  '</script>';
  echo "Error updating record: " . $conn->error;
  
}

$conn->close();
?>
<script type="text/javascript">
  
    window.close();

</script> 
<?php

} 
?>

<form enctype="multipart/form-data" action="assignmentuploading_file.php" method="post">

<br>
Existing Assignment IDs and Titles <br>


<select name="assigns" >
<option value="">Check existing assignment IDs:</option>


<?php
session_start();
include '../db.php';
$courseId=$_SESSION['Course_ID'];

$sql3 = "SELECT assignment_title,assignment_id FROM assignment";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
  
  while($row3= $result3->fetch_assoc() ) {

?>
    <option value="<?php echo $row3['assignment_id'];?>"> <?php echo $row3['assignment_id'];?>:   <?php echo $row3['assignment_title'];?> </option>

  
<?php
  }

}

else{

?>
   <option value="">No assignments:</option>
<?php
}
?>


</select>

<br>

Select file
<input name="file" type="file" id="file" size="100"><br><hr>
<br>

<lable>Title</lable><br>

<input type="text" name="assignment_title"  size="50" required="required"> <br><br>

<label>Assignment ID</label><br>
<input type="text" name="assignment_id"  size="50" required="required"> <br><br>

<textarea name="guide" cols="60" rows="8" class="widebox" id="article">Guidence</textarea><br><br>
<lable>Dead-Line</lable><br><hr>

<lable>year</lable><input type="number" name="year"  size="4"  min="2016" max="2500">
<lable>Month</lable><input type="number" name="month"  size="4"  min="1" max="12">
<lable>Day</lable><input type="number" name="day"  size="2"  min="1" max="31"><br><br>

<lable>Enter the time in 24 hours</lable><br><br>

<lable>Hours</lable><input type="number" name="hour"  size="4"  min="0" max="23"> 
<lable>Minutes</lable><input type="number" name="min"  size="4"  min="0" max="59">
<lable>Seconds</lable><input type="number" name="sec"  size="2"  min="0" max="59"> <br><br>

<input type="submit" id="u_button" name="u_button" value="Upload the file" >

</form>

<?php
 
include '../db.php';
$courseId=$_SESSION['Course_ID'];
$user_ID=$_SESSION['username'];
$batch_No=$_SESSION['batchNo'];
$sql1 = "SELECT Course_name FROM course WHERE course_Id='$courseId'";

                        $result1 = $conn->query($sql1);

                        $row1 = $result1->fetch_assoc();

$coursename =$row1['Course_name'];

if(isset($_POST['u_button'])){

	$file_result="";

if($_FILES["file"]["error"] >0){
	$file_result .="No file uploaded or Invalid file.";
	$file_result .="Error Code: " .$_FILES["file"]["error"]."<br>";
	echo $file_result;

}else{

	$file_result .= "Upload: " . $_FILES["file"]["name"]."<br>". "Type: " . $_FILES["file"]["type"]."<br>" . "Size: " . ($_FILES["file"]["size"]/1024) . "Kb<br>" . "Temp file: " . $_FILES["file"]["tmp_name"]."<br><br><br>";

	move_uploaded_file($_FILES["file"]["tmp_name"],'../Assignments/'. $coursename .'/' . $_FILES["file"]["name"]);

	$file_result .= "File Uplloaded succesfully.";

	echo $file_result;

	$link='../Assignments/'. $coursename .'/' . $_FILES["file"]["name"];



	insert($_POST['assignment_id'],$_POST['assignment_title'],$_POST['guide'],$_POST['year'],$_POST['month'],$_POST['day'],$_POST['hour'],$_POST['min'],$_POST['sec'],$user_ID,$courseId,$link,$batch_No);



}

}


?>
<br>
<br>
<button type="button" onclick="closeWin()" >Exit</button>

</body>
</html>