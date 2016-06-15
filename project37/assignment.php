<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>

<style type="text/css">
.iframe{display:none;}
a:link, a:visited {
    background-color: #333;
    color: white;
  
		padding-bottom: 15px;
		padding-top: 10px;
		padding-left: 10px;
		padding-right: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	height:10px
}
a:focus  {
  background: black;
  outline: 0;
}
a:hover, a:active {
    background-color: black;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
	 float: left;

	  
}



ul li {

	float: left;
	
	background: #333;
    height:10px
    color: white;
    text-align: center;
    padding: 0px 0px;
    text-decoration: none;
	
}

ul li:hover {
    background-color: #111;
}

</style>
</head>
<body>




<?php

/*$servername = "localhost";
$username = "root";
$password = "";
$db="groupproject_db1";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
//echo "Connected successfully";

*/

include 'db.php';
//$u_Id=$_POST["fname"];
//$pword=$_POST["pwd"];

$sql = "SELECT * FROM assignment ";
//$sql2 = "SELECT link FROM assignment ";
$result = $conn->query($sql);

//$row = $result->fetch_assoc();



if ($result->num_rows > 0) {
    // output data of each row
	//target="iframe_a"?>
		<ul>
	<?php
    while($row= $result->fetch_assoc() ) {
	//echo $row['link'];
	//$lin=$row['link'];
	/*<?php$row['link']?>*/
	?>

	 <li ><a href="<?php echo $row['link']?>" target="iframe_c" ><?php echo $row['assignment_Title'] ?></a></li>

	<?php
      
    }
	?>	</ul>
	<?php
}
?>

<div ><iframe id ="ivf1" class="overlay" width="100%" scrolling="no" frameborder="0" height="900px" src="" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" name="iframe_c"></iframe>
</div>
</body>
</html>