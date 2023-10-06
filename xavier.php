<?php

require_once ('config/config.inc.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

$HTML = "<html><body><div>Message TEST</div></body>";
$TEXT = "Message TEST";
$mail = new PHPMailer();
$mail->From = "support@roxade.fr";
$mail->FromName = "ROXADE";
$mail->IsSMTP();
$mail->Host = "mail.gandi.net";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "support@roxade.fr";
$mail->Password = "E*9hwvkPT7b7M4%yE";
$mail->Subject = mb_encode_mimeheader("Sujet de l'email");
$mail->Body = $HTML;
$mail->AltBody = $TEXT;
$mail->IsHTML(true);
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->addAddress("xavier.roche@free.fr");
$mail->Send();
echo 'Email sent successfully';



