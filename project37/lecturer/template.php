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
<link rel="stylesheet" type="text/css" href="../stylesheet.css">

<base target="_self" />
<style type="text/css">

#boxbody{
 
  overflow: auto;
  overflow-x: hidden;  
  border-radius: 0.2%;
  margin-top: 1%;
  width: 70%;
  border: solid 2px #cccccc;
  margin-left:15%; 
 
}


</style>
<script>
window.onload = function() {
  timer();
};

</script>

<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">


</head>
<body>
 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >










</div>


</body>
</html>
<?php
}
?>