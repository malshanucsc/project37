<?php

   include 'db.php';
   session_start();
//$loca = $_GET['csrc'];

  
  if(isset($_POST["submit"])){
  $u_Id=$_POST["fname"];
  $pword=$_POST["pwd"];
  $_SESSION['username']=$u_Id;
    $_SESSION['password']=$pword;

  $sql = "SELECT name,Type FROM user WHERE password='$pword' AND user_Id='$u_Id'";


  $result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
        
        

        if(mysqli_num_rows($result)>0){
            if($count[1]==1 ){


                
               // $loca="user_home/user_home.php";
              //  $loca = $_GET['csrc'];
               
                $_SESSION['start'] = time(); // Taking now logged in time.
              // Ending a session in 30 minutes from the starting time.
           //   $_SESSION['expire'] = $_SESSION['start'] + (60);
            //  session_start();

                header ("Location: $loca");
              die();
        
            }elseif($count[1]==3){
                header("Location: admin/admin.php");
          }else{
                echo "User not found";
            }
  }else{
            echo "You're not signed up. Click below to register!"; 
        }
        
   }

  ?>


  <html>
<head>

<style type="text/css">

body {
    font-family: "calibri", sans-serif;
}


img {
   position: relative;
   top: 1%;
   left: 1%;
    border: 3px solid white;
	padding: 2px;
   margin-top: 0.5%; 
   margin-left: 1%;
}

hr{color:white}
div {
position:relative;
    width: 33%;
	height:33%;
    padding: .1%;
    border: 2px solid grey;
   margin-top: 0.5%; 
   margin-left: 33%;
}
.colform { float:left; width:20%;height:25%; font-family:calibri;background-color:lightblue;}
.font{font-family:calibri; }
.form1{margin-top:0%;height:30%}
.pmarge{margin-top:3%;margin-left:10%;height:10%;}
</style>
<link rel="icon" href="image/rittilogo.png" type="image/gif" sizes="16x16">
</head>
<body style="background-color:#8DA7B0;" >

<br/>

<form class="form1" style="background-color:lightblue;"  >
<img src="image/MAIN BANNER.png" alt="MAIN BANNER" style="width:95%;height:85%;">
<hr/> 
</form>

<form style="display: block;" align="left" action="form_handle.php" method="post">
<div style="display: inline-block;border: none !important;">
<h2 align="center" font ="calibri">Log in</h2>


	<p class="font" align="center" font="calibri" height="50%">Username  :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="fname"><br><br>
    Password  &nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="pwd"><br><br>
  <input type="submit" font="calibri" value="Submit"><br>
<a href="http://www.google.com" onclick="alert('password not yet set !') ">Forget Password ?</a>
</p>


</div>  
</form>
<br>
<br>
  
 <h3 align="center" >Ranaviru Information Technology Training Institute</h3>
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
Email : rittikdy@army.lk</p>
 </form>
 <form class="colform"><p class="pmarge">
Ranaviru IT Anuradhapura<br>
Ranasewapura,<br>
Anuradhapura,<br>
Tele :0252 23 50 73<br> 
Army Ext - 53866<br> 
Email : rittianp@army.lk</p>
 </form>
 <form class="colform"><p class="pmarge">
 Ranaviru IT Kuruwita<br>
Regimentle of Gemunu watch,<br>
Kuruwita<br>
Rathnapura <br>
Email : rittikrw@army.lk</p>
 </form>
 <form class="colform"><p class="pmarge">
 Ranaviru IT Kokavil<br>
Signal Centrel Workshop,<br> 
Kokavil, <br>
Kilinochchi.<br>
Tele : 0243244862 <br>
Email : rittikkv@army.lk</p>
 </form>


<?php
echo $loca;
?>

</body>
</html>

