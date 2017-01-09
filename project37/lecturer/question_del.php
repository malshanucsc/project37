
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




<?php




// connect to the database

include('../db.php');

if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])   )
{
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];

	$mod_Id = $_GET['modID'];
	$quizId = $_GET['quizId'];


// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$qid = $_GET['id'];



// delete the entry

$result = mysqli_query($conn,"DELETE FROM quiz_questions WHERE question_Id=$qid and  module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id='$quizId'");





// redirect back to the view page

header("Location: qlist_view.php?quizId=".$quizId.'&modID='.$mod_Id );

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: qlist_view.php?quizId=".$quizId.'&modID='.$mod_Id );

}

}
}
?>

