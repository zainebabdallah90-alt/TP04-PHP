<a href="logout.php">Se déconnecter</a>
<?php
session_start();

session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
