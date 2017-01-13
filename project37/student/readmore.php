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
<link rel="stylesheet" type="text/css" href="../stylesheet.css">
<base target="_self" />
<style type="text/css">
    

</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script type="text/javascript" > 
 
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);   
 
 </script>


 

</head>

<body>




 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody style="height:500px">

<div id="breadcrumb" > 

   <ul>
        <li><a href="user_courses.php">My courses</a></li>
        <li><a href=""> News</a></li>
    
   </ul>
     
    

</div>







<?php
    $newsnumber = $_GET['newsnumber'];

    include '../db.php';
    $UserIDfordefault=$_SESSION['username'];

    $newssql = "SELECT * FROM newsfeed WHERE newsnumber='$newsnumber'";
    $resultnews = $conn->query($newssql);

    if ($resultnews->num_rows > 0) {
      while($rownews= $resultnews->fetch_assoc() ) {
?>




<div id="slideshow">




<?php     if( $rownews['image0']!='nolink'){
        ?>
        <div>                                                    

    <img id="newsimage" src="<?php echo $rownews['image0']; ?>" alt="No image" >
    </div>
<?php
                                                    }
        
    if( $rownews['image1']!='nolink'){
        ?>
        <div>
    <img id="newsimage" src="<?php echo $rownews['image1']; ?>" alt="No image" >
    </div>
<?php
                                                    }
     if( $rownews['image2']!='nolink'){
        ?>
        <div>
    <img id="newsimage" src="<?php echo $rownews['image2']; ?>" alt="No image">
    </div>
<?php
                                                    }
     if( $rownews['image3']!='nolink'){
        ?>
        <div>
    <img id="newsimage" src="<?php echo $rownews['image3']; ?>" alt="No image">
    </div>
<?php
                                                    }
     if( $rownews['image4']!='nolink'){
        ?>
        <div>
    <img id="newsimage" src="<?php echo $rownews['image4']; ?>" alt="No image">
    </div>




</div>









    
<?php
                                                    }
                                                    


                                                    
                                                    
                                                    ?>
    


</div>

<div id=newsdetail >
<h1><?php  echo $rownews['heading'];  ?></h1>

<p "><?php echo $rownews['description'];  ?></p>



</div>


<?php
  }

}
        }
?>




</body>
</html>

