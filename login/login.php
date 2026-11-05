
<?php
session_start();

require_once "utilisateur.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (
        $username === $utilisateur['username'] &&
        password_verify($password, $utilisateur['password'])
    ) {

        $_SESSION['username'] = $username;
        $_SESSION['connecte'] = true;

        header("Location: dashboard.php");
        exit;

    } else {
        $message = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<form method="POST">

    <label>Nom d'utilisateur :</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Se connecter</button>

</form>

<p><?= htmlspecialchars($message) ?></p>

</body>
</html>
