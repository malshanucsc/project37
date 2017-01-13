
<html >
<head>

<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="brrr.css">
<link href="https://fonts.googleapis.com/css?family=Orbitron|Raleway" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<title>R I T T I</title>

<script type="text/javascript" > 
 
 </script>


</head>

<body>

	<style>
/*#vcontainer {
  display: table;
  height: 100%;
  width: 100%;
}
#hcontainer {

  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
#content {
	padding: 10px 10px 10px 10px;
  display: inline-block;
  border: lightGray 1px solid;
 
  text-align: left;*/
}
</style>
<body>
  <div id="nav1"> 
  	<h1><a href="index.php">E-Force</a></h1>

  		<ul>
        
  			
  		      <div id="login">
        <a href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Log In<a>
      </div></ul>	
  	 </div> 

     <div id="main-content">

     <!--  <div id="logo">
        <img src="rittilogo.png">
      </div>
 -->
    <div id="indexheading">
      
      <br>
      <h1>Welcome to E-Force</h1><br>
      <p><strong>The E-learning Platform of Ranaviru Information Technology Training Institute for betterment of the future</strong></p>
      <br><br>


    </div>





<?php
//including db file
include("db.php");





//checking whether this page is loaded from the link in email or not
if(!empty($_GET['code'])){
	$getUID=$_GET['userID'];
	$getCode=$_GET['code'];



//checking password reset code with the code in the link
	$sql3 = "SELECT passreset FROM user WHERE  user_Id='$getUID' ";
	$result3 = $conn->query($sql3);

	if ($result3->num_rows > 0) {

		while ($row3=$result3->fetch_assoc()) {


			$checkcode=$row3['passreset'];
		}


		if($getCode==$checkcode){

//if the both codes are equal password reser forms appear.	
			?>

	<div id="fgtpwd">
			<form action='' method="post">

			Enter New Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="newpass1"><br><br>
			Re-Enter New Password&nbsp&nbsp<input type="password" name="newpass2"><br><br>
			<input id="fgtbtn" type="submit" value="submit" name="newpass">

			</form>
				
			<?php


//password reset submission

			if(isset($_POST['newpass'])){

				$npass1=$_POST['newpass1'];

				$npass2=$_POST['newpass2'];

//checking whether two fields are equal or not.
				if($npass2==$npass1){


					$sql4="UPDATE user SET password= ('{$npass1}'),passreset=0 WHERE user_Id='{$getUID}' ";
					$conn->query($sql4);


//checking the success of password resetting
					 if ($conn->query($sql4) === TRUE) {
					    echo '<script type="text/javascript">',
					   	'alert("Password Reset Completed!");',
					      'window.location = "index.php";</script>';
					 
					 }else{


					    echo '<script type="text/javascript">',
					     'alert("Password Reset Error!");',
					     '</script>';
					        echo "Error updating record: " . $conn->error;
					}


					$conn->close();





				}else{
//if two password text fields are not equal.
					echo"<h3 id='warn'>Two passwords must be equal</h3>";
				}



			}

	?>		
</div>
<?php

		}

	}



//if this page not coming from the link in the email

}else{


	?>

	<div id="fgtpwd">
	<form action='' method="post">

<h3 id="warn">	Forget password ? Enter user ID to reset you password.</h3><br><br><input type="text" name="userID" placeholder="Enter User ID"><br><br>
	<input id="fgtbtn" type="submit" value="Send Mail" name="submit" >
<br>
<br>
	</form>
		



	<?php
//requesting for password reset link

	if(isset($_POST['submit'])){

		$uid=$_POST['userID'];
		
//checking the existence of the user
		$sql = "SELECT user_Id,email FROM user WHERE  user_Id='$uid' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			while ($row=$result->fetch_assoc()) {


				$email=$row['email'];
			}

//generating a code to not others reset password by this link
			$code=rand(10000,10000000);

//email details
			$to=$email;
			$subject="Password Reset on RITTI LMS";
			$body=" This is an automated email Please do not reply

			Click the link below or paste it into your browser.
			
			http://localhost/proje37/forget_password.php?code=$code&userID=$uid"
			;
//setting the password code in user table

			$sql2="UPDATE user SET passreset='$code' WHERE user_Id='$uid' ";
			$result = $conn->query($sql2);


			
//requiring the mail library files
			require 'mail/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                              

			$mail->isSMTP();                                      
			$mail->Host = 'smtp.gmail.com;';  
			$mail->SMTPAuth = true;                             
			$mail->Username = 'rittilms@gmail.com';                 // SMTP username
			$mail->Password = 'group37ucsc';                 // SMTP password
			$mail->SMTPSecure = 'tls';                           
			$mail->Port = 587;                                    

			$mail->setFrom('from@example.com', 'RITTI');
			$mail->addAddress("$to", '$uid');     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = "$subject";
			$mail->Body    = "$body";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent<br>';
			    	echo "Check Your email";

			}




//if the user id is not correct

		}else{

			echo "Not a registered member";


		}




	}

}














?>



	</div>



<!-- 
      <div id="logo" style="float: bottom; ">
        <img src="eflogo.png">
      </div>       -->


      <div class="newspaper">
        <h3><b>Panagoda</b></h3>
        <p><b>Tel: 0112 74 84 94 / Ext 57284</b><br><br>
        Ranaviru Information Technology<br>
        Training Institute<br>
        Sri Bobhirajaramaya<br>
        Panagoda, Homagama</p>
     
        <h3><b>Kandy</b></h3>
        <p><b>Tel : 081-2205484</b><br><br>
        Signal School<br>
        Boowelikada,<br>
        Kandy </p>
  

        <h3><b>Kokavil</b></h3>
        <p><b>Tel : 0243244862</b><br><br>
        Signal Centrel Workshop<br>
        Kokavil <br>
        Kilinochchi </p>
   

        <h3><b>Anuradhapura</b></h3>
        <p><b>Tel : 0252235073/ Ext 53866</b><br><br>
        Ranasewapura<br>
        Anuradhapura</p>
   
    </div>
     </div>


</body>
</html>

<div id="fade" class="loginblack_overlay"></div>


<div id="light" class="loginwhite_content">

  <form class="formlog" action="form_handle.php" method="post">
  <h1 align="center" font ="calibri" style="color:white;">Log in</h1>
  <h2 style="width:90%; margin-left:5%; color:white;">Username  :</h2>
  <input font-size="22pt" type="text" name="fname" style="width:50%; margin-left:5%;"><br>
    <h2 style="width:90%; margin-left:5%;color:white;">Password  :</h2>
    <input type="password" name="pwd" style="width:50%;  margin-left:5%;"><br><br>
  <input type="submit" font="calibri" value="Log in" style="width:20%;margin-left:5%;"><br><br>
<a style="width:30%;margin-left:5%;" href="forget_password.php">Forget Password ?</a>
</form>

<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>
