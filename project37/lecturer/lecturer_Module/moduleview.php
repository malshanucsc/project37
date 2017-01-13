 <?php


    
    
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

<style type="text/css">







</style>


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
<body>

<?php


include 'db.php';

function deletemodule($moid,$linkdelete) {
    
  include 'db.php';
  if($linkdelete!=''){
    unlink($linkdelete); 
  }
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }   
  $sql3 =   "DELETE FROM module WHERE module_Id='$moid'";
  $sql4 =   "DELETE FROM follow_module WHERE module_Id='$moid'";
     
  if ($conn->query($sql3) === TRUE AND $conn->query($sql4) === TRUE) {
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
?>
  <script>
window.location.href = "modules.php";
</script>
<?php
}

$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batchNo'];

    $sql2 = "SELECT * FROM module WHERE module_Id='$mo_ID;'";
    $result2 = $conn->query($sql2);

        $sql5 = "SELECT published FROM follow_module WHERE module_Id='$mo_ID' AND course_Id='$courseforAssignment'  AND user_Id='$UserIDfordefault' AND batch_No='$batch_No'  ";
    $result5 = $conn->query($sql5);
    $row5= $result5->fetch_assoc();

    if ($result2->num_rows > 0) {
    ?>
     
    <?php
      while($row2= $result2->fetch_assoc() ) {
?>
        <table>
          <tr>
          <th>Title</th>
          <td> <?php echo $row2['module_Title'] ;?></td>
          </tr>
          
          <tr>
          <th>Notes</th>
          <td> <?php echo $row2['body'] ;?></td>         
          </tr>
          
          </table>
          <br>
          <?php
          $linkdelete=$row2['link'];

          if($row2['link']!=''){


          

            ?>
          <div style="width:95%;margin-left: 2%; height:40vw;border:solid;" onload="this.style.height=this.contentDocument.body.scrollHeight +'px'; href='<?php echo $row2['link']; ?>'">
              
                  <object data=" <?php echo $row2['link']; ?> " type="application/pdf" width="100%" height="100%">
                  alt : <a href="<?php echo $row2['link']; ?> ">test.pdf</a>
                  </object>


            </div>  
            <?php
          }
?>          
    <br>
        <form  method="post" action="" style="  ">
        
      
        <?//php if($row2['link']!=''){
        ?>

        <button type="submit" name="deletemodule">Delete Module</button>

          <?php
          if($row5['published']=='0'){
            ?>
            <button type="submit" name="publish">Publish</button>
            <?php  
          }else{
            ?>
            <button type="submit" name="hide">Hide</button>
            <?php
          }

          ?>
          
        </form>
<?php
     // }
      
    }
    ?>  
    <?php

}else{
  echo"File not available";?><br><?php
}

?>
<br>



<?php
if(isset($_POST['publish'])){

  $sql="UPDATE follow_module SET published='1' WHERE  module_Id='$mo_ID' AND course_Id='$courseforAssignment'  AND user_Id='$UserIDfordefault' AND batch_No='$batch_No'  ";
  $conn->query($sql);   

echo"<script>window.location.href = 'moduleviewmain.php?moduleID=$mo_ID '</script>";
}

if(isset($_POST['hide'])){

  $sql6="UPDATE follow_module SET published='0' WHERE  module_Id='$mo_ID' AND course_Id='$courseforAssignment'  AND user_Id='$UserIDfordefault' AND batch_No='$batch_No'  ";
  $conn->query($sql6);   
echo"<script>window.location.href = 'moduleviewmain.php?moduleID=$mo_ID '</script>";

}
?>











</body>
</html>
<?php
if(isset($_POST['deletemodule'])){

    deletemodule($mo_ID,$linkdelete);
  
}
}
?>