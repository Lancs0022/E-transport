<?php
session_start();
echo isset($_SESSION['nom']);

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

    $id_client = $_SESSION['user_id']; // Récupère l'ID du client à partir de la session

    // Requête pour récupérer toutes les réservations d'un client spécifique
    $requete = $pdo->prepare("SELECT * FROM reservation WHERE IDCLIENT = :id_client");
    $requete->bindParam(':id_client', $id_client);
    $requete->execute();
    $reservations = $requete->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: page_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations du Client</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.php">
    <link rel="stylesheet" type="text/css" href="css/Stylereserve.php">
</head>

<body>
    <?php
    if (isset($_SESSION['nom'])) {
        echo "Connecté en tant que : " . $_SESSION["nom"];
    }
    ?>

    <div class="navbar">
        <div class="icon">
            <img src="Logo/ETRANS3-2_-_Copie-removebg-preview.png"width="300px"class="logo">
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="page_reservation.php">Faire une reservation</a></li>
                <li><a href="page_affichageReservations.php">Mes reservations</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div>
            <h1>Réservations du Client</h1>
            <?php
            if (isset($_SESSION['nom']) && !empty($_SESSION['nom'])) {
                if (count($reservations) > 0) {
                    // Affiche le tableau des réservations du client s'il en a fait
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Heure Prévue</th>
                                <th>Place Demandée</th>
                                <th>Itinéraire Demandé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reservations as $reservation) {
                                ?>
                                <tr>
                                    <td><?php echo $reservation['HEUREPREVU']; ?></td>
                                    <td><?php echo $reservation['PLACEDEMANDE']; ?></td>
                                    <td><?php echo $reservation['ITINERAIREDEMANDE']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo "Aucune réservation trouvée pour ce client.";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
