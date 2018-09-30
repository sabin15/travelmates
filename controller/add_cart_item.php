<?php
    include 'connection.php';
    

    $errors=array();

    
   
	if($_POST){

        // Fetching Username from session.
        session_start();
		
        $username=mysqli_escape_string($conn, $_SESSION['id']);
        $currency=$_POST['currency'];
        $quantity=$_POST['quantity'];
        $exchange_rate=$_POST['exchange_rate'];
        $branch=$_POST['branch'];
        $commission=$_POST['commission'];
        
       

        $user_check_query = "SELECT * FROM cart WHERE username='$username' AND branch='$branch' AND currency='$currency' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $res = mysqli_fetch_assoc($result);

        if ($res) { // if user exists
            echo "Money Exists";
            $new_currency=$quantity+$res['quantity'];
            $id=$res['id'];
            $sql="UPDATE cart set  quantity='$new_currency' where id='$id'";
            $result=mysqli_query($conn,$sql);

            if($result){
                echo "Added card item successfully.";
                return;
            }

    }
        
        
        $sql="INSERT INTO cart(username, currency, quantity, exchange_rate, branch, commission) VALUES('$username', '$currency', '$quantity' ,'$exchange_rate', '$branch','$commission')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "Added card item successfully.";
        }
        else
            echo "Some error";

        
		
    }
    
    if(!$_POST)
        echo "Error";
	

?>