<?php 
session_start();
if(!isset($_SESSION['username']))
    header('location: admin-login.php');

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
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Branch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './controller/connection.php';
                                        $branch=$_COOKIE['branch_selected'];
                                        $sql="SELECT A.id as staffID,fname,lname,username,B.name FROM staff_details as A JOIN branch as B on A.branch = B.id WHERE B.name = '$branch' ;";
                                        $result=mysqli_query($conn,$sql);
                                        $count = 1;
                                        while($row = mysqli_fetch_assoc($result)) {

                                        ?>


                                        <tr>
                                            <td><?php echo  $count ?></td>        
                                            <td><?php echo  $row["fname"] . " ". $row["lname"]?></td>
                                           
                                            <td><?php echo  $row["username"]?></td>
                                            <td><?php echo  $row["name"]?></td>
                                            <td><a><i class="fa fa-remove fa-fw" onclick="remove_staff(<?php echo  $row["staffID"]?>)"></i></a></td>

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




