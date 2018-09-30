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
        $email=$_POST['email'];
        

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
        if($result){

            $last_id = mysqli_insert_id($conn);
            $_SESSION['last_selling_id']=$last_id;
            
        }      

        if(!$result){
            $flag=false;
            echo "Error Details: ".mysqli_error($conn) ;
        }
        if ($flag){
            mysqli_commit($conn);
            
            echo "<script>alert('Transaction Complete !!!');</script>";

            $msg='<html>
                    <head><title></title></head><body>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Currency</th>
                                        <th>Commission %</th>
                                        <th>selling_rate</th>
                                        <th>Forex_Amount</th>
                                        <th>Total</th>
                                        <th>Received</th>
                                        <th>Customer_Name</th>
                                        <th>phone</th>
                                        <th>branch</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    

                                        <tr>
                                        <td>'.$currency.'</td>
                                            <td>'. $commission.'</td>
                                            <td>'. $selling_rate.'</td>
                                            <td>'. $forex_amount.'</td>
                                            <td>'. $total_amount.'</td>
                                            <td>'. $total_received.'</td>
                                            <td>'. $customer_name.'</td>
                                            <td>'.$phone.'</td>
                                            <td>'. $_COOKIE['branch_selected'].'</td>             
                                            

                                        </tr>


                                </tbody>
                            </table></body></html>';

            include 'send_mail.php';
            $mail->Body = $msg;

            if ($mail->send()){
                //$msg = "You have been registered! Please verify your email!";
  
                header('Location: ../sell_forex.php');
  
            }else{
                //$msg = "Something wrong happened! Please try again!";
                echo "Mail can't be sent";
                header('Location: ../receipt.php');
            }

            
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