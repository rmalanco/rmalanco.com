<?php
require "assets/vendor/PHPMailer/Exception.php";
require "assets/vendor/PHPMailer/PHPMailer.php";
require "assets/vendor/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// capturando datos de formulario de index.html

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$oMail = new PHPMailer();
$oMail->IsSMTP(); // activa el modo SMTP
$oMail->Host = "rmalanco.com"; // servidor SMTP
$oMail->Port = 587; // puerto SMTP
$oMail->SMTPSecure = "none"; // activa el cifrado de SMTP
$oMail->SMTPAuth = true; // activa la autenticación SMTP
$oMail->Username = "contacto@rmalanco.com"; // usuario SMTP
$oMail->Password = "Ih[AO+4!$1er"; // contraseña SMTP
$oMail->setFrom("contacto@rmalanco.com", "rmalanco.com"); // remitente
$oMail->addAddress("contacto@rmalanco.com", "rmalanco.com"); // destinatario
$oMail->Subject = $subject . ", recibido desde rmalanco.com"; // asunto
$oMail->Body = "Nombre: " . $name . "\nEmail: " . $email . "\nMensaje: " . $message; // cuerpo del mensaje

if (!$oMail->Send()) {
  echo "Error: " . $oMail->ErrorInfo;
} else {
  echo "Mensaje enviado correctamente";
}
