<link rel="stylesheet" type="text/css" href="../stylesheet.css">
<style type="text/css">
/*  
    .white_content {
        display: none;
        position: fixed;
        top: 12.5%;
        left: 35%;
        width: 30%;
        height: 75%;
        padding: 16px;
        border: 10px solid #1E8449;
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

     .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #189D50;
  border: none;
  float: right;
  color: white;
  text-align: center;
  
  padding: 8px;
  
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.btn-1{
font-size: 16px;
width: 130px;
color: #FFFFFF;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: "+";
  position: absolute;
  opacity: 0;
  top: 0;
  right: -10px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 15px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
label{
  font-size: 14px;
  color: #1E8449;
  font-weight: bold;
}
*/

</style>



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );





  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }







  </script>









<script type="text/javascript">
    function checkFileAssignment() {

//alert(this.files[0].size/1024/1024);

        var fileElement = document.getElementById("assignmentfileinput");
        var fileExtension = "";
  

        if ($('#assignmentfileinput').get(0).files.length === 0) {
            return checktextareaassignment();
        }else{

            if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
        }
        var ex=fileExtension.toLowerCase();
        switch(ex){
          case "gif":return checkSizeAssignment();break;
          case "png":return checkSizeAssignment();break;
          case "txt":return checkSizeAssignment();break;
          case "jpg":return checkSizeAssignment();break;
          case "jpeg":return checkSizeAssignment();break;
          case "bmp":return checkSizeAssignment();break;
          case "doc":return checkSizeAssignment();break;
          case "docx":return checkSizeAssignment();break;
          case "xls":return checkSizeAssignment();break;
          case "xlsx":return checkSizeAssignment();break;
          case "pdf":return checkSizeAssignment(); break;
          case "ppt":return checkSizeAssignment();break;
          case "pptx":return checkSizeAssignment();break;
          case "zip":return checkSizeAssignment();break;
          case "rar":return checkSizeAssignment();break;
          
          default:alert("You must select a valid file type");
            return false;break;
        }


        }


        
    }

function checkSizeAssignment(){
            var oFile = document.getElementById("fileinput").files[0]; 

            if (oFile.size > 20971520) // 2 mb for bytes.
            {
                alert("File size must under 20 Mb.");
                return false;
            }

}


function checktextareaassignment(){

  var comment = $.trim($('#articleassignment').val());
 // var dropdownassignment=document.getElementByName("assigns")
  //var notes = document.getElementById("articleassignment");
  //if($_POST['dropdownassignment']=="noval"){

   if(comment.length===0)
   {
        alert ("You have to either add a file or add a note.");
        return false;
   }
   else
   {
          var retValassignment = confirm("You are uploading only instructions without a file, Do you want to continue ?");
        return retValassignment;
   }




  //}
  return true;
   
}


</script>



<div id="content-list">

<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Assignments</h1>

<?php


include '../db.php';
$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
$sql = "SELECT assignment_Id,published FROM give_assignment WHERE course_Id='$courseforAssignment' AND batch_No='$batch_No'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row= $result->fetch_assoc() ) {

    $AS_ID=$row['assignment_Id'];
    $sql2 = "SELECT assignment_title FROM assignment WHERE assignment_id='$AS_ID'";
    $result2 = $conn->query($sql2);

      if ($result2->num_rows > 0) {
        ?>    
        <?php
        while($row2= $result2->fetch_assoc() ) {
          ?>

          <?php 
         // if($row2['link']!=''){
            ?>
            <li><h3><a href= "lecturer_Assignment/assignmentviewmain.php?asid=<?php echo $AS_ID; ?> " > <?php echo $row2['assignment_title'] ;?></a></h3>
              

               <?php
            $pub=$row['published'];
            
            if($pub=='0'){
              
               ?><h4> <?php echo "Not published";?></h4>

          <?php                                
            }else{
              ?><h4> <?php echo "Published";?></h4>

          <?php
            }
            ?>
            </li>
            <br>
            <?php
          //}
          ?>
       
          <?php
        
        }
        ?> 
        <?php
      }
    }
  }else{
    ?> <h3><?php echo"No assignments published";?></h3><br><?php
  }
?>

</div>


<div id="fade2" class="black_overlay"></div>


<div id="light2" class="white_content">



  <?php

function insertassign($idexist,$title,$guide,$date,$hr,$mi,$u_Id,$C_Id,$link,$batch_No){
     


  $datetime=$date.' '.$hr.'/'.$mi.'/00';
  date_default_timezone_set('Asia/Colombo');
  $currentdate = date('Y-m-d H:i:s ', time());
  $autoasid=$currentdate.$u_Id.$C_Id.$batch_No;




  include '../db.php';
  if ($conn->connect_error) {
  
    die("Connection failed: " . $conn->connect_error);
  }   
  //isset($idexist) && $str !== ''
  if($idexist=="noval"){


          
      $sql="INSERT INTO assignment (assignment_id,assignment_title,link,guide,course,lecturer) VALUES ('{$autoasid}','{$title}','{$link}' ,'{$guide}','{$C_Id}','{$u_Id}')";
      
         $sql5="INSERT INTO give_assignment (assignment_Id,user_Id,course_Id,batch_No,published,deadline) VALUES ('{$autoasid}','{$u_Id}','{$C_Id}','{$batch_No}','0','{$datetime}' )";
  





              $sql2 = "SELECT user_Id FROM course_follow WHERE course_Id='{$C_Id}' AND batch_No='$batch_No'";

              $result2 = $conn->query($sql2);

              if ($result2->num_rows > 0) {
              ?>
                    
                <?php
                while($row2= $result2->fetch_assoc() ) {
                  $uid=$row2['user_Id'];
                  
                  $sql4="INSERT INTO do_assignment (assignment_id,user_Id,batch_No,course_Id,deadline) VALUES ('{$autoasid}','{$uid}','{$batch_No}','{$C_Id}','{$datetime}' )";

                  

                  $conn->query($sql4);



                }

              }





            if ( $conn->query($sql)=== TRUE AND $conn->query($sql5)=== TRUE) {
                echo '<script type="text/javascript">',
                'alert("Succesfully uploaded");',
                '</script>';
                echo $idexist;


            }else{

                echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;
  
            }

    
  


   

  }else{


          $sql6="INSERT INTO give_assignment (assignment_Id,user_Id,course_Id,batch_No,published,deadline) VALUES ('{$idexist}','{$u_Id}','{$C_Id}','{$batch_No}','0','{$datetime}' )";






          
            $sql2 = "SELECT user_Id FROM course_follow WHERE course_Id='{$C_Id}' AND batch_No='$batch_No'";

            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
            ?>
                  
              <?php
              while($row2= $result2->fetch_assoc() ) {
                $uid=$row2['user_Id'];
                
                $sql4="INSERT INTO do_assignment (assignment_id,user_Id,batch_No,course_Id,deadline) VALUES ('{$idexist}','{$uid}','{$batch_No}','{$C_Id}','{$datetime}' )";

                

                $conn->query($sql4);



              }

            }










            if ($conn->query($sql6)=== TRUE) {
                echo '<script type="text/javascript">',
                'alert("Succesfully uploaded");',
                '</script>';

            }else{

                echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;
  
            }










  }
  


  
  


$conn->close();
?>
<script>
window.location.href = "lecturer_Assignment/assignment.php";
</script>
<?php

 


} 
?>

<form enctype="multipart/form-data" action="" method="post" onsubmit="return checkFileAssignment();">






<select name="assigns" id=givenassigns>
<option selected="selected" value="noval">Select existing assignments:</option>


<?php
session_start();
include '../db.php';
$courseId=$_SESSION['Course_ID'];

$sql3 = "SELECT assignment_title,assignment_id FROM assignment";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
  
  while($row3= $result3->fetch_assoc() ) {

?>
    <option value="<?php echo $row3['assignment_id'];?> "><?php echo $row3['assignment_title'];?> </option>

  
<?php
  }

}

else{

?>
   <option value="noval">No assignments:</option>
<?php
}
?>


</select>










<br>

<br>











<label>Select file</label>
<input name="file" type="file" id="assignmentfileinput" size="100"><br>
<br>

<label>Title</label><br>

<input type="text" name="assignment_title"  size="50" required="required"> <br><br>


<textarea name="guide" cols="60" rows="8" class="widebox" id="articleassignment"></textarea><br><br>
<h4>Dead-Line</h4><br>

<!--<lable>year</lable><input type="number" name="year"  size="4"  min="2016" max="2500">
<lable>Month</lable><input type="number" name="month"  size="4"  min="1" max="12">
<lable>Day</lable><input type="number" name="day"  size="2"  min="1" max="31">



-->

<label>Date</label> <input type="text" id="datepicker" name="datepick" required="required"></p>
 
<br><br>

<label>Enter the time in 24 hours</label><br><br>

<label>Hours</label><input type="number" name="hour"  size="4"  min="0" max="23" maxlength="2" oninput="maxLengthCheck(this)" required="required" > 
<label>Minutes</label><input type="number" name="min"  size="4"  min="0" max="59" maxlength="2" oninput="maxLengthCheck(this)" required="required">

<br><br>
<input class="button btn-1" type="submit" id="u_buttonassignment" name="u_buttonassignment" value="Upload" >













</form>

<?php
 
include '../db.php';
$courseId=$_SESSION['Course_ID'];
$user_ID=$_SESSION['username'];
$batch_No=$_SESSION['batchNo'];
$sql1 = "SELECT Course_name FROM course WHERE course_Id='$courseId'";

                        $result1 = $conn->query($sql1);

                        $row1 = $result1->fetch_assoc();

$coursename =$row1['Course_name'];

if(isset($_POST['u_buttonassignment'])){

  if ($_FILES['file']['size'] == 0 )
  {
      

       $link="nolink";
       insertassign($_POST['assigns'],$_POST['assignment_title'],$_POST['guide'],$_POST['datepick'],$_POST['hour'],$_POST['min'],$user_ID,$courseId,$link,$batch_No);


  }else{



  $file_result="";

if($_FILES["file"]["error"] >0){

  $file_result .="No file uploaded or Invalid file.";
  $file_result .="Error Code: " .$_FILES["file"]["error"]."<br>";
  echo $file_result;

}else{

  $file_result .= "Upload: " . $_FILES["file"]["name"]."<br>". "Type: " . $_FILES["file"]["type"]."<br>" . "Size: " . ($_FILES["file"]["size"]/1024) . "Kb<br>" . "Temp file: " . $_FILES["file"]["tmp_name"]."<br><br><br>";

  move_uploaded_file($_FILES["file"]["tmp_name"],'../Assignments/'. $coursename .'/' . $_FILES["file"]["name"]);

  $file_result .= "File Uplloaded succesfully.";

  echo $file_result;

  $link='../Assignments/'. $coursename .'/' . $_FILES["file"]["name"];



  insertassign($_POST['assigns'],$_POST['assignment_title'],$_POST['guide'],$_POST['datepick'],$_POST['hour'],$_POST['min'],$user_ID,$courseId,$link,$batch_No);



}




  }

 

}


?>


<br>

<a href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='none';document.getElementById('fade2').style.display='none'">Cancel</a></div>

<button type="button" class="button btn-1" style="margin-left:20%;" href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='block';document.getElementById('fade2').style.display='block'" ><span>Add Assignment</span></button>
<br>
<br>
