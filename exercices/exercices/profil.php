
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil étudiant</title>
</head>
<body>

<h1>Profil étudiant</h1>

<p>Nom : <?= htmlspecialchars($_SESSION['nom'] ?? '') ?></p>
<p>Prénom : <?= htmlspecialchars($_SESSION['prenom'] ?? '') ?></p>
<p>Formation : <?= htmlspecialchars($_SESSION['formation'] ?? '') ?></p>
<p>Age : <?= htmlspecialchars((string)($_SESSION['age'] ?? '')) ?></p>
<p>Email : <?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>

</body>
</html>
