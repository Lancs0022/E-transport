<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" type="text/css" href="styles.php">
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['nom'])) {
        echo "Connecté en tant que : " . $_SESSION["nom"];
    }
    ?>

<div class="Navigation">
        <a href="index.php" class="bouton"><button>Aucceuil</button></a>
        <a href="page_register.php" class="bouton"><button>Register</button></a>
        <a href="page_login.php" class="bouton"><button>Login</button></a>
        <a href="page_reservation.php" class="bouton"><button>Reservation</button></a>
        <a href="page_affichageReservations.php" class="bouton"><button href="page_affichageReservations.php">Liste de reservation</button></a>
    </div>

    <div class="container">
        <div>
            <img src="" alt="">
        </div>

        <div>
            <h1>Réservation</h1>
            <?php
            if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
                // Affiche le formulaire de réservation si l'utilisateur est connecté
                ?>
                <form action="script_reservation.php" method="post">
                    <label for="heure_prevue">Heure prévue :</label>
                    <input type="time" id="heure_prevue" name="heure_prevue" required>

                    <label for="place_demande">Place demandée :</label>
                    <input type="text" id="place_demande" name="place_demande" required>

                    <label for="itineraire_demande">Itinéraire demandé :</label>
                    <input type="text" id="itineraire_demande" name="itineraire_demande" required>

                    <button type="submit">Réserver</button>
                </form>
            <?php
            } else {
                // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
                header("Location: page_login.php");
                exit();
            }
            ?>
        </div>
    </div>
</body>

</html>
