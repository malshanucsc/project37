 <?php
    session_start();
  
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            session_destroy();
            echo "Your session has expired! <a href='../../login.php'>Login here</a>";
        }
        else{
            $_SESSION['start']=time();
          ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="../../stylesheet.css">

<style type="text/css">


</style>

<script type="text/javascript">
<!--

function openwin() {
    window.open("assignmentuploading_file.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=80,left=500,width=400,height=530");


}

//-->
window.onload = function() {
  timer();
};
</script>


<script>
function ifr(id1,id2){
var e2 = document.getElementById(id2);
var e = document.getElementById(id1);

e2.innerHTML = 'Assignments';
 e.style.display = 'block';


}

  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }

</script>


<link rel="icon" href="../../image/rittilogo.png" type="image/gif" sizes="16x16">


</head>
<body>
 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >



<?php
  include 'db.php';

    $assign_ID=$_GET['assign_ID'];
    $sql = "SELECT assignment_title FROM assignment WHERE assignment_id='$assign_ID' ";
    $result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
   $assignmenttitle=$count[0];


    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    
    ?>






<div id="breadcrumb">
   <ul>
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
        <li><a href="assignment.php"> Assignments</a></li>
        <li><a href="assignmentviewmain.php?asid=<?php echo $assign_ID; ?>">  <?php echo $assignmenttitle; ?></a></li>
        <li><a href="">Submissions</a></li>
    
   </ul>
     

</div>








<div id="menu-block">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
  include("menu.php");
?>
</div>



<?php


include 'db.php';
$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batchNo=$_SESSION['batchNo'];
$asgID=$_GET['assign_ID'];



function updater($stmarks,$st_Id,$courseforAssignment,$asgID,$batch_No){
     
include 'db.php';
 
     
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }   
     $sql4="UPDATE do_assignment SET marks= '$stmarks' WHERE user_Id='{$st_Id}' AND course_Id='{$courseforAssignment}' AND assignment_Id='{$asgID}' AND batch_No='$batch_No'";
    if ($conn->query($sql4) === TRUE) {
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

?>

<div id="content-block">
<br>
<form  method="post" action="">
<button type="submit" class="button btn-1"  name="pubmarks">Publish Marks</button>
</form>

<?php
if(isset($_POST['pubmarks'])){

  $sql5="UPDATE do_assignment SET pubmark='1' WHERE  assignment_Id='$asgID' AND course_Id='$courseforAssignment'  AND batch_No='$batch_No'  ";
  $conn->query($sql5);   

}
?>









<?php



$sql="SELECT user_Id FROM course_follow WHERE course_Id=$courseforAssignment AND batch_No=$batchNo";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

  while($row= $result->fetch_assoc() ) {
    $name=$row['user_Id'];

    $sql3="SELECT name FROM user WHERE user_Id=$name ";

    $result3 = $conn->query($sql3);
    $row3= $result3->fetch_assoc() 




    ?>

    <form  method="post" action="">
   
<?php
    $st_Id=$row['user_Id'];

    $sql2 = "SELECT link,marks FROM do_assignment WHERE course_Id='$courseforAssignment;' AND user_Id='$st_Id' AND assignment_Id='$asgID'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
    ?>





    <?php
      while($row2= $result2->fetch_assoc() ) {

?>

        
        <?php
          if($row2['link']==''){

?>              <li id=nosub ><?php echo $row3['name'];?>&nbsp&nbsp&nbsp&nbspNo submissions</li>
<?php

          }else{
            ?>
                <li id=yessub ><?php echo $row3['name'];?>&nbsp&nbsp&nbsp&nbsp<a href= "<?php echo $row2['link']; ?> " >Click to view the Submission</a></li>
          <?php
          }
        ?>
      <input type="hidden" name="s_id" value="<?php echo  $st_Id; ?>">
    
        <table>
        <tr>
        <th> Student ID&nbsp:&nbsp </th>
        <td>&nbsp&nbsp<?php echo  $st_Id; ?></td>
        </tr>
       
        
        <tr>
        <th>Marks &nbsp:&nbsp</th>
        <td>&nbsp&nbsp <input type="number" name="stmarks" max="100" min="0" size="4" maxlength="3" oninput="maxLengthCheck(this)" value="<?php echo $row2['marks']; ?>"> 
             <input style="margin-left:25%;" name="marks" type="submit" value="Add marks" ></td>
        </tr>
        </table>
      
      


       
    
  
    <?php
      
      }
    ?>  
    
    <?php
    }
?>
    </form>
    <br><br>
     
<?php


  }
}

?>
</div>


</div>

 




</body>
</html>
<?php
}



if(isset($_POST['marks'])){

    updater($_POST['stmarks'],$_POST['s_id'],$courseforAssignment,$asgID,$batchNo);
  
}
?>