<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPDebug = 3;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'ladrao23@gmail.com';
$mail->Password = 'discordiano';
$mail->Port = 587;

$mail->setFrom('ladrao23@gmail.com');
$mail->addReplyTo('ladrao23@gmail.com');
$mail->addAddress('ladrao23@gmail.com', 'EU');
//$mail->addAddress('email@email.com.br', 'Contato');
//$mail->addCC('email@email.com.br', 'Cópia');
//$mail->addBCC('email@email.com.br', 'Cópia Oculta')

$mail->isHTML(true);
$mail->Subject = 'Assunto do email';
$mail->Body    = 'Este é o conteúdo da mensagem em <b>HTML!</b>';
$mail->AltBody = 'Para visualizar essa mensagem acesse';
//$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');

if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada.';
}
echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";


?>
