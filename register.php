
<?php include 'navigation_header.php' ?>
<?php include 'controller/user_register.php' ?>
<?php 
session_start();
if(isset($_SESSION['id']))
{
  header("location: home.php");
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
	<h4 class="card-title mt-2">Sign up</h4>
</header>
<article class="card-body">
<?php include 'controller/errors.php' ?>
<form action='' method='post' enctype="multipart/form-data">
	<div class="form-row">
		<div class="col form-group">
			<label>First name </label>   
		  	<input type="text" name='f_name' required class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Last name</label>
		  	<input type="text" name='l_name' required class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Email </label>
		<input type="email" name='email' required class="form-control" placeholder="">
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div> <!-- form-group end.// -->
    <div class="form-group">
		<label>Username</label>
		<input type="text" name='username' required class="form-control" placeholder="">
		<small class="form-text text-muted">Use a unique username.</small>
	</div> <!-- form-group end.// -->
	
    <div class="form-group">
		<label>Password</label>
		<input type="password" name='password' required class="form-control" placeholder="">
	</div> <!-- form-group end.// -->

    <div class="form-group">
		<label>Address</label>
		<input type="address" name='address' required class="form-control" placeholder="">
	</div> <!-- form-group end.// -->

	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Contact</label>
		  <input type="tel" name='contact' required  class="form-control">
		</div> <!-- form-group end.// -->

		 <div class="form-group col-md-6">
              <label>Upload valid verification ID</label>              
                <input type="file" required class="form-control" name="identity" >
            </div>
	
	</div> <!-- form-row.// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
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