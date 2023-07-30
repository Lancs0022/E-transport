-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 30 juil. 2023 à 10:33
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-transport`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `IDABONNEMENT` smallint NOT NULL,
  `NOMABONNEMENT` char(32) DEFAULT NULL,
  `PRIXABONNEMENT` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`IDABONNEMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

DROP TABLE IF EXISTS `chauffeur`;
CREATE TABLE IF NOT EXISTS `chauffeur` (
  `IDCHAUFFEUR` int NOT NULL,
  `IDVEHICULE` char(32) NOT NULL,
  `NOMCHAUFFEUR` char(32) DEFAULT NULL,
  `PRENOMCHAUFFEUR` char(32) DEFAULT NULL,
  `SITUATIONCHAUFFEUR` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDCHAUFFEUR`),
  KEY `FK_CHAUFFEUR_VEHICULE` (`IDVEHICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `IDCLIENT` int NOT NULL AUTO_INCREMENT,
  `IDABONNEMENT` smallint NOT NULL,
  `PSEUDOCLIENT` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TELEPHONECLIENT` int DEFAULT NULL,
  `MDP` varchar(128) DEFAULT NULL,
  `TARIF` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`IDCLIENT`),
  KEY `FK_CLIENT_ABONNEMENT` (`IDABONNEMENT`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IDCLIENT`, `IDABONNEMENT`, `PSEUDOCLIENT`, `TELEPHONECLIENT`, `MDP`, `TARIF`) VALUES
(5, 0, 'fsdbhf', 542345, 'hhrgrsg', NULL),
(6, 0, 'SSJ5', 463456, 'Ploup', NULL),
(3, 0, 'Lancs', 347814199, 'Lancs0022', NULL),
(4, 0, 'Rick', 562302562, '12345678', NULL),
(7, 0, 'SSJ5', 463456, 'Ploup', NULL),
(8, 0, 'Kk', 4547, '0000', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clientdespartenaires`
--

DROP TABLE IF EXISTS `clientdespartenaires`;
CREATE TABLE IF NOT EXISTS `clientdespartenaires` (
  `IDCLIENTP` smallint NOT NULL,
  `IDPARTENAIRE` smallint NOT NULL,
  `NOMCLIENTP` char(32) DEFAULT NULL,
  `PRENOMCLIENTP` char(32) DEFAULT NULL,
  `ADRESSECLIENTP` char(75) DEFAULT NULL,
  `TELCLIENTP` int DEFAULT NULL,
  `MAILCLIENTP` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDCLIENTP`),
  KEY `FK_CLIENTDESPARTENAIRES_PARTENAIRES` (`IDPARTENAIRE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entretenir`
--

DROP TABLE IF EXISTS `entretenir`;
CREATE TABLE IF NOT EXISTS `entretenir` (
  `IDVEHICULE` char(32) NOT NULL,
  `IDGARAGE` smallint NOT NULL,
  `DATEENTRETIEN` datetime DEFAULT NULL,
  PRIMARY KEY (`IDVEHICULE`,`IDGARAGE`),
  KEY `FK_ENTRETENIR_GARAGE` (`IDGARAGE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `IDGARAGE` smallint NOT NULL,
  `NOMGARAGE` char(32) DEFAULT NULL,
  `TEL` int DEFAULT NULL,
  PRIMARY KEY (`IDGARAGE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `generer`
--

DROP TABLE IF EXISTS `generer`;
CREATE TABLE IF NOT EXISTS `generer` (
  `IDRESERVATION` int NOT NULL,
  `IDVOYAGE` char(32) NOT NULL,
  PRIMARY KEY (`IDRESERVATION`,`IDVOYAGE`),
  KEY `FK_GENERER_VOYAGE` (`IDVOYAGE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `itineraire`
--

DROP TABLE IF EXISTS `itineraire`;
CREATE TABLE IF NOT EXISTS `itineraire` (
  `IDITINERAIRE` smallint NOT NULL,
  `IDVEHICULE` char(32) NOT NULL,
  `SENSPARCOURS` tinyint(1) DEFAULT NULL,
  `NOMITINERAIRE` char(32) DEFAULT NULL,
  `LONGUEUR` bigint DEFAULT NULL,
  `DUREEMOYENNE` int DEFAULT NULL,
  PRIMARY KEY (`IDITINERAIRE`),
  KEY `FK_ITINERAIRE_VEHICULE` (`IDVEHICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

DROP TABLE IF EXISTS `partenaires`;
CREATE TABLE IF NOT EXISTS `partenaires` (
  `IDPARTENAIRE` smallint NOT NULL,
  `IDCLIENT` int NOT NULL,
  `NOMPARTENAIRE` char(32) DEFAULT NULL,
  `ADRESSE` char(128) DEFAULT NULL,
  `TELEPHONE` int DEFAULT NULL,
  `MAIL` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDPARTENAIRE`),
  KEY `FK_PARTENAIRES_CLIENT` (`IDCLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Autres partenaires potentiels ';

-- --------------------------------------------------------

--
-- Structure de la table `pointarret`
--

DROP TABLE IF EXISTS `pointarret`;
CREATE TABLE IF NOT EXISTS `pointarret` (
  `IDPOINTARRET` smallint NOT NULL,
  `IDITINERAIRE` smallint NOT NULL,
  `NOMPOINTARRET` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDPOINTARRET`),
  KEY `FK_POINTARRET_ITINERAIRE` (`IDITINERAIRE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `IDRESERVATION` int NOT NULL AUTO_INCREMENT,
  `IDCLIENT` int DEFAULT NULL,
  `HEUREPREVU` time DEFAULT NULL,
  `PLACEDEMANDE` char(32) DEFAULT NULL,
  `ITINERAIREDEMANDE` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDRESERVATION`),
  KEY `FK_RESERVATION_CLIENT` (`IDCLIENT`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Lorsqu''un client effectue une reservation, des places seront automatiquement deduits';

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`IDRESERVATION`, `IDCLIENT`, `HEUREPREVU`, `PLACEDEMANDE`, `ITINERAIREDEMANDE`) VALUES
(1, 3, '20:10:00', '5', 'itineraire 1'),
(2, 3, '07:25:00', '1', 'it2'),
(3, 3, '07:25:00', '1', 'it2'),
(4, 8, '07:15:00', '6', '1');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `IDVEHICULE` char(32) NOT NULL,
  `IDRESERVATION` int NOT NULL,
  `MATRICULATION` bigint DEFAULT NULL,
  `NOMBREDEPLACE` bigint DEFAULT NULL,
  `PLACEDISPONIBLE` int DEFAULT NULL,
  PRIMARY KEY (`IDVEHICULE`),
  KEY `FK_VEHICULE_RESERVATION` (`IDRESERVATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

DROP TABLE IF EXISTS `voyage`;
CREATE TABLE IF NOT EXISTS `voyage` (
  `IDVOYAGE` char(32) NOT NULL,
  `DATEVOYAGE` char(32) DEFAULT NULL,
  `DEPARTVOYAGE` char(32) DEFAULT NULL,
  `DATEARRIVE` char(32) DEFAULT NULL,
  `DUREE` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDVOYAGE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
