<?php 
session_start();
if(!isset($_SESSION['staff_username']))
    header('location: staff-login.php');

$title="Add Exchange Rates";
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
                    <h1 class="page-header">Inventory Management - Add Currency </h1>
                </div>
            </div>

            <div class="container">
                <form class="form-horizontal" action="" method="post" name="uploadCSV" enctype="multipart/form-data">
                    <div class="input-row">
                        <label class="col-md-4 control-label">Choose CSV File</label> 
                        <input type="file" name="file" id="file" accept=".csv">
                        <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                        <br />
                    </div>
                    <div id="labelError"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(
	function() {
		$("#frmCSVImport").on(
		"submit",
		function() {

			$("#response").attr("class", "");
			$("#response").html("");
			var fileType = ".csv";
			var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
					+ fileType + ")$");
			if (!regex.test($("#file").val().toLowerCase())) {
				$("#response").addClass("error");
				$("#response").addClass("display-block");
				$("#response").html(
						"Invalid File. Upload : <b>" + fileType
								+ "</b> Files.");
				return false;
			}
			return true;
		});
	});
</script>

<?php require 'footer.php';?>




