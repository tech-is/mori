-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: teckis
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `bbs`
--

DROP TABLE IF EXISTS `bbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bbs` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(64) NOT NULL,
  `TEXT` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbs`
--

LOCK TABLES `bbs` WRITE;
/*!40000 ALTER TABLE `bbs` DISABLE KEYS */;
INSERT INTO `bbs` VALUES (1,'森','テスト'),(2,'kakuya','よろしくお願いいたします。'),(3,'&lt;script','xss'),(4,'&lt;script&gt;alert(0);&lt;/script&gt;','yahho'),(5,'田中太郎','テスト1'),(6,'田中太郎','test3'),(7,'mori','hello'),(8,'あ　','あ　'),(9,'shimizu','あああ\r\n?=\\345#$%'),(10,'shimizu','あああ\r\n?=\\345#$%'),(11,'shimizu','あああ\r\n?=\\345#$%'),(12,'<script>alert(0);</script>','a'),(13,'a','<script>alert(0);</script>'),(14,'&lt;script&gt;alert(0);&lt;/script&gt;','a'),(15,'&lt;script&gt;alert(0);&lt;/script&gt;','a'),(16,'<script>alert(0);</script>','a'),(17,'田中太郎','aaa'),(18,'田中太郎','test'),(19,'浦川花','よろしくお願いします');
/*!40000 ALTER TABLE `bbs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbs_laravel`
--

DROP TABLE IF EXISTS `bbs_laravel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bbs_laravel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '名無しさん',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbs_laravel`
--

LOCK TABLES `bbs_laravel` WRITE;
/*!40000 ALTER TABLE `bbs_laravel` DISABLE KEYS */;
INSERT INTO `bbs_laravel` VALUES (1,'taro','ぬるぽ','2019-05-09 02:06:18','2019-05-09 02:06:18'),(2,'田中太郎','aaa','2019-05-09 03:44:45','2019-05-09 03:44:45'),(5,'名無しさん','おいっすー','2019-05-09 04:17:24','2019-05-09 04:17:24'),(6,'森','ｋｋｊｊｊ','2019-05-09 04:19:48','2019-05-09 04:19:48'),(7,'名無しさん','ヤバいですね！','2019-05-09 04:45:51','2019-05-09 04:45:51'),(8,'神様','天下を取りたいです！','2019-05-09 10:14:50','2019-05-09 10:14:50'),(9,'バグスタイル','ばぐばぐばぐ','2019-05-10 07:57:25','2019-05-10 07:57:25'),(11,'田中太郎','おいっすー','2019-05-12 23:02:37','2019-05-12 23:02:37'),(12,'あああ','あああ','2019-05-12 23:21:39','2019-05-12 23:21:39'),(13,'しんたろう','こんにちは！ｗｗｗｗｗｗｗ','2019-05-13 09:52:10','2019-05-13 09:52:10');
/*!40000 ALTER TABLE `bbs_laravel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(64) NOT NULL,
  `KANA` varchar(64) NOT NULL,
  `TEL` int(16) NOT NULL,
  `MAIL` varchar(32) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `SEX` varchar(4) NOT NULL,
  `MAGAZINE` int(1) NOT NULL,
  `PASS_TMP` varchar(16) NOT NULL,
  `PASSWORD` varchar(256) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `MAIL` (`MAIL`),
  KEY `MAIL_2` (`MAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'田中太郎','タナカタロウ',0,'example@example.com',1900,'male',1,'','$2y$10$TWbpykLFxnDZiAfGjdhTiedsap/NtrmuAfX3hIo.MUipdkdH8IlOO'),(2,'田中太郎','タナカタロウ',0,'mple@example.com',1900,'male',1,'','$2y$10$GxpDci/JLK5u45afPrwy/..BQZ2xfEbA6Cdnx5z.Guans9ffY1NDO');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_05_09_065745_create_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-14 16:05:57
