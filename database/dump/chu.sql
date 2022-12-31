/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.8-log : Database - chu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`chu` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `chu`;

/*Table structure for table `accompagnant` */

DROP TABLE IF EXISTS `accompagnant`;

CREATE TABLE `accompagnant` (
  `id_accomp` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_accomp`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `accompagnant` */

insert  into `accompagnant`(id_accomp,nom,contact,adresse) values (1,'',0,''),(2,'',0,''),(3,'',0,''),(4,'',0,''),(5,'',0,''),(6,'arerezr',123456,'dfdfdf'),(7,'',0,''),(8,'ito ilay niaraka tamko',33333333,''),(9,'uygug',2222,'');

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(id_admin,email,password) values (2,'rina@gmail.com','12345');

/*Table structure for table `cause` */

DROP TABLE IF EXISTS `cause`;

CREATE TABLE `cause` (
  `id_cause` int(11) NOT NULL AUTO_INCREMENT,
  `victime` varchar(50) DEFAULT NULL,
  `vehicule` varchar(50) DEFAULT NULL,
  `securite` varchar(50) DEFAULT NULL,
  `autre` varchar(50) DEFAULT NULL,
  `id_conducteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cause`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `cause` */

/*Table structure for table `conclusion` */

DROP TABLE IF EXISTS `conclusion`;

CREATE TABLE `conclusion` (
  `id_conclusion` int(11) DEFAULT NULL,
  `devenu` varchar(255) DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `conclusion` */

/*Table structure for table `conducteur` */

DROP TABLE IF EXISTS `conducteur`;

CREATE TABLE `conducteur` (
  `id_conducteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cin` int(12) DEFAULT NULL,
  `vehicule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_conducteur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `conducteur` */

insert  into `conducteur`(id_conducteur,nom,prenom,contact,adresse,cin,vehicule) values (1,'jhgllhj',NULL,2651561,'khguugiuiuh',2601951,'moto'),(2,'',NULL,0,'',0,NULL),(3,'jkhklhjhlkhkhkljh',NULL,2147483647,'gggggggggg',2147483647,'moto');

/*Table structure for table `consulter` */

DROP TABLE IF EXISTS `consulter`;

CREATE TABLE `consulter` (
  `id_consulter` int(11) NOT NULL AUTO_INCREMENT,
  `date_consul` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  `id_typo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_consulter`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `consulter` */

insert  into `consulter`(id_consulter,date_consul,heure,id_patient,id_medecin,id_typo) values (1,'0000-00-00','00:00:00',NULL,9,0),(2,'0000-00-00','00:00:00',NULL,9,0),(3,'0000-00-00','00:00:00',NULL,9,0);

/*Table structure for table `medecin` */

DROP TABLE IF EXISTS `medecin`;

CREATE TABLE `medecin` (
  `id_medecin` int(5) NOT NULL AUTO_INCREMENT,
  `examinateur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `medecin` */

insert  into `medecin`(id_medecin,examinateur) values (9,'dokotera');

/*Table structure for table `patient` */

DROP TABLE IF EXISTS `patient`;

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `nom_patient` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `remarque` text,
  `id_accomp` int(11) DEFAULT NULL,
  `id_cause` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=15152 DEFAULT CHARSET=latin1;

/*Data for the table `patient` */

insert  into `patient`(id_patient,nom_patient,prenom,date_naiss,age,sexe,adresse,profession,remarque,id_accomp,id_cause) values (33,'rakotoasimbola','Anicet','2021-04-23',32,'Masculin','iaf 4 a antanetive ','mpianatra','mbola tsy nahita asa fa vao ',8,NULL),(4,'randria','aaaa','2021-04-07',10,'Masculin','lekrl','lllll','kkjk',1,NULL),(10,'rakoto','andry','2021-04-07',20,'Masculin','lot1212','aerer','lkfdlk',7,NULL),(15151,'lili','riene','2021-04-21',55,'Feminin','kdfjqmkldfjqdf','mlsdjklsjdgkldmlsdfkjglkdjfgl','',9,NULL);

/*Table structure for table `suivre` */

DROP TABLE IF EXISTS `suivre`;

CREATE TABLE `suivre` (
  `id_suivie` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) DEFAULT NULL,
  `id_traite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_suivie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `suivre` */

/*Table structure for table `traitement` */

DROP TABLE IF EXISTS `traitement`;

CREATE TABLE `traitement` (
  `id_traitement` int(11) NOT NULL AUTO_INCREMENT,
  `examen` varchar(50) DEFAULT NULL,
  `prescription` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_traitement`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `traitement` */

/*Table structure for table `typologie` */

DROP TABLE IF EXISTS `typologie`;

CREATE TABLE `typologie` (
  `id_typo` int(11) NOT NULL AUTO_INCREMENT,
  `typologie` varchar(30) DEFAULT NULL,
  `histoire` text,
  `id_cause` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_typo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `typologie` */

insert  into `typologie`(id_typo,typologie,histoire,id_cause) values (1,'at',NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
