<!--   Staff Section  ->
<?php 
session_start();
if(!isset($_SESSION['staff_username']))
    header('location: staff-login.php');
$title="Branch Management";
$selected="inventory";
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
                    <h1 class="page-header">Inventory Details </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Currency Name</th>
                                        <th>Country</th>
                                        <th>Total Amount</th>
                                        <th>Commission</th>
                                        <th>Branch</th>
                                        <th>Sample Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './controller/connection.php';



                                    $sql="SELECT I.name as currency,country,total,commission,B.name as bname,image FROM inventory as I JOIN branch as B on I.branch=B.id";
                                    $result=mysqli_query($conn,$sql);
                                    $count = 1;
                                    while($row = mysqli_fetch_assoc($result)) {

                                        ?>

                                       


                                        <tr>
                                            <td><?php echo  $count ?></td>        
                                            <td><?php echo  $row["currency"]?></td>
                                            <td><?php echo  $row["country"]?></td>
                                            <td><?php echo  $row["total"]?></td>
                                            <td><?php echo  $row["commission"]?></td>
                                            <td><?php echo  $row["bname"]?></td>
                                            <td><img class="inventory_staff_img" height="50px" width="50px" src="upload/<?php echo  $row['image']?>"></td>
                                            

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




