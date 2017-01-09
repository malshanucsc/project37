 <?php
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            session_destroy();
            echo "Your session has expired! <a href='../login.php'>Login here</a>";
        }
        else{
            $_SESSION['start']=time();
          ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="menustyles.css">

<style type="text/css">

ul li:hover{
  background-color:  !important;
}

</style>

<script type="text/javascript">


</script>


<script>
function ifr(id1,id2){
var e2 = document.getElementById(id2);
var e = document.getElementById(id1);

e2.innerHTML = 'Assignments';
 e.style.display = 'block';


}


</script>


<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">


</head>
<body >


<iframe id="ifass" width="100%" height="250px" frameborder="0" src="user_home.php" ></iframe>

 
<?php

  include("menu.php");
?>


<div id="main"  scrolling="no" style=" width:66%;float:left; margin-top:-3.5%; border: none !important;overflow:hidden;" href="#mySidenav">
 
  <span id ="sp1" style="display:none; width:100px;font-size:20px;cursor:pointer;"  onclick="openNav('sp1')">Menu >></span>

<hr>
<br>


<?php


include '../db.php';


function deleteassignment($asid) {

    
include '../db.php';


if ($conn->connect_error) {
    
  die("Connection failed: " . $conn->connect_error);
}   
    
//$sql3 =   "DELETE FROM assignment WHERE assignment_id='$asid'";$conn->query($sql3) === TRUE AND
$sql4 =   "DELETE FROM do_assignment WHERE assignment_id='$asid'";
$sql5 =   "DELETE FROM give_assignment WHERE assignment_id='$asid'";
      
if ( $conn->query($sql4) === TRUE AND $conn->query($sql5) === TRUE) {
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




$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batchNo=$_SESSION['batchNo'];

$sql = "SELECT assignment_Id FROM give_assignment WHERE course_Id='$courseforAssignment;' AND user_Id='$UserIDfordefault' AND batch_No='$batchNo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
  
  <?php
  while($row= $result->fetch_assoc() ) {
  
    $assignment_IDfordefault=$row['assignment_Id'];
    $sql2 = "SELECT * FROM assignment WHERE assignment_Id ='$assignment_IDfordefault' ";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
    ?>
      <ul>
    <?php
    
      while($row2= $result2->fetch_assoc() ) {



    ?>
        <form  method="post" action="" style="  ">
        
        Assignment ID
        <input type="text" name="id" size="2"  min="0" value="<?php echo $assignment_IDfordefault ; ?> " readonly><br>
        
       
        <li > <a href= "<?php echo $row2['link']?> " target="main" > Assignment Title<?php echo $row2['assignment_title'] ;?></a>
        <hr>
    
        <button type="button" onclick="openwin2()" >&nbsp&nbspAlter Assignment</button>
        
        <button type="submit" name="deleteasign">&nbspDelete Assignment</button>
        <br>
        <br>
        </li>
        
        <a style="width:100%;" href= "assign_submissions.php?assign_ID=<?php echo $assignment_IDfordefault ?> " target="main" >Submissions</a>
        </form>
    
    <?php
      
    }
    ?>  </ul>
    <?php
  }
}

}
?>
<br>
<button type="button" onclick="openwin()" >Add New Assignment</button>

<button type="button" onclick="openwin3()" >Add Existing Assignment</button>

</div>


<div id=msg>

<?php
    include("msgnotification.php");
?>
</div>

</body>
</html>
<?php


if(isset($_POST['deleteasign'])){



    deleteassignment($_POST['id']);
  
}

}

?>