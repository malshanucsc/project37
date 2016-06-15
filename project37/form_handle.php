<?php



include 'db.php';

$u_Id=$_POST["fname"];
$pword=$_POST["pwd"];

$sql = "SELECT name FROM user WHERE password='$pword' AND user_Id='$u_Id'";
$result = $conn->query($sql);
//$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
$user=$row["name"];

 header ("location: user_home/user_home.php? user = $user");
   
} else {
$u_Id=null;
$pword=null;
    header ("location: index.php");
	
}

?>