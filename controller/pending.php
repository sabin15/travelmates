<?php include 'header.php'?>    
<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Selling Rate</th>
                                        
                                        <th>Total</th>
                                        <th>Received</th>
                                       
                                        <th>Customer</th>
                                        <th>Phone</th>
                                        <th>Timestamp</th>
                                        
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './controller/connection.php';
                                        $branch=$_SESSION['staff_branch'];

                                        sql1="SELECT DISTINCT transaction_id FROM b2c_transaction WHERE status=0;";
                                        $result1=mysqli_query($conn,$sql1);
                                        if($result1)
                                        if (mysqli_num_rows($result1) >= 1) {
                                            $transaction=array();
                                            while($row = mysqli_fetch_assoc($result1)) {
                                                
                                                    array_push($transaction,$row['transaction_id']);
                                            }
                                            
                                            echo json_encode($transaction_id);
                                        }
                                    
                                    $sql="SELECT * FROM b2c_transaction AS A JOIN transaction as B on A.transaction_id=B.id WHERE branch=16 AND status=0 ORDER BY timestamp,transaction_id;";
                                    $result=mysqli_query($conn,$sql);
                                    $count = 1;
                                    while($row = mysqli_fetch_assoc($result)) {

                                        ?>

                                       


                                        <tr class="<?php if($row['selling_rate']==NULL) echo 'success'; else echo 'info';?>">
                                            <td><?php echo  $count ?></td>        
                                            <td><?php echo  $row["currency"]?></td>
                                            <td><?php echo  $row["forex_amount"]?></td>
                                            <td><?php echo  $row["selling_rate"]?></td>
                                            
                                            <td><?php echo  $row["total"]?></td>
                                            <td><?php echo  $row["received"]?></td>
                                            
                                            <td><?php echo  $row["customer_name"]?></td>
                                            <td><?php echo  $row["phone"]?></td>
                                            <td><?php echo  $row["timestamp"]?></td>
                                            <td><a><i class="fa fa-check fa-fw"></i>Approve</a></td>
                                            

                                        </tr>


                                        <?php 
                                        $count=$count+1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>

            </div>