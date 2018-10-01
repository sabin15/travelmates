<?php
        include 'connection.php';
        if($_POST){
            $name=$_POST['branch_name'];
        

            $sql="SELECT * FROM branch WHERE name = '$name';";
            $result=mysqli_query($conn,$sql);
            
            if($result){
                $row = $result->fetch_assoc();
                echo $row['id'];
            }
            else
                echo mysqli_error($conn);
    }
    ?>