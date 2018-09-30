<?php 
session_start();
if(!isset($_SESSION['username']))
    header('location: admin-login.php');

$title="Branch Management";
    //$selected="dashboard";
include 'header.php';
?>

<?php
                                        include './controller/connection.php';
                                        $id=$_SESSION['last_selling_id'];
                                        $branch=$_COOKIE['branch_selected'];
                                        $sql="SELECT * FROM b2c_transaction WHERE id=$id";
                                        $result=mysqli_query($conn,$sql);
                                        $count = 1;
                                        $row = mysqli_fetch_assoc($result);

                                        ?>


<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">


<?php
$msg='
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Currency</th>
                                        <th>Commission Percentage</th>
                                        <th>selling_rate</th>
                                        <th>Forex Amount</th>
                                        <th>Total</th>
                                        <th>Received</th>
                                        <th>Customer Name</th>
                                        <th>phone</th>
                                        <th>timestamp</th>
                                        <th>branch</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    

                                        <tr>
                                        <td>'.$row["currency"].'</td>
                                            <td>'. $row["forex_amount"].'</td>
                                            <td>'. $row["selling_rate"].'</td>
                                            <td>'. $row["forex_amount"].'</td>
                                            <td>'. $row["total"].'</td>
                                            <td>'. $row["received"].'</td>
                                            <td>'. $row["customer_name"].'</td>
                                            <td>'.$row["phone"].'</td>
                                            <td>'. $row["timestamp"].'</td>
                                            <td>'. $branch.'</td>             
                                            

                                        </tr>


                                </tbody>
                            </table>';
                            
                            
                            
 echo $msg;                           
?>




