<?php
include('config.php');
session_start();

if($conn && isset($_POST['submit']))
{
$count=$_POST['numberusr'];

$selectid=$_POST['selectnm'];

$eleid=mysqli_fetch_array(mysqli_query($conn,"SELECT election_id FROM elections WHERE election_name='$selectid'"));
$election=$eleid['election_id'];
for($i=0;$i<$count;$i++)
{
$cource=$_POST['cource'.$i];
$year=$_POST['year'.$i];
$branch=$_POST['branch'.$i];
$rnm=$_POST['rnum'.$i];

///roll number 
$rollnumber=$cource.$year.$branch.$rnm;

///generate email
switch ($branch) {
	case 'EE':
	$brnm='eed';
		break;
	case 'EC':
	$brnm='eced';
		break;
	case 'CO':
	$brnm='coed';
		break;
	case 'CE':
	$brnm='ced';
		break;
	case 'ME':
	$brnm='med';
		break;
	case 'CH':
	$brnm='ched';
		break;
	default:
		break;
}

$mail=$rollnumber.'@'.$brnm.'.svnit.ac.in';
////password
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
$password = substr( str_shuffle( $chars ), 0, 8 );

//insert voter
$query=mysqli_query($conn,"INSERT INTO voter(election_id,roll_no,email,password,attempt) VALUES('$election','$rollnumber','$mail','$password','0')");
if($query)
{
	echo "insertion successfull!!";
}
else
echo "insertion unsuccessful!";

}

}

?>