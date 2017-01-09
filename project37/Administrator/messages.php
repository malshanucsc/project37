 <?php
    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            
            
            $sce=$_SESSION['currentsrc'];
            echo $sce;
            echo "Your session has expired! <a href='../login.php?csrc=<?php echo $sce ?>'>Login here</a>";
            
            session_destroy();
        }
        else{
          $_SESSION['start']=time();
          ?>
<?php

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/inbox.css">
<style>

body{
        margin:0%;
        padding:0%;
    }
    

#message th {
    background-color: #229954;
    color: white;
    font-weight: normal;
   
}

</style>
<script>
window.onload = function() {
  timer();
};

</script>
</head>

<body onload=""   >

 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");
?>     
</div>


<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">

   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href="inbox.php"> Inbox > &nbsp </a></li>
        <li><a href="">  Message &nbsp </a></li>
    

</div>



<div id=message style="float:left;width-top:100%; background-color:#f3f9fe !important;position:relative;margin-top:0.5%;border:solid 1px #E5E4E2; border-radius: 5px;">


<table>
  <tr>
  <th style="width:10%;">    Message Subject</th>
  <td><?php echo $_POST['title'];?></td>
  </tr>

<tr><td></td></tr>
  <tr>
      <th style="width:10%;">Sent Date</th>
      <td> <?php echo $_POST['date'];?></td>

  </tr>
<tr><td></td></tr>
  <tr>
    

  <th style="width:10%;">Message</th>
  <td>
  <?php echo $_POST['message'];?></td>

  </tr>

 <tr>
    

  <th style="width:10%;">Receiver/s</th>
  <td>
  <?php echo $_POST['receiver'];?></td>

  </tr>

</table>




</div>






</body>
</html>

<?php
}
?>




