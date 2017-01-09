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

<link rel="stylesheet" type="text/css" href="css/inbox.css">
<style type="text/css">

    body{
        margin:0%;
        padding:0%;
    }

    .hide{
        display: none;
    }
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

<link rel="icon" href="../image/rittilogo.png" type="image/gif" sizes="16x16">

</head>

<body>    
  
        


 <div id=upbanner style="float:bottom;position: relative;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">
<?php
 include("user_home.php");

 $quizId=$_GET['quizId'];
 $mod_Id = $_GET['modID'];
 $Qname = $_SESSION['Qname'];
            
        
?>     
</div>

<?php

include('../db.php');

if (isset($_SESSION['coursename'])  && isset($_SESSION['Course_ID']) && isset($_SESSION['batch_No'])  ){
    $cname= $_SESSION['coursename'];
    $courseID=$_SESSION['Course_ID'];
    $batch_No=$_SESSION['batch_No'];
    ?>

<div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">

   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href="course.php?courseIDpass=<?php echo $courseID; ?>&B_No=<?php echo $batch_No ?> "> <?php echo $cname; ?> > &nbsp </a></li>
        <li><a href="quiz_main.php?quizId=<?php echo $quizId; ?>"> <?php echo $Qname; ?> > &nbsp </a></li>
        <li><a href=""> Questions &nbsp </a></li>
    

</div>
<?php

}else{

    ?>
  <div id=breadcrumb style="float:bottom;position: relative;margin-top:0.5%;width:100%; border:solid 1px #E5E4E2; border-radius: 5px;">

   
        <li><a href="user_courses.php">My courses  > &nbsp </a></li>
        <li><a href=""> Inbox &nbsp </a></li>
    

</div>


<?php


}


$sql1 = "SELECT * FROM question where module_Id = $mod_Id";
$result1 = mysqli_query($conn,$sql1);
if (mysqli_num_rows($result1)>0){


$sql = "SELECT * FROM question join quiz_questions on question.question_Id = quiz_questions.question_Id where quiz_Id = $quizId";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){


    echo "Number of Questions in this quiz: " .mysqli_num_rows($result). "<br>";

    
    ?>

<div  class="tbl-header">
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

<input type="submit" name="delete" value="Delete" >   
<input type="submit" name = "submit" value="Publish" >

</form> 


</div>

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
    </div>
<h3><a href="quizcheck.php?modID=<?php echo $mod_Id ?>&quizId=<?php echo $quizId ?>">Add questions</a></h3>
</body>

</html>