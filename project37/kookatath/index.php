
<html >
<head>

<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="brrr.css">
<link href="https://fonts.googleapis.com/css?family=Orbitron|Raleway" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<title>R I T T I</title>

<script type="text/javascript" > 
 
$("#slideshowindex > div:gt(0)").hide();

setInterval(function() {
  $('#slideshowindex > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshowindex');
}, 3000);   
 
 </script>


</head>

<body>

	<style>
/*#vcontainer {
  display: table;
  height: 100%;
  width: 100%;
}
#hcontainer {

  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
#content {
	padding: 10px 10px 10px 10px;
  display: inline-block;
  border: lightGray 1px solid;
 
  text-align: left;*/
}
</style>
<body>
  <div id="nav1"> 
  	<h1><a href="index.php">E-Force</a></h1>

  		<ul>

  			
  		      <div id="login">
        <a href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Log In<a>
      </div></ul>	
  	 </div> 

     <div id="main-content">

     <!--  <div id="logo">
        <img src="rittilogo.png">
      </div>
 -->
    <div id="indexheading">
      
      <br>
      <h1>Welcome to E-Force</h1><br>
      <p><strong>The E-learning Platform of Ranaviru Information Technology Training Institute for betterment of the future</strong></p>
      <br><br>


    </div>
<!-- 
      <div id="logo" style="float: bottom; ">
        <img src="eflogo.png">
      </div>       -->



<div id="slideshowindex">




        <div id=imgdiv>                                                    

    <img id="newsimage" src="img/01.jpg" alt="No image" >
    </div>

        <div id=imgdiv>     

    <img id="newsimage" src="img/02.jpg" alt="No image" >
    </div>

        <div id=imgdiv>                                           

    <img id="newsimage" src="img/03.jpg" alt="No image" >
    </div>
        <div id=imgdiv>                                                    

    <img id="newsimage" src="img/04.jpg" alt="No image" >
    </div>

        <div id=imgdiv>                                          

    <img id="newsimage" src="img/05.jpg" alt="No image" >
    </div>


</div>






      <div class="newspaper">
        <h3><b>Panagoda</b></h3>
        <p><b>Tel: 0112 74 84 94 / Ext 57284</b><br><br>
        Ranaviru Information Technology<br>
        Training Institute<br>
        Sri Bobhirajaramaya<br>
        Panagoda, Homagama</p>
     
        <h3><b>Kandy</b></h3>
        <p><b>Tel : 081-2205484</b><br><br>
        Signal School<br>
        Boowelikada,<br>
        Kandy </p>
  

        <h3><b>Kokavil</b></h3>
        <p><b>Tel : 0243244862</b><br><br>
        Signal Centrel Workshop<br>
        Kokavil <br>
        Kilinochchi </p>
   

        <h3><b>Anuradhapura</b></h3>
        <p><b>Tel : 0252235073/ Ext 53866</b><br><br>
        Ranasewapura<br>
        Anuradhapura</p>
   
    </div>
     </div>
<div id="fade" class="loginblack_overlay"></div>


<div id="light" class="loginwhite_content">

  <form class="formlog" action="form_handle.php" method="post">
  <h1 align="center" font ="calibri" style="color:white;">Log in</h1>
  <h2 style="width:90%; margin-left:5%; color:white;">Username  :</h2>
  <input font-size="22pt" type="text" name="fname" style="width:50%; margin-left:5%;"><br>
    <h2 style="width:90%; margin-left:5%;color:white;">Password  :</h2>
    <input type="password" name="pwd" style="width:50%;  margin-left:5%;"><br><br>
  <input type="submit" font="calibri" value="Log in" style="width:20%;margin-left:5%;"><br><br>
<a style="width:30%;margin-left:5%;" href="forget_password.php">Forget Password ?</a>
</form>

<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>


</body>
</body>
</html>