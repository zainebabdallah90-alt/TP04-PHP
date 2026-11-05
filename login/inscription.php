
<?php

$erreurs = [];
$username = "";
$passwordHash = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';

    if (empty($username)) {
        $erreurs[] = "Le nom d'utilisateur est obligatoire.";
    }

    if (strlen($password) < 6) {
        $erreurs[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }

    if ($password !== $confirmation) {
        $erreurs[] = "Les mots de passe ne sont pas identiques.";
    }

    if (empty($erreurs)) {

        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        echo "Inscription réussie.";

        echo "<br>Nom d'utilisateur : " .
             htmlspecialchars($username);

        echo "<br>Mot de passe hashé : " .
             htmlspecialchars($passwordHash);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

<h1>Créer un compte</h1>

<form method="POST">

    <label>Nom d'utilisateur :</label>
    <input type="text" name="username"
           value="<?= htmlspecialchars($username) ?>">

    <br><br>

    <label>Mot de passe :</label>
    <input type="password" name="password">

    <br><br>

    <label>Confirmer le mot de passe :</label>
    <input type="password" name="confirmation">

    <br><br>

    <button type="submit">S'inscrire</button>

</form>

<?php foreach ($erreurs as $erreur): ?>
    <p><?= htmlspecialchars($erreur) ?></p>
<?php endforeach; ?>

</body>
</html>
