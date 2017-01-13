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
     window.onload = function() {
  timer();
};

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


if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
      $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<div id="breadcrumb">
<ul>
    
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
        <li><a href=""> Inbox</a></li>
    

</ul>
   
    
</div>
<?php

}else{

    ?>
  <div id="breadcrumb">

   <ul>
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href=""> Inbox</a></li>
    
   </ul>
       

</div>

<?php


}

?>


<div id="content-block">


<form method="post">


<?php

include 'db.php';

$User_IDforInbox=$_SESSION['username'];

$sql = "SELECT * FROM message WHERE user_Id='$User_IDforInbox'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
    <ul>
    <?php
    while($row= $result->fetch_assoc() ) {
    ?><script>
    var mID=<?php $row['msg_Id']; ?> 
    </script>
    
    <li style="width:100%;">
    <a href="message.php?title=<?php echo $row['msg_Title'];?>&ID=<?php echo $row['msg_Id'];?>&msg=<?php echo $row['message']; ?>&date=<?php echo $row['date_Received'];?>">
    <?php

    if($row['new']==0){
        echo $row['msg_Title'];                
    
    }else{
    
    ?>(new)        <?php echo $row['msg_Title']; 

    }

    ?>
       
    </a>
    </li>

    <?php
      
    }
    ?>  </ul>
    <?php
}else{
    echo "no messages";
}
?>
</form>
</div>


<?php
// include("branches.html");
?>






</div>



</body>
</html>
<?php
}
?>