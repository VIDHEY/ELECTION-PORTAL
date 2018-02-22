<?php
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header("location:adminlogin.php");
}
?>
<!DOCTYPE html>
<head>
	<title>CREATE ELECTION</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script type="text/javascript" src="admin.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/createelection.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
	<style type="text/css">
		
		.f1
		{
			display: none;
			visibility: hidden;
		}
		.sidecontent
		{
			height:60vh;
			overflow-y: scroll;
		}

	</style>
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
			<li><button type="button">CREATE ELECTION</button></li>
			<li><button type="button" onclick="location.href='advoter.php'">ADD VOTER</button></li>
			<li><button type="button" onclick="location.href='startelection.php'">START ELECTIONS</button></li>
			<li><button type="button" onclick="location.href='logout.php'">LOGOUT</button></li>
		</ul>
		
	</div>
	    <!--*********************************************************************************************************************-->
	
		<div class="postinfo1 f1">
				<label>NAME OF THE POST: </label><input type="text" class="postnm" required /><br>
				<label>NUMBER OF CANDIDATES: </label><input type="text" class="numcand" value="1" readonly="" /><i class="fa fa-plus-circle" aria-hidden="true" onclick="addcand(this);"></i><i class="fa fa-minus-circle" aria-hidden="true" onclick="subcand(this);"></i><br>

				<div class="candidate">
					<p>CANDIDATE1 NAME:</p><input type="text" required>
				</div>
		</div>
	

		<!-- ********************************************************************************************************************-->

		<!--******************************************************************************-->
				<div class="candidate1 f1">
					<p>CANDIDATE1 NAME:</p><input type="text">
				</div>
		<!--*****************************************************************************-->
	<div class="sidecontent">
		<form name="celect" action="create.php" method="post">
			<div id="ename">
				<label>ELECTION-NAME: </label><input type="text" name="electnm" id="electnm" required /><br>
				<label>NUMBER OF POST: </label><input type="number" name="numpost" id="numpost" value="1" readonly="" /><i class="fa fa-plus-circle" aria-hidden="true" onclick="plus();"></i><i class="fa fa-minus-circle" aria-hidden="true" onclick="minus();"></i><br><br>
			</div>
		
		<div id="posts">
			<div class="postinfo">
				<label>NAME OF THE POST: </label><br><input type="text" name="p0" class="postnm" required /><br>
				<label>NUMBER OF CANDIDATES: </label><br><input type="text" name="c0" class="numcand" value="1" readonly="" /><i class="fa fa-plus-circle" aria-hidden="true" onclick="addcand(this);"></i><i class="fa fa-minus-circle" aria-hidden="true" onclick="subcand(this);"></i><br>

				<div class="candidate">
					<p id="candnm">CANDIDATE1 NAME:</p><input type="text" name="p0c0" required>
				</div>
			</div>
		</div>
		<input type="submit" value="submit" name="submit" id="submit">
		</form>
	</div>
</div>

</div>
<script type="text/javascript">
	function plus() {
		// body...
		var c=document.getElementById('numpost').value;
		c++;
		document.getElementById('numpost').value=c;
		//console.log(c);
		var cpy=document.getElementsByClassName('postinfo1');
		var dup=cpy[0].cloneNode(true);
	//console.log(dup);	
		dup.classList.remove("f1","postinfo1");
		dup.classList.add("postinfo");
		var parnt=document.getElementById('posts');
		var count=parnt.childElementCount;
		console.log(count);
		var dupelements=dup.getElementsByTagName('input');
		dupelements[0].setAttribute('name','p'+count);
        dupelements[1].setAttribute('name','c'+count);			
        dupelements[2].setAttribute('name','p'+count+'c0');
		parnt.appendChild(dup);
	}
	function minus()
	{
		var c=document.getElementById('numpost').value;
		if(c!=1)
		{
		c--;
		document.getElementById('numpost').value=c;
			var del=document.getElementById('posts');
			//console.log(del);
		del.removeChild(del.lastChild);
	}
	}

	function addcand(e)
	{
		var p=e.parentNode;
		// console.log(p);
		var c=p.getElementsByClassName("numcand")[0].value;
		c++;
		p.getElementsByClassName("numcand")[0].value=c;
		var ele=document.getElementsByClassName('candidate1');
		var dup=ele[0].cloneNode(true);
		dup.classList.remove("f1","candidate1");
		dup.classList.add("candidate");
		dup.getElementsByTagName('p')[0].innerHTML="CANDIDATE"+c+" NAME";
		var count=p.getElementsByClassName('postnm')[0].name;
		dup.getElementsByTagName('input')[0].setAttribute('name',count+'c'+(c-1))
		// var parnt=p.getElementsByClassName('postinfo');
		// console.log(parnt[0]);
		p.appendChild(dup);
	}
	function subcand(e)
	{
		var p=e.parentNode;
		var c=p.getElementsByClassName("numcand")[0].value;
		console.log(p);
		if(c!=1)
		{
			c--;
		p.getElementsByClassName("numcand")[0].value=c;
		// var parnt=p.getElementsByClassName('postinfo');	
		p.removeChild(p.lastChild);	
		}
	}
</script>
</body>
</html>