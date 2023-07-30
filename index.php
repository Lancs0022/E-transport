<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro</title>
    <link rel="stylesheet" type="text/css" href="styles.php">
</head>
<body>
    <?php
        if(isset($_SESSION['pseudo']))
        {
            echo "Connecte en tant que : " .$_SESSION["pseudo"];
        }
    ?>
    <div class="Navigation">
        <a href="index.php" class="bouton">Accueil</a>
        <a href="page_register.php" class="bouton">Register</a>
        <a href="page_login.php" class="bouton">Login</a>
        <a href="page_reservation.php" class="bouton">Reservation</a>
        <a href="" class="bouton">Void</a>
    </div>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam corporis rem nulla aut harum rerum velit veritatis! Voluptate similique sint exercitationem mollitia! Quae et fugiat obcaecati, saepe nostrum hic aut. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis delectus praesentium voluptatem vel veniam eveniet id odio suscipit magni deserunt libero, voluptatum, eius quos ipsam tenetur iusto recusandae. Perspiciatis, aperiam? Lorem ipsum, dolor sit amet consectetur adipisicing elit. A consequatur esse quo consectetur quas cum porro voluptatem amet! At vel natus esse molestiae impedit veritatis obcaecati corrupti nisi eum vero?
    </p>
    <!-- <div class="container">
        <h1>Formulaire d'inscription</h1>
        <form action="accountScript.php" method="post">
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required>
            
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirmation du mot de passe :</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Envoyer</button>
        </form>
    </div> -->
</body>
</html>
