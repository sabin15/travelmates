<?php
session_start();
    include 'connection.php';

    
        $currency=$_COOKIE['currency_name'];
        $branch=$_SESSION['staff_branch'];
        
       
        $sql="SELECT currency,selling_rate,purchase_rate,total,commission,image FROM `exchange_rates` as R INNER JOIN inventory as I on R.currency = I.name AND R.branch = I.branch WHERE currency='$currency' AND R.branch=$branch";
        $result=mysqli_query($conn,$sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
            //echo $currency." ".$branch;
            //echo $row['total'];

        }
        else{
            echo "Problem on database: ". mysqli_error($conn);
        }

    
        
   
?>