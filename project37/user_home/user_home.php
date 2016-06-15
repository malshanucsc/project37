<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="user_home_style/user_home.css">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 
<script type="text/javascript" > 
 /*

function ifr(id1,id2){
var e2 = document.getElementById(id2);
var e = document.getElementById(id1);

if(e.style.display !="block"){
 e2.style.display = 'block';
  e2.style.display = 'none';
 e.style.display = 'block';

}else{

e.style.display = 'block';
}

}
*/
  
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
<body style="background-color:#677062;" onload="timer();">

<div>

<ul>
<li class="dropdown">
  <a href="" class="dropbtn">Courses</button>
  <div class="dropdown-content">
  <a onclick="ifr('ivf1');" href="course/course.html" target="iframe_a">SLCDLC</a>
    
    <a onclick="ifr('ivf1');" href="course/course.html" target="iframe_a">Graphic Design</a>
    <a onclick="ifr('ivf1');" href="course/course.html" target="iframe_a">Hardware</a>
	<a onclick="ifr('ivf1');" href="course/course.html" target="iframe_a">Web Design</a>
    <a onclick="ifr('ivf1');" href="course/course.html" target="iframe_a">Kids Course</a>
  </div>

</li>

  <li class="active"><a onclick="ifr('ivf1','ivf2');" href="../profile.php" target="iframe_b">Profile</a></li>

<li><a onclick="ifr('ivf1',ivf2');"href="../course/course.html" target="iframe_a">Inbox</a></li>
  
  <li class="ti"><div id="clockbox">Today, January 1, 0000 00:00:00 AM</div></li>
 
</ul>
</div>




	



<div ><iframe id ="ivf1" class="overlay" width="100%" scrolling="no" frameborder="0" height="900px" src="course/course.php" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" name="iframe_a"></iframe>

</div>

<div ><iframe id ="ivf2" class="overlay" width="100%" scrolling="no" frameborder="0" height="900px" src="../profile.php" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" name="iframe_a"></iframe>

</div>
</body>
</html>