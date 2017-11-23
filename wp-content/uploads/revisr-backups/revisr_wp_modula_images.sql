
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
DROP TABLE IF EXISTS `wp_modula_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_modula_images` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `imageId` int(11) NOT NULL,
  `imagePath` longtext NOT NULL,
  `link` longtext,
  `target` varchar(50) DEFAULT NULL,
  `filters` varchar(1500) DEFAULT NULL,
  `description` longtext NOT NULL,
  `title` longtext NOT NULL,
  `sortOrder` int(11) NOT NULL,
  `valign` varchar(50) NOT NULL DEFAULT 'middle',
  `halign` varchar(50) NOT NULL DEFAULT 'center',
  UNIQUE KEY `id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_modula_images` WRITE;
/*!40000 ALTER TABLE `wp_modula_images` DISABLE KEYS */;
INSERT INTO `wp_modula_images` VALUES (11,2,1316,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/7569d41dadff0feca69355d5799c75d90b23c5bd_1000-500x500.jpg',NULL,NULL,NULL,'','7569d41dadff0feca69355d5799c75d90b23c5bd_1000',1,'middle','center'),(12,2,1315,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/IMG_0119-500x500.jpg',NULL,NULL,NULL,'','IMG_0119!',3,'middle','center'),(13,2,76,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/tomsk1-500x500.jpg',NULL,NULL,NULL,'','tomsk1',4,'middle','center'),(14,2,75,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/royal_site1-1-500x500.jpg',NULL,NULL,NULL,'','royal_site1',2,'middle','center'),(15,2,74,'http://new.4hands.ru/public_html/wp-content/uploads/2017/10/sovetskaya-1-500x500.jpg',NULL,NULL,NULL,'','sovetskaya',5,'middle','center');
/*!40000 ALTER TABLE `wp_modula_images` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

