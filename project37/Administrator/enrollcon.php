<?php 
session_start();
 include "../db.php";
 $couid=(int)$_SESSION["cour_id"];
  
if(isset($_POST["submit"])){
            foreach ($_POST["check"] as $value){
                $use=(int)$value;
                 
                $quer="INSERT INTO course_follow (user_Id,course_Id) VALUES ('$use','$couid')";
                mysqli_query($conn,$quer);
            }
            unset($_POST["submit"]);
           

        }

if(isset($_POST["Unenroll"])){
            foreach ($_POST["check"] as $value){
                $use=(int)$value;
                 
                $quer="DELETE FROM course_follow WHERE course_Id='$couid' AND user_Id='$use'";
                mysqli_query($conn,$quer);
            }
           unset($_POST["Unenroll"]);
           

}
header('Location:courstulist.php');?>
 