-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: diydb
-- ------------------------------------------------------
-- Server version	5.6.34

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
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_images_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (9,'j5-768x5761484605223.jpg','How to','Life is busy, and sometimes I find myself making life harder by making too many damn lists. They become scattered, and therefore completely useless. I have composition books full of ideas, mixed with grocery lists and doodles.',1,'2017-01-16 22:20:23'),(10,'DIY-Pillows-02-1003x10241484605572.jpg','Pillow','As far as sewing projects go, this one is pretty simple and straightforward, so you can finish your first one in about an hour and then whip up your second in about thirty minutes. Cut out all of your fabric at once to make even quicker work of things. They\'re roomy enough to grab onto things and the pineapple leaves help protect your wrists from hot trays from the oven. As darling as they are, though, you may just want to keep them on display all summer!',1,'2017-01-16 22:26:12'),(11,'Use-Crayons-to-Create-Color-Block-Candles1484605634.jpg','Candle','If I could make a housewarming gift for everyone I knew, this would be it. Seriously, you should probably just go ahead and move this month in case I run out of this fabric. I came up with this pineapple oven mitt design after realizing how perfect the shape would be for such an item, and I just knew a few of you might be feeling brave enough to dust off those sewing machines to make your own. ',1,'2017-01-16 22:27:14'),(13,'d-11484605877.jpg','slippers','Repeat the same process with the smaller mitt side. I didn\'t add quilting to this side, but you can if you\'d like. Notice I stitched my opening at the bottom of this piece as well so that I could turn it right side out. For extra interest, I pinned a length of double-sided bias tape over the top edge and stitched it on. This just adds another layer of color and gives it a more finished look',1,'2017-01-16 22:31:17'),(14,'d-411484605972.jpg','Necklace','\nSwinging Heart Photo Locket DIY (click through for tutorial)\nSupplies:\n-2 heart stamping blanks\n-Canon PIXMA MG7720 and photo paper\n-scissors\n-glue\n-Mod Podge\n-jump ring (I would get a variety pack so you have options.)\n-chain of your choice\n-jewelry needle nose pliers\n-small hole punch (optional',1,'2017-01-16 22:33:17'),(15,'29-Great-DIY-Useful-Ideas-1-620x10401484606081.jpg','brace','First youâ€™ll want to choose a photo to put inside your braclet. Measure your stamping blank and try to resize your photo to a good size so that the main part of your face/faces will fit inside the heart area. I made mine a few sizes (some a little bigger and some a little smaller) so I would have at least one that was the perfect size. ',1,'2017-01-16 22:34:41'),(16,'3c524be7299661091fcf10bb14d78d7f1484606269.jpg','Shawl','I remember that about 10 years ago I used to have a locket that I loved to wear on a daily basis. It wasnâ€™t even so much that the ',1,'2017-01-16 22:39:42');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ajla','Ajla','Šukrija','ajla.sukrija@gmail.com','5cce38a2f2c882a660f64c9d378aff82','2017-01-14 15:03:54'),(2,'amnas','Amna','Šukrija','amna.sukrija@gmail.com','9822512ce145b0f2a74ad9e4f53df168','2017-01-14 15:04:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (1,5,1,'2017-01-15 14:59:56'),(2,9,1,'2017-01-16 22:20:48'),(3,15,1,'2017-01-16 22:35:51'),(4,13,1,'2017-01-16 22:35:54'),(5,12,1,'2017-01-16 22:35:55'),(6,11,1,'2017-01-16 22:35:59');
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-16 23:48:03
