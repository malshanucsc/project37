<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title><!--
<link rel="stylesheet" type="text/css" href="user_home_style/user_home.css">
-->
<base target="_self" />
<style type="text/css">


#usermenu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #339252!important;
    
}
#usermenu a:hover, a:active {
    background-color: #3CB371 !important;
    border-radius: 5%;
}
#usermenu ul li{
    float: left;
    width:8%;

    
}
#usermenu li a {
    display: inline-block;
     background-color:#339252!important;
     text-align: center;
    padding: 5% 5%;
    color:white;
    text-decoration: none;
    font-weight: bold;
    
}

#usermenu li a:hover, .dropdown:hover .dropbtn {
    background-color: white;
}









</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" > 
 


 
 </script>


 

</head>
<body>






<div id=usermenu>

<img src="image/banner.jpg" alt="MAIN BANNER" style="width:100%;height:100%;">


<ul>
<li><a href="admin.php" target="_parent">Home</a>
</li>
<li><a href="profile.php" target="_parent" >Profile</a></li>

<li><a href="sent_messages.php" target="_parent" style="float: left; ">Messaging<a></li>
   <li><a href="../logout.php" target="_parent">Logout</a></li>
 
</ul>
</div>

<?php
  include "../db.php";
// session_start();
 $name=$_SESSION['name'];
 $type=$_SESSION['type'];

?>
<li style="background-color:#f3f9fe;width:100%;  font-weight: bold;list-style: none; ">Logged in as &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <?php echo $name; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : Administrator</li>

</body>
</html>