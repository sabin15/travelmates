<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

    
      
      <div class="table-responsive ">
  
      <table class="table">
          <thead>
              <tr>
                  <th> # </th>
                  <th>Sender Name</th>
                  <th> Sender Address </th>
                  <th>Receiver Name </th>
                  <th>Receiver Address </th>
                  <th>Send Amount </th>
                  <th>Currency </th>

                  
              </tr>
          </thead>
          <tbody>
              <?php
                  include './controller/connection.php';
  
                
                
                
                 
                    $sql="SELECT * FROM remit";
                    $result=mysqli_query($conn,$sql);
                    
                    if($result){
                    $count = 1;
                    while($row = mysqli_fetch_assoc($result)) {
        
                  ?>
  
  
                  <tr>
                  <td><?php echo  $count ?></td>     
                      <td><?php echo  $row["sender_name"]?></td>
                      <td><?php echo  $row["sender_address"]?></td>
                      <td><?php echo  $row["receiver_name"]?></td>
                      <td><?php echo  $row["receiver_address"]?></td>
                      <td><?php echo  $row["transaction_amount"]?></td>
                      <td><?php echo  $row["currency"]?></td>
                      
                      
  
                  </tr>
  
  
                  <?php 
                  $count=$count+1;
              }
            }
            
  

            
              if(mysqli_num_rows($result)==0)
                  echo '
                  <div class="alert alert-info">
                  <strong>Info!</strong> All the submitted remit form can be found here.
                </div>
                  ';
              ?>
              
          </tbody>


          
      </table>


      
  </div>


