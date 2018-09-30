<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: login.php?redirect=true');
}

?>
<?php include "./controller/connection.php" ?>
<?php include 'navigation_header.php'?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link href="css/card.css" rel="stylesheet">

<div class="container">
    <div class="row">
    <div class="col-md-2 col-lg-2">

    </div>

    <div class="col-md-8 col-sm-12 col-lg-8" style="background-color: #fff;">
    <h1>
    

    </h1>



        <div class="row" >

            <div class="col-md-5" >
                <div  id="cart-table" >
                </div>
            </div>


            <div class="col-md-7" >
            
                            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Please fill in the checkout form</h4>
                </header>
                <article class="card-body">
                
                <form action='controller/checkout.php' method='POST' enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Full name </label>   
                            <input type="text" name='name' class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        
                    </div> <!-- form-row end.// -->
                    <div class="form-group">
                        <label>Name of the Bank </label>
                        <input type="text" name='bank_name' class="form-control" placeholder="">
                        <small class="form-text text-muted">The name of the bank money is being sent to.</small>
                    </div> <!-- form-group end.// -->

                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" name='email' class="form-control" placeholder="">
                        <small class="form-text text-muted">We will send a receipt to you in this email.</small>
                    </div> <!-- form-group end.// -->
                    
                    <div class="form-group">
              <label>Upload the image of the Voucher</label>
              
                <input type="file"  class="form-control" name="voucher" >
            </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Contact</label>
                        <input type="tel" name='contact'  class="form-control">
                        </div> <!-- form-group end.// -->
                    
                    </div> <!-- form-row.// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Checkout  </button>
                    </div> <!-- form-group// -->      
                    <small class="text-muted">By clicking the check out button, you confirm that you have  submit the right information.</small>                                          
                </form>
                </article> <!-- card-body end .// -->
                
                </div> <!-- card.// -->


            </div>


        </div>

        
  






    </div>



    <div class="col-md-2 col-lg-2">




    </div>



    </div>



</div>



<script>


$(document).ready(function() {
    var defaultOption = $('#location option:selected').val();
$("#forex-table").load('get_forex_rates.php?branch_id='+defaultOption);
$("#cart-table").load('cart_items.php')





});







</script>

?>
