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
<link rel="stylesheet" type="text/css" href="css/defaultcoursepage.css">

<style>

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
<body onload="loadNav('sp1');" >
 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
?>     
</div>


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
<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">

   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href=""> <?php echo $cname; ?> &nbsp </a></li>
    
    

</div>








<div id=newmenu style="float:left; margin-top:0.5%;position:relative;width:13%;">

<?php
$courseID=$_GET['courseIDpass'];
$batch_No=$_GET['batch_No'];
  include("menu.php");
?>


</div>
<div id=course style="float:left; width:65%;left:5%;position:relative;margin-top:0.5%;background-color:#f3f9fe !important;border:solid 1px #E5E4E2; border-radius: 5px;">


<?php
$courseIDfordefalut=$_SESSION['Course_ID'];
    include("defaultcoursepage.php");
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
