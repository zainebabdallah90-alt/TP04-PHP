
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
    <title>Ajouter un étudiant</title>
</head>
<body>

<h1>Ajouter un étudiant</h1>

<form method="POST">

    <label>Nom :</label>
    <input type="text" name="nom" required>

    <br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom" required>

    <br><br>

    <label>Age :</label>
    <input type="number" name="age" required>

    <br><br>

    <button type="submit">Ajouter</button>

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $age = htmlspecialchars($_POST['age']);

    echo "<p>Etudiant ajouté : $nom $prenom, Age : $age</p>";
}
?>

<a href="dashboard.php">Retour</a>

</body>
</html>
