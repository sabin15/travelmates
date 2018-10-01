<?php
	include 'connection.php';
	if($_POST){		
		$name=$_POST['name'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];		
		$sql="INSERT INTO branch (name, address, contact) VALUES ('$name', '$address', '$contact');";
		$result=mysqli_query($conn,$sql);
		if($result){
			//echo "Success";
			$last_id = mysqli_insert_id($conn);
			$username=$_COOKIE['username'];
			
			$sql_select="SELECT * FROM owner_details WHERE username='$username';";
			$result_select=mysqli_query($conn,$sql_select);
			if($result_select){
				$row = mysqli_fetch_assoc($result_select);
				$oid=$row['id'];
			}
			$sql1="INSERT INTO owner_branch (owner, branch) VALUES ($oid, $last_id);";
			$result1=mysqli_query($conn,$sql1);
			if($result1)
				echo "success";
			}
			
		else
			echo $conn->connect_error;
	}
?>