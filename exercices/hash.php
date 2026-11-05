
<?php

$password = "123456";

$hash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

if (password_verify($password, $hash)) {
    echo "Mot de passe correct.";
} else {
    echo "Mot de passe incorrect.";
}

echo "<br><br>";

if (password_verify("abcdef", $hash)) {
    echo "Mot de passe correct.";
} else {
    echo "Mot de passe incorrect.";
}

?>
