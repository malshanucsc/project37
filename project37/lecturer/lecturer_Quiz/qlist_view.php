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
}


function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
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

include('db.php');

?>
<?php

$sql1 = "SELECT * FROM question where module_Id = $mod_Id";
$result1 = mysqli_query($conn,$sql1);
if (mysqli_num_rows($result1)>0){


$sql = "SELECT * FROM question join quiz_questions on question.question_Id = quiz_questions.question_Id where quiz_Id = $quizId";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){


    echo "Number of Questions in this quiz: " .mysqli_num_rows($result). "<br>";

    
    ?>


    <form action='' method='post'>
    <table cellpadding="1" cellspacing="1" border="1">
    <thead>
     <tr>
  
    <th>qId</th>
    <th>Question</th>
    
    <th>Answer 1</th>
    <th>Answer 2</th>
    <th>Answer 3</th>
    <th>Answer 4</th>
    <th>Correct answer</th>
    <th></th><th></th>
    </tr>
    </thead>

   <?php while ($row = mysqli_fetch_assoc($result)) { 

    ?>



  <tbody><tr>

<td> <?php echo $row['question_Id'] ;?></td>

<td><?php echo $row['question'] ;?></td>

<td><?php echo  htmlspecialchars($row['answer1']) ;?></td>
<td><?php echo htmlspecialchars($row['answer2']) ;?></td>
<td><?php echo htmlspecialchars($row['answer3']) ;?></td>
<td> <?php echo htmlspecialchars($row['answer4']) ;?></td>
<td><?php echo htmlspecialchars($row['answer_No']) ;?></td>


<?php

echo "<td><a href='quiz_edit.php?id=" . $row['question_Id'] .'&modID='. $mod_Id.'&quizId='.$quizId."' >Edit</a></td>" ;

echo "<td><a onclick='javascript:confirmationDelete($(this));return false;' href='question_del.php?id=" . $row['question_Id'] . '&modID='. $mod_Id.'&quizId='.$quizId."'>Delete</a></td>";
    
 }   

}

else{
    echo "no questions in this quiz";
    
}

}
else{
    echo "no questions in this quiz";
    
}

 ?>

</tr>

</tbody>
</table>

</form>
<form method="post">

<input type="submit" name="delete" value="Delete" class="button btn-1">   
<input type="submit" name = "submit" value="Publish" class="button btn-1">

</form> 



<?php } ?>

 

<?php
        if(isset($_POST['submit'])){
                

             
                

                $sql2="UPDATE quiz SET Published='1' WHERE  module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id='$quizId' ";
                $sql3 ="UPDATE quiz SET Published='0' WHERE  module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id!='$quizId' ";
                
        
                if($conn->query($sql2)){
                    if($conn->query($sql3)){
                        echo "This quiz has been enable for the students";

                        }else{
                            echo "error";
                    }

                }
                
                    }
            


          if(isset($_POST['delete']))  {

        

        $sql3 = "DELETE from quiz where  module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id='$quizId'";
        $result3 = mysqli_query($conn,$sql3);

        $sql4 = "DELETE from quiz_questions where  module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id='$quizId'";
        $result4 = mysqli_query($conn,$sql4);

        if($result3 and $result4){
            echo'<script>alert("The quiz is Deleted")
            document.location.href = "quizmainview.php?modID='.$mod_Id.'";</script>';  
        }
        else{
            echo "error";
        }
}
// if(isset($_POST['delete'])){

//     $sql4 = "DELETE * from quiz where module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id='$quizId' ";
//     $sql5 = "DELETE * from quiz_questions where module_Id='$mod_Id' AND Course_Id='$courseID'  AND quiz_Id='$quizId'";

//     $result4 = mysqli_query($conn,$sql4);
//     $result5 = mysqli_query($conn,$sql5);

//     if($result4 and $result5){
//         echo "quiz is deleted";

//     }
//     else{
//         echo "error";
//     }
                
// }
        
              ?>
    
<button type="button" class="button btn-1" ><a href="quizcheck.php?modID=<?php echo $mod_Id ?>&quizId=<?php echo $quizId ?>">Add questions</a></button>






</div>






</div>
</body>

</html>