
<?php
session_start();

$_SESSION['nom'] = "Ahmed";
$_SESSION['prenom'] = "Ali";
$_SESSION['formation'] = "Informatique";
$_SESSION['age'] = 20;
$_SESSION['email'] = "ahmed@gmail.com";

echo "Informations enregistrées dans la session.";
?>
