<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Questions</title>
		<link rel="stylesheet" type="text/css" href="../css/qstyle.css">

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



<?php

    include('../dbase.php');

    $sql = "select * from questions";

    $res = mysqli_query($con,$sql);

    echo "<table border=1>
     <tr>
    <th>qId</th>
    <th>Questions</th>
    <th>Correct answer</th>
    <th>Answer 1</th>
    <th>Answer 2</th>
    <th>Answer 3</th>
    <th>Answer 4</th>
    <th>Category</th>
    </tr>";
    
    /*$numrows = mysqli_num_rows($res);
    echo $numrows;
            
    for($fid=0;$fid<mysqli_num_fields($res);$fid++){
        echo "<thead>";
        echo "<th>";
        echo "&nbsp&nbsp&nbsp;".mysql_field_name($res,$fid);
        echo "</th>";
        echo "</thead>";
    }*/
    
  

        while($row = mysqli_fetch_array($res)){
            echo "<tr><td>".$row['qId']."</td><td>".$row['question']."</td><td>".$row['correct_ans']."</td><td>".$row['ans1']."</td><td>".$row['ans2']."</td><td>".$row['ans3']."</td><td>".$row['ans4']."</td><td>".$row['Category']."</td><tr>";
        }

    echo "</table>";




?>
</div>
<div id="footer">
          Copyright © 2016 Quizter
      </div>
  </body>
  </html>

        </div>

    </body>

</html>
