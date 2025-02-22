<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

function clearInput($data) {
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

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // Envoi de l'email
        $mail = new PHPMailer(true);

        try {
            // Utiliser les fichiers d'environnements
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // Désactiver le débogage pour l'utilisateur final
            $mail->isSMTP();
            $mail->Host       = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->Port       = $_ENV['MAIL_PORT'];

            // Recipients
            $mail->setFrom($email, $_ENV['MAIL_NAME']); // Utiliser MAIL_NAME pour le nom de l'expéditeur
            $mail->addAddress('joe@example.net', 'Joe User'); // Adresse du destinataire
            $mail->addReplyTo($email, $nom); // Adresse de réponse

            // Encodage des caractères
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
}?>