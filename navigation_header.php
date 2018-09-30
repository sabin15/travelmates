<?php include 'header.php' ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TravelMate</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="refund.html">Refund Policy</a></li>
        <li><a href="contact.html">Contact US</a></li>
        <li><a href="about.html">About US</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        <?php if(!isset($_SESSION['id'])) {?><li><a href="login.php">Login</a></li>
        
        <li><a href="register.php">Register</a></li> <?php }   else {?>
          <li><a href="checkout.php">Checkout</a></li> 
          <li><a href="logout.php">Logout</a></li> 
        <li><a href="profile.php" class='fa fa-gear'></a></li> 
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>