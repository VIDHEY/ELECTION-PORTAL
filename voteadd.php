<?php
include('config.php');
session_start();
if(isset($_POST['votesub']))
{
$count=$_SESSION['totalpost'];
for($i=1;$i<=$count;$i++)
{
	$val=$_POST['p'.$i];
	if($val!='NOTA')
	{
	$v1=mysqli_fetch_array(mysqli_query($conn,"SELECT votes FROM candidates WHERE cand_id='$val'"));
	$pastvotes=$v1['votes'];
	$currentvotes=$pastvotes+1;
	$q1=mysqli_query($conn,"UPDATE candidates SET votes='$currentvotes' WHERE cand_id='$val'");
	}
}
session_destroy();
header("location:voterlogin.php");
}
else
{
	echo "Error!!";
}

?>