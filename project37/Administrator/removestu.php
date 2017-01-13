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
    <?php 
     include("../db.php");
    if(isset($_POST["removest"])){
        
            foreach ($_POST["check"] as $value){
                $use=(int)$value;
                echo $use;
                $quer="DELETE FROM user WHERE user_id='$use'";
                mysqli_query($conn,$quer);
            }
           unset($_POST["removest"]);
           header('Location:newstulist.php');
}

?>

    <div class="box2"  ><?php

    include('index.php');
    ?> 
    </div>
    
    <div class="box3"     >
        <h2>Student List</h2>
        <?php 
        include "../db.php";
        $stulistaql="SELECT user_id,name,email FROM user WHERE Type=1";
        $stulist=mysqli_query($conn,$stulistaql);
        ?>
        <form action="removestu.php" method="post" >
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
            $emai=$rowdata["email"];
             
            ?><tr>
                <td class="td"><input class="checkbox" type="checkbox" name="check[]" value=<?php print($id);?>></td>
                <td class="td" ><?php print($id);?></td>
                <td class="td" ><?php print($name);?></td>
                  
            </tr> 
            <?php
        }
        ?>
        </table>
         <input type="submit" name="removest" value="Remove" onclick="return confirm('This is irreversible. Are you sure?');" />

        </form>
             
    </div>      
     
</body>
</html>
<?php
}
?>