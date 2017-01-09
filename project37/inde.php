<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="page1style/page1style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 
<script type="text/javascript" > 
 function Slider(){
$(".slider #1").show("fade",500);
$(".slider #1").delay(3000).hide("slide",{direction:"left"},500);

var sc=$(".slider img").size();
var count=2;
setInterval(function(){

$(".slider #"+count).show("slide",{direction:"right"},500);
$(".slider #"+count).delay(3000).hide("slide",{direction:"left"},500);
if(count==sc){
count=1;
}else{
count=count+1;
}
},4500);

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


function ifrbranch(id1,id2){
var e2 = document.getElementById(id2);
var e = document.getElementById(id1);

//if(e.style.display !="block"){
 //e2.style.display = 'block';
  e2.style.display = 'none';
  e.style.display = 'none';
 //e.style.display = 'block';

//}else{

//e.style.display = 'block';
//}

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

   document.getElementById('clockbox').innerHTML=""+tday[nday]+" "+tmonth[nmonth]+" "+ndate+" "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
}

  function timer(){
   GetClock();
   setInterval(GetClock,1000);
}
   


 </script>


<link rel="icon" href="image/rittilogo.png" type="image/gif" sizes="16x16">

</head>
<body style="" onload="timer();Slider();">

<div >

<ul>
  <li class="active"><a href="index.php">Home</a></li>
<li class="dropdown">
  <a href="" class="dropbtn">Courses</button>
  <div class="dropdown-content">
  <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/slccl.php" target="iframe_i">SLCDLC</a>
    
    <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/graphic-2.php" target="iframe_i">Graphic Design</a>
    <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/hardware-2.php" target="iframe_i">Hardware</a>
	<a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/web.php" target="iframe_i">Web Design</a>
    <a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/acit.php" target="iframe_i">Kids Course</a>
  </div>

</li>

<li><a onclick="ifrbranch('ivf1','ivf2');" >Branches</a></li>
<li ><a onclick="ifr('ivf1','ivf2');" href="http://ranaviruit.lk/about.php" target="iframe_i">About Us</a></li>	
<li id=clock><div id="clockbox">Today January 1 0000 00:00:00 AM</div></li>
 
</ul>
</div>

<br>
<div id="ivf2" >
<div  style="float:left;width:20%;">
<h2 align="center" font ="calibri">Vision</h2>

<p> To become the primary resource centre for providing IT trg for Ranaviru family members as an extended welfare service of the Sri Lanka Army.</p>
<hr>
<h2 align="center" font ="calibri">Mission</h2>
<p>To provide IT training courses at several levels of proficiency to allow trainees to pursue different career opportunities that match their qualifications, experience and ability.</p>
</div>

<div  class="slider" style="float:left;width:60%;height:30%;border-radius: 5px;border: 2px solid white;   overflow:hidden; " >
	
	<img id="1" src="img/01.jpg" border="0" alt="helping develop"/>
	<img id="2" src="img/02.jpg" border="0" alt="helping develop"/>
	<img id="3" src="img/03.jpg" border="0" alt="helping develop"/>
	<img id="4" src="img/05.jpg" border="0" alt="helping develop"/>
	
</div>	
<div  style="float:right;width:15%;">

<form class="formlog" action="form_handle.php" method="post">
<h2 align="center" font ="calibri">Log in</h2>
	<p class="font" align="center" font="calibri" height="50%" style="text-align:left;"><h4 style="width:90%; margin-left:5%;">Username  :</h4><input type="text" name="fname" style="width:90%; margin-top:-10%;margin-left:5%;"><br>
    <h4 style="width:90%; margin-left:5%;">Password  :</h4><input type="password" name="pwd" style="width:90%; margin-top:-10%; margin-left:5%;"><br><br>
  <input type="submit" font="calibri" value="Log in" style="width:30%;margin-left:5%;"><br><br>
<a style="width:30%;margin-left:5%;" href="" onclick="alert('Password resetting is not yet buid.Contact your institute head !') ">Forget Password ?</a>
</p>

</form>
</div>

<div style="clear:both; font-size:1px;"></div>
</div>
<div ><iframe id ="ivf1" class="overlay" width="100%" height="900px" src=""  name="iframe_i"></iframe>
</div>

<div >

<div align="center">
 <h3 align="center" >Ranaviru Information Technology Training Institute</h3>
</div>
<hr>
<br><br>
<div id=message>
<table>
<tr>
<th>Ranaviru IT Panagoda</th> 
<th>Ranaviru IT Kandy</th>
<th>Ranaviru IT Anuradhapura</th>
<th> Ranaviru IT Kuruwita</th>
<th> Ranaviru IT Kokavil</th>

</tr>

<tr>
  <td>Sri Bodhirajaramaya,<br>
Panagoda,<br>
Homagama.<br>
Tele : 0112 - 74 84 94<br> 
(Army Ext-57284)<br>
Email : rittipng@army.lk</td>


  <td>Signal School,<br> 
Boowelikada,<br> 
Kandy.<br> 
Tele :0812 20 54 84<br>  
Email : rittikdy@army.lk</td>


  <td>Ranasewapura,<br>
Anuradhapura,<br>
Tele :0252 23 50 73<br> 
Army Ext - 53866<br> 
Email : rittianp@army.lk</td>


  <td>Regimentle of Gemunu watch,<br>
Kuruwita<br>
Rathnapura <br>
Email : rittikrw@army.lk</td>


  <td>Signal Centrel Workshop,<br> 
Kokavil, <br>
Kilinochchi.<br>
Tele : 0243244862 <br>
Email : rittikkv@army.lk</td>




</tr>
</table>
</div>
</div>
</body>
</html>