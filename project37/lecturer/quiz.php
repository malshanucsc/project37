 <?php
    // session_start();

    
    
    //     $now = time(); // Checking the time now when home page starts.

    //     if (time() - $_SESSION['start'] > 10000) {
    //         session_destroy();
    //         echo "Your session has expired! <a href='../login.php'>Login here</a>";
    //     }
    //     else{
    //         $_SESSION['start']=time();
          ?>



</style>


<script>
// function ifr(id1,id2){
// var e2 = document.getElementById(id2);
// var e = document.getElementById(id1);

// e2.innerHTML = 'Assignments';
//  e.style.display = 'block';


}


</script>


<!-- <link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16"> -->

</head>
<!-- <body style="background-color:white; ">


 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;"> -->
   
<!-- </div>
  -->
<?php
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<!-- <div id=breadcrumb style="float:bottom;position: absolute; width:66.5%; margin-left:0.5%; margin-top:0%; border: none!important;">

   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href="course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?> > &nbsp </a></li>
        <li><a href=""> Quizzes &nbsp </a></li>
    

</div>




<div id=newmenu style="float:left; margin-top:0.5%;position:relative;width:13%;"> -->


<!-- </div>
<div id=quiz style="width:58%;margin-left:10%;float:left;background-color:#f3f9fe !important;margin-top:3%;"> -->

 <h3>Currently completed lessons</h3> 
<?php


include '../db.php';



//$courseforQuiz=$_SESSION['Course_ID'];



$batchNo=$_SESSION['batchNo'];

$UserIDfordefault=$_SESSION['username'];


$sql3 = "SELECT  module_Title, module_Id FROM module where course_Id = $courseID";

$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    
    
     ?> <ul>
     <?php
   

     while($row3= $result3->fetch_assoc() ) {
  
    $_SESSION['mod']=$row3['module_Id'];
    $mod_Id = $_SESSION['mod'];
    
    ?>
    
    

     <li ><a href="quizmainview.php?modID=<?php echo $_SESSION['mod'] ?>" ><?php echo $row3['module_Title'] ?></a></li>
<br>
    <?php
      
    }
    ?>  </ul>
    <?php
}
else{
  echo "<h3> No Quizzes available</h3>";
}


?>








</body>
</html>
