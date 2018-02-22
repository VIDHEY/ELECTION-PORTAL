<html>
<head>
	<title>ADD VOTER| ADMIN</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/addvoter.css">
	<script type="text/javascript" src="admin.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
		<style type="text/css">
			#copy{
				display: none;
				visibility: hidden;
			}
		</style>
</head>
<body>

<!--**************************************************************************************************************-->
<div class="user" id="copy">
			<label>ROLL NO.</label>
				<select name="cource">
					<option value="U">U</option>
					<option value="I">I</option>
				</select>
				<select name="year">
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
				</select>
				<select name="branch">
					<option value="EE">EE</option>
					<option value="EC">EC</option>
					<option value="CE">CE</option>
					<option value="CH">CH</option>
					<option value="ME">ME</option>
					<option value="CO">CO</option>
				</select>
				<input type="number" name="rnum" min="1" max="220" required/> 
				<br>
				
</div>
<!--**************************************************************************************************************-->


<div class="container">
	<div class="header">
		<div class="headtitle">
			<h1>SVNIT ELECTION PORTAL</h1>
		</div>
	</div>
<div class="maincontent">
	<div class="sidemenu">
		<ul class="menu">
			<li><button type="button">CREATE ELECTION</button></li>
			<li><button type="button" onclick="location.href='addvoter.html'">ADD VOTER</button></li>
			<li><button type="button">VIEW ELECTIONS</button></li>
			<li><button type="button">LOGOUT</button></li>
		</ul>
		<button type="button" style="margin:15px auto;">START</button>
	</div>

	<div class="sidecontent">
		<form name="form2" method="post" action="addvoter.php">

	<?php
		include('config.php');
		if($conn)
		{
			$query=mysqli_query($conn,"SELECT election_name FROM elections WHERE estatus='0'");
			$result=mysqli_num_rows($query);
		
		if($result>0)
		{
			?>

			SELECT ELECTION : <select name="selectnm">
		<?php
			while($row=mysqli_fetch_array($query))
			{
				$ename=$row['election_name'];
				?>
			<option><?php echo $ename;?></option>

			<?php
				}
			?>
			</select>

					<div id="nuser" style="margin:20px; ">
				<label>ENTER NUMBER OF VOTER: </label><input type="text" name="numberusr" id="number" value="0" readonly="" /><i class="fa fa-plus-circle" aria-hidden="true" onclick="adduser();"></i><i class="fa fa-minus-circle" aria-hidden="true" onclick="removeuser();"></i>
			</div>
			
			<div id="userinfo">
			</div>

				<input type="submit" name="submit" value="ADD"/>  
		
	<?php
		}
		else{
	?>
	<div>NO ELECTIONS ARE PRESENT!!</div>
	<?php
		}
	}
	?>
	</form>
	</div>
</div>

</div>
<script type="text/javascript">
	
	function adduser(){
		var dup=document.getElementById('copy').cloneNode(true);
		dup.removeAttribute("id");
		// console.log(dup);
		var prnt=document.getElementById('userinfo');
		var count=prnt.childElementCount;
		//console.log(prnt);
		var chld=dup.getElementsByTagName('select');
		chld[0].setAttribute('name','cource'+count);
		chld[1].setAttribute('name','year'+count);
		chld[2].setAttribute('name','branch'+count);
		//console.log(count);
		var chld1=dup.getElementsByTagName('input');
		chld1[0].setAttribute('name','rnum'+count);
		prnt.appendChild(dup);
		var c=document.getElementById("number").value;
		c++;
		document.getElementById("number").value=c;

	}
	function removeuser(){
		var c=document.getElementById("number").value;
		if(c!=0)
		{
		c--;

		document.getElementById("number").value=c;
		var prnt=document.getElementById('userinfo');
		prnt.removeChild(prnt.lastChild);	
	}	
	}
	
</script>
</body>
</html>