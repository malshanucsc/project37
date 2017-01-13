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
<title> &nbsp&nbsp&nbspR I T T I</title>
<link rel="stylesheet" type="text/css" href="css/menustyles.css">
<base target="_self" />
<link rel="stylesheet" type="text/css" href="user_home_style/user_home.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection">
         
<style type="text/css">
body{margin:1px;}
b{font-size:18px;}
	.div {    margin-bottom:20px; margin-left:auto; margin-right:auto; padding-bottom: 15px; width: 75% ;} 
	.title { float: left; width: 20%; text-align: right; padding-right: 10px;  } 
	.radio-buttons label { float: none;} .submit { text-align: right; float:right;} 
	.sub2{width:60%;}
	.sub3{width:50%;}

	input[type="text"],input[type="number"]
	{
    font-size:100%;
	}
	.box2{
	 
	margin:1em;
	margin-left:auto;
	margin-right:auto;
	vertical-align:top;
	}
	 
}
</style>
<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">
</head>
<body>
 


<div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
	include("user_home.php");
?>     
</div>
 

<div class="box2"   style="margin-left:auto;margin-right:auto;  width:70%;  left: 2.75%; margin-top:1%; background-color:#f3f9fe !important;border:solid 1px #E5E4E2; border-radius: 5px;   ">
<h1 style="text-align:center; color:blue;">Student Profile</h1>
<?php 
$sid=(int)$_GET["stid"];
include("../db.php");
$stuproftaql="SELECT * FROM user WHERE user_id=$sid";
$stuprof=mysqli_query($conn,$stuproftaql);
?>
 
<?php
$rowdata=mysqli_fetch_assoc($stuprof);
	$id=$rowdata["user_Id"];
	$name=$rowdata["name"];
	$emai=$rowdata["email"];
	$nic=$rowdata["NIC"];
	$pwd=$rowdata["password"];
	$dob=$rowdata["dob"];
	$conno=$rowdata["contact_No"];
	$branid=$rowdata["branch_Id"];
	$addre=$rowdata["address"];
	?><div class="div">  <label   class="title"><b>Student Name :</b></label>  <input class="sub2" type="text"   name="name" value="<?php print($name);?>"  /> </div> 
	<div class="div">  <label   class="title"><b>NIC :</b></label>  <input class="sub2" type="text"   name="nic" value="<?php print($nic);?>"  /> </div>
	<div class="div">  <label   class="title"><b>Password :</b></label>  <input class="sub2" type="password"   name="pwd" value="<?php print($pwd);?>"  /> </div>
	<div class="div">  <label   class="title"><b>Date of Birth :</b></label>  <input type="date"   name="dob" value="<?php print($dob);?>" /> </div>
	<div class="div">  <label for="email" class="title"><b>Email :</b></label>  <input class="sub2" type="email" id="email" name="email" value="<?php print($emai);?>"  /> </div>
	<div class="div">  <label   class="title"><b>Contact No:</b></label>  <input class="sub2" type="text"   name="conno" value="<?php print($conno);?>" /> </div>
	<div class="div">  <label   class="title"><b>Address:</b></label>  <input class="sub2" type="text"   name="address" value="<?php print($addre);?>" /> </div>
	 
		 
<?php 

?>
 

    
	 
</div>
 
</body>

	
 
</html>	


<?php } ?>