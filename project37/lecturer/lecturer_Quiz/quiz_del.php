<?php




// connect to the database

include('db.php');


$quizId = $_GET['quizId'];
$mod_Id = $_GET['modID'];


// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$qid = $_GET['id'];



// delete the entry

$result = mysqli_query($conn,"DELETE FROM question WHERE question_Id=$qid AND quiz_Id = $quizId AND module_Id = $mod_Id")

or die(mysqli_error());



// redirect back to the view page

header("Location: qlist_view.php?quizId=".$quizId.'&modID='.$mod_Id );

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: qlist_view.php?quizId=".$quizId.'&modID='.$mod_Id );

}



?>