<?php
    include 'connection.php';
    include 'errors.php';

	if($_POST){
		
        $username=mysqli_escape_string($conn,$_POST['username']);
        $password=$_POST['password'];
		

        $user_check_query = "SELECT * FROM user WHERE username='$username'  LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
                $auth=password_verify($password, $user['password']);
                if ($auth) {
                    session_start();
                    $_SESSION['id'] = $username;
                    $_SESSION['success'] = "You are now logged in";
                    if($_POST['redirect_url']!='')
                        header('location: test.php');
                    header('location: /travelmate/home.php');
                } else {
                    echo 'Wrong_password';
                }
            }
        }
        else
            echo 'Incorrect Details';
		
	}
	

?>