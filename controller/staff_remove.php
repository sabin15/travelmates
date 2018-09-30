<?php 

include 'connection.php';


	if ($_POST)
{
	$staffID=$_POST["staffID"];
	
	$sql="DELETE FROM `staff_details` WHERE id=$staffID";
	$result=mysqli_query($conn,$sql);
	if($result)
		echo "Removed successfully";
}
else
echo "Error! Couldn't get post data."

	



?>