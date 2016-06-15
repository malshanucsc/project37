<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>

<style type="text/css">

ul {
    background: #456;
    padding: 20px;
}
ul li {
    background: #255;
    margin: 5px;
}	
</style>
</head>
<body>




<?php
include 'db.php';



function updater($name,$id,$contact,$address){
include 'db.php';
  
 //   $name =mysqli_real_escape_string($conn,$name);
   // $id =mysqli_real_escape_string($conn,$u_Id);
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }   
    $sql = "UPDATE user SET name='{$name}' WHERE user_Id='{$id}'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
} 



if(isset($_POST['name'])){
    updater($_POST['name'],$_POST['u_id'],$_POST['contact_No'],$_POST['address']);
}






?>
<?php



//include 'db.php';
$u_Id="1";
$sql = "SELECT user_Id,name,dob,contact_No,address FROM user WHERE user_Id='$u_Id'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    // output data of each row
	//target="iframe_a"?>
	<form class="formlog" action="" method="post">
		<ul>
	
	<li>User Id :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="u_id" value="<?php echo $row['user_Id']?>" readonly></li> <br>
	<li>Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" value="<?php echo $row['name']?>" ></li> <br>
	<li>Contact :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="contact_No" value="<?php echo $row['contact_No']?>" ></li> <br>
	<li>Address :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="address" value="<?php echo $row['address']?>"></li> <br>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" font="calibri" value="Submit" ><br>
  

	

	 
</ul>
</form>
	<?php
      
    }
	?>	



</div>
</body>
</html>