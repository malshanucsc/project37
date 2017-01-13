<?php
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            session_destroy();
            echo "Your session has expired! <a href='../login.php'>Login here</a>";
        }
        else{
            $_SESSION['start']=time();
            $name=$_SESSION['name'];
            $type=$_SESSION['type'];
          


    include('header.php');?>

    <div class="box2" style="width:18%; border-radius:5px;  background-color:rgb(243,236,199); margin:5px;" ><?php

    include('index.php');
    ?> 
    </div>
    <div class="box2"    style="width:60%; border-radius:5px;  background-color:rgb(243,236,199); margin:5px; text-align:center;">
        <h2>Course Details</h2>
        <?php 
        include "../db.php";
        $connect=mysqli_connect("localhost","root","","project_db");
        $stulistaql="SELECT course_id,Course_name,duration FROM course ";
        $stulist=mysqli_query($connect,$stulistaql);
        mysqli_close($connect);
        ?>
        <table id="table">
         
        <?php
        while($rowdata=mysqli_fetch_assoc($stulist)){
            $course_id=$rowdata["course_id"];
            $Course_name=$rowdata["Course_name"];
            $duration=$rowdata["duration"];
             
            ?><tr>
                <th class="td" ><?php print($course_id);?></th>
                <th class="td" ><?php print($Course_name);?></th>
                <th class="td" ><?php print($duration);?></th>
                 
            </tr> 
            <?php
        }
        ?>
        </table>

    <div class="sub3">  <input type="button" value="Add New course" onclick="location='addcourse.php'" style="cursor:pointer;" /> </div> 
             
    </div>      
     
</body>
</html>
<?php
}
?>