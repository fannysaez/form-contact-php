# Formulaire de Contact PHP
Réalisation d'un formulaire de contact en PHP

## Procédure d'installation de git clone
Pour <b>cloner un dépôt Git</b> dans un dossier sur votre machine locale sous <b>Windows</b> :

## Installer Git :
- Téléchargez et installez Git depuis <b> [git-scm.com](https://git-scm.com)
  </b><br>
- Vérifiez l'installation en exécutant <b>git --version </b>dans l'invite de commande.

## Cloner le dépôt :
- Ouvrez l'invite de commande <b>(cmd)</b> ou <b>Git Bash.</b><br><br>
  <img src="/assets/img/Depot Git/screenshot.png"></br>

## Accéder au dossier cloné :
<img src="/assets/img/Depot Git/screenshot-1.png"></br>

## Installation de Composer <br>

## Étape 1 : Télécharger Composer <br>
- Sur Windows, téléchargez l'installateur Composer depuis [getcomposer.org.](https://getcomposer.org/Composer-Setup.exe). <br>

## Étape 2: Installer Composer globalement
- L'installateur devrait déjà avoir configuré Composer pour être accessible globalement.</b><br>

## Étape 3: Vérifier l'installation
<img src="/assets/img/composer-packages/screenshot-2.png"></br>

## Installation des packages avec Composer <br>
<img src="/assets/img/composer-packages/screenshot-3.png"></br>
<img src="/assets/img/phpMailer/screenshot-4.png"></br>
<img src="/assets/img/phpMailer/screenshot-5.png"></br>

- SMTP_HOST= smtp.example.com</br>
- SMTP_USER= your-email@example.com</br>
- SMTP_PASSWORD= your-email-password</br>

<img src="/assets/img/Variables env/screenshot-6.png"></br>

## Utilisation de PhpMailer : </br>
<img src="/assets/img/Variables env/screenshot-7.png"></br>
<img src="/assets/img/Variables env/screenshot-8.png"></br>

Composer téléchargera PHPMailer et ses dépendances dans le dossier <b>vendor.</b><br>

## Vérifier l'installation :<br>
Un dossier <b>vendor</b> et un fichier <b>composer.json</b> doivent maintenant être présents dans votre projet.<br>
- Utiliser PHPMailer pour envoyer des e-mails:<br><br>
<img src="/assets/img/composer-packages/screenshot-3-1.png"></br><br>

<img src="/assets/img/phpMailer/screenshot-5-1.png"><br>

## Tester l'envoi d'e-mail :<br>

* Ouvrez votre navigateur et accédez à http://localhost/mon_projet/sendmail.php.<br>

* Si tout est configuré correctement, vous devriez voir le message "L'e-mail a été envoyé avec succès."<br>

## Configuration de .gitignore : </br>
<img src="/assets/img/gitignore/screenshot-9.png"></br>

## Résumé des fichiers : </br>

## composer.json : Liste des dépendances et configuration du projet.</br>
<img src="/assets/img/composer-packages/composer-jason.png"></br>

## composer.lock : Verrouillage des versions des dépendances.
<img src="/assets/img/composer-packages/composer-lock.png"></br>

## env : Variables d'environnement.</br>
<img src="/assets/img/Variables env/env.png"></br>
<img src="/assets/img/Variables env/env-example.png"></br>

## gitignore : Fichiers à ignorer dans Git.</br>
<img src="/assets/img/gitignore/screenshot-9-1.png"></br>

## endor/ : Dossier contenant les dépendances installées par Composer.</br>

## Mettre à jour les dépendances :</br>
Si vous clonez un projet existant, vous pouvez installer les dépendances avec :<br>
<img src="/assets/img/gitignore/screenshot-10.png"></br>