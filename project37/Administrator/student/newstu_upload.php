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
					//$errname = "Only letters and white space allowed";
  				}

				else if(!nic($nic)){
					return false;
					//$errnic="Plesse Enter Correct Nic";
				}
				
  				else{
  					return true;
  					/*unset($_POST);
  					$addstu="INSERT INTO user(NIC,password,name,dob,email,contact_No,address,branch_Id,Type,registeredby) VALUES('$nic','$pwd','$name','$dob','$email','$conno','$addr',1,1,1003)";
						mysqli_query($connect,$addstu);
						header('Location:newstulist.php');
						exit(); */
  				} 
		}

		else{
				 return false;
			}
    }
    $connect=mysqli_connect("localhost","root","","project_db");
   
	if(isset($_POST["submit"])){
		
		 if($_FILES['file']['name']){
		 	
			$filename=explode(".",$_FILES['file']['name']);
			if($filename[1]=='csv'){
				
				$handle=fopen($_FILES['file']['tmp_name'],"r");
				$var=true;
				$i=0;
				$student=array();
				
				while($data=fgetcsv($handle) ){
					$item1=mysqli_real_escape_string($connect,$data[0]);//nic
					$itepwd="group37";
					$item2=mysqli_real_escape_string($connect,$data[1]);//name 
					$item3=mysqli_real_escape_string($connect,$data[2]);//dob
					$item4=mysqli_real_escape_string($connect,$data[3]);//email
					$item5=mysqli_real_escape_string($connect,$data[4]);//contact
					$item6=mysqli_real_escape_string($connect,$data[5]);//address
					$itembranch=1;
					$itemtype=1;
					$itemregi=1003;

					//$var=csvupload($item1,$item2,$item3,$item4 )
					$nic=(string)$item1;
					$name=(string)$item2;
					$dob=(string)$item3;
					$emai=(string)$item4;

					 $var=csvupload($nic,$name,$dob,$emai);
					?>
					 
					<?php
					 

				 
					if($var){
						$student[$i]=array($item1,$itepwd,$item2,$item3,$item4,$item5,$item6,$itembranch,$itemtype,$itemregi);
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
					//$item7=mysqli_real_escape_string($connect,$data[6]);
					/*$sql="INSERT INTO user(NIC,password,name,dob,email,contact_No,address,branch_Id,Type,registeredby)  VALUES('$item1','$itepwd','$item2','$item3','$item4','$item5','$item6','$itembranch','$itemtype','$itemregi')";
					mysqli_query($connect,$sql);*/
				}
				if($var){
					 foreach($student as $stu){
					 	$sql="INSERT INTO user(NIC,password,name,dob,email,contact_No,address,branch_Id,Type,registeredby)  VALUES('$stu[0]','$stu[1]','$stu[2]','$stu[3]','$stu[4]','$stu[5]','$stu[6]','$stu[7]','$stu[8]','$stu[9]')";
					 	mysqli_query($connect,$sql);
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
	mysqli_close($connect);			
?>      
    <div class="box2" style="width:18%; border-radius:5px;  background-color:rgb(243,236,199); margin:5px;" ><?php

    include('index.php');
  
    ?> 
    </div>  
<div class="box2" style="width:70%; border-radius:5px;  background-color:rgb(243,236,199); margin:5px;">
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
?>