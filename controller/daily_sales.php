<?php
        include 'connection.php';
        $sql="SELECT SUM(CASE WHEN selling_rate IS NOT NULL then forex_amount ELSE 0 END) AS total_sold,currency,COUNT(CASE WHEN selling_rate IS NOT NULL THEN 1 ELSE NULL END) AS transaction_frequency FROM b2c_transaction WHERE branch=7 AND DATE(timestamp) = CURRENT_DATE GROUP BY currency ORDER BY currency;";
        $result=mysqli_query($conn,$sql);
        $dbdata = array();
        if($result){
            while ( $row = $result->fetch_assoc())  {
                $dbdata[]=$row;
              }
              echo json_encode($dbdata);
        }
    ?>