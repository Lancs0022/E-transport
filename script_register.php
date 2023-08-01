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

echo $_SERVER["REQUEST_METHOD"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Insert";
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $password = $_POST["password"];
    // $passwordConfirm = $_POST["confirm_password"];

    if($password != null){
        // Requête pour insérer les données dans la table "client"
        $requete = $pdo->prepare("INSERT INTO client (NOMCLIENT, PRENOMCLIENT, TELEPHONECLIENT, MDP) VALUES (:nom, :prenom, :telephone, :password)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':telephone', $telephone);
        $requete->bindParam(':password', $password);

        // Exécution de la requête
        if ($requete->execute()) {
            echo "Inscription réussie !";
            header('Location: page_login.php');
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
    else 
    {
        header('Location: page_register.php?erreur="La confirmation du mot de passe n\' est pas correcte"');
    }
}
?>
