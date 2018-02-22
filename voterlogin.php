<!DOCTYPE html>
<html>
<head>
	<title>LOGIN|SVNIT ELECTION</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="header">
		<div class="hname">
			<h1>SVNIT ELECTION PORTAL</h1>
		</div>
	</div>
	
	<form name="signin" method="post" action="vlogin.php">
	<?php
	include('config.php');
	$sql=mysqli_query($conn,"SELECT election_name FROM elections WHERE estatus='1'");
	$count=mysqli_num_rows($sql);
	if($count>0)
	{
	
	?>
	<div id="slection">
		<span>SELECT ELECTION : </span>
		<select name="elect">
			<?php
			while($row=mysqli_fetch_array($sql))
			{
			 ?>
			 <option><?php echo $row['election_name'];?></option>
			 <?php
				}
			?>
		</select>
	</div>
	<div class="loginbox">
		<div class="lhead">
			<span>LOGIN</span>
		</div>
			<div id="usr">
				<i class="fa fa-user fa-2x" aria-hidden="true"></i><input type="text" name="rollnm" placeholder="Enter Your Rollnumber(capital)" required />
			</div>

			<div id="pwd">
				<i class="fa fa-lock fa-2x" aria-hidden="true"></i><input type="password" name="passwd" placeholder="Enter Your Password" required />
			</div>

			<input type="submit" value="submit" name="submit" id="sub">
	</div>
	<?php
		}
		else
		{
	?>
	<div>NO ELECTIONS AT PRESENT</div>
	<?php
	}
	?>
	</form>
</div>
</body>
</html>