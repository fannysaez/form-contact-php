* J'ai travaillé sur ce projet avec [**@Anto**](https://github.com/HeyAnto) 
* Merci pour l'aide du formateur [**@GuillaumePons63**](https://github.com/GuillaumePons63)

## Formulaire de Contact PHP<br>
Réalisation d'un formulaire de contact en PHP

## Description du Projet

* Ce projet consiste en la création d'un formulaire de contact intuitif et sécurisé, entièrement développé en Php 
* Il offre  aux utilisateurs la possibilité de renseigner leurs coordonnées via à une interface simple, puis d'envoyer ces informations par e-mail grâce à l'intégration de la bibliothèque [**PHPMailer**](https://github.com/PHPMailer/PHPMailer).
* Pour une gestion sécurisée des configurations, le projet utilise également la bibliothèque [**PHP dotenv**](https://github.com/vlucas/phpdotenv) permettant de charger les variables d'environnement depuis un fichier `.env`. 
* Ce travail a été réalisé dans le cadre d'un brief intitulé "Réaliser un formulaire de contact avec Php" [**SIMPLON**](https://www.simplon.co/).

## Prérequis

* **PHP 8.0** ou supérieur
* [**Composer 2.8.1**](https://getcomposer.org/) ou supérieur
* Un serveur SMTP pour l'envoi d'emails (ex: Gmail, etc.)

## 🗂️ Structure du Projet

```bash
 Form Contact PHP
 ┣ 📂assets                  --> Ressources du projet (CSS, etc...)
 ┃ ┣ 📜.env.exemple          --> Exemple de fichier d’environnement (modifiez les valeurs)
 ┃ ┣ 📂css                   --> Dossier contenant les fichiers CSS
 ┃ ┃ ┗ 📝styles.css          --> Feuille de style principale
 ┣ 📂src                     --> Dossier pour le code src (ajoutez vos classes, fonctions, etc.)
 ┣ ⚙️.gitignore              --> Fichier pour exclure certains fichiers/dossiers du dépôt Git
 ┣ 📜composer.json           --> Dépendances du projet (utilisation de composer)
 ┣ 📜composer.lock           --> Verrouillage des versions des dépendances
 ┣ 📄index.php               --> Page principale contenant le formulaire de contact
 ┗ 📄traitementMail.php      --> Script qui gère l’envoi des emails
```

## Procédure d'installation de git clone

## Cloner le dépôt GitHub :
- Ouvrez l'invite de commande <b>(cmd)</b> ou <b>Git Bash.</b><br><br>

* Commencez par cloner le dépôt sur votre machine locale :<br>
* Une fois le dépôt cloné, il est nécessaire d'installer les dépendances du projet.<br>
* Pour ce faire, exécutez la commande suivante dans le terminal à la racine du projet :<br>

```bash
git clone https://github.com/fannysaez/Form-Contact-Php.git
cd Form-Contact-Php
```

Cela installera toutes les dépendances définies dans le fichier composer.json, <br>
telles que PHPMailer et PHP dotenv, et les stockera dans le dossier vendor.

# Installation de Composer <br>

## Étape 1 : Télécharger Composer <br>
- Sur Windows, téléchargez l'installateur Composer depuis [getcomposer.org.](https://getcomposer.org/Composer-Setup.exe). <br>

## Étape 2: Installer Composer globalement

- L'installateur devrait déjà avoir configuré Composer pour être accessible globalement.</b><br>

## Étape 3: Vérifier l'installation

```bash
composer --version
```

# Installation des packages avec Composer <br>
2. Mise en avant des dépendances, deux bibliothèques principales sont utilisées dans le projet : PHPMailer et PHP dotenv<br>

### Dépendances<br>
Ce projet utilise les bibliothèques suivantes :

[**PhpMailer**](https://github.com/PHPMailer/PHPMailer) : pour l'envoi de emails via SMTP,<br>
[**Php dotenv**](https://github.com/vlucas/phpdotenv) : pour gérer les variables d'environnement comme les paramètres SMTP.

Ces bibliothèques sont installées via Composer et sont nécessaires pour le bon fonctionnement du formulaire de contact.

3. Liens vers la documentation composer<br>

Pour plus de détails sur l'utilisation de Composer, consultez la [**documentation officielle de Composer**](https://getcomposer.org/doc/)

## Étape 1: Installer un projet Composer

* Si vous démarrez un nouveau projet, utilisez composer init, mais dans ce projet, exécutez directement composer install. <br>

```bash
composer install
```

## Étape 2: Pour installer PhpMailler, utilisation de la commande suivante :

```bash
composer require phpmailer/phpmailer
```
Cela ajoutera PhpMailer à votre projet et créera un fichier <b> composer.json </b> et un dossier <b> vendor </b><br>

# Configuration des variable d'environnements avec .env <br>

## Étape 1: Installer vlucas/phpdotenv <br>
Pour gérez les variables d'environnements, utilisation du package <b>vlucas/phpdotenv</b><br>

```bash
composer require vlucas/phpdotenv
```

## Étape 2: Configuration SMTP pour PhpMailer <br>

```bash

SMTP_HOST=smtp.exemple.com
SMTP_USER=ton_email@example.com
SMTP_PASS=ton_mot_de_passe
SMTP_PORT=587

```
<br>

## Étape 3: Créer un fichier .env <br>
Créez un fichier <b>.env</b> à la racine de votre projet et ajoutez les variables d'environnement :<br>

```bash

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Récupération des variables d'environnement
$mailHost = $_ENV['SMTP_HOST'];
$mailUser = $_ENV['SMTP_USER'];
$mailPass = $_ENV['SMTP_PASS'];
$mailPort = $_ENV['SMTP_PORT'];

```
<br>

# Vérification d'installation <b>PhpMailer</b> & <b>phpdotenv</b><br>

```bash
composer show phpmailer/phpmailer
composer show vlucas/phpdotenv

```
<br>


# Utilisation de PhpMailer : </br>
## Envoi d'e-mail avec SMTP <br>

``` bash

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Si installé avec Composer

$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Serveur SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ton-email@gmail.com'; // Ton email
    $mail->Password   = 'ton-mot-de-passe'; // Ton mot de passe ou App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; 

    // Destinataire
    $mail->setFrom('ton-email@gmail.com', 'Ton Nom');
    $mail->addAddress('destinataire@example.com', 'Nom Destinataire');

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Sujet du mail';
    $mail->Body    = 'Ceci est un <b>email</b> envoyé avec PHPMailer.';
    
    $mail->send();
    echo 'E-mail envoyé avec succès';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi du mail : {$mail->ErrorInfo}";
}
?>

```

# Explication des paramètres SMTP : <br>

* Host : smtp.gmail.com
* SMTPSecure : PHPMailer::ENCRYPTION_STARTTLS (ou PHPMailer::ENCRYPTION_SMTPS pour SSL sur le port 465)
* Port : 587 pour TLS, 465 pour SSL
* Authentification : Active avec SMTPAuth = true

## Vérifier l'installation :<br>
Un dossier <b>vendor</b> et un fichier <b>composer.json</b> doivent maintenant être présents dans votre projet.<br>
``` bash
{
    "require": {
        "phpmailer/phpmailer": "^6.8"
    }
}

```
<br>

# Explication :<br>
* require : Liste des dépendances du projet.
* phpmailer/phpmailer": "^6.8" : Installe la version 6.8 ou plus récente.<br>

## 1. Accéder au formulaire de contact php<br>
* Ouvrir le fichier 
```bash 
index.php 
``` 
<br>

* Le formulaire est prêt à être utilisé <br>

## 2. Soumettre le formulaire de contact <br>
* Remplir les champs requis suivant : <br>

```bash 
nom, prénom, email, objet, message
```

* Cliquez sur le bouton <b>Envoyer<b>.

# Tester l'envoi d'e-mail :<br>
* Ouvrez votre navigateur et accédez à

``` bash
http://localhost/Form-Contact-Php/traitementMail.php.
```
<br>

* Si tout est bien configuré, tu devrais voir le message "E-mail envoyé avec succès ✅"<br>

## 3. Vérifier l'e-mail<br>
Dans le fichier :

```bash 
traitementMail.php
```
Le destinataire à été configuré et recevra un mail avec toutes les informations du formulaire de contact.<br>

## Documentations et Guide Utiles

* [**Documentation PHPMailer**](https://github.com/PHPMailer/PHPMailer)
* [**Documentation PHP dotenv**](https://github.com/vlucas/phpdotenv)
* [**Guide Composer**](https://getcomposer.org/doc/)