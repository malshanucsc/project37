 <?php
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            session_destroy();
            echo "Your session has expired! <a href='../../login.php'>Login here</a>";
        }
        else{
            $_SESSION['start']=time();
          ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="../../stylesheet.css">
<style type="text/css"> 

</style>



<link rel="icon" href="../../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>
<body>


  <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >


<?php
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<div id=breadcrumb >
<ul>   
        <li><a href="../user_courses.php">My courses </a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
        <li><a href=""> Students</a></li>
    
</ul>
</div>



<div id="menu-block">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
  include("menu.php");
?>
</div>



<div id="content-block">

<br>


<div id="student-list">

<?php



include 'db.php';
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
</div>









</div>



</body>
</html>
<?php
}
?>