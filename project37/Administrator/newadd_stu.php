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
	 
	 $errnic="";
	 $errname="";
	 $errpwd="";
	 $errdob="";
	 $erremail="";
	 $err="";
	 function nic($nic){
	 	if(strlen($nic)==10){
	 		$numeric=substr($nic,0,9);
	 		$v=substr($nic,-1);
	 		if((ctype_digit($numeric))&&$v=="v"){
	 			return True;
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
	if(isset($_POST["addstudent"])){

include("../db.php");		
		if($conn){
			$nic=$_POST["nic"];
			$pwd=$_POST["pwd"];
			$name=$_POST["name"];
			$dob=$_POST["dob"];
			$conno=$_POST["conno"];
			$email=$_POST["email"];
			$addr=$_POST["address"];
			
			if($nic and $name and $pwd and $dob and $email){
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					$errname = "Only letters and white space allowed";
  				}

				else if(!nic($nic)){
					$errnic="Plesse Enter Correct Nic";
				}
				
  				else{
  					unset($_POST);
  					$addstu="INSERT INTO user(NIC,password,name,dob,contact_No,address,branch_Id,Type,registeredby,email,passreset) VALUES('$nic','$pwd','$name','$dob','$conno','$addr',1,1,1003,'$email',0)";
						mysqli_query($conn,$addstu);
						header('Location:newstulist.php');
						exit();
						 
					 
  				}
     
						

					
					 
				
				 
			}
			else{
				if(!$nic){
					$errnic="Please fill the Nic";
				}
				if(!$name){
					$errname="Please fill the Name";
				}
				if(!$pwd){
					$errpwd="Please fill the password";
				}

				if(!$dob){
					$errdob="Please fill the Date Of Birth";
				}
				if(!$email){
					$erremail="Please fill the Email";
				}
				
			 
			}
		}
		else{
			$err="can't connect database";
		}
		
		
		
		 
	mysqli_close($conn);			
	}
		

	 
?>      


<script>
	
 
</script>
    <div class="box2"   ><?php

    include('index.php');
    ?> 
    </div>  
     

<div class="box3" style="width:70%;"  >

    
	<div><h1><?php echo $err ?></h1> </div>
	<h1 style="text-align:center; color:blue;">Basic Information</h1>
	<form action="newadd_stu.php"  method="POST"> 
	 
	<div class="div">  <label   class="title"><b class="b">Enter Name <img src="image/require.png"/>:</b></label>  <input class="sub2" type="text"   name="name"  /><br/><span   style="margin-left:25%; background-color:red;" ><?php echo $errname; ?> </span></div> 
	<div class="div">  <label   class="title"><b class="b">NIC<img src="image/require.png"/>:</b></label>  <input class="sub2" type="text"   name="nic" /><br/><span style="margin-left:25%; background-color:red;" ><?php echo $errnic; ?> </span></div>
	<div class="div">  <label   class="title"><b class="b">Password<img src="image/require.png"/>:</b></label>  <input class="sub2" type="password"   name="pwd" /><br/><span style="margin-left:25%; background-color:red;" > <?php echo $errpwd; ?></span> </div>
	<div class="div">  <label   class="title"><b class="b">Date of Birth<img src="image/require.png"/>:</b></label>  <input type="date"   name="dob" /><br/><span style="margin-left:25%; background-color:red;" ><?php echo $errdob; ?></span> </div>
	<div class="div">  <label for="email" class="title"><b>Email<img src="image/require.png"/>:</b></label>  <input class="sub2" type="email" id="email" name="email" /><br/><span style="margin-left:25%; background-color:red;" > <?php echo $erremail; ?></span></div>
	<div class="div">  <label   class="title"><b class="b">Contact No:</b></label>  <input class="sub2" type="text"   name="conno" /> </div>
	<div class="div">  <label   class="title"><b class="b">Address:</b></label>  <input class="sub2" type="text"   name="address" /> </div>
	<div class="div">  <span class="title"><b class="b">Gender<img src="image/require.png"/>:</b></span>  <input type="radio" name="gender" id="male"    value="M" />  <label for="male">Male </label><input type="radio" name="gender" id="female"    value="F" />  <label for="female">Female</label><br /> </div>
	<div class="sub3">  <input type="submit" value="Register" name="addstudent"    id="submit" class="submit" class="title" style="cursor:pointer;" /> </div> 
	
	</form> 
</div>

     


 </body>
</html>
<?php
}
?>