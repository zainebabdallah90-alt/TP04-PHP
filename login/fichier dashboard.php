
<?php
session_start();

require_once "fonctions.php";

protegerPage();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Gestion des étudiants</h1>

<p>
    Bienvenue <?= htmlspecialchars($_SESSION['username']) ?>
</p>

<ul>
    <li><a href="ajouter.php">Ajouter un étudiant</a></li>
    <li><a href="rechercher.php">Rechercher un étudiant</a></li>
    <li><a href="modifier.php">Modifier un étudiant</a></li>
    <li><a href="supprimer.php">Supprimer un étudiant</a></li>
    <li><a href="profil.php">Mon profil</a></li>
    <li><a href="logout.php">Se déconnecter</a></li>
</ul>

</body>
</html>
