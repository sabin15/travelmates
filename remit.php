
<?php include 'navigation_header.php' ?>
<?php 
session_start();
if(!isset($_SESSION['id']))
{
  header("location: login.php");
}

?>



<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link href="css/card.css" rel="stylesheet">


<div class="container">
<br>



<div class="row" style="{
    -webkit-box-pack:center!important;
    -ms-flex-pack:center!important;
    justify-content:center!important
}">
<div class="col-md-6" style="float: none; margin: 0 auto;">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Remittance Form</h4>
</header>
<article class="card-body">
<?php include 'controller/errors.php' ?>
<form action='./controller/add_remit.php' method='post' enctype="multipart/form-data">
    
    <p>Sender Details</p>
    <hr>
    <div class="form-row">
		<div class="col-md-6 form-group">
			<label>Full name *</label>   
		  	<input type="text" name='sender_name' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>Date of Birth *</label>
		  	<input type="text" name='dob' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    
    <div class="form-row">
		<div class="col-md-6 form-group">
			<label>Address *</label>   
		  	<input type="text" name='sender_address' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>State Code *</label>
		  	<input type="text" name='state' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    
    <div class="form-row">
		<div class="col-md-6 form-group">
			<label>Company Name  </label>   
		  	<input type="text" name='company' class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>ABN</label>
		  	<input type="text" name='abn' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    

    	<div class="form-row">
		<div class="col-md-6 form-group">
			<label>Contact *</label>   
		  	<input type="tel" name='contact' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>Email *</label>
		  	<input type="email" name='email' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    
    <div class="form-row">
		<div class="col-md-6 form-group">
			<label>Identification Type *</label>   
		  	<input type="text" name='id_type' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>ID no: *</label>
		  	<input type="text" name='idno' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->


    	<div class="form-row">
		<div class="col-md-6 form-group">
			<label>ID issuing Authority * </label>   
		  	<input type="text" name='issue_authoriy' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>Country of Issue *</label>
		  	<input type="text" name='country_issue' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->


    <p>Transaction</p>
    <hr>
    <div class="form-row">
		<div class="col-md-6 form-group">
			<label>Transaction Amount *</label>   
		  	<input type="number" name='transaction_amount' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>Currency *</label>
		  	<input type="text" name='currency' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->

    <p>Receiver Details</p>
    <hr>
    <div class="form-row">
		<div class="col-md-6 form-group">
			<label>Full name *</label>   
		  	<input type="text" name='receiver_name' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>Date of Birth *</label>
		  	<input type="text" name='reveiver_dob' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    
    <div class="form-row">
		<div class="col-md-6 form-group">
			<label>Address *</label>   
		  	<input type="text" name='receiver_address' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>State Code *</label>
		  	<input type="text" name='receiver_state' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    
    

    	<div class="form-row">
		<div class="col-md-6 form-group">
			<label>Contact *</label>   
		  	<input type="tel" name='receiver_contact' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col-md-6 form-group">
			<label>Email *</label>
		  	<input type="receiver_email" name='email' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
    

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Submit  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our  Terms of use and Privacy Policy.</small>                                          
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

<br><br>