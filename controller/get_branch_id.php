<?php
        include 'connection.php';
        if($_POST){
            $name=$_POST['branch_name'];
        }

        $sql="SELECT id FROM branch WHERE name = $name;";
        $result=mysqli_query($conn,$sql);
        $dbdata = array();
        if($result){
            $row = $result->fetch_assoc();
            echo $row['id'];
        }
    ?>