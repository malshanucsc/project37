<html>
<title>Uploading</title>
<head>
<link rel="stylesheet" type="text/css" href="menustyles.css">
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

	function insert($MoId,$title,$guide,$u_Id,$C_Id,$link,$batch_No){
     
include '../db.php';
     
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }   
    $sql1="INSERT INTO module (module_Id,module_Title,link,body,course_Id) VALUES ('{$MoId}','{$title}','{$link}' ,'{$guide}','{$C_Id}')";
    $sql2="INSERT INTO follow_module (module_Id,course_Id,batch_No,user_Id) VALUES ('{$MoId}','{$C_Id}','{$batch_No}','{$u_Id}')";
    if ($conn->query($sql1) === TRUE AND $conn->query($sql2) === TRUE) {
       echo '<script type="text/javascript">',
       'alert("Updated Successfully!");',
        '</script>';
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

		<form enctype="multipart/form-data" action="module_uploading.php" method="post">

		<br>
    Select file
		<input name="file" type="file" id="file" size="100"><br><hr>
		<lable>Title</lable><br>

		<input type="text" name="module_title"  size="50"> <br><br>

    <label>Module ID</label><br>
    <input type="text" name="module_id"  size="50"> <br><br>

    <textarea name="guide" cols="60" rows="8" class="widebox" id="article">Guidence</textarea><br><br>
		<input type="submit" id="u_button" name="u_button" value="Upload the file" >

		</form>

<?php
 session_start();
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

	move_uploaded_file($_FILES["file"]["tmp_name"],'../Modules/'. $coursename .'/' . $_FILES["file"]["name"]);

	$file_result .= "File Uplloaded succesfully.";

	echo $file_result;

	$link='../Modules/'. $coursename .'/' . $_FILES["file"]["name"];

	insert($_POST['module_id'],$_POST['module_title'],$_POST['guide'],$user_ID,$courseId,$link,$batch_No);


}

}

?>
<br>
<br>
	<button type="button" onclick="closeWin()" >Exit</button>

</body>
</html>