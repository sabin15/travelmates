<?php
	include 'connection.php';

	if($_POST){
		$id=$_POST['branchID'];
		$name=$_POST['name'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];


		$sql="UPDATE branch SET name='$name',address='$address', contact='$contact' WHERE id=$id";
		$result=mysqli_query($conn,$sql);
		if($result)
			echo "Updated successfully";
		
	}
	

?>