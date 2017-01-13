 <?php
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (!(isset($_SESSION['start'])) || (time() - $_SESSION['start'] > 10000)) {
            
            
            header("Location:../login.php");
            //echo "Your session has expired! <a href='../login.php'>Login here</a>";
            
            session_destroy();
        }
        else{
          $_SESSION['start']=time();
        //  $sce=$_SESSION['currentsrc'];

          ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>





<script>

</script>
<!-- <link rel="stylesheet" type="text/css" href="css/defaultcoursepage.css"> -->
<link rel="stylesheet" type="text/css" href="../stylesheet.css">


<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>
<body>
 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >



<?php
  include '../db.php';


$_SESSION['Course_ID']=$_GET['courseIDpass'];

    $_SESSION['batch_No']=$_GET['B_No'];

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


<?php
 $_SESSION['batchNo']=$_GET['B_No'];
$_SESSION['Course_ID']=$_GET['courseIDpass'];
?>



<div id="menu-block">

<?php
$courseID=$_GET['courseIDpass'];
$batch_No=$_GET['B_No'];
  include("menu.php");
?>
</div>


<div id="content-block">
<?php
$courseIDfordefalut=$_SESSION['Course_ID'];

    // include("defaultcoursepage.php");
?>
<!-- <div id=module> -->
<?php


  include("mainmodule.php");

?>
<!-- </div> -->
<hr>
<br>
<!-- <div id=assignment> -->
<?php

    include("mainassignment.php");
?>
<!-- </div> -->
<?php

    include("quiz.php");
?>

</div>








</div>




</body>
</html> 
<?php
}
?>
