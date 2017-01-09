<!DOCTYPE html>
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



<html>
<head>

<link rel="stylesheet" type="text/css" href="menustyles.css">
<style>

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

    document.getElementById("mySidenav").style.width = "13%";
    document.getElementById("main").style.marginLeft = "22%";
     document.getElementById("main").style.width= "66%";
}

function closeNav(sp1) {
	var e = document.getElementById(sp1);
	e.style.display='block';
  e.style.zIndex="1";
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "5%";
    document.getElementById("main").style.width= "80%";;
    
}


function reload1 () {
   
 $_SESSION['currentsrc']=document.getElementById('ivf1').src;
  $sce=$_SESSION['currentsrc'];

}

</script>

<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>
<body onload="reload1();loadNav('sp1');" >
<iframe width="100%" height="220px" frameborder="0" src="user_home.php" ></iframe>

<div class="def" style="float:left; width:85.5%; margin-left:0%; margin-top:0%;">



<div id="mySidenav" class="sidenav" >
<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

  include("menu.php");
?>
</div>
<?php


  include("mainmodule.php");
?>
</div>
<div  id=msg>

<?php
    include("msgnotification.php");
?>
</div>
     
</body>
</html> 
<?php
}
?>
