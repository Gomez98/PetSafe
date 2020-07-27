<?php
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];
        $fechanac = $_POST['fechanac'];
        switch ($_POST["sexo"]) {
            case 1:
            $gen = "Masculino";
            break;
            case 2:
            $gen = "Femenino";
            break;
            case 3:
            $gen = "Prefiere no decirlo";
            break;
            default:
            break;
        }
        $mensaje = $_POST["mensaje"];
        $idioma = $_POST["idioma"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Información</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/tabla.css">
</head>
<body>

<header>
        <div class="logo logo_main">PetSafe-UTP</div>

        <div class="nav">
            <div class="wrap">
                <div class="logo logo_small">PetSafe-UTP</div>
                <nav class="menu">
                    <ul>
                        <li><a class="link" href="index.html">Inicio</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                        <li><a href="logIn.html">Log in</a></li>
                        <li><a href="intranetlogin.html">Intranet</a></li>
                    </ul>
                </nav>
            </div>
        </div>
</header>
   
<table >
    <div>
        <h1 class="mensaje">Su mensaje ha sido enviado</h1>
        <h3 class="mensaje-detalle">Gracias por comunicarte con nosotros</h3>
    </div>
    <tbody>
        <tr>
            <td>Nombre</td>
            <td><?= $nombre ?></td>
        </tr>
        <tr>
            <td>Correo</td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td>
            <td><?= $fechanac ?></td>
        </tr>
        <tr>
            <td>Género</td>
            <td><?= $gen ?></td>
        </tr>
        <tr>
            <td>Idioma</td>
            <td><?php
                foreach($idioma as $i){
                    switch ($i) {
                        case '1':
                            echo "Español <br/>";
                            break;
                        case '2':
                            echo "Inglés <br/>";
                            break;
                        case '3':
                            echo "Portugués <br/>";
                            break;
                    }
                    
                }?>
            </td>
        </tr>
        <tr>
            <td>Comentarios</td>
            <td><?= $mensaje ?></td>
        </tr>
    </tbody>
</table>
<i class="fas fa-ellipsis-v btn-menu"></i>
<footer class="footer">&copy all rights reserved</footer>
</body>
</html>



<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';
enviarEmail();

function enviarEmail(){
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])
    && isset($_POST['fechanac']) && isset($_POST['sexo'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];
        $gen = $_POST['sexo'];
    }
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug =  0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'petsafe.utp@hotmail.com';                     // SMTP username
        $mail->Password   = 'Petsafeutp#1';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('petsafe.utp@hotmail.com', $email);
        $mail->addAddress('petsafe.utp@hotmail.com', '');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Correo de contacto';
        $mail->Body    = 'Nombre: ' . $nombre . '<br/>Correo: ' . $email . '<br/>Mensaje: ' . $mensaje
                        . '<br/>Genero:' . $gen ;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>