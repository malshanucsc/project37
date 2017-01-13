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
    <div>
    	<div id="bred">
			<ul style="margin:0px; font-size:18px;" id="vfstat">
				<li><a   href="admin.php" target="_parent">Home</a></li>
				<li><img src="image/collapsed1.png"/></li>
				<li> Course </li>
				<li><a   href=" addcourse.php" target="_parent">Add Course</a></li>
		   		
			</ul>

		</div>
    </div>
    <?php
	 
	 
	 $errname="";
	 $errduration="";
	 
	 
	 $err="";
	 
	if(isset($_POST["addcourse"])){
		unset($_POST["addcourse"]);
		include("../db.php");
		if($conn){
			 
			$courname=$_POST["courname"];
			$couduration=$_POST["couduration"];
			
			if($courname){
				 
				 
  				 
  					$adcour="INSERT INTO course( Course_name,duration) VALUES('$courname','$couduration')";
					mysqli_query($conn,$adcour);
					header('Location:courselist.php');
  				 
						
					
					 
				
				 
			}
			else{
				 
				if(!$courname){
					$errname="Please fill the Name";
				}
				 
				 
				
			 
			}
		}
		else{
			$err="can't connect database";
		}
		
		
		
		 
	mysqli_close($conn);			
	}
		

	 
?>       

    <div class="box2"  ><?php

    include('index.php');
    ?> 
    </div>  
     

 

<div class="box3"  >

    
	 
	<h1 style="text-align:center; color:blue;">Add Course</h1>
	<form action="addcourse.php"  method="POST"> 
	 
	<div class="div">  <label   class="title"><b class="b">Course Name <img src="image/require.png"/>:</b></label>  <input class="sub2" type="text" name="courname"  /><br/><span   style="margin-left:25%; background-color:red;" ><?php echo $errname; ?> </span></div> 
	<div class="div">  <label   class="title"><b class="b">Duaration :</b></label>  <select  type="text"   name="couduration" />
						<option value="----">----</option>
						<option value="3 Months">3 Months</option>
						<option value="4 Months">4 Months</option>
						<option value="5 Months">5 Months</option>
						</select>

	<br/><span style="margin-left:25%; background-color:red;" > </span></div>
	 
	<div class="sub3">  <input type="submit" value="Add course" name="addcourse"    id="submit" class="submit" class="title" /> </div> 
	
	</form> 
</div>

     


 </body>
</html>
<?php
}
?>