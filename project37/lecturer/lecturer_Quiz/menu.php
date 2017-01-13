<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../stylesheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

</head>	
<body>


 <div style="text-align:center;">

				<nav class="menu-btn">
					<a href="../course.php?courseIDpass=<?php echo $_SESSION['Course_ID']; ?>&B_No=<?php echo $_SESSION['batchNo'] ?>" data-hover="Current course"><span>Current Course</span></a>
					<a href="../lecturer_Module/modules.php" data-hover="Lessons"><span>Lessons</span></a>
					<a href="quiz_main.php" data-hover="Quizzes"><span>Quizzes</span></a>
					<a href="../lecturer_Assignment/assignment.php" data-hover="Assignments"><span>Assignments</span></a>
					<a href="../lecturer_Students/studentlist.php" data-hover="Students"><span>Students</span></a>
				</nav>
       
        <!--
        
    <li ><a style="height:1%;" href="course.php?courseIDpass=<?php echo $_SESSION['Course_ID']; ?>&B_No=<?php echo $_SESSION['batchNo'] ?> "  > Current Course</a></li>
   <br>
    <li>  <a  href="modules.php" onclick="changeColor(this);">Lessons</a></li>
    <br>
    <li><a  href="#" target="_parent" >Quizzes</a></li>
    <br>
    <li> <a  href="assignment.php" target="_parent" >Assignments</a></li>
    <br>
    <li>  <a style="height:1%;" href="studentlist.php" >Students</a></li>
    <br>

        -->
        
    </div>
</body>
</html>




 
