<?php

  include ('../dbase.php');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="../css/adstyle.css">

    </head>
    <body>
         <div id="header">

            <div class = "banner">
                <img id="logo" src="../img/logo.png">
            </div>
            	<img id="logo2" src="../img/logo2.png"/>
        </div>

            <div class = "date">
                <p id="demo"></p>

                <script>
                var d = new Date();
                document.getElementById("demo").innerHTML = d.toDateString();
                </script>

            </div>


        <div id="nav">

            <ul>
                <li><a href="addques.php">Add Questions</a></li>
                <li><a href="viewques.php">View Questions list</a></li>
                <li><a href="del_update.php">Update and delete</a></li>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </div>
        <div id="section">
            <h1>Welcome to Admin Panel!</h1>

        </div>


  <div id="footer">
            Copyright © 2016 Quizter
        </div>
    </body>
    </html>


    <?php //include('footer.html') ?>
