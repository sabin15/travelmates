<?php
        include 'connection.php';
        $sql="SELECT SUM(total*selling_rate)as worth,b.name FROM inventory as i JOIN exchange_rates  as r join branch as b on i.branch = r.branch AND r.branch = b.id AND i.name = r.currency group by i.branch;";
        $result=mysqli_query($conn,$sql);
        $dbdata = array();
        if($result){
            while ( $row = $result->fetch_assoc())  {
                $dbdata[]=$row;
              }
              echo json_encode($dbdata);
        }
    ?>