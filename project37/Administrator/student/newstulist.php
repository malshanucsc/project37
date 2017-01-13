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
        <h2>Student List</h2>
        <?php 
        include "../db.php";
        $connect=mysqli_connect("localhost","root","","project_db");
        $stulistaql="SELECT user_id,name,email FROM user WHERE Type=1";
        $stulist=mysqli_query($connect,$stulistaql);
        ?>
        <table id="table">
        <tr>
        <th class="th">USER ID</th>
        <th class="th">NAME</th>
        <th class="th">EMAIL</th>   
        <th class="th">PROFILE</th>
        </tr>
        <?php
        while($rowdata=mysqli_fetch_assoc($stulist)){
            $id=$rowdata["user_id"];
            $name=$rowdata["name"];
            $emai=$rowdata["email"];
             
            ?><tr>
                <td class="td" ><?php print($id);?></td>
                <td class="td" ><?php print($name);?></td>
                <td class="td" ><?php print($emai);?></td>
                <td class="td" ><a href="stupofile.php?stid=<?php print($id);?> " ><button type="button" style="cursor:pointer;">Profile</button></a></td>
            </tr> 
            <?php
        }
        ?>
        </table>

    <div class="sub3">  <input type="button" value="Add New Sudent" onclick="location='newadd_stu.php'" style="cursor:pointer;" /> </div> 
             
    </div>      
     
</body>
</html>
<?php
}
?>