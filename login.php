<?php
session_start();
if (isset($_SESSION['id'])) {
    header('location: home.php');
}

?>

<?php include 'navigation_header.php' ?>



<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link href="css/card.css" rel="stylesheet">


<div class="container">
<br>
<br>
<br>

<div class="row justify-content-center" style="{
    -webkit-box-pack:center!important;
    -ms-flex-pack:center!important;
    justify-content:center!important
	}">
<div class="col-md-6" style="float: none; margin: 0 auto;">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Log In</h4>
</header>
<article class="card-body">

<?php
if(isset($_GET['redirect']))
if($_GET['redirect']==true)
                  echo '
                  <div class="alert alert-info">
                  <strong>Please Login !</strong> You need to login to access this page. 
                </div>
                  ';
?>


<form action='controller/user_login.php' method='post'>
    <div class="form-group">
		<label>Username</label>
		<input type="text" name='username' class="form-control" placeholder=""/>
		<small class="form-text text-muted">Use a unique username.</small>
	</div> <!-- form-group end.// -->
	
    <div class="form-group">
		<label>Password</label>
		<input type="password" name='password' class="form-control" placeholder=""/>
       
	</div> <!-- form-group end.// -->

  
    
	
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Login  </button>
    </div> <!-- form-group// -->      
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Don't have an account? <a href="register.php">Sign Up</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

<br><br>