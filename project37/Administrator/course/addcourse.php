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
	 
	 
	 $errname="";
	 $errduration="";
	 
	 
	 $err="";
	 
	if(isset($_POST["addcourse"])){
		unset($_POST["addcourse"]);
		$connect=mysqli_connect("localhost","root","","project_db");
		
		if($connect){
			 
			$courname=$_POST["courname"];
			$couduration=$_POST["couduration"];
			
			if($courname){
				 
				 
  				 
  					$adcour="INSERT INTO course( Course_name,duration) VALUES('$courname','$couduration')";
					mysqli_query($connect,$adcour);
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
		
		
		
		 
	mysqli_close($connect);			
	}
		

	 
?>       

    <div class="box2" style="width:18%; border-radius:5px;  background-color:rgb(243,236,199); margin:5px; padding-bottom:5px;" ><?php

    include('index.php');
    ?> 
    </div>  
     

 

<div class="box2" style="width:70%; border-radius:5px;  background-color:rgb(243,236,199); margin:5px;">

    
	 
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