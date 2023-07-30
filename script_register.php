<?php
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $password = $_POST["password"];

    // Votre requête pour insérer les données dans la table "client"
    $requete = $pdo->prepare("INSERT INTO client (PSEUDOCLIENT, TELEPHONECLIENT, MDP) VALUES (:pseudo, :telephone, :password)");
    $requete->bindParam(':pseudo', $pseudo);
    $requete->bindParam(':telephone', $telephone);
    $requete->bindParam(':password', $password);

    // Exécution de la requête
    if ($requete->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
