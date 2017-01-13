<link rel="stylesheet" type="text/css" href="../../stylesheet.css">
<style type="text/css">
/*  
    .white_content {
        display: none;
        position: fixed;
        top: 18%;
        left: 28%;
        width: 40%;
        height: 64%;
        padding: 16px;
        border: 10px solid  #189D50;
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
}*/
/*
input[type="text"]{
  width: 90%;
}

h4{
  color: #1E8449;
  text-decoration: underline;
}

*/























</style>
<script type="text/javascript">

    function checkFilemodule() {

//alert(this.files[0].size/1024/1024);

        var fileElementmod = document.getElementById("fileinput");
        var fileExtensionmod = "";


         if ($('#fileinput').get(0).files.length === 0) {
            return checktextarea();
        }else{

          if (fileElementmod.value.lastIndexOf(".") > 0) {
            fileExtensionmod = fileElementmod.value.substring(fileElementmod.value.lastIndexOf(".") + 1, fileElementmod.value.length);
          }
        var ex=fileExtensionmod.toLowerCase();
        switch(ex){
          case "gif":return checkSizemodule();break;
          case "png":return checkSizemodule();break;
          case "txt":return checkSizemodule();break;
          case "jpg":return checkSizemodule();break;
          case "jpeg":return checkSizemodule();break;
          case "bmp":return checkSizemodule();break;
          case "doc":return checkSizemodule();break;
          case "docx":return checkSizemodule();break;
          case "xls":return checkSizemodule();break;
          case "xlsx":return checkSizemodule();break;
          case "pdf":return checkSizemodule(); break;
          case "ppt":return checkSizemodule();break;
          case "pptx":return checkSizemodule();break;
          case "zip":return checkSizemodule();break;
          case "rar":return checkSizemodule();break;
         
          default:alert("You must select a valid file type");
            return false;break;
        }

        }
        
   
    }

function checktextarea(){

  var commentmodule = $.trim($('#article').val());
  //var notes = document.getElementById("articleassignment");
   if(commentmodule.length===0)
   {
        alert ("You have to either add a file or add a note.");
        return false;
   }
   else
   {
        var retVal = confirm("You are uploading only instructions without a file, Do you want to continue ?");
        return retVal;
   }

}

function checkSizemodule(){
            var oFile = document.getElementById("fileinput").files[0]; 

            if (oFile.size > 20971520) // 20 mb for bytes.
            {
                alert("File size must under 20 Mb.");
                return false;
            }

}



</script>



<h1>&nbsp&nbsp&nbsp&nbsp&nbspLessons</h1>





<div id="content-list">

<?php


include 'db.php';
$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
$sql = "SELECT module_Id,published FROM follow_module WHERE course_Id='$courseforAssignment' AND batch_No='$batch_No'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row= $result->fetch_assoc() ) {

    $mo_ID=$row['module_Id'];
    $sql2 = "SELECT module_Title FROM module WHERE module_Id='$mo_ID'";
    $result2 = $conn->query($sql2);

      if ($result2->num_rows > 0) {
        ?>    
        <?php
        while($row2= $result2->fetch_assoc() ) {
          ?>

          <?php 
         // if($row2['link']!=''){
            ?>
            <li><h3><a href= "moduleviewmain.php?moduleID=<?php echo $mo_ID; ?> " target="_parent" > <?php echo $row2['module_Title'] ;?></a></h3>
              

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
?>     <h3 style="margin-left:20%; color:red; "> <?php echo"No Lessons published";?></h3><br><?php
  }
?>

</div>
<div id="fade" class="black_overlay"></div>
<div id="light" class="white_content">
<?php

  function insert($title,$guide,$u_Id,$C_Id,$link,$batch_No){
     
include 'db.php';
     
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }   
    $sql1="INSERT INTO module (module_Title,link,body,course_Id) VALUES ('{$title}','{$link}' ,'{$guide}','{$C_Id}')";
    $sql2="INSERT INTO follow_module (course_Id,batch_No,user_Id) VALUES ('{$C_Id}','{$batch_No}','{$u_Id}')";
    if ($conn->query($sql1) === TRUE AND $conn->query($sql2) === TRUE) {
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
?>

    <form enctype="multipart/form-data" action="" method="post" onsubmit="return checkFilemodule();">

    <br>
    <label>Select file</label>
    <input name="file" type="file" id="fileinput" size="100" ><br><br>
    <label>Title</label><br>

    <input type="text" name="module_title" size="55" required="required"> <br><br>

    <label>Note</label><br>

    <textarea name="guide" cols="58" rows="8" class="widebox" id="article"></textarea><br><br>
    <input class= "button btn-1" type="submit" id="u_button" name="u_button" value="Add" >

    </form>

<?php
include 'db.php';
$courseId=$_SESSION['Course_ID'];
$user_ID=$_SESSION['username'];
$batch_No=$_SESSION['batchNo'];

$sql1 = "SELECT Course_name FROM course WHERE course_Id='$courseId'";

                        $result1 = $conn->query($sql1);

                        $row1 = $result1->fetch_assoc();

$coursename =$row1['Course_name'];

if(isset($_POST['u_button'])){

  if ($_FILES["file"]["size"] == 0)
  {
    $link="";
      
          
          insert($_POST['module_title'],$_POST['guide'],$user_ID,$courseId,$link,$batch_No);
  

  }else{?>

    <?php
      $file_result="";

if($_FILES["file"]["error"] >0){
  $file_result .="No file uploaded or Invalid file.";
  $file_result .="Error Code: " .$_FILES["file"]["error"]."<br>";
  echo $file_result;

}else{

  $file_result .= "Upload: " . $_FILES["file"]["name"]."<br>". "Type: " . $_FILES["file"]["type"]."<br>" . "Size: " . ($_FILES["file"]["size"]/1024) . "Kb<br>" . "Temp file: " . $_FILES["file"]["tmp_name"]."<br><br><br>";

  move_uploaded_file($_FILES["file"]["tmp_name"],'../../Modules/'. $coursename .'/' . $_FILES["file"]["name"]);

  $file_result .= "File Uplloaded succesfully.";

  echo $file_result;

  $link='../../Modules/'. $coursename .'/' . $_FILES["file"]["name"];

  
  insert($_POST['module_title'],$_POST['guide'],$user_ID,$courseId,$link,$batch_No);

}

  }

//  insert($_POST['module_title'],$_POST['guide'],$user_ID,$courseId,$link,$batch_No);







}

?>


<br>


<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Cancel</a>

</div>

<button type="button"  class="button btn-1" style="margin-left:20%;" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" ><span>Add Lesson</span></button>
<br>
<br>
