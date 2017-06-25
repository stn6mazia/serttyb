`<?php
require './PHPMailer-master/PHPMailerAutoload.php';
header('Content-Type: application/json');
$name = $_POST['name'];
$mail = $_POST['email'];
$message = $_POST['mssg'];
$telefone = $_POST['telefone'];

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'http://www.serttyb.com.br/';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contato@serttyb.com.br';                 // SMTP username
$mail->Password = 'contato2016';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 993;                                    // TCP port to connect to

$mail->setFrom($_POST['email'], $_POST['fname']);
// Add a recipient
$mail->addAddress('contato@serttyb.com.br');               // Name is optional


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Contato Site Serttyb";
$mail->Body    = "Nome: $name - Phone $telefone";
$mail->AltBody = $message;
if(!$mail->send()) {
echo 'Message could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent';
    }
    ?>`
