
 <?php
 //managing session
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            
            
            $sce=$_SESSION['currentsrc'];
            echo $sce;
            echo "Your session has expired! <a href='../../login.php?csrc=<?php echo $sce ?>'>Login here</a>";
            
            session_destroy();
        }
        else{
          $_SESSION['start']=time();
          ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../../stylesheet.css">
<style>

</style>

<script>
</script>

<link rel="icon" href="../../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>
<body>



<!-- including up banner -->
 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >




<!--including db connection -->
<?php
  include 'db.php';

// getting assignment titlte 
    $assign_ID=$_GET['asid'];
    $sql = "SELECT assignment_title FROM assignment WHERE assignment_id='$assign_ID' ";
    $result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
   $assignmenttitle=$count[0];


    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    
    ?>

<!--bread crumb -->
<div id="breadcrumb">

   <ul>
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&batch_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
        <li><a href="assignment.php"> Assignments</a></li>
        <li><a href="">  <?php echo $assignmenttitle; ?> </a></li>
    
   </ul>
     

</div>

<!-- ned of breadcrumb -->


<!-- showing side menu -->
<div id="menu-block">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
  include("menu.php");
?>
</div>

<!--end os side menu -->

<!--includinf assignment view file.. it shows individual assignment -->

<div id="content-block">
<?php

$assign_ID=$_GET['asid'];

  include("assignmentview.php");
?>
</div>

<!-- end of including assignment view file -->







</div>




     
</body>
</html> 
<?php
}
?>
