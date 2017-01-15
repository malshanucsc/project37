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
<link rel="stylesheet" type="text/css" href="../stylesheet.css">
<style type="text/css">




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
<body>


 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id="boxbody" >





<?php
   

if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
      $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<div id="breadcrumb">

    <ul>


        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href="course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?> > &nbsp </a></li>
        <li><a href=""> Profile &nbsp </a></li>
    
    </ul>
   

</div>
<?php

}else{

    ?>
<div id="breadcrumb">
   
   <ul>


     <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href=""> Profile &nbsp </a></li>
   
   </ul>
    

</div>

<?php


}

?>
  
<div id= "profile">


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
    <form class="profile" action="" method="post">
    <legend><span class="number">1</span> User Info</legend>
    <div class="wrap">
    <label for="uid">User Id</label>
    <input type="text" name="u_id" value="<?php echo $row['user_Id']?>" readonly>
    </div>
    <div class="wrap">
    <label for="password">Password </label>
    <input  type="password" name="pwd" id="pwd" value="<?php echo $row['password']?>" readonly> 
    </div>
    <div class="wrap">
    <label for="name">Name </label>
    <input type="text" name="name" value="<?php echo $row['name']?>" readonly> 
    </div>
    <div class="wrap">
    <label for="contact">Contact </label>
    <input type="text" id="cnc" name="contact_No" value="<?php echo $row['contact_No']?>"readonly >
    </div>
    <div class="wrap">
    <label for="address">Address </label>
    <input type="text" id="adds" name="address" value="<?php echo $row['address']?>"readonly>
    <br>
    </div>
    <div class="wrap">
    <label for="branch">Branch Name </label>
    <input type="text" name="Branch_name" value="<?php echo $row2['branch_Name']?>" readonly >
    </div>
    <div class="wrap">
    <label for="br_add">Branch Address </label>
     <input type="text" name="branch_address" value="<?php echo $row2['address']?>" readonly> 
     </div>
    <br>
   <legend><span class="number">2</span>Registered courses</legend>
    <ul>
<?php
    while($row3 = mysqli_fetch_assoc($result3)){ 

        $CourseIDforprofile=$row3['course_Id'];
        $sql4 = "SELECT Course_name FROM course WHERE course_Id='$CourseIDforprofile'";
        $result4 = $conn->query($sql4);
        $row4 = $result4->fetch_assoc();
        ?>
         <li ><a href="course.php?courseIDpass=<?php echo $CourseIDforprofile ?>" target="_parent" ><?php echo $row4['Course_name'];?></a><p>Batch no:<input type="number" name="branch_address" value="<?php echo $row3['batch_No']  ?>" readonly><p> </li>
        <?php   
    }
    ?>

    </ul>

    <button type="button" class="button btn-1" id="changebutton" onclick="change()">Edit!</button>


<input type="submit" class="button btn-1" id="upbutton" font="calibri" value="Submit" style=" display:none ;" ><br>
 
</ul>
</form>
    <?php
      
    }
    ?>  
</div>





</div>



</body>
</html>
<?php
}
?>