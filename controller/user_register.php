<?php
    include 'connection.php';
    

    $errors=array();

	if($_POST){
		
        $f_name=mysqli_escape_string($conn, $_POST['f_name']);
        $l_name=mysqli_escape_string($conn,$_POST['l_name']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        $username=mysqli_escape_string($conn,$_POST['username']);
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
		$address=mysqli_escape_string($conn,$_POST['address']);
        $contact=mysqli_escape_string($conn,$_POST['contact']);
        
        echo $f_name;
        echo $l_name;
        echo $email;
        echo $username;
        echo $password;
        echo $address;
        echo $contact;

        $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
                array_push($errors, "Username already exists");
        }

        $email_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if email exists
                array_push($errors, "Email already exists");
        }
	

            if (count($errors) == 0) {
   
                $sql="INSERT INTO user(fname, lname, address, contactNo, email, username, password) VALUES('$f_name', '$l_name', '$address' ,'$contact', '$email', '$username','$password')";
                $result=mysqli_query($conn,$sql);
                if($result){
                    echo "Added new user successfully";
                    // $to=$email;
                    // $subject='Signup | Verification';
                    // $message= '
                    // Thanks for signing up!
                    // Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                    
                    // ------------------------
                    // Username: '.$name.'
                    // Password: '.$password.'
                    // ------------------------
                    
                    // Please click this link to activate your account:
                    // http://localhost/travelmate/verify.php?user='.$username.'&h='.$password.'
                    
                    // '; // Our message above including the link
                                        
                    // $headers = 'From:noreply@travelmate.com' . "\r\n"; // Set from headers
                    // mail($to, $subject, $message, $headers); // Send our email

                    
                    header('location: /travelmate/login.php');
                }
                else
                array_push($errors, "Server Error.");
            }

            
		
	}
	

?>