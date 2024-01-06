<?php

// require DIR ."/vendor/autoload.php";
require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($subject, $body, $email, $name, $html = false) {

    // Configuracion inicial de nuestro servidor
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '51019c5e9c50a1';
    $phpmailer->Password = '089eb52ccdf67f';

    //Añadiendo destinatarios
    $phpmailer->setFrom('contacto@miempresa.com', 'Mi empresa');
    $phpmailer->addAddress($email, $name); 

    //Content
    $phpmailer->isHTML($html);                                  //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;

    // Envío de correo
    $phpmailer->send();
}

?>