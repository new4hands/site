
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
DROP TABLE IF EXISTS `wp_finaltiles_gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_finaltiles_gallery_images` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'image',
  `imageId` int(11) NOT NULL,
  `imagePath` longtext NOT NULL,
  `filters` varchar(1500) DEFAULT NULL,
  `link` longtext,
  `title` longtext,
  `target` varchar(50) DEFAULT NULL,
  `blank` enum('T','F') NOT NULL DEFAULT 'F',
  `description` longtext NOT NULL,
  `sortOrder` int(11) NOT NULL,
  `group` text,
  `hidden` enum('T','F') NOT NULL DEFAULT 'F',
  UNIQUE KEY `id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_finaltiles_gallery_images` WRITE;
/*!40000 ALTER TABLE `wp_finaltiles_gallery_images` DISABLE KEYS */;
INSERT INTO `wp_finaltiles_gallery_images` VALUES (1,1,'image',76,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/tomsk1-300x144.jpg',NULL,NULL,'tomsk1',NULL,'F','',1,'','F'),(2,1,'image',75,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/royal_site1-1-300x141.jpg',NULL,NULL,'royal_site1',NULL,'F','',2,'','F'),(3,1,'image',74,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/sovetskaya-1-300x143.jpg',NULL,NULL,'sovetskaya',NULL,'F','',5,'','F'),(6,1,'image',1316,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/7569d41dadff0feca69355d5799c75d90b23c5bd_1000-150x150.jpg',NULL,NULL,'7569d41dadff0feca69355d5799c75d90b23c5bd_1000',NULL,'F','',3,'','F'),(7,1,'image',1315,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/IMG_0119-150x150.jpg',NULL,NULL,'IMG_0119!',NULL,'F','',4,'','F');
/*!40000 ALTER TABLE `wp_finaltiles_gallery_images` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

