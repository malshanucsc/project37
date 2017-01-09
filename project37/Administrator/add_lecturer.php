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
<title> &nbsp&nbsp&nbspR I T T I</title>
<link rel="stylesheet" type="text/css" href="css/menustyles.css">
<base target="_self" />
<style type="text/css">

</style>
<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">

<script type="text/javascript">
  

</script>
</head>
<body>


<div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
?>     
</div>


<div style="float:left; width:66.5%; margin-left:5%; margin-top:3%;; border: none !important;">

       
      
  <?php


function insert($course,$name,$nic,$yy,$mm,$dd,$tp,$add,$branch,$batch_No,$u_Id){
     

  $date=$yy.'/'.$mm.'/'.$dd;

  include '../db.php';
  if ($conn->connect_error) {
  
    die("Connection failed: " . $conn->connect_error);
  }   
  
  $sql4="INSERT INTO user (NIC,password,name,dob,contact_No,address,branch_Id,Type,registeredby) VALUES ('{$nic}','ritti','{$name}','{$date}','{$tp}','{$add}','{$branch}','2','{$u_Id}')" ;

$conn->query($sql4);

  $sql5 = "SELECT user_Id FROM user WHERE NIC='$nic'";

  $result5 = $conn->query($sql5);
  $row5= $result5->fetch_assoc() ;
  $uid=$row5['user_Id'];
  $sql6="INSERT INTO course_conduct (user_Id,Course_Id,batch_No) VALUES ('$uid','{$course}','{$batch_No}')";

if ($conn->query($sql6) === TRUE) {
       echo '<script type="text/javascript">',
     'alert("Updated Successfully! Registered Lecturer ID'.$uid.'");',
     '</script>';


}else{

  echo '<script type="text/javascript">',
  'alert("Updated Error!");',
  '</script>';
  echo "Error updating record: " . $conn->error;
  
}

$conn->close();

?>
<script>
 window.location = "add_lecturer.php";

</script>
<?php

}

?>

<form  action="" method="post">
<label>Basic Info</label><hr>
Current courses <br>


<select name="courses" >
<option value="">Select a course:</option>


<?php
session_start();
include '../db.php';

$sql1 = "SELECT Course_name,course_Id FROM course";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
  while($row1= $result1->fetch_assoc() ) {

?>
    <option value="<?php echo $row1['course_Id'];?>"> <?php echo $row1['course_Id'];?>:   <?php echo $row1['Course_name'];?> </option>

  
<?php
  }

}

else{

?>
   <option value="">No Courses:</option>
<?php
}

?>


</select><br><br>

<label>Branch</label><br>
<select name="branch" id="branch"  >
<option value="">Select a Branch:</option>


<?php
session_start();
include '../db.php';

$sql2 = "SELECT branch_Name,branch_Id FROM branch";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  
  while($row2= $result2->fetch_assoc() ) {

?>
    <option value="<?php echo $row2['branch_Id'];?>"> <?php echo $row2['branch_Id'];?>:   <?php echo $row2['branch_Name'];?> </option>

  
<?php
  }

}

else{

?>
   <option value="">No Branches:</option>
<?php
}
?>


</select>
<br><br>



<label>Batch No</label><br>


<select name="batch" >

<option value="">Select a Batch:</option>


<?php
session_start();
include '../db.php';

$sql3 = "SELECT * FROM batch WHERE done='0'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
  
  while($row3= $result3->fetch_assoc() ) {

?>
    <option value="<?php echo $row3['batch_No'];?>">Branch ID <?php echo $row3['branch_Id'];?> / Batch No  <?php echo $row3['batch_No'];?> / Current No Students  <?php echo $row3['NO_students'];?> </option>

  
<?php
  }

}

else{

?>
   <option value="">No Batches:</option>
<?php
}
?>


</select>
<br><br>


<lable>Name</lable><br>

<input type="text" name="st_name"  size="140" required="required"> <br><br>
<lable>NIC</lable><br>
<input type="text" name="nic"  size="15" maxlength="10" required="required"> <br><br>

<lable>Date Of Birth</lable><br><hr>

<lable>year</lable><input type="number" name="year"  size="4"  min="1900" max="2500" required="required">
<lable>Month</lable><input type="number" name="month"  size="4"  min="1" max="12" required="required">
<lable>Day</lable><input type="number" name="day"  size="2"  min="1" max="31" required="required"><br><br>
<br>
<lable>Contact Information</lable><br>
<hr>
<lable>Telephone Number</lable><input type="text" name="tp"  size="15" maxlength="10" required="required"> <br><br>
<lable>Address</lable><input type="text" name="add"  size="140" required="required"><br><br>
<hr>
<input type="submit" id="u_button" name="u_button" value="Register" >

</form>

<?php

include '../db.php';

$user_ID=$_SESSION['username'];


if(isset($_POST['u_button'])){

  insert($_POST['courses'],$_POST['st_name'],$_POST['nic'],$_POST['year'],$_POST['month'],$_POST['day'],$_POST['tp'],$_POST['add'],$_POST['branch'],$_POST['batch'],$user_ID);

 
}


?>
<br>
<br>

</div>
</body>
</html>
<?php
}
?>