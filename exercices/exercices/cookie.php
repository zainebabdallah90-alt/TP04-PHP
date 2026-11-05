
<?php
setcookie("langue", "fr", time() + 3600);

echo "Cookie créé.";
if (isset($_COOKIE['langue'])) {
    echo "Langue : " . htmlspecialchars($_COOKIE['langue']);
} else {
    echo "Cookie absent.";
}
?>
