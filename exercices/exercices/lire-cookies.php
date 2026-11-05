
<?php

echo "Nom : " . htmlspecialchars($_COOKIE['nom'] ?? 'Absent') . "<br>";

echo "Theme : " . htmlspecialchars($_COOKIE['theme'] ?? 'Absent') . "<br>";

echo "Langue : " . htmlspecialchars($_COOKIE['langue'] ?? 'Absent');

?>
