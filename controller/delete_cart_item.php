<?php

include 'connection.php';

    $id=$_GET['id'];
     $sql="DELETE FROM cart where id='$id'";
     $result=mysqli_query($conn,$sql);
     if($result){
         echo "Deleted card item successfully.";
     }
     else
         echo "Some error";





?>