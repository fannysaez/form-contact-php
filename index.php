<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <link href="/assets/css/styles.css" rel="stylesheet">
</head>

<body>

      <main>
        <h1>Formulaire de contact</h1>
        <form action="./traitementMail.php" method="POST">
            <div>
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" pattern="[A-Za-zÀ-ÿ\- ]+" required>
                </div>

                <div>
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" pattern="[A-Za-zÀ-ÿ\- ]+" required>
                </div>
            </div>

            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="objet">Objet :</label>
                <input type="text" id="objet" name="objet" required>
            </div>

            <div>
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <div>
            <input type="submit" value="Envoyer">
            <div>
        </form>
    </main>
</body>

</html>