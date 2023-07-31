<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width-device-width,initial-scale=1.0">
<title>E-Transport</title>
<link rel="stylesheet" type="text/css" href="css/Stylereserve.php">
<link rel="stylesheet" type="text/css" href="css/navbar.php">
</head>
<body>
<?php
    session_start();

    if (isset($_SESSION['nom'])) {
        echo "Connecté en tant que : " . $_SESSION["nom"];
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
				<h1>Reserver</br></br><span>votre place</span></h1>
			<img  src="illustrations/bus-stop-concept-illustration_114360-4939.jpg" style="width:400px" alt="connexion-illustration">;
			</div>
            <?php
                if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
            ?>
			<div class="form">
                <form action="script_reservation.php" method="post">
                    <h2>RESERVATION</h2>
                    <input type="time" name="heure_prevue"placeholder="Date">
                    <input type="text" name="itineraire_demande"placeholder="Itinéraire">
                    <input type="number" name="place_demande"placeholder="Nombre de place">
                    <button class="btnn" type="submit">RESERVER</button>
                </form>
			</div>
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