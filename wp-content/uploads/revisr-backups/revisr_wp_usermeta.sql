
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
DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','Rodion'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'locale',''),(11,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(12,1,'wp_user_level','10'),(13,1,'dismissed_wp_pointers','text_widget_custom_html,wptiles-grid-editor-1'),(14,1,'show_welcome_panel','0'),(16,1,'wp_dashboard_quick_press_last_post_id','1516'),(17,1,'community-events-location','a:1:{s:2:\"ip\";s:11:\"5.128.235.0\";}'),(18,1,'closedpostboxes_dashboard','a:0:{}'),(19,1,'metaboxhidden_dashboard','a:0:{}'),(20,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(21,1,'metaboxhidden_nav-menus','a:1:{i:0;s:12:\"add-post_tag\";}'),(22,1,'nav_menu_recently_edited','2'),(23,1,'wp_user-settings','editor=html&libraryContent=browse&post_dfw=off&mfold=o'),(24,1,'wp_user-settings-time','1510558792'),(25,1,'closedpostboxes_page','a:1:{i:0;s:13:\"pageparentdiv\";}'),(26,1,'metaboxhidden_page','a:4:{i:0;s:10:\"postcustom\";i:1;s:16:\"commentstatusdiv\";i:2;s:7:\"slugdiv\";i:3;s:9:\"authordiv\";}'),(27,1,'_woocommerce_persistent_cart_1','a:1:{s:4:\"cart\";a:0:{}}'),(29,1,'closedpostboxes_2j_gallery','a:1:{i:0;s:16:\"commentstatusdiv\";}'),(30,1,'metaboxhidden_2j_gallery','a:1:{i:0;s:7:\"slugdiv\";}'),(32,1,'billing_first_name',''),(33,1,'billing_last_name',''),(34,1,'billing_company',''),(35,1,'billing_address_1',''),(36,1,'billing_address_2',''),(37,1,'billing_city',''),(38,1,'billing_postcode',''),(39,1,'billing_country',''),(40,1,'billing_state',''),(41,1,'billing_phone',''),(42,1,'billing_email','morrowcj81@gmail.com'),(43,1,'shipping_first_name',''),(44,1,'shipping_last_name',''),(45,1,'shipping_company',''),(46,1,'shipping_address_1',''),(47,1,'shipping_address_2',''),(48,1,'shipping_city',''),(49,1,'shipping_postcode',''),(50,1,'shipping_country',''),(51,1,'shipping_state',''),(52,1,'last_update','1509603110'),(54,1,'session_tokens','a:3:{s:64:\"f8ffd3afc21cdb151220f81681a9f15d20ee8f515d30e753faffe5828bb48b51\";a:4:{s:10:\"expiration\";i:1511501365;s:2:\"ip\";s:13:\"5.128.235.123\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36\";s:5:\"login\";i:1511328565;}s:64:\"0c333888f6b24f85f7104d7f9496b72d5a0c34fa10423d7af97441b4cf9d8a33\";a:4:{s:10:\"expiration\";i:1511522838;s:2:\"ip\";s:13:\"5.128.235.123\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36\";s:5:\"login\";i:1511350038;}s:64:\"c719007f7a562ccb02f2ab23522bed1f078be03355d4ede7915b9b5257068e16\";a:4:{s:10:\"expiration\";i:1511581942;s:2:\"ip\";s:13:\"5.128.235.123\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36\";s:5:\"login\";i:1511409142;}}'),(55,1,'tgmpa_dismissed_notice_tgmpa','1'),(56,1,'closedpostboxes_admin_page_revisr_new_commit','a:0:{}'),(57,1,'metaboxhidden_admin_page_revisr_new_commit','a:0:{}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

