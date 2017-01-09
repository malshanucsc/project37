<html>

  <head>

    <title>R I T T I</title>

 
    <link rel="stylesheet" href="bluebery.css" />
    <style type="text/css">
    {
      margin: 0;
      border: 0;
      padding: 0;
    }

    body{
      background: #fff;
      font:14px/20px Arial;
      color: #555;
      margin: 0;
    }

    h1{
      text-align: center;
      font-size: 280%;
      line-height: 120%;
      padding: 2% 0;

    }

    h3{
      line-height: 110%;
      padding: 3% 0;
    }
    #h{
      padding :0%;
    }
    p{
      padding: 1%;
      font-family: helvetica;
    }

    #p1{
      text-align: center;
      font-size: 20px;
      letter-spacing: 1px;
      padding: 1px;
    }

    /*img{
      text-align: center;
      max-width: 100%;
      height: auto;
      width: auto;
    }*/

  

    a{
      color: white;
      text-decoration: none;
      
    }

    a:hover{
      color: white;
      text-decoration: underline;

    }

    header{
      background-color: #339252;
      width: 100%;
      height: 75px;
      position: fixed;
      top:0;
      left: 0;
      z-index: 100;
      opacity: 0.90;
    }

   nav{
    float: right;
    padding: 20px 20px 20px 0;
    font-size: 18px;
    font-family: helvetica;
   }

   #menu-icon{
    display: hidden;
    width: 30px;
    height: 30px;

   }

   ul{
    list-style: none;
   }

   nav ul li{
    display: inline-block;
    float: left;
    padding: 10px;
   }

   .current{
    color: #fff;
    text-decoration: underline;
   }

   #doc{
   	margin-left: 7%;
   /* margin: 40px 0;
    */background-color: white;
   }

   #content{
    /*margin: 0 auto;*/
    max-width: 1120px;
    margin-top: 110px;
   }

   .bluebery{
    max-width: 960px;
    margin-top: 110px;
   }
    

   section{
    width: 100%;
    float: left;
  
    margin: 2% 2%;
    text-align: center;

   }

  

   footer{
    background: #339252;
    width: 100%;
    overflow: hidden;
    opacity: 0.90;
   }

   footer section{
      width: 20%
    }

   footer p, footer h3{
    color: white;
    letter-spacing: 1px;
    font-family: helvetica;
   }

   .left{
    float: left;
    width: 30%;
    
   }
   .middle{
    float: left;
    
    width: 40%;
   }

   .right{
    float: left;
    
    width: 30%;
   }

     #logo{
    height: 45%;
    width: 105%;
    float: left;
    
    margin-top: 30px;
    }

   #logo2{
    width: 60%;
    height: 35%;
    float: right;
    padding: 2px;
    margin-right: 30px;
    margin-top: 30px;
   }
   
.newspaper {
    text-align: center;
    padding-bottom: 10px;
    padding-top: 10px;

    -webkit-column-count: 4; /* Chrome, Safari, Opera */
    -moz-column-count: 4; /* Firefox */
    column-count: 4;

    -webkit-column-gap: 40px; /* Chrome, Safari, Opera */
    -moz-column-gap: 40px; /* Firefox */
    column-gap: 40px;

    -webkit-column-rule: 4px outset white; /* Chrome, Safari, Opera */
    -moz-column-rule: 4px outset white; /* Firefox */
    column-rule: 4px outset white;

     -webkit-column-span: initial; /* Chrome, Safari, Opera */
    column-span:  initial;
}
.email{
  text-align: center;
  color: #000;
  background-color: #ccc;
  border-color: black;
  padding: 5px;
  border-bottom: 1px;
  border-width: 1px;

}






    .white_content {
        display: none;
        position: fixed;
        top: 20%;
        left: 28%;
        width: 40%;
        height: 55%;
        padding: 16px;
        border: 16px solid white;
        background-color: #3c8f59;
        z-index:1002;
        overflow: auto;
    }


  .black_overlay{
        display: none;
        position: fixed;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }




















  /*bole mewage colors ona widihata wenas karaganna, dont put too many colors on one page. */

    </style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
   







    <script>
      $(window).load(function(){
        $('.bluebery').bluebery();
      });

    </script>
  </head>
  <body onload="Slider();">
    <header>
      
      <nav>
        <a href="#" id="menu-icon"></a>
        <ul>
          <li><a href="home.php" class="current">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contacts</a></li>
          <li><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Login</a></li>
        </ul>
      </nav>
     </header> 
     <div id="doc">
      <div id="content">
        <div class="square">


        		


        <img src="img/ban.jpg"/>

        </div> 
      </div>
     </div> 

     <div class="left">
      <img src="img/logo.png" id= "logo"/>
      
     </div>
     <div class="middle">
      <h1>E-FORCE</h1>
      <p id="p1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into </p>
     </div>
     <div class="right">
       <img src="img/logo2.png" id= "logo2"/>
    </div>  
     <footer>
      
<div class="newspaper">
        <h3 id="h"><b>Panagoda</b></h3>
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
    
<div class="email">
  rtti@army.lk
</div>

     </footer>  























<div id="fade" class="black_overlay"></div>


<div id="light" class="white_content">

	<form class="formlog" action="form_handle.php" method="post">
	<h2 align="center" font ="calibri">Log in</h2>
	<h4 style="width:90%; margin-left:5%;">Username  :</h4><br><br>
	<input type="text" name="fname" style="width:90%; margin-top:-10%;margin-left:5%;"><br>
    <h4 style="width:90%; margin-left:5%;">Password  :</h4><br><br>
    <input type="password" name="pwd" style="width:90%; margin-top:-10%; margin-left:5%;"><br><br>
  <input type="submit" font="calibri" value="Log in" style="width:30%;margin-left:5%;"><br><br>
<a style="width:30%;margin-left:5%;" href="" onclick="alert('Password resetting is not yet buid.Contact your institute head !') ">Forget Password ?</a>

<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>
</form>









































  </body>

</html>