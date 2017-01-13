<?php
include('db.php');

$get_id=$_POST['checkbox']; 
$get_qty=$_POST['quantity']; 

$count = count($_POST['quantity']);
for($i=0; $i<$count; $i++){
    if(isset($_POST['checkbox'][$i])){
        $checkbox = $_POST['checkbox'][$i];
        $quantity = $_POST['quantity'][$i];
        mysql_query("INSERT INTO quiz_question (question_Id, quiz_Id)
            VALUES ($checkbox, $quantity)");
    }
}


?>