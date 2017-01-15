<?php
session_start();
$id=$_SESSION['username']; 
$course = $_SESSION['Course_ID'];
$_SESSION['done'] = 1;

$quizId = $_GET['quizId'];
$mod_Id = $_GET['modID'] ;
?>


<?php 
require 'db.php';
if(!empty($_SESSION['name'] )){
    
    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   $keys=array_keys($_POST);
   $order=join(",",$keys);

   $sql = "select question_Id,answer_No from question where question_Id IN($order) ORDER BY FIELD(question_Id,$order)";

   $response=mysqli_query($conn, $sql) or die(mysql_error());
   
   while($result=mysqli_fetch_array($response)){
       if($result['answer_No']==$_POST[$result['question_Id']]){
               $right_answer++;
           }else if($_POST[$result['question_Id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
   }

   

   $total_answers = $right_answer + $wrong_answer + $unanswered;
            
    $score = round(($right_answer / $total_answers )* 100);

    
    $sql2 = "update do_quiz set marks ='". $score . "'where user_Id ='" . $id . "'AND course_Id ='" .$course ."'AND module_Id ='" . $mod_Id ."'";

   mysqli_query($conn,$sql2) or die(mysql_error());

?>
<!DOCTYPE html>
<html>
        <head>
       <title>R I T T I</title>
        <link href="../../style.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="../../stylesheet.css">

    </head>
    <body>

      <div id=upbanner >
<?php
 include("user_home.php");
?>     
</div>

<div id=boxbody >
       
        <div class="result-container">

          <table class="scores-table">
              <tr><h1>Results</h1></tr>  
            
           

                                     
            
            <tr>
              <td>Total no. of right answers</td><td><span class="answer"><?php echo $right_answer;?></span></td>
            </tr>
            <tr>
              <td>Total no. of wrong answers</td><td><span class="answer"><?php echo $wrong_answer;?></span></td>
            </tr>
            <tr>
              <td>Total no. of Unanswered Questions</td><td><span class="answer"><?php echo $unanswered;?></span></td> 
            </tr>
            <tr>
              <td>Score </td><td><span class="answer"><?php echo $score;?></span></td> 
              </tr>    
              </table>              
           <br>
        <button class="button btn-1"><a href="qlist.php?modID=<?php echo $mod_Id;?>">Back</a></button>
        </div>
    </body>
</html>
<?php }
// else{
    
//  // header( 'Location: '#' ) ;
      
// }?>
