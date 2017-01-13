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

function openwin() {

  window.open("module_uploading.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=80,left=500,width=400,height=430");

}

</script>

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



  <?php 
include("db.php");
   $mo_ID=$_GET['modID'];
    $sql = "SELECT module_Title FROM module WHERE module_Id='$mo_ID' ";
    $result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
    $moduletitle=$count[0];

    ?>


<div id=breadcrumb>
<?php
$sql = "SELECT Qname FROM quiz WHERE Course_Id = '$courseID' AND module_Id = '$mo_ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 

      
     while($row= $result->fetch_assoc() ) {
      $qnameforbr = $row['Qname'];
  
    }
  }

?>

<ul>
  
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
        <li><a href="quiz_main.php"> Quizzes</a></li>
        <li><a href=""><?php echo $qnameforbr;?></a> </li>
        


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
<?php

  
  include("quizMain.php");
?>
</div>








</div>



     
</body>
</html> 
<?php
}
?>
