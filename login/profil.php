
<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "Utilisateur connecté : " .
         htmlspecialchars($_SESSION['username']);
} else {
    echo "Aucun utilisateur connecté.";
}
?>
