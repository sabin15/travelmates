<?php
	include 'connection.php';
	if($_POST){		
		$username=$_POST['admin_username_in'];
		$password=$_POST['admin_password_in'];
        
        $sql="SELECT O.name,O.username,C.name FROM owner_details AS O JOIN owner_branch as B JOIN branch as C ON  B.branch = C.id WHERE username = '$username' AND password='$password';";
		$result=mysqli_query($conn,$sql);
		if($result)
			if (mysqli_num_rows($result) >= 1) {
				$branch=array();
				while($row = mysqli_fetch_assoc($result)) {
					if(count($branch)== 0){
						array_push($branch,$row['username']);

					}
					
					array_push($branch,$row['name']);
					
					


					
					
				}
				session_start();
				$_SESSION["username"] = $username;
				echo json_encode($branch);
			}
				
			else{
				echo false;
			}
		else
			echo $conn->connect_error;
	}
?>