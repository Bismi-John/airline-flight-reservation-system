<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$db = new PDO("mysql:host=localhost;dbname=flight_reservation", "root", "");
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$token = bin2hex(random_bytes(32));
session_start();

    // $email_address ="bismithampi@gmail.com";
    $email_address =$_SESSION["email"];
    // $query = $db->prepare("UPDATE registration   SET token=:token WHERE email=:email");
    // $query->execute(array(':token' => $token, ':email' => $email_address));
    // $reset_url = "http://localhost/AFRS%20-%20Copy-20230319T124359Z-001/AFRS%20-%20Copy/reset-password.php?token=" . $token;
   



    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'amalhero1@gmail.com';                     //SMTP username
        $mail->Password   = 'fxghodegddhzdnru';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('amalhero1@gmail.com', 'travel story');
        $mail->addAddress($email_address);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'SUCCESSFULLY BOOKED';
        $mail->Body    = 'Your booking is conformed and booking id is:43367453';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
        echo '<script>
        alert("message sent");
        window.location.href="../ticket.php"</script>';
        
      
    } catch (Exception $e) {
        echo '<script>alert("Message not sent");</script>';
    }

?>
