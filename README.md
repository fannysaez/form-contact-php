- J'ai travaillé sur ce projet avec [**@Anto**](https://github.com/HeyAnto)
- Merci pour l'aide du formateur [**@GuillaumePons63**](https://github.com/GuillaumePons63)

## Formulaire de Contact PHP<br>

Réalisation d'un formulaire de contact en PHP

## Description du Projet

- Ce projet consiste en la création d'un formulaire de contact intuitif et sécurisé, entièrement développé en Php
- Il offre aux utilisateurs la possibilité de renseigner leurs coordonnées via à une interface simple, puis d'envoyer ces informations par e-mail grâce à l'intégration de la bibliothèque [**PHPMailer**](https://github.com/PHPMailer/PHPMailer).
- Pour une gestion sécurisée des configurations, le projet utilise également la bibliothèque [**PHP dotenv**](https://github.com/vlucas/phpdotenv) permettant de charger les variables d'environnement depuis un fichier `.env`.
- Ce travail a été réalisé dans le cadre d'un brief intitulé "Réaliser un formulaire de contact avec Php" [**SIMPLON**](https://www.simplon.co/).

## Prérequis

- **PHP 8.0** ou supérieur
- [**Composer 2.8.1**](https://getcomposer.org/) ou supérieur
- Un serveur SMTP pour l'envoi d'emails (ex: Gmail, etc.)

## 🗂️ Structure du Projet

```bash
 Form Contact PHP
 ┣ 📂assets                   --> Ressources du projet "images, fichiers CSS, etc".
 ┃ ┣ 📂css                    --> Dossier contenant les fichiers CSS
 ┃ ┃ ┗ 📝styles.css           --> Feuille de style principale
 ┣ 📂src                      --> Dossier pour le code source "ajout de classes, fonctions, etc".
 ┃ 📜.env.exemple             --> Exemple de fichier de configuration
 ┣ ⚙️.gitignore               --> Fichier pour exclure certains fichiers/dossiers du dépôt Git
 ┣ 📜composer.json            --> Dépendances du projet (utilisation de Composer)
 ┣ 📜composer.lock            --> Verrouillage des versions des dépendances
 ┣ 📄index.md                 --> Page principale du projet, expliquant sa structure et son objectif
 ┣ 📄README.md                --> Fichier d'introduction avec les instructions pour contribuer au projet
 ┗ 📄traitementMail.php        --> Script qui gère l'exécution des requêtes SQL et l'interaction avec la base de données
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

Pour plus de détails sur l'utilisation de Composer, consultez la [**documentation officielle de Composer**](https://getcomposer.org/doc/)<br>

### Différence entre composer install et composer require<br>

- **composer install** : installe toutes les dépendances définies dans le fichier composer.json.
- **composer require** (package): ajoute une nouvelle dépendance au projet (par exemple, composer require phpmailer/phpmailer).

## Installation des dépendances Composer

**Méthode recommandée (installe tout d'après composer.json) :**

```bash
composer install
```

**Ou pour installer directement les dépendances principales si besoin (ex : projet vierge ou ajout manuel) :**

```bash
composer require phpmailer/phpmailer vlucas/phpdotenv
```

> **Remarque :** `composer install` suffit si le fichier composer.json est déjà présent. La commande `composer require ...` est utile pour ajouter ces dépendances à un projet existant ou si tu repars de zéro.

---

**Remarques importantes :**

- Un simple `composer install` suffit à installer toutes les dépendances nécessaires (PHPMailer, PHP dotenv, etc.).
- Ne publiez jamais d’identifiants SMTP ou d’informations sensibles dans la documentation ou sur un dépôt public.
- Le mail du destinataire doit être configuré via la variable d’environnement `MAIL_TO` pour plus de souplesse.
- L’exemple d’utilisation de PHPMailer fourni est fonctionnel et à jour.

---

## Étape 2: Configuration SMTP pour PhpMailer <br>

```env

MAIL_NAME="Nom de l'expéditeur"
MAIL_HOST="sandbox.smtp.mailtrap.io"
MAIL_USERNAME="67c1f58af19b7b"
MAIL_PASSWORD="7f3b5130bc58d7"
MAIL_PORT="2525"

```

<br>

## Étape 3: Créer un fichier .env <br>

Créez un fichier <b>.env</b> à la racine de votre projet et ajoutez les variables d'environnement :<br>

```php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Récupération des variables d'environnement
$mailName = $_ENV['MAIL_NAME'];
$mailHost = $_ENV['MAIL_HOST'];
$mailUser = $_ENV['MAIL_USERNAME'];
$mailPass = $_ENV['MAIL_PASSWORD'];
$mailPort = $_ENV['MAIL_PORT'];

```

<br>

**Configurer le destinataire**
<br>
Dans le fichier `mail.php`, modifiez l'adresse email du destinataire :

```php
$mail->addAddress("destinataire@example.com");
```

## Utilisation

**1. Accéder au formulaire**

- Ouvrez le fichier `index.php` dans votre navigateur pour accéder au formulaire.

- Le formulaire est prêt à être utilisé après avoir configuré les variables d'environnement (voir la section [Installation](#installation)).

<br>

**Soumettre le formulaire**

- Remplissez les champs requis (prénom, nom, email, objet et message).

- Cliquez sur "Envoyer". Si tout est correct, un message de succès s'affichera. Sinon, un message d'erreur indiquera les problèmes rencontrés.

<br>

# Vérification d'installation <b>PhpMailer</b> & <b>phpdotenv</b><br>

```bash
composer show phpmailer/phpmailer
composer show vlucas/phpdotenv

```

<br>

# Utilisation de PhpMailer : </br>

## Envoi d'e-mail avec SMTP <br>

```php

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
    $mail->setFrom($email, $_ENV['MAIL_NAME']);
    $mail->addAddress('joe@example.net', 'Joe User');
    $mail->addReplyTo($email, $nom);

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = $objet;
    $mail->Body    = "Prénom: $prenom<br>Nom: $nom<br>Email: $email<br>Message: $message";
    $mail->AltBody = "Prénom: $prenom\nNom: $nom\nEmail: $email\nMessage: $message";

    $mail->send();
        echo "Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "Une erreur est survenue lors de l'envoi de l'e-mail. Veuillez réessayer.";
    }

```

# Explication des paramètres SMTP : <br>

- Host : smtp.gmail.com
- SMTPSecure : PHPMailer::ENCRYPTION_STARTTLS (ou PHPMailer::ENCRYPTION_SMTPS pour SSL sur le port 465)
- Port : 587 pour TLS, 465 pour SSL
- Authentification : Active avec SMTPAuth = true

## Vérifier l'installation :<br>

Un dossier <b>vendor</b> et un fichier <b>composer.json</b> doivent maintenant être présents dans votre projet.<br>

```json
{
  "require": {
    "phpmailer/phpmailer": "^6.8"
  }
}
```

<br>

# Explication :<br>

- require : Liste des dépendances du projet.
- phpmailer/phpmailer": "^6.8" : Installe la version 6.8 ou plus récente.<br>

## 1. Accéder au formulaire de contact php<br>

- Ouvrir le fichier

```bash
index.php
```

<br>

- Le formulaire est prêt à être utilisé <br>

## 2. Soumettre le formulaire de contact <br>

- Remplir les champs requis suivant : <br>

```bash
nom, prénom, email, objet, message
```

- Cliquez sur le bouton <b>Envoyer<b>.

# Tester l'envoi d'e-mail :<br>

- Ouvrez votre navigateur et accédez à

```bash
http://localhost/Form-Contact-Php/traitementMail.php.
```

<br>

- Si tout est bien configuré, tu devrais voir le message "E-mail envoyé avec succès ✅"<br>

## 3. Vérifier l'e-mail<br>

Dans le fichier :

```bash
traitementMail.php
```

Le destinataire à été configuré et recevra un mail avec toutes les informations du formulaire de contact.<br>

## Documentations et Guide Utiles

- [**Documentation PHPMailer**](https://github.com/PHPMailer/PHPMailer)
- [**Documentation PHP dotenv**](https://github.com/vlucas/phpdotenv)
- [**Guide Composer**](https://getcomposer.org/doc/)
