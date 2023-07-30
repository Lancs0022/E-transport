<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="styles.php">
</head>

<body>
    <?php
    if (isset($_SESSION['pseudo'])) {
        echo "Connecte en tant que : " . $_SESSION["pseudo"];
    }
    ?>
    
    <div class="Navigation">
        <a href="index.php" class="bouton">Accueil</a>
        <a href="page_register.php" class="bouton">Register</a>
        <a href="page_login.php" class="bouton">Login</a>
        <a href="page_reservation.php" class="bouton">Reservation</a>
        <a href="page_affichageReservations.php" class="bouton">Liste de reservation</a>
    </div>

    
    <div class="container">
        <div>
            <img src="" alt="">
        </div>

        <div>
            <h1>Connexion</h1>
            <form action="script_login.php" method="post">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</body>

</html>