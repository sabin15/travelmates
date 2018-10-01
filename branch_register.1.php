<?php 
    session_start();
    if(!isset($_SESSION['username']))
        header('location: admin-login.php');
    $title="Branch Registration";
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
                    <h1 class="page-header">Branch Management - Register </h1>
                </div>
            </div>

            <div class="container">
              <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Branch Name</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="input_branch_name" placeholder="Enter branch name here">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="input_branch_address" placeholder="Enter Full Address Here">
              </div>
            
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Contact Number</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="input_branch_contact" placeholder="Enter Phone Number Here">
            </div>

        <div class="form-group row">
          <div class="offset-sm-3 offset-md-3 col-sm-10">
            <button class="btn btn-primary" onclick="register_branch()">Register</button>
        </div>
    </div>
</form>
</div>


</div>
</div>

</div>

<?php require 'footer.php';?>




