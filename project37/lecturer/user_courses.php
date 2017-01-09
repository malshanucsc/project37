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
<title> &nbsp&nbsp&nbsp R I T T I</title>
<link rel="stylesheet" type="text/css" href="../public/css/component.css">
<link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
<link rel="stylesheet" type="text/css" href="css/menustyles.css">

<base target="_self" />
<style type="text/css">


</style>
<script>
window.onload = function() {
  timer();
};

</script>

<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">


</head>
<body style="background-color:#8DA7B0; ">
 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
?>     
</div>


<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">

   <li><a href="">My courses</a></li>
       
     
</div>
 
<?php

include '../db.php';

$u_Id=$_SESSION['username'];

$sql3 = "SELECT course_Id,batch_No FROM course_conduct WHERE user_Id='$u_Id'";

$result3 = $conn->query($sql3);
?>

<div id=def style="float:left; width:20%;position:relative;margin-top:0.5%;">


<h1 style="text-align:center;">My courses</h1>

 <section class="color-10">
				<nav class="cl-effect-10">
<?php

while($row3 = mysqli_fetch_assoc($result3)){ 

    $CourseIDforprofile=$row3['course_Id'];
    $sql4 = "SELECT Course_name FROM course WHERE course_Id='$CourseIDforprofile'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();
    ?>
<center>
    <a href="course.php?courseIDpass=<?php echo $CourseIDforprofile ?>&B_No=<?php echo $row3['batch_No'] ?>" data-hover="<?php echo $row4['Course_name'] ?>  Batch No  <?php echo $row3['batch_No'] ?>"><span><?php echo $row4['Course_name'] ?>  Batch No  <?php echo $row3['batch_No'] ?></span></a></center>
<?php
}
?>

                    </nav>
			</section>

</div>

<div id=def style="float:left;position: relative; width:60%; left: 2.75%; margin-top:0.5%; background-color:#f3f9fe !important;border:solid 1px #E5E4E2; border-radius: 5px;">


<h1>R I T T I</h1>

 <object type="text/html" data="../rr/Ranaviru IT.html" width="98%"  height="950px" style="overflow:auto;border:2px solid #E5E4E2">
    </object>

</div>








<div  id=msg style=" float:left;position:relative;margin-top:0.5%;left:5.5%;width:10%;">


<?php
    include("msgnotification.php");
?>
</div>
</body>
</html>
<?php
}
?>