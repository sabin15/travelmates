<?php
    include 'connection.php';
    session_start();

	if($_POST){
		$from=$_SESSION['staff_branch'];
		$to=$_POST['to'];
		$amount=$_POST['transfer_amount'];
        $currency=$_COOKIE['currency_name'];
        //echo $from.$to.$amount.$currency;
        mysqli_autocommit($conn,false);
        /* By default mysql innoDB has autocommit mode enabled in which every single transactions are immediately committed after execution.
        So we need to disable that mode in order to save the results till commit. */
        $flag=true;
        $staff=$_SESSION['staff_username'];

        $sql1="UPDATE inventory SET total = IF(branch=$from,total-$amount,total+$amount) WHERE branch IN ($from,$to) AND name IN ('$currency')";
        $sql2="INSERT INTO b2b_transaction(sender,receiver,currency,amount,timestamp,staff) VALUES($from,$to,'$currency',$amount,now(),'$staff');";

        $result1=mysqli_query($conn,$sql1);
        
        if(!$result1){
            $flag=false;
            echo "Error Details: ". mysqli_error($conn);
        }
        $result2=mysqli_query($conn,$sql2);
        if(!$result2){
            $flag=false;
            echo "Error Details: ".mysqli_error($conn) ;
        }
        
        if ($flag){ 
            
            mysqli_commit($conn);
            //echo "<script>alert('Transaction Complete');</script>";
            header('Location: ../B2B_transfer.php');
        }
        else{
            mysqli_rollback($conn);
            echo "Transaction failed. Rolling back transactions...";
        }
        mysqli_close($conn);      
		
    }
    else{
        echo "no post found";
    }
	

?>