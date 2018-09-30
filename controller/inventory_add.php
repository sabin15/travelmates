<?php
	include 'connection.php';
	if($_POST){		
		$name=$_POST['name'];
		$total=$_POST['total'];
		$branch=$_COOKIE['branch_selected'];
		$country=$_POST['country'];	
		$commission=$_POST['commission'];
		$selling_rate=$_POST['selling_rate'];
		$purchasing_rate=$_POST['purchasing_rate'];


        
		// }
		
		
		if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
			$filename = $_FILES["photo"]["name"];
			$filetype = $_FILES["photo"]["type"];
			$filesize = $_FILES["photo"]["size"];
		
			// Verify file extension
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!array_key_exists($ext, $allowed))
				die("Error: Please select a valid file format.");
		
			// Verify file size - 5MB maximum
			$maxsize = 5 * 1024 * 1024;
			if($filesize > $maxsize)
				die("Error: File size is larger than the allowed limit.");
		
			// Verify MYME type of the file
			if(in_array($filetype, $allowed)){
				// Check whether file exists before uploading it
				if(file_exists("../upload/" . $_FILES["photo"]["name"])){
					echo $_FILES["photo"]["name"] . " is already exists.";
				} 
				else{
					
					$sq="SELECT id FROM branch WHERE name = '$branch';";
					$res=mysqli_query($conn,$sq);
					if($res){
						$row = mysqli_fetch_assoc($res);
						$branchID=$row['id'];
						mysqli_autocommit($conn,false);
						$flag=true;

						$sql="INSERT INTO inventory (name,country,total,commission,image,branch) VALUES ('$name', '$country', $total, $commission, '$filename', '$branchID');";
						$sql1="INSERT INTO exchange_rates (currency,selling_rate,purchase_rate,branch) VALUES ('$name', $selling_rate, $purchasing_rate, '$branchID');";
						$result=mysqli_query($conn,$sql);

						
						if(!$result){
							$flag=false;
							echo "Error Details Q1: ". mysqli_error($conn);
						}
						$result1=mysqli_query($conn,$sql1);
						if(!$result1){
							$flag=false;
							echo "Error Details Q2: ".mysqli_error($conn) ;
						}
						
						if ($flag){ 
							
							mysqli_commit($conn);
							move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/" . $_FILES["photo"]["name"]);
								echo '<script> alert("Success Dabase Insertion ! Your file was uploaded successfully.")</script>;';
								header('Location:../add_currency.php');
							//echo "<script>alert('Transaction Complete');</script>";
							//header('Location: ../B2B_transfer.php');
						}
						else{
							mysqli_rollback($conn);
							echo "Transaction failed. Rolling back transactions...";
						}
						mysqli_close($conn);

					
					}
					else
						echo "ERROR in QUERY";
				}
			}
		}	 
		else{
			echo "Error: " . $_FILES["photo"]["error"];
		}
	}
?>