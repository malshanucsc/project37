<html>
<title>Uploading Assignment</title>
<link rel="stylesheet" type="text/css" href="menustyles.css">

<head>
<script type="text/javascript">
	
	function closeWin() {
    window.close();
}


</script>	

</style>
</head>
<body>


  <?php

  function insert($u_Id,$C_Id,$link){
     


include '../db.php';
 
     
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }   
 
    $as_Id=$_SESSION['assign_ID'];
$sql4="UPDATE do_assignment SET link= ('{$link}') WHERE user_Id='{$u_Id}' AND course_Id='{$C_Id}' AND assignment_Id='{$as_Id}'";
$conn->query($sql4);



 if ($conn->query($sql4) === TRUE) {
       echo '<script type="text/javascript">',
     'alert("Updated Successfully!");',
     '</script>'
;
    } else {


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
		<input name="file" type="file" id="file" size="100"><br><hr>


		<input type="submit" id="u_button" name="u_button" value="Upload the file" >






		</form>

		



<?php
 session_start();
include '../db.php';
$courseId=$_SESSION['Course_ID'];
$user_ID=$_SESSION['username'];
$batch_No=$_SESSION['batch_No'];
$sql1 = "SELECT Course_name FROM course WHERE course_Id='$courseId'";

                        $result1 = $conn->query($sql1);

                        $row1 = $result1->fetch_assoc();

$coursename =$row1['Course_name'];

if(isset($_POST['u_button'])){

          date_default_timezone_set('Asia/Colombo');
        $currentdate = date('Y-m-d H:i:s ', time());
        $date=$_SESSION['date'];


      if($date>$currentdate){

	$file_result="";

if($_FILES["file"]["error"] >0){
	$file_result .="No file uploaded or Invalid file.";
	$file_result .="Error Code: " .$_FILES["file"]["error"]."<br>";
	echo $file_result;

}else{

  $lin2='../Assignments/'. $coursename .'/submissions/'. $batch_No .'/'.$user_ID;
if (!file_exists($lin2)) {
    mkdir($lin2, 0777, true);
}

	$file_result .= "Upload: " . $_FILES["file"]["name"]."<br>". "Type: " . $_FILES["file"]["type"]."<br>" . "Size: " . ($_FILES["file"]["size"]/1024) . "Kb<br>" . "Temp file: " . $_FILES["file"]["tmp_name"]."<br><br><br>";

	move_uploaded_file($_FILES["file"]["tmp_name"],'../Assignments/'. $coursename .'/submissions/'. $batch_No .'/'.$user_ID.'/'. $_FILES["file"]["name"]);

	$file_result .= "File Uplloaded succesfully.";

	echo $file_result;

$link='../Assignments/'. $coursename .'/submissions/'. $batch_No .'/'.$user_ID.'/'. $_FILES["file"]["name"];


  insert($user_ID,$courseId,$link);


}



}else{
  ?>
   Cannot Upload Assignment. Overdued !
   <?php
}



}


?>
<br>
<br>
	<button type="button" onclick="closeWin()" >Exit</button>

</body>
</html>





























