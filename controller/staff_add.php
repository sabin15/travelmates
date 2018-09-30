<?php
	include 'connection.php';
	if($_POST){		
		$fname=$_POST['stf_fname_in'];
		$lname=$_POST['stf_lname_in'];
        $branch=$_POST['stf_branch_in'];
        $username=$_POST['stf_username_in'];
        $password=hash('sha512',$_POST['stf_password_in']);
        $role=$_POST['stf_role_in'];
        		
		$sql="INSERT INTO staff_details (fname, lname, branch, username, password, role) VALUES ('$fname', '$lname', '$branch', '$username', '$password', '$role');";
		$result=mysqli_query($conn,$sql);
		if($result)
			echo "Success";
		else
			echo $conn->connect_error;
	}
?>