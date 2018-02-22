<?php
session_start();
$_SESSION['admin']="vidhey";
$_SESSION['adminpwd']="1234";

if(isset($_SESSION['loggedinadmin']))
{
	unset($_SESSION['loggedinadmin']);
}
if(isset($_POST['submit']))
{
	if($_POST['usrnm']==$_SESSION['admin'] && $_POST['passwd']==$_SESSION['adminpwd'])
	{
		$_SESSION['loggedinadmin']=$_POST['usrnm'];
		header('location:admin.php');
	}
	else{
	?>
		<script type="text/javascript">alert('Enter correct AdminName/password!!');</script>
<?php
}
}
?>
<!DOCTYPE html>	
<html>
<head>
	<title>ADMIN-LOGIN|SVNIT ELECTION</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
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
	<div class="loginbox">
		<div class="lhead">
			<span>ADMIN LOGIN</span>
		</div>
		<form name="signin" method="post" action="adminlogin.php">
			<div id="usr">
				<i class="fa fa-user fa-2x" aria-hidden="true"></i><input type="text" name="usrnm" placeholder="Enter Admin Name" required />
			</div>

			<div id="pwd">
				<i class="fa fa-lock fa-2x" aria-hidden="true"></i><input type="password" name="passwd" placeholder="Enter Admin Password" required />
			</div>

			<input type="submit" name="submit" id="adsub" value="LOGIN">
					
		</form>
		
	</div>

</div>
</body>
</html>