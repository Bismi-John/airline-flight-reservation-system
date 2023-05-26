<?php
require "connection.php";
session_start()
?>
<?php
require "header.php";
?>
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

if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    $email_address = $_POST['email'];
    $query = $db->prepare("UPDATE registration   SET token=:token WHERE email=:email");
    $query->execute(array(':token' => $token, ':email' => $email_address));
    $reset_url = "http://localhost/AFRS%20-%20Copy/AFRS%20-%20Copy/reset-password.php?token=".$token;



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
        $mail->Subject = 'password reset';
        $mail->Body    = 'To reset your password, please click the following link:'.$reset_url;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
        echo '<script>alert("Message sent");
        window.location.href = "message.php";
        </script>';
        
      
    } catch (Exception $e) {
        echo '<script>alert("Message not sent");</script>';
    }
}
?>

<div class="container-fluid hero-background image">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid p-0 m-0 mt-3">
            <h3 class="me-4 font">Travel Story</h3>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link active text-light fw-bold"
                            aria-current="page"
                            href="#"
                            ><h5>Home</h5></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#"
                            ><h5>About</h5></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#"
                            ><h5>Contact us</h5></a
                        >
                    </li>
                </ul>
                <form class="d-flex me-2" method="POST" action="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-2">
                            <a
                                href="login.php"
                                class="btn btn-lg bg-primary text-light"
                                type="submit"
                            >
                                login
                            </a>
                        </li>
                    </ul>
                    <a
                        href="registration.php"
                        class="btn btn-lg bg-primary text-light"
                        type="submit"
                    >
                        signup
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <!--  -->
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div></div>
            </div>
        </nav>
        <div class="col-md-4"></div>
        <div class="col-md-4 home-opacity p-3">
            <div class="clear"></div>

            <h3 class="text-center mb-3 homehead" id="str"></h3>

            <!-- form starting-->
            <div class="card">
            <div class="card-header text-center">
              Send Reset Password Link with Expiry Time in PHP MySQL
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
          </div>

            <!-- form ending-->
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php
require "footer.php";
?>