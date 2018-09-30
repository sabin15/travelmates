<?php
    include 'connection.php';
    session_start();

	if($_POST){
        $currency=$_COOKIE['currency_name'];
        $commission=$_POST['commission'];
        $purchasing_rate=$_POST['purchasing_rate'];
        $forex_amount=$_POST['forex_amount'];
        $total_amount=$_POST['total_amount'];
		$pay_to_customer=$_POST['pay_to_customer'];
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

        $sql1="UPDATE inventory SET total=total+$forex_amount WHERE name='$currency' AND branch=$branch";
        $sql2="INSERT INTO `b2c_transaction`(`currency`, `commission`, `purchasing_rate`, `forex_amount`, `total`, `pay_to_customer`, `customer_name`, `phone`, `status`, `branch`) VALUES ('$currency','$commission','$purchasing_rate','$forex_amount','$total_amount','$pay_to_customer','$customer_name','$phone','$status','$branch');";

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
            $msg='<html>
                    <head><title></title></head><body>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Currency</th>
                                        <th>Commission %</th>
                                        <th>purchase_rate</th>
                                        <th>Forex_Amount</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Customer_Name</th>
                                        <th>phone</th>
                                        <th>branch</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    

                                        <tr>
                                        <td>'.$currency.'</td>
                                            <td>'. $commission.'</td>
                                            <td>'. $purchasing_rate.'</td>
                                            <td>'. $forex_amount.'</td>
                                            <td>'. $total_amount.'</td>
                                            <td>'. $pay_to_customer.'</td>
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
                header('Location: ../sell_cash.php');
            }
            echo "<script>alert('Transaction Complete');</script>";
            header('Location: ../sell_cash.php');
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