-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.10.2-MariaDB-1:10.10.2+maria~ubu2204 - mariadb.org binary distribution
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table chu. accompagnant
CREATE TABLE IF NOT EXISTS `accompagnant` (
  `id_accomp` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_accomp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage de la structure de table chu. cause
CREATE TABLE IF NOT EXISTS `cause` (
  `id_cause` int(11) NOT NULL AUTO_INCREMENT,
  `victime` varchar(50) DEFAULT NULL,
  `vehicule` varchar(50) DEFAULT NULL,
  `securite` varchar(50) DEFAULT NULL,
  `autre` text DEFAULT NULL,
  `id_conducteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cause`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.cause : ~0 rows (environ)

-- Listage de la structure de table chu. conclusion
CREATE TABLE IF NOT EXISTS `conclusion` (
  `id_conclusion` int(11) DEFAULT NULL,
  `devenu` varchar(255) DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.conclusion : ~0 rows (environ)

-- Listage de la structure de table chu. conducteur
CREATE TABLE IF NOT EXISTS `conducteur` (
  `id_conducteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cin` varchar(50) DEFAULT NULL,
  `vehicule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_conducteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.conducteur : ~0 rows (environ)

-- Listage de la structure de table chu. consulter
CREATE TABLE IF NOT EXISTS `consulter` (
  `id_consulter` int(11) NOT NULL AUTO_INCREMENT,
  `date_consul` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  `id_typo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_consulter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.consulter : ~0 rows (environ)

-- Listage de la structure de table chu. medecin
CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int(5) NOT NULL AUTO_INCREMENT,
  `examinateur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.medecin : ~0 rows (environ)

-- Listage de la structure de table chu. patient
CREATE TABLE IF NOT EXISTS `patient` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `nom_patient` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `remarque` text DEFAULT NULL,
  `id_accomp` int(11) DEFAULT NULL,
  `id_cause` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.patient : ~0 rows (environ)

-- Listage de la structure de table chu. suivre
CREATE TABLE IF NOT EXISTS `suivre` (
  `id_suivie` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) DEFAULT NULL,
  `id_traite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_suivie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.suivre : ~0 rows (environ)

-- Listage de la structure de table chu. traitement
CREATE TABLE IF NOT EXISTS `traitement` (
  `id_traitement` int(11) NOT NULL AUTO_INCREMENT,
  `examen` varchar(50) DEFAULT NULL,
  `prescription` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_traitement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.traitement : ~0 rows (environ)

-- Listage de la structure de table chu. typologie
CREATE TABLE IF NOT EXISTS `typologie` (
  `id_typo` int(11) NOT NULL AUTO_INCREMENT,
  `typologie` enum('A.T','A.Sco','A.D','A.Spo','A.R.C','Eva.San','Cas.Med','A.V.P','A.C') DEFAULT NULL,
  `histoire` text DEFAULT NULL,
  `id_cause` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_typo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

-- Listage des données de la table chu.typologie : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
