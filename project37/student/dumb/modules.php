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
<link rel="stylesheet" type="text/css" href="css/modulestyle.css">
<style type="text/css">

</style>


<script>
function ifr(id1,id2){
var e2 = document.getElementById(id2);
var e = document.getElementById(id1);

e2.innerHTML = 'Assignments';
e.style.display = 'block';

}

function openNav(sp1) {
  var e = document.getElementById(sp1);
  e.style.display='none';

       document.getElementById("mySidenavv").style.width = "13%";
    document.getElementById("main").style.marginLeft = "22%";
     document.getElementById("main").style.width= "66%";
}

function closeNav(sp1) {
  var e = document.getElementById(sp1);
  e.style.display='block';
  e.style.zIndex="1";
    document.getElementById("mySidenavv").style.width = "0%";
    document.getElementById("main").style.marginLeft= "5%";
    document.getElementById("main").style.width= "80%";;
    
}
</script>


<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">


</head>
<body style="background-color:#8DA7B0; ">


<iframe id="ifass" width="100%" height="220px" frameborder="0" src="user_home.php" ></iframe>
<div class="deff" style="float:left; width:85.5%; margin-left:0%; margin-top:0%; ">
<div id="mySidenavv" class="sidenavv" >
<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

  include("menu.php");
?>

</div>

<div id="main"  scrolling="no" style=" width:66%;float:left; margin-top:0%; border: none !important;" href="#mySidenav">

<span id ="sp1" style="display:none; width:10%;cursor:pointer;"  onclick="openNav('sp1')"><img src="../image/menuforward.png" alt="hide image"></span>

<h1>Modules</h1>

<?php


include '../db.php';
$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
echo $courseforAssignment;
echo $batch_No;
$sql = "SELECT module_Id FROM follow_module WHERE course_Id='$courseforAssignment' AND batch_No='$batch_No'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row= $result->fetch_assoc() ) {

    $mo_ID=$row['module_Id'];
    $sql2 = "SELECT * FROM module WHERE module_Id='$mo_ID'";
    $result2 = $conn->query($sql2);

      if ($result2->num_rows > 0) {
        ?>    
        <?php
        while($row2= $result2->fetch_assoc() ) {

          ?>
          <h2><?php echo $row2['module_Title'] ;?></h2>
          <hr>
          <p > <?php echo $row2['body'] ;?></p>
          <br>
          <?php 
         // if($row2['link']!=''){
            ?>
            <li ><a href= "<?php echo $row2['link']; ?> " target="main" > <?php echo $row2['module_Title'] ;?></a></li>
            <br>
            <?php
          //}
          ?>
       
          <?php
        
        }
        ?> 
        <?php
      }
    }
  }else{
    echo"No modules published";?><br><?php
  }
?>

</div>

<div id=msg>

<?php
    include("msgnotification.php");
?>
</div>

</body>
</html>
<?php
}
?>