<script>
    window.location.reload();
</script>

<?php

// Register Users and Send A email for register users;

unset($_SESSION['Already Exists']);

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if($email){
    $statement = $conn['db']->query("select * from users where email ='$email'");
    $exists = $statement->fetchAll();

    if($exists){
        $_SESSION['Already Exists'] = "Already Exists";
        header('Location:/registration');
    }
    else{
        $statement = $conn['db']->query("INSERT into users (name,email,password) values ('$username ','$email', md5('$password'))");

        $_SESSION['login'] = [
            'email' => $email
        ];
//Load Composer's autoloader
//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lokeshcdckap@gmail.com';                     //SMTP username
        $mail->Password   = 'noeqfyymtrpfjxas';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('lokeshcdckap@gmail.com', 'Mailer');
        $mail->addAddress($email, 'My Music App');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Content
        $mail->isHTML(true);                          //Set email format to HTML
        $mail->Subject = 'Thank You For Registration';
        $mail->Body    = 'Hello Buddy,Thank you for Registration<b>!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        header('location:/');
        // echo 'Message has been sent';  
    }



    $statement = $conn['db']->query("select name from users where email ='$email'");
    $exists = $statement->fetchAll();
    
    foreach($exists as $exist){
        $_SESSION['name'] = $exist['name'];
    }


    $statement = $conn['db']->query("select id from users where email ='$email'");
    $exists = $statement->fetchAll();
    $_SESSION['id'] = $exists[0]['id'];


}









