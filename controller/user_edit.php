<?php
	include 'connection.php';

	if($_POST){
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];

        session_start();
        $username=$_SESSION['id'];
		$sql="UPDATE user SET fname='$f_name', lname='$l_name',address='$address', contactNo='$contact' WHERE username='$username'";
		$result=mysqli_query($conn,$sql);
		if($result)
            echo 1;
        else
            echo 0;
		
	}
	

?>