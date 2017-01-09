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
<link rel="stylesheet" type="text/css" href="css/studentlist.css">
<style type="text/css"> 
    body{
        margin:0%;
        padding:0%;
    }

</style>


<script>
function ifr(id1,id2){
var e2 = document.getElementById(id2);
var e = document.getElementById(id1);

e2.innerHTML = 'Assignments';
 e.style.display = 'block';


}
window.onload = function() {
  timer();
};

</script>


<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>
<body style="background-color:white; ">


 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
?>     
</div>

<?php
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href="course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?> > &nbsp </a></li>
        <li><a href=""> Students &nbsp </a></li>
    

</div>



<div id=newmenu style="float:left; margin-top:0.5%;position:relative;width:13%;">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
  include("menu.php");
?>
</div>



<div id=studentlist style="float:left;width:65%;left:5%;position:relative;margin-top:0.5%;background-color:#f3f9fe !important;border:solid 1px #E5E4E2; border-radius: 5px;">

<br>















<?php



include '../db.php';
$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batchNo=$_SESSION['batchNo'];

$sql = "SELECT user_Id FROM course_follow WHERE course_Id='$courseforAssignment' AND batch_No='$batchNo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<?php
while($row= $result->fetch_assoc() ) {
    $StudentID=$row['user_Id'];
    $sql2 = "SELECT * FROM user WHERE user_Id ='$StudentID' ";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
?>
        <ul>
    <?php
    while($row2= $result2->fetch_assoc() ) {

    ?>
     <li ><a href= "studentview.php?studentID=<?php echo $row2['user_Id']; ?> " target="_parent" > ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row2['user_Id'] ;?><br>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row2['name'] ;?> </a></li>
     
    <?php
      
    }
    ?>  </ul>
    <?php
}
}
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