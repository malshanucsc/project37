
<style>
#searchform{
    z-index:9;


}
#searchform li{
 z-index:1;
 margin-left: 4.7%;
 width:25.5%;
}
#searchbar{

    width: 30%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    margin-left: 4.5%;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;

}

</style>

<?php








?>
<!--
<form method=post style="" id=searchform>

    <table>
<tr>
  <input type="text" name="searchstudent" id=searchbar placeholder="Search student">
  <input type="submit" name="studentsearchbutton">

</tr>
  //<?php

//if(isset($_POST['studentsearchbutton'])){
  //  $nameorid=($_POST['searchstudent']);

//include '../db.php';
//$UserIDfordefault=$_SESSION['username'];
//$courseforAssignment=$_SESSION['Course_ID'];
//$batchNo=$_SESSION['batchNo'];

//$sqlsearch = "SELECT * FROM user WHERE name LIKE '%".$nameorid."%' OR user_Id LIKE '%".$nameorid."%'";
//$searchresult = $conn->query($sqlsearch);

//if ($searchresult->num_rows > 0) {

//?>

<?php
//while($searchrow1= $searchresult->fetch_assoc() ) {
  //  $StudentID=$searchrow1['user_Id'];
    //$sqlsearch2 = "SELECT * FROM course_follow WHERE course_Id='$courseforAssignment' AND batch_No='$batchNo' AND user_Id ='$StudentID' ";
    //$searchresult2 = $conn->query($sqlsearch2);

   // if ($searchresult2->num_rows > 0) {
?>
        
    <?php
    //while($searchrow2= $searchresult2->fetch_assoc() ) {

    ?>
    
     <li ><a href= "studentview.php?studentID=<?php echo $searchrow1['user_Id']; ?> " target="_parent" > ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $searchrow1['user_Id'] ;?><br>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $searchrow1['name'] ;?> </a></li>
    
   // <?php
      
    //}
    ?>  
    <?php
//}else{
//}
//}
//}
//}


?>














<!--




</table>
</form>







-->





