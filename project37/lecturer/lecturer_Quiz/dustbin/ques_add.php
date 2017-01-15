<?php

    session_start();

    
    
        $now = time(); // Checking the time now when home page starts.

        if (time() - $_SESSION['start'] > 10000) {
            session_destroy();
            echo "Your session has expired! <a href='../../login.php'>Login here</a>";
        }
        else{
            $_SESSION['start']=time();
         






function renderForm($question, $ans1, $ans2, $ans3, $ans4, $cor_ans, $error)

{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../../stylesheet.css">

<title>New Record</title>

</head>

<body>


 <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >

<div id="menu-block">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
  include("menu.php");
?>
</div>
<div id="content-block">

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<div>

<strong>Question: *</strong> <input type="text" name="ques" value="<?php echo $question; ?>"/><br/>
<strong>Answer 1: *</strong> <input type="text" name="ans1" value="<?php echo $ans1; ?>"/><br/>
<strong>Answer 2: *</strong> <input type="text" name="ans2" value="<?php echo $ans2; ?>"/><br/>
<strong>Answer 3: *</strong> <input type="text" name="ans3" value="<?php echo $ans3; ?>"/><br/>
<strong>Answer 4: *</strong> <input type="text" name="ans4" value="<?php echo $ans4; ?>"/><br/>
<strong>Correct answer: *</strong> <input type="text" name="correct" value="<?php echo $cor_ans; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">


</div>

</form>




</div>






</div>




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


if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$question = $_POST['ques'];

$ans1 = $_POST['ans1'];
$ans2 = $_POST['ans2'];
$ans3 = $_POST['ans3'];
$ans4 = $_POST['ans4'];
$cor_ans = $_POST['correct'];




// check to make sure both fields are entered

if ($question == '' || $ans1 == '' || $ans2 == '' || $ans3 == '' || $ans4 == '' || $cor_ans == '' )

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($question, $ans1, $ans2, $ans3, $ans4, $cor_ans, $error);

}

else

{

$sql = "INSERT question SET Course_Id = $courseID, module_Id= '$mod_Id',  question_Id='', question = '$question', answer_No = '$cor_ans', answer1='$ans1', answer2='$ans2', answer3='$ans3', answer4='$ans4'";

$result = mysqli_query($conn,$sql);
?>
<script type="text/javascript">
    alert("ss");
</script>
<?php
 
if($result)  {  
      echo'<script> alert("Inserted Successfully");</script>';  
   }  
else  
   {  
      echo'<script> alert("Failed To Insert");</script>';   
   }  


header("Location: quizmainview.php?&modID=".$mod_Id);

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','','');

}
}
}
?>