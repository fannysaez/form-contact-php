<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function clearInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = clearInput($_POST['nom']);
    $prenom = clearInput($_POST['prenom']);
    $objet = clearInput($_POST['objet']);
    $email = clearInput($_POST['email']);
    $message = clearInput($_POST['message']);

    $errors = [];

    // Vérifier si les champs sont remplis
    if (empty($prenom)) {
        $errors[] = "Le prénom est requis.";
    }
    if (empty($nom)) {
        $errors[] = "Le nom est requis.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email est invalide.";
    }
    if (empty($objet)) {
        $errors[] = "L'objet est requis.";
    }
    if (empty($message)) {
        $errors[] = "Le message est requis.";
    }
}
if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
} else {
    // Envoi de l'email
    $mail = new PHPMailer(true);

    try {
        //utiliser les fichiers d'environnements
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['MAIL_HOST'];                 //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['MAIL_USERNAME'];                     //SMTP username
        $mail->Password   = $_ENV['MAIL_PASSWORD'];                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['MAIL_PORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("info@example.com"); //modifier adresse expédition (envoi)
        $mail->addAddress('joe@example.net', 'Joe User'); //ajouter une adresse    //Add a recipient
        $mail->addAddress('ellen@example.com'); //ajouter une adresse               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information'); //ajouter une réponse
        $mail->addCC('cc@example.com'); //ajouter cc
        $mail->addBCC('bcc@example.com'); //ajouter cci

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        // Character encoding
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";

        // Content
        $mail->isHTML(true);
        $mail->Subject = $objet;
        $mail->Body    = "Prénom: $prenom<br>Nom: $nom<br>Email: $email<br>Message: $message";
        $mail->AltBody = "Prénom: $prenom\nNom: $nom\nEmail: $email\nMessage: $message";

        $mail->send();
        echo "Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "Une erreur est survenue lors de l'envoi de l'e-mail. Veuillez réessayer.";

    }
}
