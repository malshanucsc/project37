<html>
<head>

<style type="text/css">
 table {
    border-collapse: separate;
    border-spacing: 10px 10px;
}
tr:nth-child(even) {background-color: #f2f2f2}




    .assignviewwhite_content {
        display: none;
        position: fixed;
        top: 25%;
        left: 28%;
        width: 40%;
        height: 40%;
        padding: 16px;
        border: 16px solid #1E8449;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }


  .black_overlay{
        display: none;
        position: fixed;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }






</style>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
   // $( "#datepicker" ).datepicker();
  } );





  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }



  </script>












</head>
<body>





<?php


include '../db.php';



 /*

  function insert($asid,$u_Id,$C_Id,$link){
     
date_default_timezone_set('Asia/Colombo');
    $currentdate = date('Y-m-d H:i:s ', time());

include '../db.php';
 
     
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }   
 
$sql4="UPDATE do_assignment SET link= ('{$link}'),submitteddate=('$currentdate') WHERE user_Id='{$u_Id}' AND course_Id='{$C_Id}' AND assignment_Id='{$asid}'";
$conn->query($sql4);



 if ($conn->query($sql4) === TRUE) {
       echo '<script type="text/javascript">',
     'alert("Updated Successfully!");',
     '</script>'
;
    } else {


         echo '<script type="text/javascript">',
     'alert("Updated Error!");',
     '</script>';
        echo "Error updating record: " . $conn->error;
    }


$conn->close();
?>

<?php
}

*/

    
function deleteassignment($asid,$userid,$cid,$batch) {
    
include '../db.php';


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }   
  $sql7= "DELETE FROM give_assignment WHERE assignment_Id='$asid' AND user_Id='$userid' AND course_Id='$cid' AND batch_No='$batch' ";





    $sql8 = "SELECT user_Id FROM course_follow WHERE course_Id='{$C_Id}' AND batch_No='$batch_No'";

  $result8 = $conn->query($sql8);

  if ($result8->num_rows > 0) {
  ?>
        
    <?php
    while($row8= $result8->fetch_assoc() ) {
      $uid=$row8['user_Id'];
      
     $sql9 = "SELECT link FROM do_assignment WHERE course_Id='$courseforAssignment;' AND user_Id='$uid' AND assignment_Id='$assign_ID' AND batch_No='$batch_No' ";

        $result9 = $conn->query($sql9);

        if ($result9->num_rows > 0) {

           while($row9= $result9->fetch_assoc() ) {

            $link=$row9['link'];
            unlink($link);   

           }

   
      
    }

  }
}

 $sql5 =   "DELETE FROM do_assignment WHERE assignment_Id='$asid' AND course_Id='$cid' AND batch_No='$batch' ";


?>
 <script>
window.location.href = "assignment.php";
</script>
<?php
  
  if ($conn->query($sql7) === TRUE AND $conn->query($sql5) === TRUE) {
    echo '<script type="text/javascript">',
    'alert("Updated Successfully!");',
    '</script>';
  }else{

    echo '<script type="text/javascript">',
    'alert("Updated Error!");',
    '</script>';
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
  ?>


<?php
}



$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

$sql = "SELECT deadline,published FROM give_assignment WHERE course_Id='$courseforAssignment;' AND batch_No='$batch_No' AND assignment_Id='$assign_ID' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?> 
  
  <?php
  while($row= $result->fetch_assoc() ) {
    //$assignment_IDfordefault=$row['assignment_Id'];
    $_SESSION['asgn_ID']=$assign_ID;
    $aaid=$assign_ID;
    $date=$row['deadline'] ;
    
    $_SESSION['date']=$date;
    $sql2 = "SELECT assignment_title,link,guide FROM assignment WHERE assignment_Id ='$assign_ID' ";
    $result2 = $conn->query($sql2);

    date_default_timezone_set('Asia/Colombo');
    $currentdate = date('Y-m-d H:i:s ', time());


             
    $cdate=date_create($currentdate);
    $dead=date_create($date);
                             //$sdate=date_create($subdate);
                            

    $diff=date_diff($cdate,$dead);
    $printdate=$diff;
                             
                             //$diff2=date_diff($sdate,$dead);
                             //$printdate2=$diff2;
                       






    if ($result2->num_rows > 0) {
    ?>
      
      <?php
      while($row2= $result2->fetch_assoc() ) {

        ?>

        <form  method="post" action="" >
        <h1>Title</h1>
        <h2><?php echo $row2['assignment_title']?></h2>

        <p style="width:50%;"><?php echo $row2['guide']?></p>
        <?php
        if($row2['link']!="nolink"){

?>
            <div style="width:95%;margin-left: 2%; height:40vw;border:solid;" onload="this.style.height=this.contentDocument.body.scrollHeight +'px'; href="<?php echo $row2['link']; ?>">
              
        <object data=" <?php echo $row2['link']; ?> " type="application/pdf" width="100%" height="100%">
        alt : <a href="<?php echo $row2['link']; ?>">test.pdf</a>
        </object>


        </div>
  
  <?php      



        }
            
        ?>
        <h3>Details</h3>
          
        <table>
          
            
        <tr>
        <th>Assignment Title</th>
        <th>Deadline</th>
           
            
        </tr>
            
        <tr>
        <td><?php echo $row2['assignment_title'] ;?></td>
        <td> <?php echo $row['deadline'];?></td>
        </tr>
        </table>
        <br>
             <?php




        if($row2['link']!=''){
        
           ?>

            <button type="submit" name="deleteassignment">Delete Assignment</button>

            <?php
            if($row['published']=='0'){
                ?>
                <button type="submit" name="publish">Publish</button>
                <?php  
            }else{
                ?>
                <button type="submit" name="hide">Hide</button>
                <?php
            }

          ?>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<button type="button" style="margin-left:25%;" href = "javascript:void(0)" onclick = "document.getElementById('light3').style.display='block';document.getElementById('fade3').style.display='block'" >Change deadline</button>


          <?php

            if($date>$currentdate){
                          ?>
                   
                <h3 style="color:red;">
                Time left
                  
                <?php echo $printdate->format('%a days %h hours %i minutes %s seconds'); ?>

                </h3><?php
                
            }else{
                ?>
                            
                <h3 style="color:red;">
            
                Overdued by
                  
                <?php echo $printdate->format('%a days %h hours %i minutes %s seconds'); ?>

                </h3><?php
            }



        }else{
 
           echo"File not available";?><br><?php
        }


?>      

      
      
       
  
        </form>




<?php
if(isset($_POST['publish'])){
include '../db.php';
  $sql="UPDATE give_assignment SET published='1' WHERE  assignment_Id='$assign_ID' AND course_Id='$courseforAssignment'  AND user_Id='$UserIDfordefault' AND batch_No='$batch_No'  ";
  $conn->query($sql);   

}

if(isset($_POST['hide'])){

  $sql6="UPDATE give_assignment SET published='0' WHERE  assignment_Id='$assign_ID' AND course_Id='$courseforAssignment'  AND user_Id='$UserIDfordefault' AND batch_No='$batch_No'  ";
  $conn->query($sql6);   

}

if(isset($_POST['deadlinechangebutton'])){

  $date=$_POST['datepick'];
    $hr=$_POST['hour'];
    $mi=$_POST['min'];

      $datetime=$date.' '.$hr.'/'.$mi.'/00';



  $sql10="UPDATE give_assignment SET deadline='$datetime' WHERE  assignment_Id='$assign_ID' AND course_Id='$courseforAssignment'  AND user_Id='$UserIDfordefault' AND batch_No='$batch_No'  ";
  $conn->query($sql10);   




 $sql11 = "SELECT user_Id FROM course_follow WHERE course_Id='{$courseforAssignment}' AND batch_No='$batch_No'";

            $result11 = $conn->query($sql11);

            if ($result11->num_rows > 0) {
            ?>
                  
              <?php

              while($row11= $result11->fetch_assoc() ) {
                $uidfordeadline=$row11['user_Id'];
                
               $sql12="UPDATE do_assignment SET deadline='$datetime' WHERE  assignment_Id='$assign_ID' AND course_Id='$courseforAssignment'  AND user_Id='$uidfordeadline' AND batch_No='$batch_No'  ";


                $conn->query($sql12);



              }

            }













}






?>


  
     
        <?php
      
      }
      ?>  
      <?php
    }
  }
}else{
  echo "No Assignments.";
}
?>



<?php
if(isset($_POST['deleteassignment'])){

    deleteassignment($aaid,$UserIDfordefault,$courseforAssignment,$batch_No);
  
}?>

<h4>
<a style="text-decoration:none;" href="assign_submissions.php?assign_ID=<?php echo $aaid; ?>">View submissions</a>
</h4>
<div id="fade3" class="black_overlay"></div>


<div id="light3" class="assignviewwhite_content">







 

    <form enctype="multipart/form-data" method="post" ">

    <lable>Dead-Line</lable><br><hr>


<p>Date: <input type="text" id="datepicker" name="datepick" required="required "></p>
 
<br><br>

<lable>Enter the time in 24 hours</lable><br><br>

<lable>Hours</lable><input type="number" name="hour"  size="4"  min="0" max="23" maxlength="2" oninput="maxLengthCheck(this)" required="required "> 
<lable>Minutes</lable><input type="number" name="min"  size="4"  min="0" max="59" maxlength="2" oninput="maxLengthCheck(this)" required="required" >

<br><br><br>
<input type="submit" id="deadlinechangebutton" name="deadlinechangebutton" value="Update time" >





    </form>

    




<a href = "javascript:void(0)" onclick = "document.getElementById('light3').style.display='none';document.getElementById('fade3').style.display='none'">Cancel</a></div>






</body>
</html>


