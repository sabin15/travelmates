
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link href="css/card.css" rel="stylesheet">

<?php 

    if($_POST)
        echo "POST Request received";

        ?>

<br>
<br>
<br>
<div class="alert alert-success" id="success_message">
                <strong>Success !</strong> Your Password has been changed.
</div>


<div class="alert alert-danger" id="error_message">
                <strong>Error !</strong> Error occured please try again later.
</div>

<div class="alert alert-danger" id="invalid_pass">
                <strong>Error !</strong> Your password is wrong please check again.
</div>

<div class="row" >
<div class="col-md-12" style="float: none; margin: 0 auto;">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Change Password</h4>
</header>
<article class="card-body">
<?php include 'controller/errors.php' ?>
<form  method='post' id="change_form">
	<div class="form-row">
    <div class="form-group">
		<label>Old Password</label>
		<input type="password" name='old_password' class="form-control" placeholder=""/>
       
	</div> <!-- form-group end.// -->

     <div class="form-group">
		<label>New Password</label>
		<input type="password" name='new_password' class="form-control" placeholder=""/>
       
	</div> <!-- form-group end.// -->

    </div> <!-- form-row.// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Change  </button>
    </div> <!-- form-group// -->      


    
</form>
</article> <!-- card-body end .// -->

</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


<script>

    
    $("#success_message").hide();
    $("#error_message").hide();
    $("#invalid_pass").hide();

    $("#change_form").submit((e)=>{
        e.preventDefault();

        var inputs=$("#change_form").serialize();
        console.log(inputs);
        $.ajax({

            type: "POST",
            url: "controller/change_password.php",
            async: false,
            data: inputs,
            success : function(status){
                if(status==1){
                    $("#success_message").show();
                    setTimeout(() => {
                        $("#success_message").hide();                        
                    }, 5000);
                }
                else if(status==2){
                    $("#invalid_pass").show();
                    setTimeout(() => {
                        $("#invalid_pass").hide();                        
                    }, 5000);   
                }
                else{
                    $("#error_message").show();
                    setTimeout(() => {
                        $("#error_message").hide();                        
                    }, 5000);   
                }
            
               
            }
        });
    });


</script>