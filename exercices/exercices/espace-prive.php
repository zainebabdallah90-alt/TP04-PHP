
<?php
session_start();

if (isset($_SESSION['nom'])) {
    echo "Bienvenue dans votre espace privé.";
} else {
    echo "Accès refusé.";
}
?>
