<?php
    session_start();
	if(isset($_GET["deco"])){
		$_SESSION["nom"] = null;
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro</title>
    <link rel="stylesheet" type="text/css" href="css/style.php">
    <link rel="stylesheet" type="text/css" href="css/navbar.php">
</head>
<body>
    <?php
        if(isset($_SESSION['nom']))
        {
            echo "Connecte en tant que : " .$_SESSION["nom"];
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
			<img class="img1" src="illustrations/Day-Trips-Photo.jpg" style="width:550px" height="300px"  alt="connexion-illustration">
			<p>E-TRANSPORT est un système de transport</br>spécialement conçu pour les étudiants</br>Un transport pratique, fiable, économique</br>confortable et securité</p>
			<button class="trajet"><a href="index.php?deco=1">Voir nos trajets</a></button>
			</div>
			<img class="img2" src="illustrations/les-usagers-peuvent-faire-remonter-leurs-doleances-c-est-le-moment-illustration-progres-nathalie-bertheux-1686159085.jpg" style="width:550px" height="300px"  alt="connexion-illustration">
			<img class="img3"  src="illustrations/B9728243725Z.1_20210908113711_000+G51ISO16C.1-0.jpg" style="width:550px" height="370px" alt="connexion-illustration">
			<div class="form">
				<button class="btnn"><a href="page_login.php">Connecter</a></button>
				<button class="btnn"><a href="page_register.php">S'inscrire</a></button>
			</div>
		</div>
	</div>
</body>
</html>
