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
 
}


</script>

<link rel="icon" href="../../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>

<body>    
  
        


 <div id=upbanner >
<?php
 include("user_home.php");
    $cname= $_SESSION['coursename'];

    $courseID=$_SESSION['Course_ID'];
 $quizId=$_GET['quizId'];
 $mod_Id = $_GET['modID'];
 $modID=$mod_Id;
 $Qname = $_SESSION['Qname'];
    $batch_No=$_SESSION['batch_No'];
            
        
?>     
     
</div>

<div id=boxbody >


<div id="breadcrumb">

<ul>
        <li><a href="../user_courses.php">My courses</a></li>
        <li><a href="../course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?></a></li>
                <li><a href="quiz_main.php"> Quizzes</a></li>
        <li><a href="quizmainview.php?modID=<?php echo $modID; ?>"> <?php echo $Qname; ?></a></li>
        <li><a href=""> Questions &nbsp </a></li>
    
</ul>   
    

</div>


<div id="menu-block">

<?php
$courseID=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];
  include("menu.php");
?>
</div>
<div id="content-block">








<?php



function renderForm($qid, $question, $ans1, $ans2, $ans3, $ans4, $cor_ans, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $qid; ?>"/>

<div>

<p><strong>Question ID:</strong> <?php echo $qid; ?></p>

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

</body>

</html>

<?php

}




include('db.php');

$quizId = $_GET['quizId'];
$mod_Id = $_GET['modID'];

// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid

$qid = $_POST['id'];

$question = $_POST['ques'];

$ans1 = $_POST['ans1'];
$ans2 = $_POST['ans2'];
$ans3 = $_POST['ans3'];
$ans4 = $_POST['ans4'];
$cor_ans = $_POST['correct'];




// check that firstname/lastname fields are both filled in

if ($question == '' || $ans1 == '' || $ans2 == '' || $ans3 == '' || $ans4 == '' || $cor_ans == ''  )

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($qid, $question, $ans1, $ans2, $ans3, $ans4, $cor_ans, $error);

}

else

{

// save the data to the database

mysqli_query($conn,"UPDATE question SET question = '$question', answer1 = '$ans1', answer1 = '$ans1', answer2 = '$ans2', answer3 = '$ans3', answer4 = '$ans4', answer_No = '$cor_ans' WHERE question_Id='$qid'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: qlist_view.php?quizId=".$quizId.'&modID='.$mod_Id );

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$qid = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM question WHERE question_Id=$qid")

or die(mysqli_error());

$row = mysqli_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$question = $row['question'];

$ans1 = $row['answer1'];
$ans2 = $row['answer2'];
$ans3 = $row['answer3'];
$ans4 = $row['answer4'];
$cor_ans = $row['answer_No'];



// show form

renderForm($qid, $question, $ans1, $ans2, $ans3, $ans4, $cor_ans, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

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







































