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
                    <div class="carousel-item active" style="background-image: url('https://wallpaper-house.com/data/out/9/wallpaper2you_359471.jpg')">
                      <div class="carousel-caption d-none d-md-block">
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
                      </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('https://wallpaper-house.com/data/out/9/wallpaper2you_359448.jpg')">
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                      </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('https://wallpaper-house.com/data/out/9/wallpaper2you_359456.jpg')">
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
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
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>John</td>
                        <td>Doe</td>
                        <td>jdoe@gmail.com</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Will</td>
                        <td>Johnson</td>
                        <td>will@yahoo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Shannon</td>
                        <td>Williams</td>
                        <td>shannon@yahoo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>John</td>
                        <td>Doe</td>
                        <td>jdoe@gmail.com</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Will</td>
                        <td>Johnson</td>
                        <td>will@yahoo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Shannon</td>
                        <td>Williams</td>
                        <td>shannon@yahoo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>John</td>
                        <td>Doe</td>
                        <td>jdoe@gmail.com</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Will</td>
                        <td>Johnson</td>
                        <td>will@yahoo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Shannon</td>
                        <td>Williams</td>
                        <td>shannon@yahoo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Shannon</td>
                        <td>Williams</td>
                        <td>shannon@yahoo.com</td>
                    </tr>
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
