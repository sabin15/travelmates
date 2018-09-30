<?php 
    session_start();
    if(!isset($_SESSION['id']))
        header("location: index.php");

?>

<?php include "./controller/connection.php" ?>
<?php include 'navigation_header.php'?>


<div class="container">
    <div class="row">
    <div class="col-md-1 col-lg-1">

    </div>

    <div class="col-md-10 col-sm-12 col-lg-10 row" style="background-color: #fff;">
    <h1>
    </h1>


<div class="col-md-7">
  
        <div class="form-group">
        <label for="location ">Select branch to view exchange rates:</label>

        <select class="form-control " id="location" style="width: 250px;">
        <!-- <option default >Choose a location to view the exchange rates.</option> -->
            <?php 

                $fetch_branch_query = "SELECT * FROM branch";
                $result = mysqli_query($conn,$fetch_branch_query);
                while($res=mysqli_fetch_assoc($result)) {


            ?>

            
            <option value=<?php echo $res['id'] ?> ><?php echo $res['name'] ?> (<?php echo $res['address'] ?> )</option>
            
                <?php } ?>
        </select>

        <hr>
        </div>
                




        <div class="forex-table" id="forex-table" >


        
        <h1>Forex Table </h1>


        </div>

</div>

<div class="col-md-5 col-lg-5">


    </div>

<div class="col-md-5" style=" border: 1px solid;" >
    
<br>
<div class="bg-primary">
                    
                  <strong>You have following items in your cart.</strong> 
                
                
                </div>


                <br>
    <div  id='cart-table'>



    </div>

</div>



    </div>



    <div class="col-md-1 col-lg-1">




    </div>



    </div>



</div>



<script>


$(document).ready(function() {
    var defaultOption = $('#location option:selected').val();
$("#forex-table").load('get_forex_rates.php?branch_id='+defaultOption);
$("#cart-table").load('cart_items.php');
setInterval(()=> {$("#cart-table").load('cart_items.php')}, 500);


});




$("#location").change(function(){
    $("#forex-table").load('get_forex_rates.php?branch_id='+$(this).val());
    $("#cart-table").load('cart_items.php');


});



</script>
