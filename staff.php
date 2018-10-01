<?php 
    session_start();
    if(!isset($_SESSION['staff_username']))
        header('location: staff-login.php');

    $title="Admin";
    $selected="dashboard";
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
                    <h1 class="page-header">Dashboard </h1>
                </div>
            </div>

             <div class="row">
                <div class="col-lg-12">
                    <?php include 'pending.php';?>
                </div>

            </div>                        
        </div>
    </div>

</div>

<?php include 'footer.php';?>




