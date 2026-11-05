# TP04-PHP
# TP 4 — Sessions, Cookies et Authentification en PHP

**Matière :** Développement côté serveur  
**Niveau :** 2ème année Licence  
**Langage :** PHP  
**Environnement :** Ubuntu 24.04, Visual Studio Code et serveur intégré PHP  
**Projet :** Gestion des étudiants

---

## 1. Objectifs du TP

L'objectif de ce TP est de comprendre le fonctionnement des sessions et des cookies en PHP et de créer un système simple d'authentification.

À la fin de ce TP, nous avons appris à :

- Démarrer une session avec `session_start()`.
- Stocker et récupérer des informations avec `$_SESSION`.
- Détruire une session.
- Créer, lire et supprimer des cookies.
- Créer un formulaire de connexion.
- Vérifier les identifiants d'un utilisateur.
- Protéger les pages privées.
- Créer un système de déconnexion.
- Sécuriser les mots de passe avec `password_hash()` et `password_verify()`.
- Utiliser `htmlspecialchars()` pour sécuriser l'affichage des données.

## 2. Préparation du projet

Création du dossier du TP :

```bash
cd ~/tpphp
mkdir tp04-php
cd tp04-php
mkdir exercices
code .
```

Lancement du serveur PHP :

```bash
php -S localhost:8000
```

Adresse du projet :

```text
http://localhost:8000
```

## 3. Activités réalisées

### Activité 1 — Comprendre le problème HTTP

HTTP est un protocole sans état (stateless). Cela signifie que le serveur ne conserve pas automatiquement les informations d'une requête à une autre.

Pour reconnaître un utilisateur entre plusieurs pages, on utilise les sessions ou les cookies.

### Activité 2 — Première session PHP

Nous avons utilisé `session_start()` pour démarrer une session et `$_SESSION` pour stocker une information.

```php
<?php
session_start();

$_SESSION['nom'] = "Ahmed";

echo "Session créée.";
?>
```

### Activité 3 — Lire une variable de session

Nous avons récupéré la variable enregistrée dans la session :

```php
<?php
session_start();

echo "Bonjour " . $_SESSION['nom'];
?>
```

### Activité 4 — Plusieurs informations dans la session

Nous avons stocké plusieurs informations concernant un étudiant :

```php
<?php
session_start();

$_SESSION['nom'] = "Ahmed";
$_SESSION['prenom'] = "Ali";
$_SESSION['formation'] = "Informatique";
$_SESSION['age'] = 20;
$_SESSION['email'] = "ahmed@gmail.com";
?>
```

### Activité 5 — Vérifier l'existence d'une session

Nous avons utilisé `isset()` pour vérifier si une variable de session existe.

```php
<?php
session_start();

if (isset($_SESSION['nom'])) {
    echo "Bienvenue dans votre espace privé.";
} else {
    echo "Accès refusé.";
}
?>
```

### Activité 6 — Détruire une session

Pour déconnecter un utilisateur et supprimer les informations de sa session, nous avons utilisé :

```php
<?php
session_start();

session_unset();
session_destroy();

echo "Vous êtes déconnecté.";
?>
```

### Activité 7 — Créer un cookie

Nous avons créé un cookie avec une durée de validité d'une heure :

```php
<?php
setcookie("langue", "fr", time() + 3600);

echo "Cookie créé.";
?>
```

### Activité 8 — Lire un cookie

Nous avons utilisé `$_COOKIE` pour récupérer la valeur d'un cookie :

```php
<?php
if (isset($_COOKIE['langue'])) {
    echo "Langue : " . $_COOKIE['langue'];
} else {
    echo "Cookie absent.";
}
?>
```

### Activité 9 — Supprimer un cookie

Pour supprimer un cookie, nous avons utilisé une date d'expiration passée :

```php
<?php
setcookie("langue", "", time() - 3600);
?>
```

### Activité 10 — Session ou cookie ?

Nous avons étudié les différences entre les sessions et les cookies :

| Caractéristique | Session | Cookie |
|---|---|---|
| Stockage principal | Serveur | Navigateur |
| Durée de vie | Jusqu'à expiration ou destruction | Selon la date d'expiration |
| Mémoriser un utilisateur | Oui | Oui |
| Envoyé avec les requêtes HTTP | Identifiant de session | Oui |
| Accessible côté navigateur | Non, les données restent côté serveur | Oui |

### Activités 11 et 12 — Première authentification

Nous avons créé un formulaire de connexion avec deux champs : nom d'utilisateur et mot de passe.

Pour tester l'authentification, nous avons utilisé :

- Nom d'utilisateur : `admin`
- Mot de passe : `123456`

Le programme vérifie les informations saisies et affiche un message de connexion réussie ou d'identifiants incorrects.

### Activité 13 — Mémoriser l'utilisateur connecté

Après une connexion réussie, nous avons enregistré les informations de l'utilisateur dans la session :

```php
session_start();

$_SESSION['username'] = $username;
$_SESSION['connecte'] = true;
```

Cela permet de reconnaître l'utilisateur lorsqu'il consulte les autres pages.

### Activité 14 — Protéger une page

Nous avons créé une page `dashboard.php` accessible uniquement aux utilisateurs connectés.

```php
<?php
session_start();

if (!isset($_SESSION['connecte']) ||
    $_SESSION['connecte'] !== true) {
    header("Location: login.php");
    exit;
}
?>
```

### Activité 15 — Créer la déconnexion

Nous avons utilisé `session_unset()` et `session_destroy()` pour supprimer la session, puis rediriger l'utilisateur vers la page de connexion.

```php
<?php
session_start();

session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
```

### Activités 16 et 17 — Sécuriser les mots de passe

Nous avons découvert deux fonctions importantes :

- `password_hash()` : permet de transformer un mot de passe en une empreinte sécurisée.
- `password_verify()` : permet de vérifier un mot de passe avec son empreinte.

Exemple :

```php
$password = "123456";

$hash = password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password, $hash)) {
    echo "Mot de passe correct.";
} else {
    echo "Mot de passe incorrect.";
}
```

### Activité 18 — Simuler un utilisateur

Nous avons créé un utilisateur de test avec un mot de passe sécurisé à l'aide de `password_hash()`.

La vérification du mot de passe se fait avec `password_verify()`.

### Activités 19 et 20 — Intégration et protection des pages

Nous avons intégré le système d'authentification dans le projet Gestion des étudiants.

Nous avons également créé deux fonctions dans `fonctions.php` :

- `estConnecte()` : vérifie si l'utilisateur est connecté.
- `protegerPage()` : empêche l'accès aux pages privées sans authentification.

Ces fonctions permettent d'éviter la répétition du même code dans plusieurs pages.

### Activité 21 — Afficher l'utilisateur connecté

Nous avons utilisé `htmlspecialchars()` pour afficher le nom de l'utilisateur de manière sécurisée :

```php
echo "Bienvenue " . htmlspecialchars($_SESSION['username']);
```

### Activités 22 — Mini-projet

Nous avons préparé un système d'authentification pour l'application Gestion des étudiants.

Avant la connexion, l'utilisateur doit accéder uniquement à `login.php`.

Après la connexion, il peut accéder aux pages :

- `dashboard.php`
- `ajouter.php`
- `rechercher.php`
- `modifier.php`
- `supprimer.php`

La déconnexion permet de détruire la session et de rediriger l'utilisateur vers `login.php`.

## 4. Questions de synthèse

**1. Qu'est-ce qu'une session ?**  
Une session est un mécanisme qui permet de conserver des informations sur un utilisateur entre plusieurs requêtes HTTP.

**2. Pourquoi session_start() est-il nécessaire ?**  
Il permet de démarrer ou de reprendre une session existante.

**3. Quel est le rôle de $_SESSION ?**  
Elle permet de stocker et de récupérer des informations côté serveur.

**4. Qu'est-ce qu'un cookie ?**  
Un cookie est une petite information enregistrée dans le navigateur de l'utilisateur.

**5. Quelle différence existe entre cookie et session ?**  
La session stocke les données sur le serveur, tandis que le cookie stocke les données dans le navigateur.

**6. Quel est le rôle de $_COOKIE ?**  
Elle permet de lire les cookies envoyés par le navigateur.

**7. Pourquoi utilise-t-on session_destroy() ?**  
Pour détruire la session et terminer la connexion de l'utilisateur.

**8. Pourquoi ne faut-il pas stocker les mots de passe en clair ?**  
Parce qu'ils peuvent être lus directement en cas d'accès non autorisé aux données.

**9. Quel est le rôle de password_hash() ?**  
Elle permet de créer une empreinte sécurisée d'un mot de passe.

**10. Quel est le rôle de password_verify() ?**  
Elle permet de vérifier si un mot de passe correspond à une empreinte.

**11. Pourquoi une page d'administration doit-elle être protégée ?**  
Pour empêcher les utilisateurs non connectés d'accéder aux informations privées.

**12. Pourquoi créer une fonction protegerPage() ?**  
Pour réutiliser le code de protection dans plusieurs pages.

**13. Pourquoi utiliser htmlspecialchars() ?**  
Pour éviter l'interprétation de caractères HTML dangereux lors de l'affichage des données utilisateur.

## 5. Travail pratique à faire à la maison

Le travail demandé consiste à créer une page `inscription.php` permettant à un utilisateur de créer un compte.

Le formulaire contient :

- Nom d'utilisateur.
- Mot de passe.
- Confirmation du mot de passe.

Le programme doit vérifier que le nom d'utilisateur n'est pas vide, que le mot de passe contient au moins 6 caractères et que les deux mots de passe sont identiques.

Avant le stockage, le mot de passe doit être sécurisé avec `password_hash()`.

## 6. Bilan du TP

Dans ce TP, nous avons appris à utiliser les sessions et les cookies en PHP. Nous avons également réalisé un système simple d'authentification avec connexion, déconnexion et protection des pages.

Nous avons découvert les fonctions permettant de sécuriser les mots de passe et l'affichage des données utilisateur.

Ce TP constitue une étape importante dans le développement de notre application Gestion des étudiants et prépare le prochain TP consacré à la manipulation des fichiers et du format JSON.
