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

input[type="text"],input[type="number"]
{
    font-size:100%;
}



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


function insert($newid,$usertype,$name,$nic,$yy,$mm,$dd,$tp,$add,$u_Id){
     

  $date=$yy.'/'.$mm.'/'.$dd;

  include '../db.php';
  if ($conn->connect_error) {
  
    die("Connection failed: " . $conn->connect_error);
  }   
  
  $sql4="INSERT INTO user (user_Id,NIC,password,name,dob,contact_No,address,branch_Id,Type,registeredby) VALUES ('{$newid}','{$nic}','group37','{$name}','{$date}','{$tp}','{$add}','1','{$usertype}','{$u_Id}')" ;


if ($conn->query($sql4) === TRUE) {
       echo '<script type="text/javascript">',
     'alert("Updated Successfully! Registered Students ID");',
     '</script>';


}else{

  echo '<script type="text/javascript">',
  'alert("Updated Error! ID exist !");',
  '</script>';
  echo "Error updating record: " . $conn->error;
  
}














  //$sql5 = "SELECT user_Id FROM user WHERE NIC='$nic'";

  //$result5 = $conn->query($sql5);
  //$row5= $result5->fetch_assoc() ;
  //$uid=$row5['user_Id'];


//foreach ($courses as $singlecourse){
//echo $color."<br />";

//}

  //$sql6="INSERT INTO course_follow (user_Id,Course_Id,batch_No) VALUES ('$uid','{$course}','{$batch_No}')";


  //$sql7 = "SELECT NO_students FROM batch WHERE batch_No='$batch_No'";

  //$result7 = $conn->query($sql7);
  //$row7= $result7->fetch_assoc() ;
  //$stno=$row7['NO_students']+1;
  //$sql8 =   "UPDATE batch SET NO_students='$stno' WHERE batch_No='$batch_No'";

//if ($conn->query($sql8) === TRUE) {
  //     echo '<script type="text/javascript">',
    // 'alert("Updated Successfully! Registered Students ID'.$uid.'");',
     //'</script>';


//}else{

  //echo '<script type="text/javascript">',
//  'alert("Updated Error!");',
  //'</script>';
  //echo "Error updating record: " . $conn->error;
  
//}

//$conn->close();

?>
<script>
 window.location = "add_student.php?";

</script>
<?php

}

?>

<form  action="" method="post">
<h1>Basic Info</h1>



<h3>Enter ID</h3>
<input type="number" name="strgid"  size="140" required="required"> <br><br>


<h3>Type</h3>
<input type="radio" name="usertype" value="1"> Student<br>
<input type="radio" name="usertype" value="2">Lecturer<br>
<input type="radio" name="usertype" value="3">Administrator<br>







<!--





<select name="courses" >
<option value="">Select a course:</option>
-->




<h3>Name</h3>

<input type="text" name="st_name"  size="140" required="required"> <br><br>
<h3>NIC</h3>
<input type="text" name="nic"  size="15" maxlength="10" required="required"> <br><br>

<h3>Date Of Birth</h3>

<lable>year</lable><input type="number" name="year"  size="4"  min="1900" max="2100">
<lable>Month</lable><input type="number" name="month"  size="4"  min="1" max="12">
<lable>Day</lable><input type="number" name="day"  size="2"  min="1" max="31"><br><br>
<br>
<h3>Contact Information</h3>

<lable>Telephone Number</lable><input type="text" name="tp"  size="15" maxlength="10" required="required"> <br><br>
<lable>Address</lable><br><input type="text" name="add"  size="140" required="required" style=""><br><br>

<input type="submit" id="addstudent" name="addstudent" value="Register" style="font-size:100%;" >

</form>

<?php

include '../db.php';

$user_ID=$_SESSION['username'];


if(isset($_POST['addstudent'])){

  insert($_POST['strgid'],$_POST['usertype'],$_POST['st_name'],$_POST['nic'],$_POST['year'],$_POST['month'],$_POST['day'],$_POST['tp'],$_POST['add'],$user_ID);

 
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