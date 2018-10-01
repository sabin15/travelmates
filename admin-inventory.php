<!--   Staff Section  ->
<?php 
session_start();
if(!isset($_SESSION['username']))
    header('location: admin-login.php');
$title="Inventory Management";
$selected="inventory";
include 'header.php';
?>

<div id="wrapper">

    <!-- Navigation -->

    <?php require 'navigation.php';?>

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

                                       


                                        <tr class="<?php if($count % 2 == 0) echo "success"?>">
                                            <td><?php echo  $count ?></td>        
                                            <td><?php echo  $row["currency"]?></td>
                                            <td><?php echo  $row["country"]?></td>
                                            <td><?php echo  $row["total"]?></td>
                                            <td><?php echo  $row["commission"]?></td>
                                            <td><?php echo  $row["bname"]?></td>
                                            <td><a href="upload/<?php echo  $row['image']?>" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text"><img class="img-fluid inventory_staff_img" height="50px" width="50px" src="upload/<?php echo  $row['image']?>"></a></td>
                                            

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
<script>
    $(document).ready(function ($) {
                // delegate calls to data-toggle="lightbox"
                $(document).on('click', '[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', function(event) {
                    event.preventDefault();
                    return $(this).ekkoLightbox({
                        onShown: function() {
                            if (window.console) {
                                return console.log('Checking our the events huh?');
                            }
                        },
						onNavigate: function(direction, itemIndex) {
                            if (window.console) {
                                return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                            }
						}
                    });
                });

            
</script>




