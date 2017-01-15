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
<title> &nbsp&nbsp&nbsp R I T T I</title>
<link rel="stylesheet" type="text/css" href="../stylesheet.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<base target="_self" />
<style type="text/css">


</style>
<script type="text/javascript" > 
 
$("#slideshownews > div:gt(0)").hide();

setInterval(function() {
  $('#slideshownews > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshownews');
}, 3000);   
 
 </script>

<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">


</head>
<body>
 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >







<div id="breadcrumb">


<div id="content-block">








<?php
    $newsnumber = $_GET['newsnumber'];

    include '../db.php';
    $UserIDfordefault=$_SESSION['username'];

    $newssql = "SELECT * FROM newsfeed WHERE newsnumber='$newsnumber'";
    $resultnews = $conn->query($newssql);

    if ($resultnews->num_rows > 0) {
      while($rownews= $resultnews->fetch_assoc() ) {
?>





<div id="slideshownews">




<?php     if( $rownews['image0']!='nolink'){
        ?>
        <div id="imgdiv">                                                    

    <img id="newsimage" src="<?php echo $rownews['image0']; ?>" alt="No image" >
    </div>
<?php
                                                    }
        
    if( $rownews['image1']!='nolink'){
        ?>
        <div id="imgdiv">
    <img id="newsimage" src="<?php echo $rownews['image1']; ?>" alt="No image" >
    </div>
<?php
                                                    }
     if( $rownews['image2']!='nolink'){
        ?>
        <div id="imgdiv">
    <img id="newsimage" src="<?php echo $rownews['image2']; ?>" alt="No image">
    </div>
<?php
                                                    }
     if( $rownews['image3']!='nolink'){
        ?>
        <div id="imgdiv">
    <img id="newsimage" src="<?php echo $rownews['image3']; ?>" alt="No image">
    </div>
<?php
                                                    }
     if( $rownews['image4']!='nolink'){
        ?>
        <div id="imgdiv">
    <img id="newsimage" src="<?php echo $rownews['image4']; ?>" alt="No image">
    </div>

<?php
}

?>

</div>


<div id=newsdetail >

<h2>
<?php  echo $rownews['heading'];  ?>
   </h2>

<p "><?php echo $rownews['description'];  ?></p>

</div>

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
?>





