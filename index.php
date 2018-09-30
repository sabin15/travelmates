<?php 
session_start();
if(isset($_SESSION['id']))
{
  header("location: home.php");
}

?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TravelMate Money Exchange</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">TravelMate Money Exchange</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="refund.html">Refund Policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>

    <header>
      <div class="container">
        <div class="row my-3">
          <div class="col-lg-8">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('https://content.statuecruises.com/sites/default/files/styles/hero_huge/public/images/hero/carousel/Statue%20Cruises%20-%20Statue%20of%20Liberty%20History%20-%20Aerial%20of%20Lady%20Liberty%20%26%20Manhattan%20at%20Dusk%281%29.jpg')">
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Send Money to USA</h3>
                        <p>Get USD from our shops.</p>
                      </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('https://images.spot.im/v1/production/obx262agf9mbbwrl1lde')">
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Buy GBP</h3>
                        
                      </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('https://axcessnews.com/wp-content/uploads/2017/12/forex-trading-560x416.jpg')">
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Buy and Sell Currencires with Travelmate.</h3>
                        <p>Travelmate helps you to buy and sell currency across different domains and country.</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
              </div>
          </div>

          <div class="col-lg-4">
              <!-- TABLE HEAD INVERSE -->

            <div class="bg-success">
                    <center><strong class="text-light">Exchange rates for today.</strong> </center>
              </div>
            

            <br>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Currency</th>
                        <th>Sold At</th>
                        <th>Purchased At</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                include './controller/connection.php';


            $sql="SELECT currency,flag_url, cast(AVG(purchase_rate) as decimal(10,2)) as purchase_rate,  cast(AVG(selling_rate) as decimal(10,2)) as selling_rate FROM `exchange_rates` GROUP BY currency";
            // $sql="SELECT * FROM exchange_rates where branch='$branch_id'";
            $result=mysqli_query($conn,$sql);
            
            $count = 1;
            while($row = mysqli_fetch_assoc($result)) {

                ?>


                <tr class="table-light">     
                    <td><img src="<?php echo $row['flag_url'] ?>" width='16px' height='16px' /> </td>
                    <td><?php echo  $row["currency"]?></td>
                    <td><?php echo  $row["selling_rate"]?></td>
                    <td><?php echo  $row["purchase_rate"]?></td>
                                   
                
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
      
    </header>
    

    <!-- Page Content -->
    <section class="py-1">
      <div class="container">
        <h1 class="display-4">Why People Choose US?</h1>
        <hr>
        <p>
          We have friendly staff for helping you convert your cash into foreign exchange at reasonably competitive prices. You can avail money exchange service at five of our branches Australia wide.Our operating hours should be from "8:30am to 8:30pm". We also trade on public holidays to give extra service when banks and other money exchanges are closed. We accept American Express Travelers Cheque as well.
        </p>

        <div class="row my-3">
          <!-- LIST GROUP -->
          <ul class="list-group mb-5 col-lg-6">
              <li class="list-group-item">Easy Order Processing</li>
              <li class="list-group-item active">Attractive Exchange Rates</li>
              <li class="list-group-item">Responsible Customer Service</li>
              <li class="list-group-item active">Emphasis on security, accuracy</li>
              <li class="list-group-item">Flat Lower Fee & Prompt Delivery</li>
          </ul>

          <div class="card bg-info text-white mb-3 col-lg-3">
              <div class="card-header">Bank Account</div>
              <div class="card-body">
                  <h5 class="card-title">Bank</h4>
                  <p class="card-text">National Australia Bank</p>
                  <h5 class="card-title">BSB</h4>
                  <p class="card-text">082356</p>
                  <h5 class="card-title">Account No</h4>
                  <p class="card-text">847095869</p>
              </div>
          </div>

          <div class="card bg-secondary text-white mb-3 col-lg-3">
              <div class="card-header">Account Holder</div>
              <div class="card-body">
                  <h5 class="card-title">Account Name</h4>
                  <p class="card-text">The Travelmate Group Pty Ltd</p>
                  
          </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; TravelMate Money Exchange 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
