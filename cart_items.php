
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

    
      
      <div class="table-responsive ">
  
      <table class="table">
          <thead>
              <tr>
                  <th>Currency</th>
                  <th> Quantity </th>
                  <th>Total </th>
                  
              </tr>
          </thead>
          <tbody>
              <?php
                  include './controller/connection.php';
  
                $total_sum=0;
                session_start();
                if(isset($_SESSION['id'])){
                     $username=$_SESSION['id'];
                    $sql="SELECT * FROM cart where username='$username'";
                    $result=mysqli_query($conn,$sql);
                    
                    if($result){
                    $count = 1;
                    while($row = mysqli_fetch_assoc($result)) {
        
                  ?>
  
  
                  <tr>     
                      <td><?php echo  $row["currency"]?></td>
                      <td><?php echo  $row["quantity"]?></td>
                      <td><?php 
                      $total=$row['exchange_rate']*$row['quantity']*(1+$row['commission']/100);
                      $total_sum=$total_sum+$total;
                      echo $total;
                      ?> </td>

                      <td><i class="fa fa-trash btn" id='delete-cart' onclick="deleteCartItem(<?php echo  $row["id"]?>)"></i> </td>


                  
                      
  
                  </tr>
  
  
                  <?php 
                  $count=$count+1;
              }
            }
            }
  

            
              if(mysqli_num_rows($result)==0)
                  echo '
                  <div class="alert alert-info">
                  <strong>Info!</strong> You can start adding items to your cart. The items will be listed here.
                </div>
                  ';
              ?>
              
          </tbody>


          
      </table>


      
      <div class="alert alert-success">
                  <strong>Total: </strong> <?php echo $total_sum;  ?>
                </div>
     
  </div>


<script>



function deleteCartItem(id){

    $.ajax({
  
        type: "GET",
        url: "controller/delete_cart_item.php?id="+id,
        async: false,
        success : function(text)
        {
            console.log(text);
            status = text;
            // alert(status);
        }
});
}




</script>



<!--   
  <script>
  function addtocart(count, branch_id, currency, purchase_rate){
      if($('#quantity-'+count).val()=='')
          {
               alert('Empty Value');
               return;
          }
      console.log($('#quantity-'+count).val()*purchase_rate+'  '+branch_id+' '+currency+' '+purchase_rate);
      $.ajax({
  
          type: "POST",
          url: "controller/add_cart_item.php",
          async: false,
          data: {"currency": currency, "quantity": $('#quantity-'+count).val(), "exchange_rate": purchase_rate, "branch": branch_id},
          success : function(text)
          {
              console.log(text);
              status = text;
              alert(status);
          }
      });
  }
  
  
  </script>
   -->
  
  
  