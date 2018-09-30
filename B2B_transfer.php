<?php 
session_start();
if(!isset($_SESSION['staff_username']))
    header('location: staff-login.php');

$title="Branch-Branch Transfer";
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
                    <h1 class="page-header">Branch-Branch Transfer </h1>
                </div>
            </div>

            <div class="container">
              <form action="controller/b2b_transfer.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Currency</label>
                    <div class="col-sm-5">
                                            <select name="currency" id="currency_selector" class="form-control" onchange="check_currency_balance(this.options[this.selectedIndex].text)" required>
                                            <option disabled selected value> -- select Currency -- </option>
                                             <?php
                                                 include './controller/connection.php';
                                                        $branchID=$_SESSION['staff_branch'];
                                                        $sql="SELECT * FROM inventory WHERE branch='$branchID'";
                                                        $result=mysqli_query($conn,$sql);
                                                        
                                                        while($row = mysqli_fetch_assoc($result)) {

                                                ?>
                                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>

                                                <?php 
                                                    
                                                }
                                                ?>
                                             </select>
                                        </div>
                </div>

                
            
                

            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">From</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="from" id="input_currency_amount" placeholder="" value="<?php echo $_SESSION['staff_branch_name'];?>" disabled>
                    </div>            
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">To</label>
                    <div class="col-sm-5">
                                            <select name="to" id="staff_branch_in" class="form-control">
                                            
                                             <?php
                                                 include './controller/connection.php';



                                                        $sql="SELECT * FROM branch";
                                                        $result=mysqli_query($conn,$sql);
                                                        
                                                       
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            if($row['name']!=$_SESSION['staff_branch_name']){

                                                            

                                                ?>
                                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>

                                                <?php 
                                                   
                                                }
                                            }
                                            ?>
                                             </select>
                                        </div>          
                </div>

            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Transfer Amount</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="transfer_amount_in" name="transfer_amount" placeholder="Enter Amount of Currency Here" required min="1" max="1"><i id="max_transfer_amount"></i>
                    </div>            
            </div>
           
        <div class="form-group row">
          <div class="offset-sm-3 offset-md-3 col-sm-2">
            <!-- <button class="btn btn-primary" onclick="add_currency()">Register</button> -->
            <input type="submit" value="Transfer" name="submit" class="form-control">
        </div>
    </div>
</form>
</div>


</div>
</div>

</div>

<?php require 'footer.php';?>




