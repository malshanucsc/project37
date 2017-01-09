<?Php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
include "../../db.php";  // database connection
//////////
//////////////////////////////// Main Code sarts /////////////////////////////////////////////


$in=$_GET['txt'];
if(!ctype_alnum($in)){
echo "No Matches";
//exit;
}

$msg="";
$msg="<div>";
if(strlen($in)>0 and strlen($in) <20 ){
$sql="select name, user_Id,NIC from user where name like '%$in%' or user_Id like '%$in%' or NIC like '%$in%'";
$results=$conn->query($sql);

if (is_array($results) || is_object($results))
{
    foreach ($results as $nt) {
//$msg.=$nt[name]."->$nt[id]<br>";
$msg .="<input type='checkbox' name='color' id='users_message' value='$nt[user_Id]'> Name : $nt[name] | ID : $nt[user_Id] | NIC : $nt[NIC]&nbsp&nbsp<br>";
//$msg .="<option value='$nt[name]'>";

}
}



}
$msg .='<button type="button" onClick="select_recep()"">Select</button></div>';
echo $msg;
?>
