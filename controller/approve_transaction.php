<?php
    include 'connection.php';
    session_start();

	if($_POST){
        $tid=$_POST['tid'];

        $sql3="SELECT A.id,currency,commission,selling_rate,forex_amount,total,received,A.customer_name,phone,timestamp,status,branch,transaction_id,email,bank_name,voucher_image FROM b2c_transaction AS A JOIN transaction as B on A.transaction_id=B.id WHERE transaction_id=$tid;";
        $result3=mysqli_query($conn,$sql3);
        $flag=false;
        $email="";
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
                                        


                                    </tr>
                                </thead>
                                <tbody>';

                                        
     
        if ($result3){
            while($row = mysqli_fetch_assoc($result3)) {
                $total=$row['total'];
                $currency=$row['currency'];
                $email=$row['email'];
                $branch=$_SESSION['staff_branch'];
                
                $sql_update1="UPDATE inventory SET total=total-$total WHERE name='$currency' AND branch=$branch";
                $result_update1=mysqli_query($conn,$sql_update1);
                if($result_update1){
    
                    $sql_update2="UPDATE b2c_transaction SET status=1 WHERE currency='$currency' AND transaction_id=$tid";
                    $result_update2=mysqli_query($conn,$sql_update2);
                    if($result_update2){
                        $flag=true;
                    }
                    else{
                        $flag=false;
                        echo "trans not updated: ".mysqli_error($conn);
                    }
                        

    
    
                }
                else
                    echo "inventory not updated: ".mysqli_error($conn);
    
                    $msg.='<tr>
                    <td>'.$row['currency'].'</td>
                        <td>'. $row['commission'].'</td>
                        <td>'. $row['selling_rate'].'</td>
                        <td>'. $row['forex_amount'].'</td>
                        <td>'. $row['total'].'</td>
                        <td>'. $row['received'].'</td>
                        <td>'. $row['customer_name'].'</td>
                        <td>'.$row['phone'].'</td>
                        
                        

                    </tr>';

    
    
            }

        }
        else
            echo "no transaction selected".mysqli_error($conn);

        if ($flag)
        echo "Success";
            
            include 'send_mail.php';
            //$msg="Transaction verified ";
            $mail->Body = $msg;

            if ($mail->send()){
                //$msg = "You have been registered! Please verify your email!";
  
            }else{
                //$msg = "Something wrong happened! Please try again!";
                echo "Mail can't be sent";
                header('Location: ../receipt.php');
            }
            

        
    }
    else{
        echo "no post found";
    }
	

?>