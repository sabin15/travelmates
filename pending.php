
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
                                        <th>Bank Name</th>
                                        <th>Voucher Image</th>
                                        
                                        
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './controller/connection.php';
                                        $branch=$_SESSION['staff_branch'];
                                        $transaction=array();
                                        $sql1="SELECT DISTINCT transaction_id FROM b2c_transaction WHERE status=0;";
                                        $result1=mysqli_query($conn,$sql1);
                                        if($result1)
                                        if (mysqli_num_rows($result1) >= 1) {
                                            
                                            while($row = mysqli_fetch_assoc($result1)) {
                                                
                                                    array_push($transaction,$row['transaction_id']);
                                            }
                                            
                                            //echo json_encode($transaction);
                                        }
                                   ?> 
                                    
                               
                            <?php
                            
                            $length=count($transaction);
                                for($i=0;$i<$length;$i++){
                                    $tid=$transaction[$i];
                                   // echo $tid;
                                    $sql="SELECT A.id,currency,commission,selling_rate,forex_amount,total,received,A.customer_name,phone,timestamp,status,branch,transaction_id,email,bank_name,voucher_image FROM b2c_transaction AS A JOIN transaction as B on A.transaction_id=B.id WHERE transaction_id=$tid ORDER BY timestamp,transaction_id;";
                                    $result=mysqli_query($conn,$sql);
                                    $lastline=null;
                                    $total=0;
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $lastline=$row;
                                        $total+=$row['total'];
                                        echo $row['id'];

                                    ?>
                                        <tr class="<?php if($row['selling_rate']==NULL) echo 'success'; else echo 'info';?>">
                                                <td><?php echo  $tid ?></td>        
                                                <td><?php echo  $row["currency"]?></td>
                                                <td><?php echo  $row["forex_amount"]?></td>
                                                <td><?php echo  $row["selling_rate"]?></td>
                                                
                                                <td><?php echo  $row["total"]?></td>
                                                <td><?php echo  $row["received"]?></td>
                                                
                                                <td><?php echo  $row["customer_name"]?></td>
                                                <td><?php echo  $row["phone"]?></td>
                                                <td><?php echo  $row["timestamp"]?></td>

                                                <td><?php echo  $row["bank_name"]?></td>
                                                <td><a href="upload/<?php echo  $row['voucher_image']?>" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text"><img class="img-fluid inventory_staff_img" height="50px" width="50px" src="upload/<?php echo  $row['voucher_image']?>"></a></td>

                                                
                                                
                                                

                                            </tr>


                                    <?php    
                                        
                                            
                                        
                                    }
                                    //echo "<tr><td> last line here".$lastline['email']."</td></tr>";

                                    ?>
                                    <tr><td></td><td></td><td></td><td></td><td><b>Total: <?php echo $total?></b></td><td></td><td><button onclick="approve_transaction(<?php echo $lastline['transaction_id']?>)"><i class="fa fa-check fa-fw"></i>Approve</button></td></tr>
                                    <tr><td></td></tr>
                                    <tr></tr>
                                    <?php









                                         
                                }
                            ?>
                            </tbody>
                            </table>

                    </div>
                </div>

            </div>


<script>
function approve_transaction($tid){
    $.ajax({

        type: "POST",
        url: "./controller/approve_transaction.php",
        async: false,
        data: {tid:$tid},
        success : function(response)
        {
            alert(response);
            location.reload();
        }
    }); 
    
    
}
</script>