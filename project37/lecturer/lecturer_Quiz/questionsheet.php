<?php
session_start();
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
        <title> Quiz Questions R I T T I</title>
        <link rel="icon" href="../../image/rittilogo.png" type="image/gif" sizes="16x16">
    </head>
    <body style="background-color:#8DA7B0;">

      
<div id="section">
        <h1>General Knowledge</h1>
   
        <div id="review">
        <form action="general_know.php" method="post">
		  <table>
			 <?php

              include ('db.php');

              $QuizID=$_SESSION['quiz_Id'];

                    $sql = "SELECT * from question where quiz_Id ='$QuizID' order by rand()";
				    $result = mysqli_query($conn, $sql);
                    $questions = array();

				    while($row = mysqli_fetch_assoc($result)){
					   $qid = $row["question_Id"];
					   $question = $row["question"];
					   $cor_ans = $row["answer_No"];
					   $choice1 = $row["answer1"];
					   $choice2 = $row["answer2"];
					   $choice3 = $row["answer3"];
                       $choice4 = $row["answer4"];
                       $cat = $row["quiz_Id"];

                        array_push($questions, $qid);





				?>


					<tr>
                        <td><b><?php echo $question;  ?></b> </td>
					</tr>
					<tr>
                        <td><input type="radio" name="q<?php echo $qid;  ?>" value="<?php echo $choice1; ?>"> <?php echo $choice1;  ?></td>

					</tr>
					<tr>
                        <td><input type="radio" name="q<?php echo $qid;  ?>" value="<?php echo $choice2;  ?>"> <?php echo $choice2;  ?> </td>

					</tr>
					<tr>
                        <td><input type="radio" name="q<?php echo $qid;  ?>" value="<?php echo $choice3; ?>"><?php echo $choice3;  ?> </td>

					</tr>
					<tr>
                        <td><input type="radio" name="q<?php echo $qid;  ?>" value="<?php echo $choice4;  ?>"> <?php echo $choice4;  ?></td>

					</tr>


				<?php

                     }


	if(isset($_POST["submit"])){
         




		include ('db.php');
        
        if(!empty($_POST["q$qid"])) {
       
		$rows = 0;
        $score = 0;
        $wa = 0;
		$result = mysqli_query($con, $sql);

		while($row =  mysqli_fetch_assoc($result)){
			$rows += 1;

            $answers[$row['qId']] = $row['correct_ans'];



		}
        $results = 0;
        foreach($questions as $qid){

            $corr_ans = $answers[$qid];
            echo "Correct answer: " . $corr_ans . "<br>";

            $choice = $_POST["q".$qid];
            echo "Your answer: " . $choice . "<br>";

            if($choice == $corr_ans){
                echo "Correct <br><br>";
                $results += 1;

            }
            else{
                echo "Incorrect <br><br>";
            }

        }




        echo "No. of Correct Answers:". $results."<br>";
        $score = $results*3;
		echo " Your score:". $score;

        $name=$_SESSION['username'];
        mysqli_query($con, "update users set score='$score' where username='$name'");


    }else{
             echo "Answer All Questions";
        }
    }


              ?>


              <tr><td><input type="submit" value="Finish" name="submit" class="button"></td></tr>



		</table>



	</form>
</div>


        </div>
        <div id="footer">
            Copyright © R I T T I
        </div>
    </body>

</html>
