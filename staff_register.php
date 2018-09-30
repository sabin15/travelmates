<?php 
    session_start();
    if(!isset($_SESSION['username']))
        header('location: admin-login.php');
    $title="Staff Registration";
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
            <h1 class="page-header">Staff Management - Register </h1>
         </div>
      </div>
      <div class="container">
         <form method="POST" action="./controller/staff_add.php">
            <div class="form-group row">
               <label class="col-sm-2 col-form-label">First Name</label>
               <div class="col-sm-5">
                  <input type="text" class="form-control" id="input_branch_name" placeholder="Enter First Name here" name="stf_fname_in" required>
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-2 col-form-label">Last Name</label>
               <div class="col-sm-5">
                  <input type="text" class="form-control" id="input_branch_address" placeholder="Enter Last Name Here" name="stf_lname_in" required>
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-2 col-form-label">branch</label>
               <div class="col-sm-5">
                  <select name="stf_branch_in" id="branch_input" class="form-control">
                  <?php
                                        include './controller/connection.php';



                                    $sql="SELECT * FROM branch";
                                    $result=mysqli_query($conn,$sql);
                                    $count = 1;
                                    while($row = mysqli_fetch_assoc($result)) {

                              ?>
                              <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>

                                    <?php 
                                        $count=$count+1;
                                    }
                                    ?>
                  </select>
               </div>
            </div>
            
            <div class="form-group row">
               <label class="col-sm-2 col-form-label">username</label>
               <div class="col-sm-5">
                  <input type="text" class="form-control" id="input_branch_contact" placeholder="Enter username for login" name="stf_username_in" required>
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-2 col-form-label">password</label>
               <div class="col-sm-5">
                  <input type="password" class="form-control" id="input_branch_contact" placeholder="Enter Password Here" name="stf_password_in" required>
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-2 col-form-label">role</label>
               <div class="col-sm-5">
                  <label class="radio-inline"><input type="radio" name="stf_role_in" value="staff" checked>Staff</label>
                  <label class="radio-inline"><input type="radio" name="stf_role_in" value="admin" >Admin</label>
               </div>
            </div>
               <div class="form-group row">
                  <div class="offset-sm-3 offset-md-3 col-sm-10">
                     <button type="submit" class="btn btn-primary">Register</button>
                  </div>
               </div>
         </form>
         </div>
      </div>
   </div>
</div>
<?php require 'footer.php';?>