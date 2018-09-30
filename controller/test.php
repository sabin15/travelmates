<?php
    include 'connection.php';
    echo "aa";
	
		$fname='test';
		$lname='test';
        $branch=7;
        $username='test';
        $password='test';
        $role='test';
        		
		$sql="INSERT INTO staff_details (fname, lname, branch, username, password, role) VALUES ('$fname', '$lname', '$branch', '$username', '$password', '$role');";
		$result=mysqli_query($conn,$sql);
		if($result){
            $last_id = mysqli_insert_id($conn);
            echo "Success: ".$last_id;
        }		
        else
        {
            echo mysqli_error($conn);
            echo "no exec";

        }
			
	
?>