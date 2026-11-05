
<?php
session_start();

if (!isset($_SESSION['connecte']) ||
    $_SESSION['connecte'] !== true) {

    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher un étudiant</title>
</head>
<body>

<h1>Rechercher un étudiant</h1>

<form method="GET">

    <label>Nom de l'étudiant :</label>
    <input type="text" name="nom" required>

    <button type="submit">Rechercher</button>

</form>

<?php
if (isset($_GET['nom'])) {

    $nom = htmlspecialchars($_GET['nom']);

    echo "<p>Recherche effectuée pour : $nom</p>";
}
?>

<a href="dashboard.php">Retour</a>

</body>
</html>
