<?php

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
require ('./PHPMailer/PHPMailerAutoload.php');
require ('./PHPMailer/Exception.php');
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
$email='razzester86@gmail.com';


          $mail = new PHPMailer(true);

          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'sabinshrestha15@gmail.com';                 // SMTP username
          $mail->Password = 'conservation';                           // SMTP password
          $mail->SMTPSecure = 'false';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;

          $mail->From = "sabinshrestha15@gmail.com";
          $mail->FromName = "TRAVELMATES";

          $mail->addAddress($email);
          $mail->isHTML(true);
          $mail->Subject = "TRAVELMATES: test";
          //Thank you for signing up \n Please confirm your email address
          $mail->Body = "This is a test msg ";

          if ($mail->send()){
              //$msg = "You have been registered! Please verify your email!";

              echo "true";

          }else{
              //$msg = "Something wrong happened! Please try again!";
              echo "Mail can't be sent";
          }




 ?>
