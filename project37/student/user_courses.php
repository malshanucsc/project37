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

<?php




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title> &nbsp&nbsp&nbspR I T T I</title>

<base target="_self" />

<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">
<!-- <link rel="stylesheet" type="text/css" href="../public/css/component.css">
<link rel="stylesheet" type="text/css" href="../public/css/normalize.css"> -->
<link rel="stylesheet" type="text/css" href="../stylesheet.css">
</head>
<body> <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id="boxbody" >




<div id="breadcrumb">
<ul>
   <li><a href="">My courses</a></li>
       
  
</ul>
     
</div>
 



<?php
include '../db.php';

$u_Id=$_SESSION['username'];
$sql3 = "SELECT course_Id,batch_No FROM course_follow WHERE user_Id='$u_Id'";
$result3 = $conn->query($sql3);
?>



<div id="menu-block">


<!-- <h1 style="text-align:center;">My courses</h1> -->
<!-- <section class="color-10"> -->
        <nav class="menu-btn">
                    
<?php

while($row3 = mysqli_fetch_assoc($result3)){ 

    $bno=$row3['batch_No'];
    $CourseIDforprofile=$row3['course_Id'];
    $sql4 = "SELECT Course_name FROM course WHERE course_Id='$CourseIDforprofile'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();
    ?>
                    <center>
    <a href="course.php?courseIDpass=<?php echo $CourseIDforprofile; ?>&batch_No=<?php echo $bno; ?> " data-hover="<?php echo $row4['Course_name'] ;?>"><span><?php echo $row4['Course_name'] ;?></span></a>
                        </center>
    <?php
}
?>
        
          </nav>
      </section>
   

</div>






<div id="content-block">


<?php


include '../db.php';
$UserIDfordefault=$_SESSION['username'];
$mainimagesql = "SELECT newsnumber,main_image FROM newsfeed ";
$resultmainimage = $conn->query($mainimagesql);

if ($resultmainimage->num_rows > 0) {

  while($rowimg= $resultmainimage->fetch_assoc() ) {
?>

<?php
    $mimgnumber=$rowimg['main_image'];
    $mimgnumber="image".$mimgnumber;
    $newsid=$rowimg['newsnumber'];
    

    $newssql = "SELECT heading,description,$mimgnumber,newsnumber FROM newsfeed WHERE newsnumber='$newsid'";
    $resultnews = $conn->query($newssql);

      if ($resultnews->num_rows > 0) {
        ?>    
        <?php
        while($rownews= $resultnews->fetch_assoc() ) {
          ?>







<div id="newsfeed">       

<div id="containerfeed" >     
<?php  
    $mimglink=  $rownews[$mimgnumber];  
  ?>
   <img id="image23" src='<?php echo $mimglink; ?>' alt="No image" id="stretchyfeed">


</div>


<div>

<h4><?php  echo $rownews['heading'];  ?></h4>

<p><?php  echo substr($rownews['description'],0,10).".....";  ?></p>
<a href="readmore.php?newsnumber=<?php echo $rownews['newsnumber']; ?>" >Read More</a>
</div>


</div>













<br>
<?php

}
}
}
}

?>



</div>
   


<script src='../public/js/modernizr.custom.js'></script>














</div>



</body>
</html>
<?php
}
?>