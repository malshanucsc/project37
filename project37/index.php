<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="page1style/page1style.css">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 
<script type="text/javascript" > 
 function Slider(){
$(".slider #1").show("fade",500);
$(".slider #1").delay(5500).hide("slide",{direction:"left"},500);

var sc=$(".slider img").size();
var count=2;
setInterval(function(){

$(".slider #"+count).show("slide",{direction:"right"},500);
$(".slider #"+count).delay(5500).hide("slide",{direction:"left"},500);
if(count==sc){
count=1;
}else{
count=count+1;
}
},6500);

}

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
<body style="background-color:#677062;" onload="timer();Slider();">

<div>

<ul>
  <li class="active"><a href="index.php">Home</a></li>
<li class="dropdown">
  <a href="" class="dropbtn">Courses</button>
  <div class="dropdown-content">
  <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/slccl.php" target="iframe_a">SLCDLC</a>
    
    <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/graphic-2.php" target="iframe_a">Graphic Design</a>
    <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/hardware-2.php" target="iframe_a">Hardware</a>
	<a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/web.php" target="iframe_a">Web Design</a>
    <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/acit.php" target="iframe_a">Kids Course</a>
  </div>

</li>

<li><a onclick="ifr('ivf1','ivf2');"href="branches.html" target="iframe_a">Branches</a></li>
  <li ><a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/about.php" target="iframe_a">About Us</a></li>	
  <li class="ti"><div id="clockbox">Today, January 1, 0000 00:00:00 AM</div></li>
 
</ul>
</div>




<hr>
<div id="ivf2" >
<div  style="float:left;width:20%;">
<h2 align="center" font ="calibri">Vision</h2>

<p> To become the primary resource centre for providing IT trg for Ranaviru family members as an extended welfare service of the Sri Lanka Army.</p>
<hr>
<h2 align="center" font ="calibri">Mission</h2>
<p>To provide IT training courses at several levels of proficiency to allow trainees to pursue different career opportunities that match their qualifications, experience and ability.</p>
</div>
<div style="float:left;width:2%;"><p>  </p></div>

<div  class="slider" style="float:left;width:60%;" >
	
	<img id="1" src="img/01.jpg" border="0" alt="helping develop"/>
	<img id="2" src="img/02.jpg" border="0" alt="helping develop"/>
	<img id="3" src="img/03.jpg" border="0" alt="helping develop"/>
	<img id="4" src="img/05.jpg" border="0" alt="helping develop"/>
	
</div>	
<div  style="float:right;width:15%;">

<form class="formlog" action="form_handle.php" method="post">
	
<h2 align="center" font ="calibri">Log in</h2>
	<p class="font" align="center" font="calibri" height="50%">Username  :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="fname"><br><br>
    Password  &nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="password" name="pwd" ><br><br>
  <input type="submit" font="calibri" value="Submit" ><br>
<a href="http://www.google.com" onclick="alert('password not yet set !') ">Forget Password ?</a>
</p>

</form>
</div>

<div style="clear:both; font-size:1px;"></div>
</div>
<div ><iframe id ="ivf1" class="overlay" width="100%" height="900px" src="demo_iframe.htm"  name="iframe_a"></iframe>
</div>

<div >

<div align="center">
 <h3 align="center" >Ranaviru Information Technology Training Institute</h3>
</div>
<hr>
<form class="colform" ><p class="pmarge">
Ranaviru IT Panagoda<br>
Sri Bodhirajaramaya,<br>
Panagoda,<br>
Homagama.<br>
Tele : 0112 - 74 84 94<br> 
(Army Ext-57284)<br>
Email : rittipng@army.lk</p> 
 </form>
 <form class="colform"><p class="pmarge">
Ranaviru IT Kandy<br> 
Signal School,<br> 
Boowelikada,<br> 
Kandy.<br> 
Tele :0812 20 54 84<br>  
Email : rittikdy@army.lk<br><br></p>
 </form>
 <form class="colform"><p class="pmarge">
Ranaviru IT Anuradhapura<br>
Ranasewapura,<br>
Anuradhapura,<br>
Tele :0252 23 50 73<br> 
Army Ext - 53866<br> 
Email : rittianp@army.lk<br><br></p>
 </form>
 <form class="colform"><p class="pmarge">
 Ranaviru IT Kuruwita<br>
Regimentle of Gemunu watch,<br>
Kuruwita<br>
Rathnapura <br>
Email : rittikrw@army.lk<br><br><br></p>
 </form>
 <form class="colform"><p class="pmarge">
 Ranaviru IT Kokavil<br>
Signal Centrel Workshop,<br> 
Kokavil, <br>
Kilinochchi.<br>
Tele : 0243244862 <br>
Email : rittikkv@army.lk<br><br></p>
 </form>

</div>
</body>
</html>