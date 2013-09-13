-- MySQL dump 10.13  Distrib 5.5.32, for Linux (x86_64)
--
-- Host: localhost    Database: xmas
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `gartner_three`
--

DROP TABLE IF EXISTS `gartner_three`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gartner_three` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Department` int(11) NOT NULL,
  `DietaryRequirements` int(11) DEFAULT NULL,
  `OtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `GuestFirstName` varchar(40) DEFAULT NULL,
  `GuestLastName` varchar(40) DEFAULT NULL,
  `GuestDietaryRequirements` int(11) DEFAULT NULL,
  `GuestOtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `Static` int(11) DEFAULT NULL COMMENT '1:Accepted 0:Refuse',
  `DeclineReason` varchar(200) DEFAULT NULL,
  `Traffic` int(11) DEFAULT NULL,
  `CreateTime` varchar(20) DEFAULT NULL,
  `UpdateTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gartner_three`
--

LOCK TABLES `gartner_three` WRITE;
/*!40000 ALTER TABLE `gartner_three` DISABLE KEYS */;
INSERT INTO `gartner_three` VALUES (5,'asdfsaf','asfsadfs','asfdsf',3,0,'','','',NULL,'2',1,NULL,NULL,'1351736458','1351736458'),(13,'li','da','1554632662@qq.com',13,1,'','','',2,'0',1,NULL,NULL,'1351758664','1351758664'),(15,'li','da','li.da@brightac.com.cn',11,0,'','','',0,'0',1,NULL,NULL,'1351764229','1351764229'),(16,'123','1','ld.da@brightac.com',2,3,'','','',3,'3',1,NULL,1,'1352112943','1352112943'),(17,'sdf','sdf','li.da@brightac.com.cn',2,4,'','','',3,'0',1,NULL,1,'1352112988','1352112988'),(18,'123','123','ld123@163.com',3,0,'','','',0,'',1,NULL,NULL,'1352898038','1352898038'),(19,'sadf','sdf','ld123@163.com',2,0,'','sdf','sdf',1,'',1,NULL,NULL,'1352898106','1352898106'),(20,'Test','Test','test@test.com',1,0,'','','',0,'',1,NULL,1,'1377250522','1377250522');
/*!40000 ALTER TABLE `gartner_three` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gartner_two`
--

DROP TABLE IF EXISTS `gartner_two`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gartner_two` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Department` int(11) NOT NULL,
  `DietaryRequirements` int(11) DEFAULT NULL,
  `OtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `GuestFirstName` varchar(40) DEFAULT NULL,
  `GuestLastName` varchar(40) DEFAULT NULL,
  `GuestDietaryRequirements` int(11) DEFAULT NULL,
  `GuestOtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `Static` int(11) DEFAULT NULL COMMENT '1:Accepted 0:Refuse',
  `DeclineReason` varchar(200) DEFAULT NULL,
  `Traffic` int(11) DEFAULT NULL,
  `CreateTime` varchar(20) DEFAULT NULL,
  `UpdateTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gartner_two`
--

LOCK TABLES `gartner_two` WRITE;
/*!40000 ALTER TABLE `gartner_two` DISABLE KEYS */;
INSERT INTO `gartner_two` VALUES (5,'asdfsaf','asfsadfs','asfdsf',3,0,'','','',NULL,'2',1,NULL,NULL,'1351736458','1351736458'),(13,'li','da','1554632662@qq.com',13,1,'','','',2,'0',1,NULL,NULL,'1351758664','1351758664'),(15,'li','da','li.da@brightac.com.cn',11,0,'','','',0,'0',1,NULL,NULL,'1351764229','1351764229'),(16,'123','1','ld.da@brightac.com',2,3,'','','',3,'3',1,NULL,1,'1352112943','1352112943'),(17,'sdf','sdf','li.da@brightac.com.cn',2,4,'','','',3,'0',1,NULL,1,'1352112988','1352112988'),(18,'123','123','ld123@163.com',3,0,'','','',0,'',1,NULL,NULL,'1352898038','1352898038'),(19,'sadf','sdf','ld123@163.com',2,0,'','sdf','sdf',1,'',1,NULL,NULL,'1352898106','1352898106'),(20,'test','test','test@test.com',2,0,'','','',0,'',1,NULL,NULL,'1377249646','1377249646');
/*!40000 ALTER TABLE `gartner_two` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gartner_userinfo`
--

DROP TABLE IF EXISTS `gartner_userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gartner_userinfo` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Department` int(11) NOT NULL,
  `DietaryRequirements` int(11) DEFAULT NULL,
  `OtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `GuestFirstName` varchar(40) DEFAULT NULL,
  `GuestLastName` varchar(40) DEFAULT NULL,
  `GuestDietaryRequirements` int(11) DEFAULT NULL,
  `GuestOtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `Static` int(11) DEFAULT NULL COMMENT '1:Accepted 0:Refuse',
  `DeclineReason` varchar(200) DEFAULT NULL,
  `Traffic` int(11) DEFAULT NULL,
  `CreateTime` varchar(20) DEFAULT NULL,
  `UpdateTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gartner_userinfo`
--

LOCK TABLES `gartner_userinfo` WRITE;
/*!40000 ALTER TABLE `gartner_userinfo` DISABLE KEYS */;
INSERT INTO `gartner_userinfo` VALUES (5,'asdfsaf','asfsadfs','asfdsf',3,0,'','','',NULL,'2',1,NULL,NULL,'1351736458','1351736458'),(13,'li','da','1554632662@qq.com',13,1,'','','',2,'0',1,NULL,NULL,'1351758664','1351758664'),(15,'li','da','li.da@brightac.com.cn',11,0,'','','',0,'0',1,NULL,NULL,'1351764229','1351764229'),(16,'123','1','ld.da@brightac.com',2,3,'','','',3,'3',1,NULL,1,'1352112943','1352112943'),(17,'sdf','sdf','li.da@brightac.com.cn',2,4,'','','',3,'0',1,NULL,1,'1352112988','1352112988'),(18,'123','123','ld123@163.com',3,0,'','','',0,'',1,NULL,NULL,'1352898038','1352898038'),(19,'sadf','sdf','ld123@163.com',2,0,'','sdf','sdf',1,'',1,NULL,NULL,'1352898106','1352898106'),(20,'Testq','Test','test@test.com',2,0,'','','',0,'',1,NULL,NULL,'1377249162','1377249162');
/*!40000 ALTER TABLE `gartner_userinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gartner_userinfo1`
--

DROP TABLE IF EXISTS `gartner_userinfo1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gartner_userinfo1` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Department` int(11) NOT NULL,
  `DietaryRequirements` int(11) DEFAULT NULL,
  `OtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `GuestFirstName` varchar(40) DEFAULT NULL,
  `GuestLastName` varchar(40) DEFAULT NULL,
  `GuestDietaryRequirements` int(11) DEFAULT NULL,
  `GuestOtherDietaryRequirements` varchar(200) DEFAULT NULL,
  `Static` int(11) DEFAULT NULL COMMENT '1:Accepted 0:Refuse',
  `DeclineReason` varchar(200) DEFAULT NULL,
  `Traffic` int(11) DEFAULT NULL,
  `CreateTime` varchar(20) DEFAULT NULL,
  `UpdateTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gartner_userinfo1`
--

LOCK TABLES `gartner_userinfo1` WRITE;
/*!40000 ALTER TABLE `gartner_userinfo1` DISABLE KEYS */;
INSERT INTO `gartner_userinfo1` VALUES (5,'asdfsaf','asfsadfs','asfdsf',3,0,'','','',NULL,'2',1,NULL,NULL,'1351736458','1351736458'),(13,'li','da','1554632662@qq.com',13,1,'','','',2,'0',1,NULL,NULL,'1351758664','1351758664'),(15,'li','da','li.da@brightac.com.cn',11,0,'','','',0,'0',1,NULL,NULL,'1351764229','1351764229'),(16,'123','1','ld.da@brightac.com',2,3,'','','',3,'3',1,NULL,1,'1352112943','1352112943'),(17,'sdf','sdf','li.da@brightac.com.cn',2,4,'','','',3,'0',1,NULL,1,'1352112988','1352112988'),(18,'123','123','ld123@163.com',3,0,'','','',0,'',1,NULL,NULL,'1352898038','1352898038'),(19,'sadf','sdf','ld123@163.com',2,0,'','sdf','sdf',1,'',1,NULL,NULL,'1352898106','1352898106');
/*!40000 ALTER TABLE `gartner_userinfo1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-13 10:36:44
