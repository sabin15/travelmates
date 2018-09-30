<?php
	include 'connection.php';
	if($_POST){		
		$username=$_POST['username'];
		$password=hash('sha512',$_POST['password']);
		$branch=$_POST['branch'];

		
		
        
        $sql="SELECT * from staff_details WHERE username='$username' AND password='$password' AND branch=$branch AND role='staff';";
		$result=mysqli_query($conn,$sql);
		if($result){
			if (mysqli_num_rows($result) == 1) {
				
				session_start();
				$_SESSION["staff_username"] = $username;
				$_SESSION['staff_branch']=$branch;
				echo $_SESSION['staff_username'];
				
			}else{
				echo false;
			}
		}	
	}
?>