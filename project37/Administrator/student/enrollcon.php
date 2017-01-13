<?php 
session_start();
 include "../db.php";
 $connect=mysqli_connect("localhost","root","","project_db");
 $couid=(int)$_SESSION["cour_id"];
  
if(isset($_POST["submit"])){
            foreach ($_POST["check"] as $value){
                $use=(int)$value;
                 
                $quer="INSERT INTO course_follow (user_id,course_id) VALUES ('$use','$couid')";
                mysqli_query($connect,$quer);
            }
            unset($_POST["submit"]);
           

        }

if(isset($_POST["Unenroll"])){
            foreach ($_POST["check"] as $value){
                $use=(int)$value;
                 
                $quer="DELETE FROM course_follow WHERE course_id='$couid' AND user_id='$use'";
                mysqli_query($connect,$quer);
            }
           unset($_POST["Unenroll"]);
           

}
header('Location:courstulist.php');?>
 