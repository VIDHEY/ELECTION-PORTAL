<?php
include("config.php");
session_start();

if($conn && isset($_POST['submit']))
{
$myusernum=$_POST['rollnm'];
$mypassword=$_POST['passwd'];
$enm=$_POST['elect'];

///ELECTION FOR WHICH USER REGISTERED
$sql=mysqli_query($conn,"SELECT election_id FROM elections WHERE election_name='$enm'");
$r1=mysqli_fetch_array($sql);
$eid=$r1['election_id'];

$_SESSION['elecid']=$eid;
$sql1=mysqli_query($conn,"SELECT roll_no,password,attempt FROM voter WHERE roll_no='$myusernum' AND (password='$mypassword' AND election_id='$eid')");
$r2=mysqli_fetch_array($sql1);
if($r2)
{
	if($r2['attempt']<1)
	{
	$_SESSION['loginuser']=$myusernum;
	$sql=mysqli_query($conn,"UPDATE voter SET attempt='1' WHERE roll_no='$myusernum'");
	header("location:givevote.php");
	}
	else
	{
		?>
		<script type="text/javascript">alert('YOU HAVE ALREADY VOTED!!!');</script>
<?php
}
}
else
{
	$error="You are not registered for voting!";
	echo $error;
}
}
?>