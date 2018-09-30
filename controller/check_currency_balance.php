<?php
    include 'connection.php';

    if($_POST){	
        $id=$_POST['id'];
       
        $sql="SELECT * FROM inventory WHERE id=$id";
        $result=mysqli_query($conn,$sql);
        $count = 1;
        $total;
        while($row = mysqli_fetch_assoc($result)) {
            $total=$row['total'];
    
        }
        $_SESSION['total_balance']=$total;
        echo  $_SESSION['total_balance'];
	}
   
?>