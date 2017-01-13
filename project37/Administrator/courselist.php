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
          

include("user_home.php");
    include('header.php');?>

    <div class="box2"   ><?php

    include('index.php');
    ?> 
    </div>
    <div class="box2"     >
        <h2>Course Details</h2>
        <?php 
        include "../db.php";
        $stulistaql="SELECT course_id,Course_name,duration FROM course ";
        $stulist=mysqli_query($conn,$stulistaql);
        mysqli_close($conn);
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