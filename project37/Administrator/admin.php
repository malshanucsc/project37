
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link rel="stylesheet" type="text/css" href="../stylesheet.css">


<script>

  function checkimage() {

//alert(this.files[0].size/1024/1024);


var retval=true;
for (i = 1; i < 6; i++) { 
    object="addimage"+i;
    








        var fileElement = document.getElementById(object);
        var fileExtension = "";
  

        if ($('#'+object).get(0).files.length === 0) {
            
            retval=true;
        }else{

            if (fileElement.value.lastIndexOf(".") > 0) {
            fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
            }
        var ex=fileExtension.toLowerCase();
        switch(ex){

          case "gif":checkSizeAssignment(object,i);break;
          case "png":checkSizeAssignment(object,i);break;
          case "jpg":checkSizeAssignment(object,i);break;
          case "jpeg": checkSizeAssignment(object,i);break;
          case "bmp":checkSizeAssignment(object,i);break;
          
          default:alert("You must select a valid file type for image "+i);
            retval= false;break;
        }


        }


        
    }
    return retval;
}

function checkSizeAssignment(upimage,i){
            var oFile = document.getElementById(upimage).files[0]; 

            if (oFile.size > 2097152) // 2 mb for bytes.
            {
                alert("Each image size must under 2 Mb.Image number "+i+" is higher than 2 MB.");
                retval=false;
            }

}


</script>




<?php
    session_start();

$u_Id=$_SESSION['username'];    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            session_destroy();
            echo "Your session has expired! <a href='../login.php'>Login here</a>";
        }
        else{
            $_SESSION['start']=time();
            $name=$_SESSION['name'];
            $type=$_SESSION['type'];
            
          


    ?>

<?php

function insertnews1($number,$head,$descrip,$user,$newstime){
include '../db.php';
if ($conn->connect_error) {
  
    die("Connection failed: " . $conn->connect_error);
  }
$sqlinsertnews="INSERT INTO newsfeed (newsnumber,heading,description,image1,image2,image3,image4,image5,publisher,newsdatetime) VALUES ('{$number}','{$head}','{$descrip}','nolink','nolink','nolink','nolink','nolink','{$user}','{$newstime}')"; 

 if ( $conn->query($sqlinsertnews)=== TRUE) {
                echo '<script type="text/javascript">',
                'alert("Succesfully uploaded");',
                '</script>';
                


            }else{

                echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;
  
            }
?>
<script>
           // window.location = "http://localhost/proje37/Administrator/admin.php";
</script>
<?php
}


function insertnews2($number,$head,$descrip,$img1,$img2,$img3,$img4,$img5,$user,$newstime,$mnimage){
include '../db.php';
if ($conn->connect_error) {
  
    die("Connection failed: " . $conn->connect_error);
  }
$sqlinsertnews="INSERT INTO newsfeed (newsnumber,heading,description,image0,image1,image2,image3,image4,publisher,newsdatetime,main_image) VALUES ('{$number}','{$head}','{$descrip}','{$img1}','{$img2}','{$img3}','{$img4}','{$img5}','{$user}','{$newstime}','{$mnimage}')"; 

 if ( $conn->query($sqlinsertnews)=== TRUE) {
                echo '<script type="text/javascript">',
                'alert("Succesfully uploaded");',
                '</script>';
                


            }else{

                echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;
  
            }


?>
<script>
            window.location = "http://localhost/proje37/Administrator/admin.php";
</script>
<?php


}


?>












    


 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
 






<!-- image preview script-->
<script type="text/javascript">
        function readURL(input,imgtg,rmvbtn,radbtn) {
            
            document.getElementById(rmvbtn).style.display="block";
            document.getElementById(radbtn).style.display="block";
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+imgtg).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>




<button type="button" class="button btn-1"  href = "javascript:void(0)" onclick = "document.getElementById('newslight').style.display='block';document.getElementById('newsfade').style.display='block'" ><span>Add News</span></button>
    




<!-- div for black over lay -->
<div id="newsfade" class="black_overlay"></div>


<!-- div for white area of adding a news -->
<div id="newslight" >









<form enctype="multipart/form-data" action="" method="post" onsubmit="return checkimage();">

<h5>Heading</h5>
<input type="text" name="newsheading"  size="72" required="required"> <br><br>

<h5>Description</h5>
<textarea name="description" cols="140" rows="8" class="widebox" id="description"></textarea><br><br>

<p>You can add upto five images each should not exceed 2MB for an image</p>

 <div class="container" style="">       
<input name="file1" type="file" id="addimage1" style="opacity:00;-moz-opacity: 00;display:none;width:100%;" onchange="readURL(this,'image1','btn1','rad1');">

   <img id="image1" src="" alt="Select image 1" class="stretchy" onclick="$('#addimage1').click();">
   <input type="button" id="btn1" style="display:none;"onclick="$('#image1').attr('src',''); this.style.display='none'; rad1.style.display='none'" value="Remove">
   
   <input type="radio" name="mainimage" value="0" id="rad1" style="margin-left:45%;display:none; " />
</div>



 <div class="container" style="">       
<input name="file2" type="file" id="addimage2" style="opacity:00;-moz-opacity: 00;display:none;width:100%;" onchange="readURL(this,'image2','btn2','rad2');">

   <img id="image2" src="" alt="Select image 2" class="stretchy" onclick="$('#addimage2').click();">
    <input type="button" id="btn2" style="display:none;"onclick="$('#image2').attr('src',''); this.style.display='none';rad2.style.display='none'  " value="Remove">
   
    <input type="radio" name="mainimage" value="1" id="rad2" style="margin-left:45%; display:none;"/>
</div>


 <div class="container" style="">       
<input name="file3" type="file" id="addimage3" style="opacity:00;-moz-opacity: 00;display:none;width:100%;" onchange="readURL(this,'image3','btn3','rad3');">

   <img id="image3" src="" alt="Select image 3" class="stretchy" onclick="$('#addimage3').click();">
    <input type="button" id="btn3" style="display:none;"onclick="$('#image3').attr('src',''); this.style.display='none'; rad3.style.display='none' " value="Remove">
   
    <input type="radio" name="mainimage" value="2" id="rad3" style="margin-left:45%;display:none;" />

</div>



 <div class="container" style="">       
<input name="file4" type="file" id="addimage4" style="opacity:00;-moz-opacity: 00;display:none;width:100%;" onchange="readURL(this,'image4','btn4','rad4');">

   <img id="image4" src="" alt="Select image 4" class="stretchy" onclick="$('#addimage4').click();">
    <input type="button" id="btn4" style="display:none;"onclick="$('#image4').attr('src',''); this.style.display='none'; rad4.style.display='none' " value="Remove">
   
    <input type="radio" name="mainimage" value="3" id="rad4" style="margin-left:45%;display:none;"/>
</div>


 <div class="container" >       
<input name="file5" type="file" id="addimage5" style="opacity:00;-moz-opacity: 00;display:none;width:100%;" onchange="readURL(this,'image5','btn5','rad5');">

   <img id="image5" src="" alt="Select image 5" class="stretchy" onclick="$('#addimage5').click();">
    <input type="button" id="btn5" style="display:none;"onclick="$('#image5').attr('src',''); this.style.display='none'; rad5.style.display='none'" value="Remove">
   
    <input type="radio" name="mainimage" value="4" id="rad5" style="margin-left:45%;display:none;" />
</div>


<br><br><br><br><br><br><br><br><br><br><br>
<input class="button btn-1" type="submit" id="newssubmit" name="newssubmit" value="Post" >




</form>

<div style="float:none">

</div>

<a href = "javascript:void(0)" onclick = "document.getElementById('newslight').style.display='none';document.getElementById('newsfade').style.display='none'">Cancel</a></div>

 







<!-- news page contents -->





<style type="text/css">
  




</style>









<?php


include '../db.php';
$UserIDfordefault=$_SESSION['username'];
$mainimagesql = "SELECT newsnumber,main_image FROM newsfeed ";
$resultmainimage = $conn->query($mainimagesql);

if ($resultmainimage->num_rows > 0) {

  while($rowimg= $resultmainimage->fetch_assoc() ) {
?>
<form action="" method="post" >
<?php
    $mimgnumber=$rowimg['main_image'];
    $mimgnumber="image".$mimgnumber;
    $newsid=$rowimg['newsnumber'];
    

    $newssql = "SELECT heading,description,$mimgnumber,newsnumber FROM newsfeed WHERE newsnumber='$newsid'";
    $resultnews = $conn->query($newssql);

      if ($resultnews->num_rows > 0) {
        ?>    
        <?php
        while($rownews= $resultnews->fetch_assoc() ) {
          ?>






<input type="hidden" name="newsid"  size="72" required="required" hidden="hidden" value='<?php echo $newsid; ?>'> <br><br>

<!-- div for news feed -->
<div id=newsfeed >

<div id="containerfeed" style="">     
<?php  
    $mimglink=  $rownews[$mimgnumber];  
  ?>
   <img id="image23" src='<?php echo $mimglink; ?>' alt="No image" id="stretchyfeed">


</div>


<div >
<h4><?php  echo $rownews['heading'];  ?></h4>

<p ><?php  echo substr($rownews['description'],0,200).".....";  ?></p>
<a href="readmore.php?newsnumber=<?php echo $rownews['newsnumber']; ?>" >Read More</a>

<input style="" type="submit" id="deletenews" name="deletenews" value="Delete" >
</div>


</div>
</form>

<?php

}
}
}
}

?>








    
</div>






<?php

if(isset($_POST['newssubmit'])){



        $currentdate = date('Y-m-d H:i:s ', time());
        $cd=date('Y-m-d H-i-s ', time());
  $newsid=$cd.$u_Id;
  if (!file_exists('../News/'.$newsid)) {
    mkdir('../News/'.$newsid, 0777, true);
}

  if ($_FILES['file1']['size'] == 0 AND $_FILES['file2']['size'] == 0 AND $_FILES['file3']['size'] == 0 AND $_FILES['file4']['size'] == 0 AND $_FILES['file5']['size'] == 0)
  {
      
            insertnews1($newsid,$_POST['newsheading'],$_POST['description'],$u_Id,$currentdate);
        
  }else{



   

$link1=$link2=$link3=$link4=$link5='nolink';

if(!empty($_FILES['file1']['name'])){
        move_uploaded_file($_FILES["file1"]["tmp_name"],'../News/'.$newsid.'/'. $_FILES["file1"]["name"]);
        $link1='../News/'. $newsid .'/' . $_FILES["file1"]["name"];      
}

if(!empty($_FILES['file2']['name'])){

       move_uploaded_file($_FILES["file2"]["tmp_name"],'../News/'.$newsid.'/'. $_FILES["file2"]["name"]);
        $link2='../News/'. $newsid .'/' . $_FILES["file2"]["name"];            
}     
 
if(!empty($_FILES['file3']['name'])){

        move_uploaded_file($_FILES["file3"]["tmp_name"],'../News/'.$newsid.'/'. $_FILES["file3"]["name"]);
        $link3='../News/'. $newsid .'/' . $_FILES["file3"]["name"];
}
if(!empty($_FILES['file4']['name'])){
 
      move_uploaded_file($_FILES["file4"]["tmp_name"],'../News/'.$newsid.'/'. $_FILES["file4"]["name"]);         
        $link4='../News/'. $newsid .'/' . $_FILES["file4"]["name"];
}
if(!empty($_FILES['file5']['name'])){
       move_uploaded_file($_FILES["file5"]["tmp_name"],'../News/'.$newsid.'/'. $_FILES["file5"]["name"]);         
        $link5='../News/'. $newsid .'/' . $_FILES["file5"]["name"];

}  
  
  



  insertnews2($newsid,$_POST['newsheading'],$_POST['description'],$link1,$link2,$link3,$link4,$link5,$u_Id,$currentdate,$_POST['mainimage']);



}




  }

 







if(isset($_POST['deletenews'])){



$deleteid=$_POST['newsid'];
$deletenews="DELETE FROM newsfeed WHERE newsnumber='$deleteid'  "; 

 if ( $conn->query($deletenews)=== TRUE) {
                echo '<script type="text/javascript">',
                'alert("Succesfully Removed");',
                '</script>';
                


            }else{

                echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;
  
            }
?>
<script>
            window.location = "http://localhost/proje37/Administrator/admin.php";
</script>
<?php
}
















?>









    </div>
     


 













</body>
</html>
<?php
}
?>