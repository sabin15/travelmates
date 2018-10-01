<?php
        include 'connection.php';
        $sql="SELECT SUM(CASE WHEN selling_rate IS NOT NULL then forex_amount ELSE 0 END) AS total_sold,currency,WEEK(timestamp,7) as week,COUNT(CASE WHEN selling_rate IS NOT NULL THEN 1 ELSE NULL END) AS transaction_frequency FROM b2c_transaction WHERE branch=16 AND week(timestamp,7) = week(now(),7) GROUP BY currency,WEEK(timestamp,7) ORDER BY week DESC;";
        $result=mysqli_query($conn,$sql);
        $dbdata = array();
        if($result){
            while ( $row = $result->fetch_assoc())  {
                $dbdata[]=$row;
              }
              echo json_encode($dbdata);
        }
    ?>