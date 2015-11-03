-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: filmbasen
-- ------------------------------------------------------
-- Server version 	5.6.25-0ubuntu0.15.04.1
-- Date: Sat, 22 Aug 2015 12:58:43 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `login`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `login` VALUES (1,'aktiv','Kosmo1234');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `operator_log`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator_log` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `dato` date NOT NULL DEFAULT '0000-00-00',
  `subject` varchar(50) NOT NULL,
  `text` longtext NOT NULL,
  KEY `Index 1` (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=1171 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator_log`
--

LOCK TABLES `operator_log` WRITE;
/*!40000 ALTER TABLE `operator_log` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `operator_log` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `vagtplan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vagtplan` (
  `idx` int(10) NOT NULL AUTO_INCREMENT,
  `movieNo` int(11) DEFAULT '0',
  `poster` varchar(60) DEFAULT '0',
  `Dato` date DEFAULT NULL,
  `Tid` time DEFAULT NULL,
  `Titel` varchar(100) DEFAULT NULL,
  `Cafe1` varchar(50) DEFAULT NULL,
  `Cafe2` varchar(50) DEFAULT NULL,
  `Operator1` varchar(50) DEFAULT NULL,
  `Operator2` varchar(50) DEFAULT NULL,
  `Ledige` tinyint(4) DEFAULT NULL,
  `AA` tinyint(4) DEFAULT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `ugedag` varchar(10) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `Index 2` (`Dato`,`Tid`)
) ENGINE=InnoDB AUTO_INCREMENT=3290 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagtplan`
--

LOCK TABLES `vagtplan` WRITE;
/*!40000 ALTER TABLE `vagtplan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `vagtplan` VALUES (2412,0,'0','2015-07-08','18:30:00','Minions - 3D (Dansk Tale)','lkj','hhj','fdg','',62,0,'',451,'Onsdag','2015-07-08 18:30:00'),(2413,0,'0','2015-07-09','18:30:00','Minions - 3D (Dansk Tale)','lklk','lkj','','',78,0,'',455,'Torsdag','2015-07-09 18:30:00'),(2414,0,'0','2015-07-10','18:30:00','Minions - 3D (Dansk Tale)','Unni','Inger','Bent J','',78,0,'',457,'Fredag','2015-07-10 18:30:00'),(2415,0,'0','2015-07-11','18:30:00','Minions - 3D (Dansk Tale)','','','Arne','',78,0,'',459,'Lørdag','2015-07-11 18:30:00'),(2416,0,'0','2015-07-12','18:30:00','Minions - 3D (Dansk Tale)','Anne J','Paul','Holger','',78,0,NULL,461,'Søndag','2015-07-12 18:30:00'),(2417,0,'0','2015-07-13','19:00:00','I Dine Hænder','Kirsten R','Else','Ásgeir','',78,0,NULL,489,'Mandag','2015-07-13 19:00:00'),(2418,0,'0','2015-07-14','20:00:00','I Dine Hænder','mogens','','Stig','',78,0,NULL,491,'Tirsdag','2015-07-14 20:00:00'),(2419,0,'0','2015-07-15','20:00:00','I Dine Hænder','','','Palle','',78,0,'',493,'Onsdag','2015-07-15 20:00:00'),(2420,0,'0','2015-07-16','20:00:00','Blade Runner: The Final Cut','Kirsten','Anni','Bjarne','',78,0,NULL,505,'Torsdag','2015-07-16 20:00:00'),(2421,0,'0','2015-07-17','20:00:00','Spy','Johnny','','Bent J','',78,0,'',507,'Fredag','2015-07-17 20:00:00'),(2422,0,'0','2015-07-18','20:00:00','Spy','','Lis kl20','Bjarne','kl 16 ?',78,0,'',511,'Lørdag','2015-07-18 20:00:00'),(2423,0,'0','2015-07-19','20:00:00','Spy','Paul','Bente','Ib','',78,0,NULL,513,'Søndag','2015-07-19 20:00:00'),(2424,0,'0','2015-07-20','19:00:00','Timbuktu','Ingelise','Else','jens carl','',78,0,NULL,515,'Mandag','2015-07-20 19:00:00'),(2425,0,'0','2015-07-21','20:00:00','Timbuktu','mogens','','Tobias','',78,0,NULL,517,'Tirsdag','2015-07-21 20:00:00'),(2426,11857,'http://ebillet.dk/poster/Timbuktu.jpg','2015-07-22','20:00:00','Timbuktu','','','Bjarne','',65,0,'',519,'Onsdag','2015-07-22 20:00:00'),(2427,12089,'http://ebillet.dk/poster/TheSaltOfTheEarth.jpg','2015-07-23','20:00:00','The Salt Of The Earth','Jytte','Jens','Tobias','',78,0,NULL,529,'Torsdag','2015-07-23 20:00:00'),(2428,12073,'http://ebillet.dk/poster/MadMaxFuryRoad-DK.jpg','2015-07-24','20:00:00','Mad Max: Fury Road 3D','Lis','Inger','Bent J','',76,0,NULL,531,'Fredag','2015-07-24 20:00:00'),(2539,0,'0','2015-07-08','15:00:00','Minions - 3D (Dansk Tale)','lars','kurt','arne','',39,0,'',465,'Onsdag','2015-07-08 15:00:00'),(2542,0,'0','2015-07-10','15:00:00','Minions - 3D (Dansk Tale)','Bent J','kirsten L','Niels','',78,0,NULL,469,'Fredag','2015-07-10 15:00:00'),(2544,0,'0','2015-07-11','15:00:00','Minions - 3D (Dansk Tale)','Johnny','','Arne','',78,0,NULL,471,'Lørdag','2015-07-11 15:00:00'),(2546,0,'0','2015-07-12','15:00:00','Minions - 3D (Dansk Tale)','','','Niels','',78,0,'',473,'Søndag','2015-07-12 15:00:00'),(2549,0,'0','2015-07-14','15:00:00','I Dine Hænder','Else','Paul','Ib','',78,0,'',495,'Tirsdag','2015-07-14 15:00:00'),(2552,0,'0','2015-07-15','16:00:00','Houdini','Gertrud','','Ib','',78,0,NULL,497,'Onsdag','2015-07-15 16:00:00'),(2554,0,'0','2015-07-16','15:00:00','Sorte Shara - alarm i Østersøen','','','Ásgeir','',78,1,NULL,565,'Torsdag','2015-07-16 15:00:00'),(2555,0,'0','2015-07-17','16:00:00','Houdini','','','Tobias','',78,0,NULL,499,'Fredag','2015-07-17 16:00:00'),(2558,0,'0','2015-07-19','16:00:00','Houdini','','','Niels','',78,0,NULL,503,'Søndag','2015-07-19 16:00:00'),(2562,0,'0','2015-07-21','16:00:00','Asterix: Byplanlæggeren 3D','Paul','','Niels','',78,0,NULL,521,'Tirsdag','2015-07-21 16:00:00'),(2565,11706,'http://ebillet.dk/poster/AsterixByplanDK.jpg','2015-07-24','16:00:00','Asterix: Byplanlæggeren 3D','','','Ib','',73,0,NULL,523,'Fredag','2015-07-24 16:00:00'),(3087,11719,'http://ebillet.dk/poster/MadMaxFuryRoad-DK.jpg','2015-07-25','20:00:00','Mad Max: Fury Road',NULL,NULL,NULL,NULL,78,0,NULL,535,'Lørdag','2015-07-25 20:00:00'),(3088,12073,'http://ebillet.dk/poster/MadMaxFuryRoad-DK.jpg','2015-07-26','20:00:00','Mad Max: Fury Road 3D',NULL,NULL,NULL,NULL,78,0,NULL,533,'Søndag','2015-07-26 20:00:00'),(3089,11765,'http://ebillet.dk/poster/wildTales-DK.jpg','2015-07-27','19:00:00','Wild Tales',NULL,NULL,NULL,NULL,78,0,NULL,537,'Mandag','2015-07-27 19:00:00'),(3090,11765,'http://ebillet.dk/poster/wildTales-DK.jpg','2015-07-28','20:00:00','Wild Tales',NULL,NULL,NULL,NULL,78,0,NULL,539,'Tirsdag','2015-07-28 20:00:00'),(3091,11765,'http://ebillet.dk/poster/wildTales-DK.jpg','2015-07-29','20:00:00','Wild Tales',NULL,NULL,NULL,NULL,78,0,NULL,541,'Onsdag','2015-07-29 20:00:00'),(3092,11621,'http://ebillet.dk/poster/FlugtenTilFrihed-Final.jpg','2015-07-30','20:00:00','Flugten Til Frihed',NULL,NULL,NULL,NULL,78,0,NULL,563,'Torsdag','2015-07-30 20:00:00'),(3093,10824,'http://ebillet.dk/poster/Guldkysten.jpg','2015-07-31','20:00:00','Guldkysten',NULL,NULL,NULL,NULL,70,0,NULL,551,'Fredag','2015-07-31 20:00:00'),(3094,10824,'http://ebillet.dk/poster/Guldkysten.jpg','2015-08-01','20:00:00','Guldkysten',NULL,NULL,NULL,NULL,78,0,NULL,553,'Lørdag','2015-08-01 20:00:00'),(3095,10824,'http://ebillet.dk/poster/Guldkysten.jpg','2015-08-02','20:00:00','Guldkysten',NULL,NULL,NULL,NULL,78,0,NULL,555,'Søndag','2015-08-02 20:00:00'),(3096,10824,'http://ebillet.dk/poster/Guldkysten.jpg','2015-08-03','19:00:00','Guldkysten',NULL,NULL,NULL,NULL,78,0,NULL,557,'Mandag','2015-08-03 19:00:00'),(3097,10824,'http://ebillet.dk/poster/Guldkysten.jpg','2015-08-04','20:00:00','Guldkysten',NULL,NULL,NULL,NULL,78,0,NULL,559,'Tirsdag','2015-08-04 20:00:00'),(3098,10824,'http://ebillet.dk/poster/Guldkysten.jpg','2015-08-05','20:00:00','Guldkysten',NULL,NULL,NULL,NULL,78,0,NULL,561,'Onsdag','2015-08-05 20:00:00'),(3099,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-06','20:00:00','Comeback','Jytte','Gertrud','','',78,0,NULL,567,'Torsdag','2015-08-06 20:00:00'),(3100,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-07','20:00:00','Comeback','Unni','','','',78,0,NULL,569,'Fredag','2015-08-07 20:00:00'),(3101,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-08','20:00:00','Comeback',NULL,NULL,NULL,NULL,78,0,NULL,571,'Lørdag','2015-08-08 20:00:00'),(3102,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-09','20:00:00','Comeback','Bente','Paul','','',78,0,NULL,573,'Søndag','2015-08-09 20:00:00'),(3103,12475,'http://ebillet.dk/poster/Comeback.jpg','2015-08-10','19:00:00','Comeback - Med danske undertekster','Ellen H','Kirsten R','','',78,0,NULL,575,'Mandag','2015-08-10 19:00:00'),(3104,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-11','20:00:00','Comeback',NULL,NULL,NULL,NULL,78,0,NULL,577,'Tirsdag','2015-08-11 20:00:00'),(3105,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-12','20:00:00','Comeback',NULL,NULL,NULL,NULL,78,0,NULL,637,'Onsdag','2015-08-12 20:00:00'),(3106,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-13','20:00:00','Comeback','Jytte','Jens','','',78,0,NULL,581,'Torsdag','2015-08-13 20:00:00'),(3107,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-14','20:00:00','Comeback',NULL,NULL,NULL,NULL,78,0,NULL,583,'Fredag','2015-08-14 20:00:00'),(3108,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-15','20:00:00','Comeback',NULL,NULL,NULL,NULL,78,0,NULL,585,'Lørdag','2015-08-15 20:00:00'),(3109,12104,'http://ebillet.dk/poster/Comeback.jpg','2015-08-16','20:00:00','Comeback','Anne J','Paul','','',78,0,NULL,587,'Søndag','2015-08-16 20:00:00'),(3110,11756,'http://ebillet.dk/poster/TestamentOfYou-DK.jpg','2015-08-17','19:00:00','Testament of Youth','Ingelise','Aud','','',78,0,NULL,597,'Mandag','2015-08-17 19:00:00'),(3111,11756,'http://ebillet.dk/poster/TestamentOfYou-DK.jpg','2015-08-18','20:00:00','Testament of Youth',NULL,NULL,NULL,NULL,78,0,NULL,599,'Tirsdag','2015-08-18 20:00:00'),(3112,11756,'http://ebillet.dk/poster/TestamentOfYou-DK.jpg','2015-08-19','20:00:00','Testament of Youth',NULL,NULL,NULL,NULL,78,0,NULL,601,'Onsdag','2015-08-19 20:00:00'),(3113,11881,'http://ebillet.dk/poster/Mandariner.jpg','2015-08-20','20:00:00','Mandariner','Anni','Gertrud','','',78,0,NULL,603,'Torsdag','2015-08-20 20:00:00'),(3114,11881,'http://ebillet.dk/poster/Mandariner.jpg','2015-08-21','20:00:00','Mandariner','Tove','Inger','','',78,0,NULL,605,'Fredag','2015-08-21 20:00:00'),(3115,11881,'http://ebillet.dk/poster/Mandariner.jpg','2015-08-22','20:00:00','Mandariner',NULL,NULL,NULL,NULL,78,0,NULL,607,'Lørdag','2015-08-22 20:00:00'),(3116,11881,'http://ebillet.dk/poster/Mandariner.jpg','2015-08-23','20:00:00','Mandariner','Bente','Sus','','',78,0,NULL,609,'Søndag','2015-08-23 20:00:00'),(3117,12101,'http://ebillet.dk/poster/Bridgend_Final.jpg','2015-08-24','19:00:00','Bridgend','Kirsten R','Ulla','','',78,0,NULL,617,'Mandag','2015-08-24 19:00:00'),(3118,12101,'http://ebillet.dk/poster/Bridgend_Final.jpg','2015-08-25','20:00:00','Bridgend',NULL,NULL,NULL,NULL,78,0,NULL,619,'Tirsdag','2015-08-25 20:00:00'),(3119,12101,'http://ebillet.dk/poster/Bridgend_Final.jpg','2015-08-26','20:00:00','Bridgend',NULL,NULL,NULL,NULL,78,0,NULL,621,'Onsdag','2015-08-26 20:00:00'),(3120,12101,'http://ebillet.dk/poster/Bridgend_Final.jpg','2015-08-27','20:00:00','Bridgend','Kirsten','Anni','','',78,0,NULL,623,'Torsdag','2015-08-27 20:00:00'),(3121,0,'0','2015-08-28','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-08-28 00:00:00'),(3122,12093,'http://ebillet.dk/poster/Respire.jpg','2015-08-29','20:00:00','Træk Vejret',NULL,NULL,NULL,NULL,78,0,NULL,625,'Lørdag','2015-08-29 20:00:00'),(3123,12093,'http://ebillet.dk/poster/Respire.jpg','2015-08-30','20:00:00','Træk Vejret','Rigmor','Paul','','',78,0,NULL,627,'Søndag','2015-08-30 20:00:00'),(3124,12126,'http://ebillet.dk/poster/AMostViolentYear.jpg','2015-08-31','19:00:00','A Most Violent Year','Ellen H','Ulla','','',78,0,NULL,629,'Mandag','2015-08-31 19:00:00'),(3125,12126,'http://ebillet.dk/poster/AMostViolentYear.jpg','2015-09-01','20:00:00','A Most Violent Year',NULL,NULL,NULL,NULL,78,0,NULL,631,'Tirsdag','2015-09-01 20:00:00'),(3126,0,'0','2015-09-02','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-02 00:00:00'),(3127,12126,'http://ebillet.dk/poster/AMostViolentYear.jpg','2015-09-03','20:00:00','A Most Violent Year','Gertrud','Jyttte','','',78,0,NULL,635,'Torsdag','2015-09-03 20:00:00'),(3128,0,'0','2015-09-04','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-04 00:00:00'),(3129,0,'0','2015-09-05','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-05 00:00:00'),(3130,0,'0','2015-09-06','00:00:00',NULL,'Jette','Sus','','',NULL,NULL,NULL,NULL,NULL,'2015-09-06 00:00:00'),(3131,0,'0','2015-09-07','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-07 00:00:00'),(3132,0,'0','2015-09-08','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-08 00:00:00'),(3133,0,'0','2015-09-09','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-09 00:00:00'),(3134,0,'0','2015-09-10','00:00:00',NULL,'Anni','Jens','','',NULL,NULL,NULL,NULL,NULL,'2015-09-10 00:00:00'),(3135,0,'0','2015-09-11','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-11 00:00:00'),(3136,0,'0','2015-09-12','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-12 00:00:00'),(3137,0,'0','2015-09-13','00:00:00',NULL,'Anne J','Bente','','',NULL,NULL,NULL,NULL,NULL,'2015-09-13 00:00:00'),(3138,0,'0','2015-09-14','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-14 00:00:00'),(3139,0,'0','2015-09-15','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-15 00:00:00'),(3140,0,'0','2015-09-16','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-16 00:00:00'),(3141,0,'0','2015-09-17','00:00:00',NULL,'Kirsten','Gertrud','','',NULL,NULL,NULL,NULL,NULL,'2015-09-17 00:00:00'),(3142,0,'0','2015-09-18','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-18 00:00:00'),(3143,0,'0','2015-09-19','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-19 00:00:00'),(3144,0,'0','2015-09-20','00:00:00',NULL,'Rigmor','Paul','','',NULL,NULL,NULL,NULL,NULL,'2015-09-20 00:00:00'),(3145,0,'0','2015-09-21','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-21 00:00:00'),(3146,0,'0','2015-09-22','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-22 00:00:00'),(3147,0,'0','2015-09-23','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-23 00:00:00'),(3148,0,'0','2015-09-24','00:00:00',NULL,'Jytte','Anni','','',NULL,NULL,NULL,NULL,NULL,'2015-09-24 00:00:00'),(3149,0,'0','2015-09-25','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-25 00:00:00'),(3150,37,'http://www.secure.ebillet.dk/teamposters/org201ref37.jpg','2015-09-26','20:30:00','Mads Otzen',NULL,NULL,NULL,NULL,102,1,NULL,333,'Lørdag','2015-09-26 20:30:00'),(3151,0,'0','2015-09-27','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-27 00:00:00'),(3152,0,'0','2015-09-28','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-28 00:00:00'),(3153,0,'0','2015-09-29','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-29 00:00:00'),(3154,0,'0','2015-09-30','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-30 00:00:00'),(3155,0,'0','2015-10-01','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-01 00:00:00'),(3156,0,'0','2015-10-02','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-02 00:00:00'),(3157,0,'0','2015-10-03','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-03 00:00:00'),(3158,0,'0','2015-10-04','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-04 00:00:00'),(3159,0,'0','2015-10-05','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-05 00:00:00'),(3160,0,'0','2015-10-06','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-06 00:00:00'),(3161,0,'0','2015-10-07','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-07 00:00:00'),(3162,0,'0','2015-10-08','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-08 00:00:00'),(3163,0,'0','2015-10-09','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-09 00:00:00'),(3164,0,'0','2015-10-10','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-10 00:00:00'),(3165,0,'0','2015-10-11','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-11 00:00:00'),(3166,0,'0','2015-10-12','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-12 00:00:00'),(3167,0,'0','2015-10-13','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-13 00:00:00'),(3168,0,'0','2015-10-14','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-14 00:00:00'),(3169,0,'0','2015-10-15','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-15 00:00:00'),(3170,0,'0','2015-10-16','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-16 00:00:00'),(3171,0,'0','2015-10-17','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-17 00:00:00'),(3172,0,'0','2015-10-18','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-18 00:00:00'),(3173,0,'0','2015-10-19','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-19 00:00:00'),(3174,0,'0','2015-10-20','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-20 00:00:00'),(3175,0,'0','2015-10-21','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-21 00:00:00'),(3176,0,'0','2015-10-22','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-22 00:00:00'),(3177,0,'0','2015-10-23','00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-23 00:00:00'),(3178,33,'http://www.secure.ebillet.dk/teamposters/org201ref33.jpg','2015-10-24','20:30:00','The Blues Overdrive',NULL,NULL,NULL,NULL,110,1,NULL,325,'Lørdag','2015-10-24 20:30:00'),(3217,0,'11706','2015-07-26','16:00:00','Asterix: Byplanlæggeren 3D',NULL,NULL,NULL,NULL,78,0,NULL,527,'Søndag','2015-07-26 16:00:00'),(3221,0,'11560','2015-07-28','16:00:00','F For Får',NULL,NULL,NULL,NULL,78,0,NULL,543,'Tirsdag','2015-07-28 16:00:00'),(3224,0,'11560','2015-07-31','16:00:00','F For Får',NULL,NULL,NULL,NULL,78,0,NULL,545,'Fredag','2015-07-31 16:00:00'),(3227,0,'11560','2015-08-02','16:00:00','F For Får',NULL,NULL,NULL,NULL,78,0,NULL,549,'Søndag','2015-08-02 16:00:00'),(3234,0,'12316','2015-08-07','16:00:00','Det Store Nøddekup - 3D',NULL,NULL,NULL,NULL,78,0,NULL,591,'Fredag','2015-08-07 16:00:00'),(3236,0,'12316','2015-08-08','16:00:00','Det Store Nøddekup - 3D',NULL,NULL,NULL,NULL,78,0,NULL,593,'Lørdag','2015-08-08 16:00:00'),(3238,0,'12316','2015-08-09','16:00:00','Det Store Nøddekup - 3D',NULL,NULL,NULL,NULL,78,0,NULL,595,'Søndag','2015-08-09 16:00:00'),(3242,0,'12475','2015-08-12','11:00:00','Comeback - Med danske undertekster',NULL,NULL,NULL,NULL,78,0,NULL,579,'Onsdag','2015-08-12 11:00:00'),(3244,0,'12475','2015-08-13','15:00:00','Comeback - Med danske undertekster',NULL,NULL,NULL,NULL,78,0,NULL,589,'Torsdag','2015-08-13 15:00:00'),(3253,0,'12305','2015-08-21','16:00:00','Peter Pedal på Eventyr i Junglen',NULL,NULL,NULL,NULL,78,0,NULL,611,'Fredag','2015-08-21 16:00:00'),(3255,12305,'http://ebillet.dk/poster/PeterPedal3.jpg','2015-08-22','16:00:00','Peter Pedal på Eventyr i Junglen',NULL,NULL,NULL,NULL,78,0,NULL,613,'Lørdag','2015-08-22 16:00:00'),(3257,12305,'http://ebillet.dk/poster/PeterPedal3.jpg','2015-08-23','16:00:00','Peter Pedal på Eventyr i Junglen',NULL,NULL,NULL,NULL,78,0,NULL,615,'Søndag','2015-08-23 16:00:00'),(3269,34,'http://www.secure.ebillet.dk/teamposters/org201ref34.jpg','2015-11-11','20:00:00','Sinne Eeg',NULL,NULL,NULL,NULL,107,1,NULL,327,'Onsdag','2015-11-11 20:00:00'),(3270,35,'http://www.secure.ebillet.dk/teamposters/org201ref35.jpg','2015-12-04','20:30:00','Peter Viskinde - Akustisk',NULL,NULL,NULL,NULL,108,1,NULL,329,'Fredag','2015-12-04 20:30:00'),(3271,36,'http://www.secure.ebillet.dk/teamposters/org201ref36.png','2015-12-25','21:30:00','Julebal - med POPLic Service',NULL,NULL,NULL,NULL,121,1,NULL,335,'Fredag','2015-12-25 21:30:00');
/*!40000 ALTER TABLE `vagtplan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sat, 22 Aug 2015 12:58:43 +0200
