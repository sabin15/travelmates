<?php

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
require ('./PHPMailer/PHPMailerAutoload.php');
require ('./PHPMailer/Exception.php');
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';


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
         




 ?>
