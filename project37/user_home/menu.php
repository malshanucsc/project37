<div id="mySidenav" class="sidenav" style="height:65%; margin-left:1%;margin-top:5.8%;float:left;" scrolling="no"  >

  <a style="height:5%;" href="javascript:void(0)" class="closebtn" onclick="closeNav('sp1')"><<</a>
  <a style="height:2%;" href="course.php?courseIDpass=<?php echo $_GET['courseIDpass'] ?>"  >Current Course</a>

  <a style="height:2%;" href="#">Modules</a>
  <a style="height:2%;" href="../../quiz.php?courseIDQuiz=<?php echo $_GET['courseIDpass'] ?>" ">Quizzes</a>
  <a style="height:2%;" href="../../assignment.php?courseIDAssignment=<?php echo $_GET['courseIDpass'] ?>" >Assignments</a>
  <a style="height:2%;" href="../../performance.php?courseIDPerformance=<?php echo $_GET['courseIDpass'] ?>" >Performance</a>

  

<iframe id ="ivf2" class="overlay" width="100%" scrolling="no" frameborder="0" height="100%" src="../../calender/examples/calenderview.html" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" name="iframe_calender"></iframe>






</div>