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

<link rel="stylesheet" type="text/css" href="css/inbox.css">
<style type="text/css">

/*CSS for white content and black overlay in new news adding*/

  .white_content {
        display: none;
        position: fixed;
        top: 8%;
        left: 25%;
        width: 40%;
        height: 74%;
        padding: 16px;
        border: 5px solid #1E8449;
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

    body{
        margin:0%;
        padding:0%;
    }

</style>
<script type="text/javascript">
     window.onload = function() {
  timer();
};

</script>

<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>

<body>    
  
    <?php
    $u_Id=$_SESSION['username'];
    ?>    


 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
            
        
?>     
</div>


  <div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">

   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href=""> Inbox &nbsp </a></li>
    

</div>



<div id=inbox style="float:left; width:100%; border:solid 1px #E5E4E2; position:relative;margin-top:0.5%;border-radius: 5px;">



<button type="button" class="button btn-1" style="margin-left:88%;" href = "javascript:void(0)" onclick = "document.getElementById('messagelight').style.display='block';document.getElementById('messageblack').style.display='block'" ><span>New Message</span></button>
    




<!-- div for black over lay -->
<div id="messageblack" class="black_overlay"></div>


<!-- div for white area of adding a news -->
<div id="messagelight" class="white_content">




<script type="text/javascript">
 

function select_recep()
{
   var favorite = [];
            $.each($("input[name='color']:checked"), function(){            
                favorite.push($(this).val());
            });
            $('#sendTo').val($('#sendTo').val()+favorite.join(",")+',');
             
}










$(document).ready(function() {
  $("#radiousers input:radio").click(function() {
var userdiv= document.getElementById('multipleusers');


    
var rates = document.getElementsByName('receptype');

var rate_value;
for(var i = 0; i < rates.length; i++){
    if(rates[i].checked){
        rate_value = rates[i].value;
    }
}



    
    if(rate_value=="cususer"){

        
    document.getElementById('multipleusers').style.display = 'block';

    }else{
//        alert(document.getElementById("#radiousers input:radio").value);
           document.getElementById('multipleusers').style.display = 'none';
    }


















   });
  
 
});










</script>



<form  action="sent_messages.php" method="post" >
<h5>To</h5>
<div id="radiousers">
<input type='radio' name='receptype' id='users_message' <?php if (isset($receptype) && $gender=="Allusers") echo "checked";?> value='Allusers'><label>All Users</label>
<input type='radio' name='receptype' id='users_message' <?php if (isset($receptype) && $gender=="AllLectures") echo "checked";?> value='AllLectures'><label>All Lectures</label>
<input type='radio' name='receptype' id='users_message' <?php if (isset($receptype) && $gender=="AllStudents") echo "checked";?> value='AllStudents'><label>All Students</label>
<input type='radio' name='receptype' id='users_message' <?php if (isset($receptype) && $gender=="cususer") echo "checked";?> value='cususer'><label>Custom Users</label>
</div>

<div id="multipleusers" style="display:none; padding-top: 3%;padding-bottom: 1%; ">
<?php
include"ajaxsearch/ajax-search.php";
?>
<br>

<input type="text" name="sendTo"  id="sendTo" size="72" required="required" style="color:red;font-style: bold;" readonly> <br><br>

</div>





<h5>Heading</h5>
<input type="text" name="messageheading"  size="72" required="required"> <br><br>

<h5>Description</h5>
<textarea name="messagebody" cols="74" rows="8" class="widebox" id="description"></textarea><br><br>




<input type="submit" name="sendmessage" value="Send"><br>


</form>



<a href = "javascript:void(0)" onclick = "document.getElementById('messagelight').style.display='none';document.getElementById('messageblack').style.display='none'">Cancel</a></div>

 
</div>




<?php

include '../db.php';

$User_IDforInbox=$_SESSION['username'];

$sql = "SELECT * FROM admin_messages WHERE from_admin='$User_IDforInbox'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
    <ul>
	<?php
    while($row= $result->fetch_assoc() ) {
	?>
    
<form action="messages.php" method="post">
    
    <input type="submit" value='<?php echo $row['title']; ?>'/>
     <input type='hidden' name='title' value='<?php echo $row['title'];?>' />
     <input type='hidden' name='msg_Id' value='<?php echo $row['msg_id'];?>' />
     <input type='hidden' name='message' value='<?php echo $row['body'];?>' />
     <input type='hidden' name='date' value='<?php echo $row['sent_date'];?>' />
     <input type='hidden' name='receiver' value='<?php echo $row['to_users'];?>'/>
     
       
    
    
</form>    

    
	<?php
      
    }
	?>	</ul>
	<?php
}else{
    echo "no messages";
}
?>





</body>
</html>
<?php
}
?>








<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




if(isset($_POST['sendmessage'])){

?>

<?php
date_default_timezone_set("Asia/Colombo");

  $sendingdate = date('Y-m-d H:i:s ', time());
$messageid=$sendingdate.$u_Id;
 $recepient="";

$heading=$_POST['messageheading'];
$body=$_POST['messagebody'];

  if (empty($_POST["receptype"])) {
    ?><script type="text/javascript">alert("Select_recepient");</script>
    <?php
  } else {
    $recepient = test_input($_POST["receptype"]);
  

  if($recepient=="Allusers"){


    $sqladminmessage="INSERT INTO admin_messages (from_admin,to_users,title,body,msg_id,sent_date) VALUES ($u_Id,'All users','{$heading}','{$body}','{$messageid}','{$sendingdate}')"; 
    

 if ( $conn->query($sqladminmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }


    $getusers="SELECT user_Id FROM user WHERE user_Id!=$u_Id";

    $resultgetusers = $conn->query($getusers);

if ($resultgetusers->num_rows > 0) {

  while($rowuser= $resultgetusers->fetch_assoc() ) {
        $recId=$rowuser['user_Id'];
        $sqlsendmessage="INSERT INTO message (msg_Id,user_Id,new,msg_Title,message,date_Received) VALUES ('{$messageid}','{$recId}',1,'{$heading}','{$body}','{$sendingdate}')"; 
    





         if ( $conn->query($sqlsendmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }










    }
}

?>
<script>
            window.location = "http://localhost/proje37/Administrator/sent_messages.php";
</script>
<?php
    







  }elseif($recepient=="AllLectures"){



    $sqladminmessage="INSERT INTO admin_messages (from_admin,to_users,title,body,msg_id,sent_date) VALUES ($u_Id,'All Lectures','{$heading}','{$body}','{$messageid}','{$sendingdate}')"; 
    

 if ( $conn->query($sqladminmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }



    $getusers="SELECT user_Id FROM user WHERE user_Id!=$u_Id AND Type=2";

    $resultgetusers = $conn->query($getusers);

if ($resultgetusers->num_rows > 0) {

  while($rowuser= $resultgetusers->fetch_assoc() ) {
        $recId=$rowuser['user_Id'];
        $sqlsendmessage="INSERT INTO message (msg_Id,user_Id,new,msg_Title,message,date_Received) VALUES ('{$messageid}','{$recId}',1,'{$heading}','{$body}','{$sendingdate}')"; 
    

         if ( $conn->query($sqlsendmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }










    }
}

?>
<script>
            window.location = "http://localhost/proje37/Administrator/sent_messages.php";
</script>
<?php
    







  }elseif($recepient=="AllStudents"){


    $sqladminmessage="INSERT INTO admin_messages (from_admin,to_users,title,body,msg_id,sent_date) VALUES ($u_Id,'All Students','{$heading}','{$body}','{$messageid}','{$sendingdate}')"; 
    

 if ( $conn->query($sqladminmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }




    $getusers="SELECT user_Id FROM user WHERE user_Id!=$u_Id AND Type=1";

    $resultgetusers = $conn->query($getusers);

if ($resultgetusers->num_rows > 0) {

  while($rowuser= $resultgetusers->fetch_assoc() ) {
        $recId=$rowuser['user_Id'];
        $sqlsendmessage="INSERT INTO message (msg_Id,user_Id,new,msg_Title,message,date_Received) VALUES ('{$messageid}','{$recId}',1,'{$heading}','{$body}','{$sendingdate}')"; 
    

         if ( $conn->query($sqlsendmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }










    }
}

?>
<script>
           window.location = "http://localhost/proje37/Administrator/sent_messages.php";
</script>
<?php
    







  }elseif($recepient=="cususer"){





?>

<?php

  if (empty($_POST["sendTo"])) {
    ?><script type="text/javascript">alert("Select_recepient");</script>
    <?php
  } else {
    $recepient = test_input($_POST["sendTo"]);


    $receparray = preg_split("/[\s,]+/", $recepient);

    $sqladminmessage="INSERT INTO admin_messages (from_admin,to_users,title,body,msg_id,sent_date) VALUES ($u_Id,'{$recepient}','{$heading}','{$body}','{$messageid}','{$sendingdate}')"; 
    

 if ( $conn->query($sqladminmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }


    foreach ($receparray as $recId){

            if($recId!=""){
                  $sqlsendmessage="INSERT INTO message (msg_Id,user_Id,new,msg_Title,message,date_Received) VALUES ('{$messageid}','{$recId}',1,'{$heading}','{$body}','{$sendingdate}')"; 
    

         if ( $conn->query($sqlsendmessage)=== FALSE) {
               
                            echo '<script type="text/javascript">',
                'alert("Error occured!. Retry");',
                '</script>';
                echo "Error occured!. Retry " . $conn->error;

  
            }
            }

                


}







?>
<script>
           window.location = "http://localhost/proje37/Administrator/sent_messages.php";
</script>
<?php
  

    }


  }








?>
<script type="text/javascript">
    alert("Message Sending Process Finished");
</script>
<?php






    }







  }






?>