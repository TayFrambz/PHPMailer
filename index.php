<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    //$mail->SMTPSecure = 'tsl';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'example@gmail.com';
    $mail->Password = 'password';
    $mail->Port = 25;

    $mail->setFrom('example@gmail.com');
    $mail->addAddress('exemplo@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Teste email';
    $mail->Body = 'Teste de envio';
    $mail->AltBody = 'Chegou o email teste';

    if($mail->send()) {
        echo 'Email enviado';
    } else {
        echo 'Email não enviado';
    }

} catch (Exception $e) {
    echo "Erro ao enviar mensagem {$mail->ErrorInfo}";
};
