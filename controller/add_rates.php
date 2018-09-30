<?php
	include 'connection.php';
	if (isset($_POST["import"])) {
    
        $fileName = $_FILES["file"]["tmp_name"];
        
        if ($_FILES["file"]["size"] > 0) {
            
            $file = fopen($fileName, "r");
            
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                $sqlInsert = "INSERT into exchange_rates (currency,selling_rate,purchase_rate,branch) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "')";
                $result = mysqli_query($conn, $sqlInsert);
                
                if (! empty($result)) {
                    $type = "success";
                    $message = "CSV Data Imported into the Database";
                    echo $message;
                } else {
                    $type = "error";
                    $message = "Problem in Importing CSV Data";
                    echo $message;
                }
            }
        }
        else{
            echo "file problem";
        }
    }
    else{
        echo "no post data";
    }
?>