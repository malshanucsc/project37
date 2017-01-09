<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equi="Content-Type" content="text/html; charset=utf-8"/>
<title>R I T T I</title>
<link rel="stylesheet" type="text/css" href="css/msgnotificationstyles.css">
<style type="text/css">
</style>


</head>
<body style="background-color:#8DA7B0;">

<h3>New messages</h3>
<hr>
<?php $msgcount=0; 


include '../db.php';

$User_IDforInbox=$_SESSION['username'];

$sql = "SELECT * FROM message WHERE user_Id='$User_IDforInbox' AND new=1";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

?>
	<ul>
	<?php
    while($row= $result->fetch_assoc() ) {

		?>

<li>
    <a href="inbox.php?title=<?php echo $row['msg_Title'];?>&msg=<?php echo $row['message']; ?>&date=<?php echo $row['date_Received'];?>" target="_parent" >
            <?php echo $row['msg_Title'];
            $msgcount=$msgcount+1; 
            ?>
          
    </a>
    </li>

	<?php
    }

	?>
	<hr>
	<h5>   You have <?php echo $msgcount ?> messages</h5>
		</ul>
	<?php
}else{
    echo "no messages";
}
?>

</body>
</html>
