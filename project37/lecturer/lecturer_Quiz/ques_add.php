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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>

<head>
<link rel="stylesheet" type="text/css" href="../../stylesheet.css">

<title>New Record</title>

</head>

<body>


 <div id="upbanner" >
<?php

include("db.php");
$cname= $_SESSION['coursename'];
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

 include("user_home.php");


    $mo_ID=$_GET['modID'];
    $sql = "SELECT module_Title FROM module WHERE module_Id='$mo_ID' ";
    $result = mysqli_query($conn,$sql);
    $count =mysqli_fetch_array($result);
    $moduletitle=$count[0];
?>     
</div>

<div id="boxbody" >

    <div id="breadcrumb">
<?php

?>

<ul>
  
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
        <li><a href="quiz_main.php"> Quizzes</a></li>
        <li><a href="quizmainview.php?modID=<?php echo $mo_ID?>" ><?php echo $moduletitle;?></a> </li>
        <li><a href="">Add new Question</a> </li>
        


</ul>   
  
</div>

<div id="menu-block">

<?php

  include("menu.php");

?>
</div>





<div id="content-block">



<form action="" method="post">

<div>

<strong>Question: *</strong> <input type="text" name="ques" value=""/><br/>
<strong>Answer 1: *</strong> <input type="text" name="ans1" value=""/><br/>
<strong>Answer 2: *</strong> <input type="text" name="ans2" value=""/><br/>
<strong>Answer 3: *</strong> <input type="text" name="ans3" value=""/><br/>
<strong>Answer 4: *</strong> <input type="text" name="ans4" value=""/><br/>
<strong>Correct answer: *</strong> <input type="text" name="correct" value=""/><br/>

<p>* Required</p>

<input type="submit" name="Enter" value="Enter">


</div>

</form>




</body>

</html>

<?php

}









// connect to the database

include('db.php');

if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];

	$mod_Id = $_GET['modID'];


if (isset($_POST['Enter'])){



$question = $_POST['ques'];

$ans1 = $_POST['ans1'];
$ans2 = $_POST['ans2'];
$ans3 = $_POST['ans3'];
$ans4 = $_POST['ans4'];
$cor_ans = $_POST['correct'];





$sql = "INSERT into question (Course_Id,module_Id,question_Id,question, answer_No, answer1, answer2, answer3, answer4) 
values('$courseID','$mod_Id','','$question','$cor_ans','$ans1','$ans2','$ans3','$ans4')";

$result = mysqli_query($conn,$sql);


if($result){
    echo "<script>alert('Question added to question bank')</script>";

}else{
    echo "<script>alert('Failed to insert')</script>";
}




}
}
?>