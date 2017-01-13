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
     if(isset($_GET["cour_id"])){
        
            $_SESSION["cour_id"]=(int)$_GET["cour_id"];
            
            unset($_GET["cour_id"]);
        }
            $couid=$_SESSION["cour_id"];
             
    ?> 
    </div>
    <div class="box2"    style="width:60%; border-radius:5px;  background-color:rgb(243,236,199); margin:5px; text-align:center;">
        <h2>Student List</h2>
        <?php 
        include "../db.php";
        $connect=mysqli_connect("localhost","root","","project_db");
         

       $stulistaql="SELECT user_id,name FROM user WHERE Type=1 AND user_id in (SELECT user_id FROM course_follow WHERE course_id='$couid')";
       $stulist=mysqli_query($connect,$stulistaql);


       /*if(isset($_POST["Unenroll"])){
            foreach ($_POST["check"] as $value){
                $use=(int)$value;
                $quer="DELETE FROM course_follow WHERE course_id='$couid' AND user_id='$id'";
                mysqli_query($connect,$quer);
            }
           unset($_POST["Unenroll"]);
            header('Location: coursestulist.php');

        }
        else{*/
        ?>
        <form action="enrollcon.php" method="post">

        <table id="table">
        <tr>
        <th class="th"><input type="checkbox" id="select_all"/> Selecct All</th>
        <th class="th">USER ID</th>
        <th class="th">NAME</th>
        
         
        </tr>
        <?php
        while($rowdata=mysqli_fetch_assoc($stulist)){
            $id=$rowdata["user_id"];
            $name=$rowdata["name"];
             
             
            ?>
            <tr>
                <td class="td"><input class="checkbox" type="checkbox" name="check[]" value=<?php print($id);?>></td>
                <td class="td" ><?php print($id);?></td>
                <td class="td" ><?php print($name);?></td>
                 
            </tr> 
            <?php
        }
        ?>
        </table>
        <input type="submit" name="Unenroll" value="Unenroll"/>
        </form>
            
             
    </div>      
     
</body>
</html>

<?php

}
//}
?>