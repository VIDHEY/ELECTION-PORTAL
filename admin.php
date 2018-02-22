<?php
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header('location:adminlogin.php');
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
			<li><button type="button" onclick=" location.href='startelection.php'">START ELECTION</button></li>
			<li><button type="button" onclick="location.href='logout.php'">LOGOUT</button></li>
		</ul>
	</div>
	<div class="sidecontent">
		
	</div>
</div>

</div>

</body>
</html>