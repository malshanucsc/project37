<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Quizter</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
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
      <h1>Admin Panel</h1>


        <form id="delete_form" name="delete" action="del_update.php" method="post" >
            <table>
                <thead>
			<tr>
			<th colspan=2>Enter question id you want to delete</th>
			</tr>
            </thead>

                    <tr><td><input type="number" name="value" size="10"></td></tr>
                    <td><input type="submit" value="DELETE" name="submit" class="button"></td>

            </table>
        </form>


<?php
    
   

    if (isset($_POST["submit"])){
        
            include('../dbase.php');

            $id=$_POST["value"];

            //$sql_1="DELETE FROM questions WHERE qId='$qid'";

            if (mysqli_query($con,"DELETE FROM questions WHERE qId='$id'")){
                echo "Deleted";
            }else{
			 echo "Something Went Wrong!";
		}
    }
?>

      <form id="update_form" name="update" action="del_update.php" method="post" >
			<table align=float-left border=0 >
			<thead>
			<tr>
			<th colspan=2>Select field you want to update</th>

			</tr>
            </thead>
			<tr></tr>
      <tr></tr>
      <tr>
			<td>Question id</td>
            <td><input type="number" name="qid" size="10" required></td></tr>
            <tr><td>Question</td><td>
			<input type="text" name="question" size="20" required></td></tr>
			<tr><td>Correct Answer</td><td>
			<input type="number" name="correct_ans" size="20" required></td></tr>
			<tr><td>Answer 1</td><td>
			<input type="text" name="ans1" size ="20" required></td></tr>
            <tr><td>Answer 2</td><td>
			<input type="text" name="ans2" size ="20" required></td></tr>
            <tr><td>Answer 3</td><td>
            <input type="text" name="ans3" size ="20" required></td></tr>
            <tr><td>Answer 4</td><td>
            <input type="text" name="ans4" size ="20" required></td></tr>
            <tr><td>Category</td><td>
            <input type="number" name="category" size ="20" required></td></tr>

            <tr><td colspan=2 align="center">
			<input type="submit" value="Update" name="update" class="button">
			<input type="reset" value="Cancel" class="button"></td>
			</tr>

            </table>
			</form>

        <?php
    
            



			if (isset($_POST["update"])){
                
                include('../dbase.php');

            $qid = $_POST["qid"];
			$question=$_POST["question"];
			$corr=$_POST["correct_ans"];
			$ans1=$_POST["ans1"];
			$ans2=$_POST["ans2"];
			$ans3=$_POST["ans3"];
			$ans4=$_POST["ans4"];
            $cat=$_POST["category"];


			$sql= "UPDATE questions SET
			question='$question',
			correct_ans='$corr',
			ans1='$ans1',
            ans2='$ans2',
            ans3='$ans3',
            ans4='$ans4',
			Category='$cat'

			WHERE qId='$qid'";
			if(mysqli_query($con,$sql)){
                echo "Updated";
			}else{
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
