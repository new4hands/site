
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
DROP TABLE IF EXISTS `wp_ab_appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ab_appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `series_id` int(10) unsigned DEFAULT NULL,
  `staff_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `google_event_id` varchar(255) DEFAULT NULL,
  `extras_duration` int(11) NOT NULL DEFAULT '0',
  `internal_note` text,
  PRIMARY KEY (`id`),
  KEY `series_id` (`series_id`),
  KEY `staff_id` (`staff_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `wp_ab_appointments_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `wp_ab_series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wp_ab_appointments_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `wp_ab_staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wp_ab_appointments_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `wp_ab_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_ab_appointments` WRITE;
/*!40000 ALTER TABLE `wp_ab_appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_ab_appointments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

