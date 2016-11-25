-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
<<<<<<< HEAD
-- Host: 127.0.0.1    Database: music_artist
=======
-- Host: 127.0.0.1    Database: music_artists
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artistId` int(10) unsigned NOT NULL,
  `artistName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `country` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `artists_artistid_index` (`artistId`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artists`
--

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `artists` VALUES (1,909253,'Jack Johnson','USD','USA','2016-11-25 21:20:20','2016-11-25 21:20:20'),(2,909253,'Jack Johnson, Dave Matthews & Tim Reynolds','USD','USA','2016-11-25 21:24:10','2016-11-25 21:24:10');
=======
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collectionId` int(10) unsigned NOT NULL,
  `collectionName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
<<<<<<< HEAD
  `collectionArtistId` int(10) unsigned NOT NULL,
=======
  `collectionArtistId` int(11) NOT NULL,
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
  `collectionPrice` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
<<<<<<< HEAD
  KEY `collections_collectionid_index` (`collectionId`),
  KEY `collections_collectionartistid_index` (`collectionArtistId`),
  CONSTRAINT `collections_collectionartistid_foreign` FOREIGN KEY (`collectionArtistId`) REFERENCES `artists` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
=======
  KEY `collections_collectionid_index` (`collectionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `collections` VALUES (1,879273552,'In Between Dreams',1,10.99,'2016-11-25 21:20:20','2016-11-25 21:20:20'),(2,513801594,'Jack Johnson & Friends - Best of Kokua Festival (A Benefit for the Kokua Hawaii Foundation)',2,7.99,'2016-11-25 21:24:10','2016-11-25 21:24:10'),(3,879269460,'Jack Johnson and Friends: Sing-A-Longs and Lullabies For the Film Curious George',1,7.99,'2016-11-25 21:24:10','2016-11-25 21:24:10'),(4,879716730,'Sleep Through the Static',1,7.99,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(5,879206883,'To the Sea',1,9.99,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(6,659234734,'From Here to Now to You',1,7.99,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(7,295315099,'This Warm December: Brushfire Holiday\'s, Vol. 1',1,7.99,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(8,333365555,'En Concert (Bonus Track Version) [Live]',1,8.99,'2016-11-25 21:24:12','2016-11-25 21:24:12');
=======
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
=======
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `migrations` VALUES (1,'2016_11_24_021006_create_artists_table',1),(2,'2016_11_24_021006_create_collections_table',1),(3,'2016_11_24_021006_create_tracks_table',1);
=======
INSERT INTO `migrations` VALUES (1,'2016_11_09_241006_create_artists_table',1);
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracks` (
<<<<<<< HEAD
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trackId` int(10) unsigned NOT NULL,
  `trackName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trackPrice` decimal(5,2) NOT NULL,
  `collectionId` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tracks_trackid_index` (`trackId`),
  KEY `tracks_collectionid_index` (`collectionId`),
  CONSTRAINT `tracks_collectionid_foreign` FOREIGN KEY (`collectionId`) REFERENCES `collections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
=======
  `id` int(10) NOT NULL,
  `trackId` varchar(45) NOT NULL,
  `trackName` varchar(150) NOT NULL,
  `trackPrice` decimal(5,2) DEFAULT NULL,
  `collectionId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracks`
--

LOCK TABLES `tracks` WRITE;
/*!40000 ALTER TABLE `tracks` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `tracks` VALUES (1,879273565,'Better Together',1.29,1,'2016-11-25 21:24:10','2016-11-25 21:24:10'),(2,879273569,'Banana Pancakes',1.29,1,'2016-11-25 21:24:10','2016-11-25 21:24:10'),(3,879273573,'Sitting, Waiting, Wishing',1.29,1,'2016-11-25 21:24:10','2016-11-25 21:24:10'),(4,513801599,'A Pirate Looks At Forty',1.29,2,'2016-11-25 21:24:10','2016-11-25 21:24:10'),(5,879273570,'Good People',1.29,1,'2016-11-25 21:24:10','2016-11-25 21:24:10'),(6,879269461,'Upside Down',1.29,3,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(7,879716731,'All At Once',1.29,4,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(8,879209893,'At Or With Me',1.29,5,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(9,879273579,'Breakdown',1.29,1,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(10,879269473,'The 3 R\'s',1.29,3,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(11,659234741,'I Got You',1.29,6,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(12,879273584,'Do You Remember',1.29,1,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(13,879716736,'If I Had Eyes',1.29,4,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(14,879209890,'You and Your Heart',1.29,5,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(15,295315137,'Someday At Christmas',0.99,7,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(16,879273566,'Never Know',1.29,1,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(17,879716734,'Angel',1.29,4,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(18,879273572,'No Other Way',1.29,1,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(19,879273586,'Constellations',1.29,1,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(20,879273577,'Crying Shame',1.29,1,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(21,879273574,'Staple It Together',1.29,1,'2016-11-25 21:24:11','2016-11-25 21:24:11'),(22,333367268,'All At Once (Live In Barcelona, Spain)',1.29,8,'2016-11-25 21:24:12','2016-11-25 21:24:12'),(23,879716733,'Hope',1.29,4,'2016-11-25 21:24:12','2016-11-25 21:24:12'),(24,879273582,'Belle',1.29,1,'2016-11-25 21:24:12','2016-11-25 21:24:12'),(25,879273575,'Situations',1.29,1,'2016-11-25 21:24:12','2016-11-25 21:24:12'),(26,879273578,'If I Could',1.29,1,'2016-11-25 21:24:12','2016-11-25 21:24:12');
=======
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
/*!40000 ALTER TABLE `tracks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< HEAD
-- Dump completed on 2016-11-25 11:26:40
=======
-- Dump completed on 2016-11-24 12:37:34
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
