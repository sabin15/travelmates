<?php 
$title="Branch Management";
    //$selected="dashboard";
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
                    <h1 class="page-header">Branch Management </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './controller/connection.php';



                                    $sql="SELECT * FROM branch";
                                    $result=mysqli_query($conn,$sql);
                                    $count = 1;
                                    while($row = mysqli_fetch_assoc($result)) {

                                        ?>


                                        <tr><a>
                                            <td><?php echo  $count ?></td>        
                                            <td><?php echo  $row["name"]?></td>
                                            <td><?php echo  $row["address"]?></td>
                                            <td><?php echo  $row["contact"]?></td>
                                            <td><a><i class="fa fa-edit fa-fw" onclick="edit_branch('<?php echo  $row['id']?>','<?php echo  $row['name']?>','<?php echo  $row['address']?>','<?php echo  $row['contact']?>')"></i></a><a><i class="fa fa-remove fa-fw" onclick="remove_branch(<?php echo  $row["id"]?>)"></i></a></td>
                                        </a>
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

            <div class="row" id="edit_branch_area">
                <div class="col-lg-5">
                    <div class="container">
                      <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Branch Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="branch_name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" id="branch_address">
                        </div>

                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Contact Number</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="branch_contact">
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-3 offset-md-3 col-sm-10">
                        <button class="btn btn-primary" onclick="update_branch()">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

            </div>


            
        </div>
    </div>
</div>




<?php include 'footer.php';?>




