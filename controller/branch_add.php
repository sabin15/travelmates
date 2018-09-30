<?php
	include 'connection.php';
	if($_POST){		
		$name=$_POST['name'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];		
		$sql="INSERT INTO branch (name, address, contact) VALUES ('$name', '$address', '$contact');";
		$result=mysqli_query($conn,$sql);
		if($result)
			echo "Success";
		else
			echo $conn->connect_error;
	}
?>