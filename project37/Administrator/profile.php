<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<style type="text/css">

body {
    font-family: "calibri", sans-serif;
}

.formlog { float:left; width:60%;height:45%; margin-left:20% !important ; font-family:calibri;}

ul {
    background: #3b5998;
    padding: 20px;

}
ul li {
    background: lightblue;
    margin: 5px;
        font-family:calibri;
}	
</style>


<script>
function change(){
   document.getElementById("cnc").readOnly = false;
   document.getElementById("adds").readOnly = false;
    document.getElementById("pwd").readOnly = false;
    document.getElementById("changebutton").style.display = "none";
    document.getElementById("upbutton").style.display = "block";
   
}


</script>
<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">
</head>
<body style="background-color: #d8dfea; ">

<iframe width="100%" height="250px" frameborder="0" src="user_home.php"  ></iframe>
 

<?php
include '../db.php';

function updater($name,$id,$contact,$address,$pwd){
     
include '../db.php';
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   

$sql = "UPDATE user SET contact_No='{$contact}',address='{$address}',password='{$pwd}' WHERE user_Id='{$id}'";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">',
    'alert("Updated Successfully!");',
    '</script>';
} else {
    echo '<script type="text/javascript">',
    'alert("Updated Error!");',
    '</script>';
    echo "Error updating record: " . $conn->error;
}
$conn->close();

} 

if(isset($_POST['name'])){
    updater($_POST['name'],$_POST['u_id'],$_POST['contact_No'],$_POST['address'],$_POST['pwd']);
  
}

session_start();

$u_Idforprofile=$_SESSION['username'];
$sql = "SELECT * FROM user WHERE user_Id='$u_Idforprofile'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$userbranch=$row['branch_Id'];
$sql2 = "SELECT branch_Name,address FROM branch WHERE branch_Id='$userbranch'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$sql3 = "SELECT course_Id,batch_No FROM course_conduct WHERE user_Id='$u_Idforprofile'";
$result3 = $conn->query($sql3);

if ($result->num_rows > 0 && $result2->num_rows > 0) {
?>
    <form class="formlog" action="" method="post" style="margin-left:140px;">
	<ul>
	
	<li>User Id :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="u_id" value="<?php echo $row['user_Id']?>" readonly></li> <br>
    <li>Password :&nbsp&nbsp&nbsp&nbsp&nbsp  <input  type="password" name="pwd" id="pwd" value="<?php echo $row['password']?>" readonly></li> <br>
	<li>Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" value="<?php echo $row['name']?>" readonly></li> <br>
	<li>Contact :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" id="cnc" name="contact_No" value="<?php echo $row['contact_No']?>"readonly ></li> <br>
	<li>Address :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="adds" name="address" value="<?php echo $row['address']?>"readonly></li>
    <hr><br>
    <li>Branch Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="Branch_name" value="<?php echo $row2['branch_Name']?>" readonly ></li> <br>

    <li>Branch Address :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="branch_address" value="<?php echo $row2['address']?>" readonly></li> 
    <hr><br>
    <li>Registered Courses</li>
    <ul>
<?php
    while($row3 = mysqli_fetch_assoc($result3)){ 

        $CourseIDforprofile=$row3['course_Id'];
        $sql4 = "SELECT Course_name FROM course WHERE course_Id='$CourseIDforprofile'";
        $result4 = $conn->query($sql4);
        $row4 = $result4->fetch_assoc();
        ?>
        <li ><a href="course.php?courseIDpass=<?php echo $CourseIDforprofile ?>" target="_parent" ><?php echo $row4['Course_name'];?></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Batch No : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="branch_address" value="<?php echo $row3['batch_No']  ?>" readonly> </li>
        <?php   
    }
    ?>

    </ul>

    <button type="button" id=changebutton onclick="change()">Edit!</button>


	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" id="upbutton" font="calibri" value="Submit" hidden ><br>
 
</ul>
</form>
	<?php
      
    }
	?>	
</div>
</body>
</html>