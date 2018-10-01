<?php 
    session_start();
    if(!isset($_SESSION['username']))
        header('location: staff-login.php');

    $title="Remit";
    $selected="remittance";
    include 'header.php';
?>

<div id="wrapper" onload="load_remit()">

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

            <div class="row-lg-12 remit-area">

			</div>
                

        </div>
    </div>

</div>

<?php include 'footer.php';?>

<script>

</script>