<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../stylesheet.css">
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title><!--
<link rel="stylesheet" type="text/css" href="user_home_style/user_home.css">
-->
<base target="_self" />
<style type="text/css">








</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" > 
<link
 


 
 </script>


 

</head>
<body>






<div id=usermenu>

<img src="image/banner.jpg" alt="MAIN BANNER" style="width:100%;height:100%;">


<ul>
<li><a href="user_courses.php" target="_parent">Courses</a>
</li>
<li><a href="profile.php" target="_parent" >Profile</a></li>

<?php

include '../db.php';

$User_IDforInbox=$_SESSION['username'];

$sql = "SELECT new FROM message WHERE user_Id='$User_IDforInbox'AND new=1";

$result = $conn->query($sql);
$size = mysqli_num_rows($result);

if ($size> 0) {
?>

<li><a href="lecturer_Message/inbox.php" target="_parent" >Inbox&nbsp<img height="" style="" src="../image/message2.png"><?php echo "(".$size.")";?><a></li>
<?php
}else{
  ?>
<li><a href="lecturer_Message/inbox.php" target="_parent">Inbox</a></li>
<?php  
}

?>
   <li><a href="../logout.php" target="_parent">Logout</a></li>
 
</ul>
</div>

<?php
  include "../db.php";
// session_start();
 $name=$_SESSION['name'];
 $type=$_SESSION['type'];

?>
<li style="background-color:#f3f9fe;width:100%;  font-weight: bold;list-style: none; ">Logged in as &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <?php echo $name; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : Lecturer</li>

</body>
</html>