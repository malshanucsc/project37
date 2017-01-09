

<?php

   include 'db.php';

	
	//if(isset($_POST["submit"])){
	$u_Id=$_POST["fname"];
	$pword=$_POST["pwd"];
	

	$sql = "SELECT name,Type FROM user WHERE password='$pword' AND user_Id='$u_Id'";


	$result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
        
        
 session_start();
        if(mysqli_num_rows($result)>0){
            
            $_SESSION['name']=$count[0];
            $_SESSION['type']=$count[1];
            if($count[1]==1 ){


               
                $_SESSION['username']=$u_Id;
                $_SESSION['username']=$u_Id;
                $_SESSION['password']=$pword;
                $_SESSION['start'] = time(); 
               // $_SESSION['currentsrc']="../profile.php";
            	

                header ("Location: student/user_courses.php");
		          die();
	      
            }elseif($count[1]==2){


                $_SESSION['username']=$u_Id;
                $_SESSION['password']=$pword;
                $_SESSION['start'] = time();
                
                header("Location: lecturer/user_courses.php");
            }elseif($count[1]==3){

                $_SESSION['username']=$u_Id;
                $_SESSION['password']=$pword;
                $_SESSION['start'] = time();
                
                header("Location: Administrator/admin.php");
	        }else{
                echo "User not found";
            }
	}else{
            echo "You're not signed up. Click below to register!"; 
        }

	?>