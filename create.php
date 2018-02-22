<?php
include('config.php');
if($conn && isset($_POST['submit']))
{
	$ele=$_POST['electnm'];
	$sql="INSERT INTO elections(election_name,estatus) VALUES ('$ele','0')";
   	$result=mysqli_query($conn,$sql);
   	$numpost=$_POST['numpost'];
   
   	for($i=0;$i<$numpost;$i++)
   	{
   		$eid=mysqli_fetch_array(mysqli_query($conn,"SELECT election_id FROM elections WHERE election_name='$ele' "));
   		$electionid=$eid['election_id'];
   		
   		$pname=$_POST['p'.$i];
   		$sql1="INSERT INTO posts(post_name) VALUES ('$pname')";
   		$result2=mysqli_query($conn,$sql1);

   		$pid=mysqli_fetch_array(mysqli_query($conn,"SELECT post_id FROM posts WHERE post_name='$pname'"));
   		$postid=$pid['post_id'];

   		$sqlrel1=mysqli_query($conn,"INSERT INTO elec_post_rel(election_id,post_id) VALUES('$electionid','$postid')");

   		$numcand=$_POST['c'.$i];
   		

   		for($j=0;$j<$numcand;$j++)
   		{
   			$candnm=$_POST['p'.$i.'c'.$j];
   			$sql2="INSERT INTO candidates (cand_name,votes) VALUES ('$candnm','0')";
   			$result3=mysqli_query($conn,$sql2);
   			
   			$canid=mysqli_fetch_array(mysqli_query($conn,"SELECT cand_id FROM candidates WHERE cand_name='$candnm'"));
   			$candidateid=$canid['cand_id'];
   			$sqlrel2=mysqli_query($conn,"INSERT INTO post_cand_rel (post_id,cand_id) VALUES ('$postid','$candidateid')");
   		}
   	}

}
?>