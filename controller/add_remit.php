<?php
    include 'connection.php';
    

    $errors=array();

    
   
	if($_POST){

        // Fetching Username from session.
	
        
        $sender_name=$_POST['sender_name'];
        $receiver_name=$_POST['receiver_name'];
        $sender_address=$_POST['sender_address'];
        $receiver_address=$_POST['receiver_address'];
        $amount=$_POST['transaction_amount'];
        $currency=$_POST['currency'];
              
        $sql="INSERT INTO remit(sender_name, sender_address, receiver_name, receiver_address, transaction_amount, currency) VALUES('$sender_name', '$receiver_name', '$sender_address' ,'$receiver_address', '$amount','$currency')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "Added card item successfully.";
            header("location: https://www.westernunion.com/");
        }
        else
            echo "Some error";

        
		
    }
    
    if(!$_POST)
        echo "Error";
	

?>