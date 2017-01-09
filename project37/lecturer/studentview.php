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




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="css/menustyles.css">
<style type="text/css">

body{
        margin:0%;
        padding:0%;
    }

.formlog { 
    float:left; 
    width:60%;margin-left:20% !important ;
    margin-top:3%;
    border:solid 1px #E5E4E2;
    border-radius: 5px; 
    font-family:calibri;
    padding: 10px;
    padding-right: 30px;
}

.formlog div{
    clear: both;
    float: left;
    width: 100%;
}

.formlog label{
    float: right;
    font-size: 20px;
    color: #1E8449;
    font-weight: bold;
}
p{
   /* margin-left: 30px;*/
}
hr{
    border: 1px solid #89D097 ;
}
ul {
    
    padding: 10px;
    margin-top: 3%;
    list-style-type: none;
    font-family: calibri;


}
ul li a:visited{
    color: #23A85B  ;
}

ul li a{
    text-decoration: none;
    color: #36633F;
}   

input[type=text],input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #89D097  ;
    font-size: 15px;
    display: block;
}
input[type="number"]{
    border: none;
    padding: 5px;
}
 .button {
  /*display: inline-block;*/
  border-radius: 4px;
  background-color: #189D50;
  border: none;
  float: right;
  color: white;
  text-align: center;
  
  padding: 8px;
  
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.btn-1{
font-size: 14px;
width: 50%;
color: #FFFFFF;
float: left;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: "";
  position: absolute;
  opacity: 0;
  top: 0;
  right: -10px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 15px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
h3{
    color:  #084214;
}




</style>

<script>
function ifr(id1,id2){
var e2 = document.getElementById(id2);
var e = document.getElementById(id1);

e2.innerHTML = 'Assignments';
 e.style.display = 'block';


}


  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }


</script>



<script>
function change(){
   document.getElementById("MCQ").readOnly = false;
   document.getElementById("Practical").readOnly = false;
    document.getElementById("changebutton").style.display = "none";
    document.getElementById("upbutton").style.display = "block";
   
}

window.onload = function() {
  timer();
};

</script>
<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">
</head>
<body style="background-color:#8DA7B0; ">


 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
?>     
</div>

 
<?php
include '../db.php';
    $stid=$_GET['studentID'];
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];


    $sql = "SELECT name FROM user WHERE user_Id='$stid'";

  $result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
       

    ?>

<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">

   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href="course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?> > &nbsp </a></li>
        <li><a href="studentlist.php"> Students > &nbsp </a></li>
        <li><a href=""> <?php echo $count[0] ; ?> &nbsp </a></li>
    

</div>


<div id=newmenu style="float:left; margin-top:0.5%;position:relative;width:13%;">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
  include("menu.php")
?>
</div>



<div id=student style="float:left;width:65%;left:5%;position:relative;margin-top:0.5%;border:solid 1px #E5E4E2; border-radius: 5px;">


<?php
include '../db.php';


$batch_Nostudent=$_SESSION['batchNo'];
$course_Idstudent=$_SESSION['Course_ID'];
$u_Idforprofile=$_GET['studentID'];



function updater($name,$MCQ,$Practical,$uid,$cid,$bno){
     
include '../db.php';
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}   
$sql = "UPDATE course_follow SET final_Mcq ='{$MCQ}',final_Practical='{$Practical}' WHERE user_Id='{$uid}' AND course_Id='{$cid}' AND batch_No='{$bno}'";

if ($conn->query($sql) === TRUE) {
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

} 

if(isset($_POST['name'])){
    updater($_POST['name'],$_POST['MCQ'],$_POST['Practical'],$u_Idforprofile,$course_Idstudent,$batch_Nostudent);
  
}

?>

<?php

$sql = "SELECT * FROM user WHERE user_Id='$u_Idforprofile'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
$userbranch=$row['branch_Id'];

$sql2 = "SELECT branch_Name,address FROM branch WHERE branch_Id='$userbranch'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$sql3 = "SELECT course_Id,batch_No FROM course_follow WHERE user_Id='$u_Idforprofile'";
$result3 = $conn->query($sql3);

if ($result->num_rows > 0 && $result2->num_rows > 0) {
?>
    
  
	<form class="formlog" action="" method="post" style="margin-left:140px;">
	
	<div class="wrap">
  <input type="text" name="u_id" value="<?php echo $row['user_Id']?>" readonly>
  <label for="uid">User Id</label>
  </div>
  <div class="wrap">
	<input type="text" name="name" value="<?php echo $row['name']?>" readonly>
  <label>Name</label> 
   </div>
  <div class="wrap">
	<input type="text" id="cnc" name="contact_No" value="<?php echo $row['contact_No']?>"readonly >
  <label>Contact</label>
   </div>
  <div class="wrap">
	<input type="text" id="adds" name="address" value="<?php echo $row['address']?>"readonly>
  <label>Address </label>
   </div>


  <br>
    <div class="wrap">
  <input type="text" name="Branch_name" value="<?php echo $row2['branch_Name']?>" readonly >
  <label>Branch Name</label>
   </div>
  <div class="wrap">

  <input type="text" name="branch_address" value="<?php echo $row2['address']?>" readonly>
  <label>Branch Address </label> 
   </div>
  <br><br>
      <h3>Registered Courses</h3>
    <ul>

<?php
  
  while($row3 = mysqli_fetch_assoc($result3)){ 

    $CourseIDforprofile=$row3['course_Id'];
    $sql4 = "SELECT Course_name FROM course WHERE course_Id='$CourseIDforprofile'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();
    ?>
    <li ><?php echo $row4['Course_name'];?><p>Batch No  <input type="number" name="branch_address" value="<?php echo $row3['batch_No']  ?>" readonly> </p></li>

    <?php
  }
  ?>

<?php

$sql5 = "SELECT final_Mcq,final_Practical FROM course_follow WHERE user_Id='$u_Idforprofile' AND course_Id='$course_Idstudent' AND batch_No='$batch_Nostudent' ";
$result5 = $conn->query($sql5);
$row5 = $result5->fetch_assoc();
?>
<br><h3>Marks</h3>

<li><p>Final MCQ Marks <input type="number" maxlength="3" oninput="maxLengthCheck(this)" id="MCQ" name="MCQ" required="required" max="100" min="0" value="<?php echo $row5['final_Mcq']?>" readonly ></p></li>

<li><p>Final Practical Marks <input type="number" maxlength="3" oninput="maxLengthCheck(this)" name="Practical" id="Practical" required="required"  max="100" min="0" value="<?php echo $row5['final_Practical']?>" readonly></p></li>

<button type="button" class="button btn-1" id=changebutton onclick="change()">Add or Change Marks</button>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="button btn-1" type="submit" id="upbutton" font="calibri" value="Submit" hidden >
	 

<list style="width:20%;"><a class ="button btn-1" style="text-decoration:none; font-size:14;" href="studentperformance.php?stid=<?php echo $stid;?>">Student Performance</a></li>


</ul>

</form>

	<?php
      
    }
	?>	

</div>

<div  id=msg style="float:left; position:relative;margin-top:0.5%;left:10%;width:10%;">

<?php
    include("msgnotification.php");
?>
</div>
</body>
</html>
<?php
}
?>