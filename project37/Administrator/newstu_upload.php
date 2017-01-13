<?php
    session_start();

    
    
        $now = time();  
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
     function nic($nic){
	 	if(strlen($nic)==10){
	 		$numeric=substr($nic,0,9);
	 		$v=substr($nic,-1);
	 		if((ctype_digit($numeric))&&$v=="v"){
	 			return true;
	 		}
	 		else{
	 			return false;
	 		}
	 	}
	 	if(strlen($nic)==12){
	 		if(ctype_digit($nic)){
	 			return true;
	 		}
	 		else{
	 			return false;
	 		}
	 	}
	 	else{
	 		return false;
	 	}
	 }
    function csvupload($nic,$name,$dob,$email){
    	if($nic and $name and  $dob and $email){
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					return false;
   				}

				else if(!nic($nic)){
					return false;
 				}
				
  				else{
  					return true;
  					 
  				} 
		}

		else{
				 return false;
			}
    }
    include("../db.php");

	if(isset($_POST["submit"])){
		
		 if($_FILES['file']['name']){
		 	
			$filename=explode(".",$_FILES['file']['name']);
			if($filename[1]=='csv'){
				
				$handle=fopen($_FILES['file']['tmp_name'],"r");
				$var=true;
				$i=0;
				$student=array();
				
				while($data=fgetcsv($handle) ){
					$item1=mysqli_real_escape_string($conn,$data[0]);//nic
					$itepwd="group37";
					$item2=mysqli_real_escape_string($conn,$data[1]);//name 
					$item3=mysqli_real_escape_string($conn,$data[2]);//dob
					
					$item5=mysqli_real_escape_string($conn,$data[4]);//contact
					$item6=mysqli_real_escape_string($conn,$data[5]);//address
					$itembranch=1;
					$itemtype=1;
					$itemregi=1003;
					$item4=mysqli_real_escape_string($conn,$data[3]);//email
					$itempassrese=0;
 
					$nic=(string)$item1;
					$name=(string)$item2;
					$dob=(string)$item3;
					$emai=(string)$item4;

					 $var=csvupload($nic,$name,$dob,$emai);
					?>
					 
					<?php
					 

				 
					if($var){
						$student[$i]=array($item1,$itepwd,$item2,$item3,$item5,$item6,$itembranch,$itemtype,$itemregi,$item4,$itempassrese);
						$i++;
						

					}
					else{
						$var=false;
						$studnet=null;
						?><script>
							window.alert("The error occurd in line   "+'<?php echo $i+1 ?> ' );
						</script> <?php
						break;

					}
					 
				if($var){
					 foreach($student as $stu){
					 	$sql="INSERT INTO user(NIC,password,name,dob,email,contact_No,address,branch_Id,Type,registeredby)  VALUES('$stu[0]','$stu[1]','$stu[2]','$stu[3]','$stu[4]','$stu[5]','$stu[6]','$stu[7]','$stu[8]','$stu[9]')";
					 	mysqli_query($conn,$sql);
						 }
				 	
				  	fclose($handle);
				  	unset($_POST);
				  	header('Location:newstulist.php');

				  }
				 else{ 

				  }
				
				
			}
		 }
	}
	mysqli_close($conn);			
?>      
    <div class="box2"   ><?php

    include('index.php');
  
    ?> 
    </div>  
<div class="box3" style="width:70%;" >
	 <form method='POST' enctype='multipart/form-data' action="">
		<div align="center">
			<p>Upload CSV:<input type='file' name='file' /></p>
			<p><input type='submit' name='submit' value='Import' /></p>
		</div>
    </form>
</div>
 </body>
</html>
<?php
}
}
?>