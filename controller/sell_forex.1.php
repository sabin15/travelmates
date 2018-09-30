<?php
    include 'connection.php';
    session_start();

	if($_POST){
        $currency=$_COOKIE['currency_name'];
        $commission=$_POST['commission'];
        $selling_rate=$_POST['selling_rate'];
        $forex_amount=$_POST['forex_amount'];
        $total_amount=$_POST['total_amount'];
		$total_received=$_POST['total_received'];
        $customer_name=$_POST['customer_name'];
        $status=1;
        $branch=$_SESSION['staff_branch'];
        $phone=$_POST['phone'];
        echo $currency;
        

       //echo $from.$to.$amount.$currency;
        mysqli_autocommit($conn,false);
        // By default mysql innoDB has autocommit mode enabled in which every single transactions are immediately committed after execution.
        //So we need to disable that mode in order to save the results till commit. //
        $flag=true;
        $staff=$_SESSION['staff_username'];

        $sql1="UPDATE inventory SET total=total-$forex_amount WHERE name='$currency' AND branch=$branch";
        $sql2="INSERT INTO `b2c_transaction`(`currency`, `commission`, `selling_rate`, `forex_amount`, `total`, `received`, `customer_name`, `phone`, `status`, `branch`) VALUES ('$currency','$commission','$selling_rate','$forex_amount','$total_amount','$total_received','$customer_name','$phone','$status','$branch');";

        $result=mysqli_query($conn,$sql1);
        if(!$result){
            $flag=false;
            echo "Error Details: ". mysqli_error($conn);
        }

        $result=mysqli_query($conn,$sql2);
        if(!$result){
            $flag=false;
            echo "Error Details: ".mysqli_error($conn) ;
        }
        if ($flag){
            mysqli_commit($conn);
            $last_id = mysqli_insert_id($conn);
            echo "<script>alert('Transaction Complete '+$last_id);</script>";
            //header('Location: ../sell_forex.php');
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