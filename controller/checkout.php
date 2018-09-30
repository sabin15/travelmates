<?php
	include 'connection.php';
	if($_POST){		
		$name=$_POST['name'];
		$bank_name=$_POST['bank_name'];
		$contact=$_POST['contact'];
		$file=$_FILES["voucher"]["name"];
		$email=$_POST['email'];

		
		if(isset($_FILES["voucher"])  && $_FILES["voucher"]["error"] == 0){
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
			$filename = $_FILES["voucher"]["name"];
			$filetype = $_FILES["voucher"]["type"];
			$filesize = $_FILES["voucher"]["size"];
		
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
					if(file_exists("../upload/" . $_FILES["voucher"]["name"])){
						echo $_FILES["voucher"]["name"] . " is already exists.";
					} 
					else{
						
							

							$sql="INSERT INTO transaction (customer_name, bank_name, contact, voucher_image, email) VALUES ('$name', '$bank_name', '$contact', '$filename','$email');";
							$result=mysqli_query($conn,$sql);
							
							if($result){
								move_uploaded_file($_FILES["voucher"]["tmp_name"], "../upload/" . $_FILES["voucher"]["name"]);
								
								$transaction_id=mysqli_insert_id($conn);
								
								session_start();

								$username=$_SESSION['id'];
								$data="SELECT * from cart where username='$username';";
								$result=mysqli_query($conn,$data);
								if(mysqli_num_rows($result)==0)
								{
									echo "Empty Cart";
									return;
								}

								while($row = mysqli_fetch_assoc($result))
								{
									$currency=$row['currency'];
									$commission=$row['commission'];
									$selling_rate=$row['exchange_rate'];
									$forex_amount=$row['quantity'];
									$total=$forex_amount*$selling_rate;
									$customer_name=$name;
									$phone=$contact;
									$status=0;
									$branch=$row['branch'];
									$id=$row['id'];
									
									
									$sql="Insert into b2c_transaction (currency, commission, selling_rate, forex_amount, total, received, customer_name, phone, status, branch, transaction_id) 
															  values ('$currency','$commission','$selling_rate','$forex_amount','$total','$total','$customer_name', '$phone','$status','$branch', '$transaction_id')";
									$res=mysqli_query($conn,$sql);
									if($res){
										$sql="DELETE FROM cart where id='$id';";
										$result=mysqli_query($conn,$sql);
									}
								}


								
								
								
								$sql="DELETE FROM cart where username='$username';";
								$result=mysqli_query($conn,$sql);

								echo '<script> alert("Success Dabase Insertion ! Your file was uploaded successfully.")</script>;';

								header('Location:../home.php');
						
							}
								
								
							else
								echo '<script> alert("Error.")</script>;';

						
						
					}
				}
 
		else{
			echo "Error: " . $_FILES["voucher"]["error"];
		}

	}
}
?>