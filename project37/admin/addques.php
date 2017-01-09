 <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add Questions</title>
		<link rel="stylesheet" type="text/css" href="../css/qstyle.css">

    </head>
    <body>
         <div id="header">

            <div class = "banner">
                <img id="logo" src="../img/logo.png">
            </div>
            	<img id="logo2" src="../img/logo2.png"/>
        </div>

            <div class = "date">
                <p id="demo"></p>

                <script>
                var d = new Date();
                document.getElementById("demo").innerHTML = d.toDateString();
                </script>

            </div>


        <div id="nav">

            <ul>
                <li><a href="addques.php">Add Questions</a></li>
                <li><a href="viewques.php">View Questions list</a></li>
                <li><a href="del_update.php">Update and delete</a></li>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </div>
        <div id="section">

 <form id="add_question" action="addques.php" method="post">

            <label for="question">Ask Question</label>
            <input type="text" class="" id="question" name="question" placeholder="Enter your question here"><br>

            <label for="choice1">Choice 1</label>
            <input type="text" class="form-control" id="choice1" name="1" placeholder="choice1"><br>

            <label for="choice2">Choice 2</label>
            <input type="text" class="form-control" id="choice2" name="2" placeholder="choice2"><br>

            <label for="choice3">Choice 3</label>
            <input type="text" class="form-control" id="choice3" name="3" placeholder="choice3"><br>

            <label for="choice4">Choice 4</label>
            <input type="text" class="form-control" id="choice4" name="4" placeholder="choice4"><br>

            <label for="correct_answer">Correct answer</label>
            <input type="text"  id="correct_answer" name="correct_answer" placeholder="Enter the correct choice number"><br>

            <input type="radio" name="category" value=2> History
            <input type="radio" name="category" value=3> Science
            <input type="radio" name="category" value=1> General Knowledge <br>

            <button type="submit" class="button" value="submit" name="submit">Add Question</button>

        </form>


         <?php



	if(isset($_POST["submit"])){
        $choice1 = $_POST["1"];
		$choice2 = $_POST["2"];
		$choice3 = $_POST["3"];
        $choice4 = $_POST["4"];
        $question = $_POST["question"];
		$cat = $_POST["category"];

        $ans = $_POST["correct_answer"];
        for($i=1; $i<=4;$i++){
            if($i==1){
                $cor_ans = $choice1;
            }elseif($i==2){
                $cor_ans = $choice2;
            }elseif($i==3){
                $cor_ans= $choice3;
            }else{
                $cor_ans = $choice4;

            }


        }


		include('../dbase.php');

		$sql = "insert into questions (qId,question,correct_ans, ans1, ans2, ans3, ans4,category)  values(default,'$question','$cor_ans','$choice1','$choice2','$choice3','$choice4','$cat')";


		if(mysqli_query($con,$sql)){
			 echo "Question Insert!";
			 
		}
		else{
			 echo "Something Went Wrong!";
		}





	}


?>
        </div>

        <div id="footer">
                Copyright © 2016 Quizter
        </div>
     </body>
</html>
