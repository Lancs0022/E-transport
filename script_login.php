<?php
session_start();
$bdd = "e-transport";
$DB_DSN = 'mysql:host=localhost;dbname=' . $bdd;
$DB_USER = 'root';
$DB_PSWD = '';
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::ATTR_EMULATE_PREPARES => false
];

try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PSWD, $options);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

function login($nom, $password, $pdo) {
    $requete = $pdo->prepare("SELECT * FROM client WHERE NOMCLIENT = :nom");
    $requete->bindParam(':nom', $nom);
    $requete->execute();
    $client = $requete->fetch(PDO::FETCH_ASSOC);

    if ($client && $client['MDP'] === $password) {
        return $client;
    } else {
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $password = $_POST["password"];

    $client = login($nom, $password, $pdo);

    if ($client) {
        $_SESSION['user_id'] = $client['IDCLIENT'];
        $_SESSION['nom'] = $client['NOMCLIENT'];
        echo "Connexion réussie ! Bienvenue, " . $client['NOMCLIENT'] . "!";
        header("Location: page_reservation.php");
    } else {
        // Identifiants incorrects, afficher un message d'erreur à l'utilisateur.
        echo "nom ou mot de passe incorrect.";
    }
}
?>
