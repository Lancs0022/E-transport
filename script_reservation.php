<?php
session_start();

if (isset($_SESSION['nom']) && !empty($_SESSION['nom'])) {
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
        $heure_prevue = $_POST["heure_prevue"];
        $place_demande = htmlspecialchars($_POST["place_demande"]);
        $itineraire_demande = htmlspecialchars($_POST["itineraire_demande"]);
        $id_client = $_SESSION['user_id']; // Récupère l'ID du client à partir de la session

        // Votre requête pour insérer les données dans la table "reservation"
        $requete = $pdo->prepare("INSERT INTO reservation (IDCLIENT, HEUREPREVU, PLACEDEMANDE, ITINERAIREDEMANDE) VALUES (:id_client, :heure_prevue, :place_demande, :itineraire_demande)");
        $requete->bindParam(':id_client', $id_client);
        $requete->bindParam(':heure_prevue', $heure_prevue);
        $requete->bindParam(':place_demande', $place_demande);
        $requete->bindParam(':itineraire_demande', $itineraire_demande);

        // Exécution de la requête
        if ($requete->execute()) {
            echo "Réservation réussie !";
            header("Location: page_affichageReservations.php");
        } else {
            echo "Erreur lors de la réservation.";
        }
    }
} else {
    // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: page_login.php");
    exit();
}
?>
