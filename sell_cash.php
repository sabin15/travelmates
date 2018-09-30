<?php 
session_start();
if(!isset($_SESSION['staff_username']))
    header('location: staff-login.php');

$title="Sell Cash";
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
                    <h1 class="page-header">POS - Sell Cash </h1>
                </div>
            </div>

            <div class="container">
              <form action="controller/buy_forex.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Currency</label>
                    <div class="col-sm-5">
                    <select name="currency" id="currency_selector" class="form-control" onchange="get_currency_details(this.options[this.selectedIndex].text,'buy')" required>
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
                    <label class="col-sm-2 col-form-label">Commission(in %)</label>
                    <div class="col-sm-5">
                        <input type="number" step="0.01" class="form-control" name="commission" id="input_commission" placeholder=" " required>
                    </div>            
                </div>

                

            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Purchasing Rate</label>
                    <div class="col-sm-5">
                        <input type="number" step="0.01" class="form-control" name="purchasing_rate" id="input_purchasing_rate" placeholder=" " required>
                    </div>            
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Forex Amount</label>
                    <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" id="transfer_amount_in" name="forex_amount" placeholder="Enter Amount of Currency Here"  min="1"  onchange="calculate_total('buy')" required><i id="max_selling_amount" ></i>
                    </div>            
            </div>

             
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Total Amount</label>
                    <div class="col-sm-5">
                        <input type="number" step="0.01" class="form-control" name="total_amount" id="total_amount" placeholder=" " required>
                    </div>            
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pay To Customer</label>
                    <div class="col-sm-5">
                        <input type="number" step="0.01" class="form-control" name="pay_to_customer" id="pay_to_customer" placeholder=" " required>
                    </div>            
            </div>


            

            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Customer Full Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="customer_name" id="input_currency_amount" placeholder=" " required>
                    </div>            
            </div>

             <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone number</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="phone" id="input_currency_amount" placeholder=" " required>
                    </div>            
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" id="input_currency_amount" placeholder=" " required>
                    </div>            
            </div>

        <div class="form-group row">
          <div class="offset-sm-3 offset-md-3 col-sm-10">
            <!-- <button class="btn btn-primary" onclick="add_currency()">Register</button> -->
            <input type="submit" value="Sell Cash" class="btn btn-success" name="submit" >
        </div>
    </div>
</form>
</div>


</div>
</div>

</div>

<?php require 'footer.php';?>




