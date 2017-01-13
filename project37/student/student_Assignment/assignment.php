 <?php
//session management
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


<link rel="icon" href="../../image/rittilogo.png" type="image/gif" sizes="16x16">


</head>

<body >

 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >


<?php

//reading session vars

    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<!-- Breadcrumb making -->

<div id="breadcrumb">

<ul>
   
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&batch_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
        <li><a href=""> Assignment</a></li>
     
</ul>
   

</div>

<!-- end of breadvrumb -->



<!--side menu div -->

<div id="menu-block">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

//including the side menu

  include("menu.php");
?>
</div>
<!--end of side menu div -->
<!-- including main assignment page which contain list of assignments-->

<div id="content-block">
<?php

  include("mainassignment.php");

?>
</div>

<!-- end including main assignment-->

</div>








</div>





</body>
</html>
<?php


}
?>