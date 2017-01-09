<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="user_home_style/user_home.css">
<base target="_self" />
<style type="text/css">

body {
    font-family: "calibri", sans-serif;
    padding:0px;
    margin: 0px;
}

#clockbox{
font-weight: bold;
 margin-top: 12px;
    padding: 0;
  color:white;

}
</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" > 
 

function ifr(id1){

  $('#ivf1').attr('src', id1);

}

  
   tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
   tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

   function GetClock(){
   var d=new Date();
   var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear(),nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

     if(nhour==0){ap=" AM";nhour=12;}
   else if(nhour<12){ap=" AM";}
   else if(nhour==12){ap=" PM";}
   else if(nhour>12){ap=" PM";nhour-=12;}

   if(nyear<1000) nyear+=1900;
   if(nmin<=9) nmin="0"+nmin;
   if(nsec<=9) nsec="0"+nsec;

   document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
}

  function timer(){
   GetClock();
   setInterval(GetClock,1000);
}
   
 
 </script>


 

</head>
<img src="image/banner.jpg" alt="MAIN BANNER" style="width:100%;height:100%;">

<div id=usermenu>

<ul style="margin-top:0%;">
<li><a href="user_courses.php" target="_parent">Courses</a>
</li>
<li class="active"><a onclick="ifr('profile.php');" href="profile.php" target="_parent" >Profile</a></li>

<?php

include '../db.php';

$User_IDforInbox=$_SESSION['username'];

$sql = "SELECT new FROM message WHERE user_Id='$User_IDforInbox'AND new=1";

$result = $conn->query($sql);
$size = mysqli_num_rows($result);

if ($size> 0) {
?>

<li style=""><a href="inbox.php" target="_parent" style="float: left; ">Inbox&nbsp<img height="" style="" src="../image/message2.png"><?php echo "(".$size.")";?></a></li>
<?php
}else{
  ?>
<li><a href="inbox.php" target="_parent">Inbox</a></li>
<?php  
}

?>
   <li><a href="../logout.php" target="_parent">Logout</a></li>
  <li id=clock><div id="clockbox">Today, January 1, 0000 00:00:00 AM</div></li>

</ul>
</div>

<?php
  include "../db.php";
// session_start();
 $name=$_SESSION['name'];
 $type=$_SESSION['type'];

?>
<li style="background-color:#f3f9fe;width:100%; text-decoration:underline; font-weight: bold;list-style: none; ">Logged in as &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <?php echo $name; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : Student</li>

</body>
</html>