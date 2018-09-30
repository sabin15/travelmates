<?php
	include 'connection.php';

	if($_POST){
        $old_password=$_POST['old_password'];
        $new_password=password_hash($_POST['new_password'], PASSWORD_BCRYPT);


        session_start();
        $username=$_SESSION['id'];


        $user_check_query = "SELECT * FROM user WHERE username='$username'  LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        $auth=password_verify($old_password, $user['password']);

        if($auth)
        {

           
            $sql="UPDATE user SET password='$new_password' WHERE username='$username'";
            $result=mysqli_query($conn,$sql);
            if($result)
                echo 1;
            else
                echo 0;
		

        }
        else
            echo 2;
		
	}
	

?>