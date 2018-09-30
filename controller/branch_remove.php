<?php 

include 'connection.php';


	if ($_POST)
{
	$branchID=$_POST["branchID"];
	
	$sql="DELETE FROM `branch` WHERE id=$branchID";
	$result=mysqli_query($conn,$sql);
	if($result)
		echo "Removed successfully";
}
else
echo "Error! Couldn't get post data."

	



?>