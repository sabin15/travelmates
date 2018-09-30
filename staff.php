<?php 
    session_start();
    if(!isset($_SESSION['staff_username']))
        header('location: staff-login.php');

    $title="Admin";
    $selected="dashboard";
    include 'header.php';
    
?>

<div id="wrapper">

    <!-- Navigation -->

    <?php require 'navigation_staff.php';?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard </h1>
                </div>
            </div>

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



                                    $sql="SELECT * FROM b2c_transaction WHERE branch=$branch ORDER BY timestamp DESC";
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
        </div>
    </div>

</div>

<?php include 'footer.php';?>




