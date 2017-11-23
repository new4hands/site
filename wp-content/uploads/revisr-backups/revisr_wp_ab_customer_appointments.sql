
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
DROP TABLE IF EXISTS `wp_ab_customer_appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ab_customer_appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `appointment_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `payment_id` int(10) unsigned DEFAULT NULL,
  `number_of_persons` int(10) unsigned NOT NULL DEFAULT '1',
  `extras` text,
  `custom_fields` text,
  `status` enum('pending','approved','cancelled','rejected') NOT NULL DEFAULT 'approved',
  `token` varchar(255) DEFAULT NULL,
  `time_zone_offset` int(11) DEFAULT NULL,
  `locale` varchar(8) DEFAULT NULL,
  `compound_service_id` int(10) unsigned DEFAULT NULL,
  `compound_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `appointment_id` (`appointment_id`),
  KEY `payment_id` (`payment_id`),
  CONSTRAINT `wp_ab_customer_appointments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `wp_ab_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wp_ab_customer_appointments_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `wp_ab_appointments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wp_ab_customer_appointments_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `wp_ab_payments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_ab_customer_appointments` WRITE;
/*!40000 ALTER TABLE `wp_ab_customer_appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_ab_customer_appointments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

