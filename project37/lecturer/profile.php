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
<link rel="stylesheet" type="text/css" href="css/profile.css">
<style type="text/css">

body {
    font-family: "calibri", sans-serif;
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
font-size: 16px;
width: 180px;
color: #FFFFFF;
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
function change(){
   document.getElementById("cnc").readOnly = false;
   document.getElementById("adds").readOnly = false;
    document.getElementById("pwd").readOnly = false;
    document.getElementById("changebutton").style.display = "none";
    document.getElementById("upbutton").style.display = "block";
   
}

window.onload = function() {
  timer();
};

</script>
<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">
</head>
<body style="background-color: white; ">


 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
?>     
</div>


<?php
   

if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
      $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href="course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?> > &nbsp </a></li>
        <li><a href=""> Profile &nbsp </a></li>
    

</div>
<?php

}else{

    ?>
<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; padding: 10px; border-radius: 5px;">
   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href=""> Profile &nbsp </a></li>
    

</div>

<?php


}

?>
  
<div id= profile >


<?php
include '../db.php';

function updater($name,$id,$contact,$address,$pwd){
     
include '../db.php';
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   

$sql = "UPDATE user SET contact_No='{$contact}',address='{$address}',password='{$pwd}' WHERE user_Id='{$id}'";
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
    updater($_POST['name'],$_POST['u_id'],$_POST['contact_No'],$_POST['address'],$_POST['pwd']);
  
}



$u_Idforprofile=$_SESSION['username'];
$sql = "SELECT * FROM user WHERE user_Id='$u_Idforprofile'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$userbranch=$row['branch_Id'];
$sql2 = "SELECT branch_Name,address FROM branch WHERE branch_Id='$userbranch'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$sql3 = "SELECT course_Id,batch_No FROM course_conduct WHERE user_Id='$u_Idforprofile'";
$result3 = $conn->query($sql3);

if ($result->num_rows > 0 && $result2->num_rows > 0) {
?>
    <form class="formlog" action="" method="post" style="margin-left:140px;">
	<div class="wrap">
    <input type="text" name="u_id" value="<?php echo $row['user_Id']?>" readonly>
    <label for="uid">User Id</label>
    </div>
    <div class="wrap">
    <input  type="password" name="pwd" id="pwd" value="<?php echo $row['password']?>" readonly> 
    <label for="password">Password </label>
    </div>
    <div class="wrap">
    <input type="text" name="name" value="<?php echo $row['name']?>" readonly> 
    <label for="name">Name </label>
    </div>
    <div class="wrap">
    <input type="text" id="cnc" name="contact_No" value="<?php echo $row['contact_No']?>"readonly >
    <label for="contact">Contact </label>
    </div>
    <div class="wrap">
    <input type="text" id="adds" name="address" value="<?php echo $row['address']?>"readonly>
    <label for="address">Address </label>
    <br>
    </div>
    <div class="wrap">
    <input type="text" name="Branch_name" value="<?php echo $row2['branch_Name']?>" readonly >
    <label for="branch">Branch Name </label>
    </div>
    <div class="wrap">
     <input type="text" name="branch_address" value="<?php echo $row2['address']?>" readonly> 
     <label for="br_add">Branch Address </label>
     </div>
    <br>
    <h3>Registered Courses</h3>
    <ul>
<?php
    while($row3 = mysqli_fetch_assoc($result3)){ 

        $CourseIDforprofile=$row3['course_Id'];
        $sql4 = "SELECT Course_name FROM course WHERE course_Id='$CourseIDforprofile'";
        $result4 = $conn->query($sql4);
        $row4 = $result4->fetch_assoc();
        ?>
         <li ><a href="course.php?courseIDpass=<?php echo $CourseIDforprofile ?>" target="_parent" ><?php echo $row4['Course_name'];?></a><p>Batch no:<input type="number" name="branch_address" value="<?php echo $row3['batch_No']  ?>" readonly><p> </li><hr>
        <?php   
    }
    ?>

    </ul>

    <button type="button" class="button btn-1" id=changebutton onclick="change()">Edit!</button>


	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" class="button btn-1" id="upbutton" font="calibri" value="Submit" hidden ><br>
 
</ul>
</form>
	<?php
      
    }
	?>	
</div>
</body>
</html>
<?php
}
?>