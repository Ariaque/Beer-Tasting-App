<?php

// include require files
include_once(APP_ROOT . '/vendor/autoload.php');

include_once(APP_ROOT . '\vendor\phpmailer\phpmailer\src\PHPMailer.php');
include_once(APP_ROOT . '\vendor\phpmailer\phpmailer\src\Exception.php');
include_once(APP_ROOT . '\vendor\phpmailer\phpmailer\src\SMTP.php');



//use <library>  

//include_once("init.php");

//Import PHPMailer classes into the global namespace; define namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Mailer
{

    static function sendMail($userEmail, $message, $subject)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'pdlgroup4@gmail.com';                  //SMTP username     //gmail username
            $mail->Password   = 'Hello world !!!';  //Hello world !!!            //SMTP password     //gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465; //587;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($mail->Username, EMAIL_FROM);
            //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress($userEmail);               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if (!$mail->send()) {
                return false;
            }
        } catch (Exception $e) {
            echo "Message echoué. Mailer Error: {$mail->ErrorInfo}";
        }
        $mail->smtpClose();
        return true;
    }
}