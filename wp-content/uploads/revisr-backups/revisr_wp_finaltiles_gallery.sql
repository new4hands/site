
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
DROP TABLE IF EXISTS `wp_finaltiles_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_finaltiles_gallery` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration` varchar(5000) DEFAULT NULL,
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_finaltiles_gallery` WRITE;
/*!40000 ALTER TABLE `wp_finaltiles_gallery` DISABLE KEYS */;
INSERT INTO `wp_finaltiles_gallery` VALUES (1,'{\"ajaxLoading\":\"F\",\"layout\":\"final\",\"name\":\"4hands_about-us\",\"slug\":\"4hands_about-us\",\"description\":\"gallery\",\"lightbox\":\"lightbox2\",\"mobileLightbox\":\" \",\"lightboxImageSize\":\"large\",\"blank\":\"F\",\"margin\":10,\"allFilterLabel\":null,\"minTileWidth\":250,\"gridCellSize\":25,\"gridCellSizeDisabledBelow\":300,\"enableTwitter\":\"F\",\"backgroundColor\":\"transparent\",\"filterClick\":\"F\",\"disableLightboxGroups\":\"F\",\"defaultFilter\":null,\"enableFacebook\":\"F\",\"enableGplus\":\"F\",\"enablePinterest\":\"F\",\"imagesOrder\":\"user\",\"compressHTML\":\"T\",\"loadMethod\":\"sequential\",\"socialIconColor\":\"#ffffff\",\"socialIconPosition\":\"bottom\",\"socialIconStyle\":\"none\",\"recentPostsCaption\":\"title\",\"recentPostsCaptionAutoExcerptLength\":20,\"captionBehavior\":\"none\",\"captionEffect\":null,\"captionEmpty\":\"hide\",\"captionBackgroundColor\":\"#000000\",\"captionColor\":\"#ffffff\",\"captionFrameColor\":\"#ffffff\",\"captionEffectDuration\":250,\"captionEasing\":\"ease\",\"captionVerticalAlignment\":\"middle\",\"captionHorizontalAlignment\":\"center\",\"captionMobileBehavior\":\"desktop\",\"captionOpacity\":80,\"captionIcon\":\"\",\"captionFrame\":\"F\",\"customCaptionIcon\":null,\"captionIconColor\":\"#ffffff\",\"captionIconSize\":12,\"captionFontSize\":12,\"captionPosition\":\"inside\",\"titleFontSize\":14,\"hoverZoom\":0,\"hoverRotation\":0,\"hoverDuration\":0,\"hoverIconRotation\":\"F\",\"filters\":null,\"wp_field_caption\":\"caption\",\"wp_field_title\":\"title\",\"borderSize\":0,\"borderColor\":\"transparent\",\"loadingBarColor\":\"#666\",\"loadingBarBackgroundColor\":\"#fff\",\"enlargeImages\":\"T\",\"borderRadius\":0,\"imageSizeFactor\":50,\"imageSizeFactorTabletLandscape\":80,\"imageSizeFactorTabletPortrait\":70,\"imageSizeFactorPhoneLandscape\":60,\"imageSizeFactorPhonePortrait\":50,\"imageSizeFactorCustom\":null,\"columns\":4,\"columnsTabletLandscape\":4,\"columnsTabletPortrait\":3,\"columnsPhoneLandscape\":3,\"columnsPhonePortrait\":2,\"max_posts\":0,\"shadowSize\":0,\"shadowColor\":\"#cccccc\",\"source\":\"images\",\"post_types\":\"\",\"post_categories\":\"\",\"post_tags\":\"\",\"tilesPerPage\":0,\"woo_categories\":\"\",\"defaultPostImageSize\":\"medium\",\"defaultWooImageSize\":\"medium\",\"width\":\"100%\",\"beforeGalleryText\":\"\",\"afterGalleryText\":\"\",\"aClass\":\"\",\"rel\":\"\",\"style\":\"\",\"delay\":0,\"script\":\"\",\"support\":\"F\",\"supportText\":\"Powered by Final Tiles Grid Gallery\",\"scrollEffect\":null,\"loadedScaleY\":100,\"loadedScaleX\":100,\"loadedRotate\":null,\"loadedHSlide\":0,\"loadedVSlide\":0,\"loadedEasing\":\"ease-out\",\"loadedDuration\":\"500\",\"loadedRotateY\":0,\"loadedRotateX\":0}');
/*!40000 ALTER TABLE `wp_finaltiles_gallery` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

