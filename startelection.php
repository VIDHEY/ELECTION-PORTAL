<?php
include('config.php');
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header('location:adminlogin.php');
}

if(isset($_POST['submit']))
{
	$enm=$_POST['availelect'];
	$sql=mysqli_query($conn,"UPDATE elections SET estatus='1' WHERE election_name='$enm'");
	$_SESSION[$enm.'time']=time();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN|ELECTION</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script type="text/javascript" src="admin.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
<div class="container">
	<div class="header">
		<div class="headtitle">
			<h1>SVNIT ELECTION PORTAL</h1>
		</div>
	</div>
<div class="maincontent">
	<div class="sidemenu">
		<ul class="menu">
			<li><button type="button" onclick=" location.href='createelection.php'">CREATE ELECTION</button></li>
			<li><button type="button" onclick=" location.href='voter.php'" >ADD VOTER</button></li>
			<li><button type="button">START ELECTION</button></li>
			<li><button type="button" onclick="location.href='logout.php'">LOGOUT</button></li>
		</ul>
	</div>
	<div class="sidecontent">
		<?php
		
			if($conn)
			{
				$sql=mysqli_query($conn,"SELECT election_name FROM elections WHERE estatus='0'");
				$count=mysqli_num_rows($sql);
				if($count>0)
				{
				
				?><form name="startele" method="post" action="startelection.php">
					<select name="availelect">
				<?php
					while($row=mysqli_fetch_array($sql))
					{
						?>

					<option><?php echo $row['election_name']; ?></option>
					<?php
					}
					?>
					</select>
					<input type="submit" name="submit" value="START">
				   </form>
					
					<?php }
					else
					{
					?>
					<div>NO ELECTIONS AVAILABLE FOR START</div>
					<?php
						}}
					?>
		
	</div>
</div>

</div>

</body>
</html>