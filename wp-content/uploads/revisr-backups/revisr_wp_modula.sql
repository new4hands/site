
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
DROP TABLE IF EXISTS `wp_modula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_modula` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration` varchar(5000) NOT NULL,
  UNIQUE KEY `id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_modula` WRITE;
/*!40000 ALTER TABLE `wp_modula` DISABLE KEYS */;
INSERT INTO `wp_modula` VALUES (2,'{\"name\":\"About\",\"slug\":\"about\",\"description\":\"Gallery\",\"lightbox\":\"lightbox2\",\"img_size\":500,\"hasResizedImages\":true,\"wp_field_caption\":\"caption\",\"wp_field_title\":\"title\",\"margin\":10,\"randomFactor\":\"50\",\"shuffle\":\"F\",\"enableTwitter\":\"T\",\"enableFacebook\":\"T\",\"enableGplus\":\"T\",\"enablePinterest\":\"T\",\"captionColor\":\"#ffffff\",\"hoverEffect\":\"pufrobo\",\"borderSize\":0,\"loadedScale\":100,\"loadedHSlide\":0,\"loadedVSlide\":0,\"loadedRotate\":0,\"socialIconColor\":\"#ffffff\",\"captionFontSize\":14,\"titleFontSize\":16,\"borderColor\":\"#ffffff\",\"borderRadius\":0,\"shadowSize\":0,\"shadowColor\":\"#ffffff\",\"width\":\"100%\",\"height\":\"800\",\"style\":\"\",\"script\":\"\"}');
/*!40000 ALTER TABLE `wp_modula` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

