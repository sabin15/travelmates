<?php
session_start();
if(session_destroy()){
    setcookie('username', '', time() - 60*60*24, '/travelmate');
    setcookie('branch', '', time() - 60*60*24, '/travelmate'); 
    setcookie('branch_selected', '', time() - 60*60*24, '/travelmate'); 
	header('Location: ../admin-login.php');
}
?>
