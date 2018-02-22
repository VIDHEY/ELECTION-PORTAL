<?php
include('config.php');
session_start();

//if user logged in or not//
if(!isset($_SESSION['loginuser']))
{
header("location:voterlogin.php");
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>GIVE VOTE</title>
	<link rel="stylesheet" type="text/css" href="css/givevote.css">
</head>
<body>
<?php
$eid=$_SESSION['elecid'];
$sql=mysqli_query($conn,"SELECT post_id FROM elec_post_rel WHERE election_id='$eid'");
$count1=mysqli_num_rows($sql);
if($count1>0)
{
	$_SESSION['totalpost']=$count1;
	$i=0;
?>
<div class="container">
	<div id="headerpart">
		<h1><?php echo(mysqli_fetch_array(mysqli_query($conn,"SELECT election_name FROM elections WHERE election_id='$eid'"))['election_name']);?></h1>
	</div>
<div class="postcontainer">
	<form name="voteform" action="voteadd11.php" method="post">
	<?php
	while($row1=mysqli_fetch_array($sql))
	{
		$i=$i+1;
		?>
	<div class="postinfo">
		<?php
		$pid=$row1['post_id'];
		$row2=mysqli_fetch_array(mysqli_query($conn,"SELECT post_name FROM posts WHERE post_id='$pid'"));
		$pnm=$row2['post_name'];
		?>
		<p><?php echo $pnm; ?></p>
		<hr>

		<?php
		$sql2=mysqli_query($conn,"SELECT cand_id FROM post_cand_rel WHERE post_id='$pid'");
		while($row3=mysqli_fetch_array($sql2))
		{
			$cid=$row3['cand_id'];
			$row4=mysqli_fetch_array(mysqli_query($conn,"SELECT cand_name FROM candidates WHERE cand_id='$cid'"));
			?>
		<span><?php echo $row4['cand_name']?></span><input type="radio" name="<?php echo "p".$i; ?>" value="<?php echo $cid;?>"><br>
		<?php } ?>
		<span>NOTA</span><input type="radio" name="<?php echo "p".$i; ?>" value="NOTA" checked>	
	</div>
	<?php } ?>
	<input type="submit" name="votesub" value="VOTE" id="subvote">
	</form>
</div>
</div>
<?php
	}
?>

</body>
</html>
<?php
}
?>