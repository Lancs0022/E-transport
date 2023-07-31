<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/StyleConnexion.php">
    <link rel="stylesheet" type="text/css" href="css/navbar.php">
</head>

<body>
    <?php
    if (isset($_SESSION['nom'])) {
        echo "Connecte en tant que : " . $_SESSION["nom"];
    }
    ?>
    <div class="main">
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
		<div class="content">
			<div class="side">
				<h1>Se<br> <br><span>Connecter</span></h1>
			<img  src="illustrations/inscription-ligne-inscrivez-vous-homme-assis-pres-smartphone_268404-95.jpg" style="width:500px" alt="connexion-illustration">;
			</div>
			<div class="form">
                <form action="script_login.php" method="post">
                    <h2>Connexion</h2>
                    <input type="text" name="nom"placeholder="Nom d'utilisateur">
                    <input type="password" name="password"placeholder="Mot de passe">
                    <button class="btnn" type="submit">Connecter</button>

                    <p class="link">Si vous n'avez pas encore un compte<br> 
                    <a href="inscription.html">Inscrivez vous</a> ici</a></p>
                </form>
			</div>
		</div>
	</div>
</body>

</html>