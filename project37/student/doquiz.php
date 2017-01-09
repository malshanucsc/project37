<html>
<title>Quiz</title>

<body style="background-color:#8DA7B0;">
    
    <div style="background-color:#8DA7B0;  height: 10%; width: 100%; border-style: dashed;">
    <?php //include('timer.html');?>
    </div>
    
    

    <div style="background-color:#8DA7B0;  height: 75%; width: 80%; border-style: dashed; float:left;">
    </div>
    <div style="background-color:#8DA2B0;  height: 75%; width: 15%; border-style: dashed; float:right;margin-right:2px">

         <?php
         $QuizID=$_GET['quizIDpass'];

         
         $sql2 = "SELECT No_quiz FROM quiz WHERE quiz_Id ='$QuizID' ";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
    // output data of each row
    //target="iframe_a"?>
        <ul>
    <?php
    while($row2= $result2->fetch_assoc() ) {


    ?>

           <li ><a href="doquiz.php?quizIDpass=<?php echo $passQuizID ?>" ><?php echo $row2['module'] ?></a></li>

    </div>
    
    
    
    <div style="background-color:#8DA7B0;  height: 10%; width: 100%; border-style: dashed; float:none; margin-top:37% ">
    </div>
    
</body>

</html>
