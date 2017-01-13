 <?php
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            
            
            $sce=$_SESSION['currentsrc'];
            echo $sce;
            echo "Your session has expired! <a href='../login.php?csrc=<?php echo $sce ?>'>Login here</a>";
            
            session_destroy();
        }
        else{
          $_SESSION['start']=time();
          ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../stylesheet.css">

<style>

</style>
<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>
<body >


 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id="boxbody" >


<?php
  include '../db.php';


$_SESSION['Course_ID']=$_GET['courseIDpass'];

    $_SESSION['batch_No']=$_GET['batch_No'];

$cid=$_SESSION['Course_ID'];
$sql = "SELECT Course_name FROM course WHERE course_Id='$cid' ";


  $result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
    $_SESSION['coursename']=$count[0];
    $cname= $_SESSION['coursename'];
    ?>
<div id="breadcrumb">

<ul>
   
        <li><a href="user_courses.php">My courses</a></li>
        <li><a href=""> <?php echo $cname; ?></a></li>
  
</ul>
    
    

</div>



<div id="menu-block">


<?php
$courseID=$_GET['courseIDpass'];
$batch_No=$_GET['batch_No'];
  include("menu.php");
?>


</div>


<?php
$courseIDfordefalut=$_SESSION['Course_ID'];
?>
<div>
<div id=content-block >
  

<?php


  include("mainmodule.php");

?>

</div>
<br>
<div id="content-block">
  
<?php


    include("mainassignment.php");
?>

</div>
<br>
<div id="content-block" >
  
<?php

    include("quizmain.php");
?>
</div>



</div>





</div>




     
</body>
</html> 
<?php
}
?>
