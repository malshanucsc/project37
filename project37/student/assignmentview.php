<html>
<head>

<style type="text/css">
 table {
    border-collapse: separate;
    border-spacing: 10px 10px;
}
tr:nth-child(even) {background-color: #f2f2f2}




    .white_content {
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
<script type="text/javascript">
    function checkFile() {

//alert(this.files[0].size/1024/1024);

        var fileElement = document.getElementById("fileinput");
        var fileExtension = "";
        if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
        }
        var ex=fileExtension.toLowerCase();
        switch(ex){
          case "gif":return checkSize();break;
          case "png":return checkSize();break;
          case "txt":return checkSize();break;
          case "jpg":return checkSize();break;
          case "jpeg":return checkSize();break;
          case "bmp":return checkSize();break;
          case "doc":return checkSize();break;
          case "docx":return checkSize();break;
          case "xls":return checkSize();break;
          case "xlsx":return checkSize();break;
          case "pdf":return checkSize(); break;
          case "ppt":return checkSize();break;
          case "pptx":return checkSize();break;
          case "zip":return checkSize();break;
          case "rar":return checkSize();break;
          default:alert("You must select a valid file type");
            return false;break;
        }
   
    }

function checkSize(){
            var oFile = document.getElementById("fileinput").files[0]; 

            if (oFile.size > 20971520) // 20 mb for bytes.
            {
                alert("File size must under 20 Mb.");
                return false;
            }

}

</script>




</head>
<body>



<?php


include '../db.php';



 

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
<script type="text/javascript">
  



</script> 
<?php
}




?>






<?php


    
function deleteassignment($asid,$userid,$cid,$filelink) {
    
include '../db.php';


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }   
  $sql4 =   "UPDATE do_assignment SET link='', submitteddate='' WHERE assignment_id='$asid' AND user_Id='$userid' AND course_Id='$cid'";
  unlink($filelink);   
  if ($conn->query($sql4) === TRUE) {
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
  <script>
  $aid=$_SESSION['asgn_ID'];
 window.location = "assignmentviewmain.php?asid=<?php echo $aid; ?>";

</script>


<?php
}

$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];

$sql = "SELECT deadline,link,submitteddate FROM do_assignment WHERE course_Id='$courseforAssignment;' AND user_Id='$UserIDfordefault' AND assignment_Id='$assign_ID' AND batch_No='$batch_No' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?> 
  
  <?php
  while($row= $result->fetch_assoc() ) {
    //$assignment_IDfordefault=$row['assignment_Id'];
    $_SESSION['asgn_ID']=$assign_ID;
    $aaid=$assign_ID;
    $date=$row['deadline'] ;
    $subdate=$row['submitteddate'] ;
    $_SESSION['date']=$date;
    $sql2 = "SELECT * FROM assignment WHERE assignment_Id ='$assign_ID' ";
    $result2 = $conn->query($sql2);

    date_default_timezone_set('Asia/Colombo');
    $currentdate = date('Y-m-d H:i:s ', time());


             
                             $cdate=date_create($currentdate);
                             $dead=date_create($date);
                             $sdate=date_create($subdate);
                            

                             $diff=date_diff($cdate,$dead);
                             $printdate=$diff;
                             
                             $diff2=date_diff($sdate,$dead);
                             $printdate2=$diff2;
                       


    if ($result2->num_rows > 0) {
    ?>
      
      <?php
      while($row2= $result2->fetch_assoc() ) {

      ?>

        <form  method="post" action="" >
        
        <h1><?php echo $row2['assignment_title']?></h1>
        <p><?php echo $row2['guide']?></p>

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
            <th>Submission</th>
            
        </tr>
            
        <tr>
            <td><?php echo $row2['assignment_title'] ;?></td>
            <td> <?php echo $row['deadline'];?></td>
<?php            $asigntitle=$row2['assignment_title'] ;
             
              if($row['link']===''){
                      ?><td><?php
                        echo "   No submissions.";

                        ?>
                        </td>
                     
                        </tr>
                        <?php

                        if($date>$currentdate){
                            ?>
                            <tr>
                            <td>
            
                            <button type="button" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Submit Assignment</button>
         
                            </td>
                   
                            <td>

                            <h3 style="color:green">
                            <?php echo $printdate->format('%a days %h hours %i minutes %s seconds'); ?>
                              &nbsp&nbsp&nbsp left
                            </td>

                             <td>
                             

                             </td>
                             </tr>
                             </table>
                              
                     
                              <?php
                        }else{
                          ?>
                            </table>
                             <h3 style="color:red;">
            
                            Overdued by
                  
                              <?php echo $printdate->format('%a days %h hours %i minutes %s seconds'); ?>

                              </h3><?php
                        }




                }else{
                      $linkarray  = $row['link'];

                      $pieces = explode("/", $linkarray);
                       
                      ?>
                      <td>
                      <a href= "<?php echo $row['link']?> " target="main" > <?php echo end($pieces);?> </a>
                    
                

                      </td>
                      
                       </tr>

                        <tr>      </tr>
      


                       <?php
                      if($date>$currentdate){
                          ?>
                         <tr>
                         <td>
                          
                       
                       
                       </td>
               
                      <td>


                      <?php echo $printdate->format('%a days %h hours %i minutes %s seconds'); ?>
                        
                      </td>

                       <td>
                       <button type="submit" name="deleteasign">Delete Submission</button>

                       </td>
                       </tr>
                       </table>
          
 



                        <?php
                      }else{
                        ?> <h3 style="color:Green;">
                          
                            </table>

                           Submitted before
                      

                      <?php echo $printdate2->format('%a days %h hours %i minutes %s seconds'); ?>




                        </h3><?php
                      }



                }
                    ?>


  
        <br></form>
  
     
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
if(isset($_POST['deleteasign'])){

    deleteassignment($aaid,$UserIDfordefault,$courseforAssignment,$linkarray);
  
}?>

<div id="fade" class="black_overlay"></div>


<div id="light" class="white_content">





    <form enctype="multipart/form-data" method="post" onsubmit="return checkFile();">

    <br>
    <input name="file" type="file" id="fileinput" size="100"><br><hr>


    <button type="submit" id="u_button" name="u_button">Upload the file</button>


    </form>

    

<?php
 //session_start();
include '../db.php';
$courseId=$_SESSION['Course_ID'];
$user_ID=$_SESSION['username'];
$batch_No=$_SESSION['batch_No'];
$sql1 = "SELECT Course_name FROM course WHERE course_Id='$courseId'";

                        $result1 = $conn->query($sql1);

                        $row1 = $result1->fetch_assoc();

$coursename =$row1['Course_name'];

if(isset($_POST['u_button'])){

          date_default_timezone_set('Asia/Colombo');
        $currentdate = date('Y-m-d H:i:s ', time());
        $date=$_SESSION['date'];


      if($date>$currentdate){

  $file_result="";

if($_FILES["file"]["error"] >0){
  $file_result .="No file uploaded or Invalid file.";
  $file_result .="Error Code: " .$_FILES["file"]["error"]."<br>";
  echo $file_result;
 ?> <script>
  document.getElementById('fade').style.display='block';
  document.getElementById('light').style.display='block';

</script>
<?php


}else{

  $lin2='../Assignments/'.$coursename.'/'.$asigntitle.'/submissions/'.$batch_No.'/'.$user_ID;
if (!file_exists($lin2)) {
    mkdir($lin2, 0777, true);
}

  $file_result .= "Upload: " . $_FILES["file"]["name"]."<br>". "Type: " . $_FILES["file"]["type"]."<br>" . "Size: " . ($_FILES["file"]["size"]/1024) . "Kb<br>" . "Temp file: " . $_FILES["file"]["tmp_name"]."<br><br><br>";

  move_uploaded_file($_FILES["file"]["tmp_name"],'../Assignments/'.$coursename.'/'.$asigntitle.'/submissions/'.$batch_No.'/'.$user_ID.'/'.$_FILES["file"]["name"]);

  $file_result .= "File Uplloaded succesfully.";

  echo $file_result;

$link='../Assignments/'.$coursename.'/'.$asigntitle.'/submissions/'.$batch_No.'/'.$user_ID.'/'. $_FILES["file"]["name"];


  insert($aaid,$user_ID,$courseId,$link);


}



}else{
  ?>
   echo Cannot Upload Assignment.Overdued !
  
   <?php
}



}


?>
<br>
<br>



<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a></div>



</body>
</html>