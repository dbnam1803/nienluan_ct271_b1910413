-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: my_data
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id_acc` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sdt` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `acc_status` int(11) NOT NULL,
  PRIMARY KEY (`id_acc`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (3,'ken','ken1@gmail.com','123456789','202cb962ac59075b964b07152d234b70',1),(8,'Trần Văn A','tvA@gmail.com','0123456321','202cb962ac59075b964b07152d234b70',1),(9,'Nguyễn Văn B','nvb@gmail.com','01122334455','e10adc3949ba59abbe56e057f20f883e',1),(12,'Nguyễn Thị C','thc@gmail.com','0123456321','202cb962ac59075b964b07152d234b70',1);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acc` int(11) NOT NULL,
  `cart_code` varchar(10) NOT NULL,
  `time_cart` varchar(100) NOT NULL,
  `cart_status` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (50,8,'3129','27/04/2022 08:47:45am',1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_detail` (
  `HD_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_code` varchar(10) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  PRIMARY KEY (`HD_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_detail`
--

LOCK TABLES `cart_detail` WRITE;
/*!40000 ALTER TABLE `cart_detail` DISABLE KEYS */;
INSERT INTO `cart_detail` VALUES (51,'3129',65,4),(52,'3129',43,1);
/*!40000 ALTER TABLE `cart_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ql_danhmucsp`
--

DROP TABLE IF EXISTS `ql_danhmucsp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ql_danhmucsp` (
  `id_danhmucsp` int(11) NOT NULL AUTO_INCREMENT,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL,
  PRIMARY KEY (`id_danhmucsp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ql_danhmucsp`
--

LOCK TABLES `ql_danhmucsp` WRITE;
/*!40000 ALTER TABLE `ql_danhmucsp` DISABLE KEYS */;
INSERT INTO `ql_danhmucsp` VALUES (5,'Chuột',5),(6,'Tai Nghe',6),(7,'Bàn Phím',7),(9,'Phụ Kiện',9),(10,'Laptop',8);
/*!40000 ALTER TABLE `ql_danhmucsp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ql_sanpham`
--

DROP TABLE IF EXISTS `ql_sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ql_sanpham` (
  `id_sp` int(11) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(250) NOT NULL,
  `ma_sp` varchar(100) NOT NULL,
  `gia` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `ghichu` tinytext NOT NULL,
  `trangthai` int(11) NOT NULL,
  `id_danhmucsp` int(11) NOT NULL,
  PRIMARY KEY (`id_sp`),
  KEY `id_danhmucsp` (`id_danhmucsp`),
  CONSTRAINT `ql_sanpham_ibfk_1` FOREIGN KEY (`id_danhmucsp`) REFERENCES `ql_danhmucsp` (`id_danhmucsp`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ql_sanpham`
--

LOCK TABLES `ql_sanpham` WRITE;
/*!40000 ALTER TABLE `ql_sanpham` DISABLE KEYS */;
INSERT INTO `ql_sanpham` VALUES (18,'AKKO Keycap set – Black Pink (PBT Double-Shot/ASA profile/158 nút)','001','1090000',1000,'1649768254_akko.png','',1,7),(19,'AKKO Keycap set – Carbon Retro (PBT Double-Shot/ASA profile/158 nút)','002','1090000',1000,'1649768327_akko.jpg','',1,7),(20,'AKKO Keycap set – Los Angeles (PBT Double-Shot/ASA profile/158 nút)','003','1090000',1000,'1649768407_akko_blu_yellow.jpg','',1,7),(21,'AKKO Keycap set – Macaw (PBT Double-Shot/Cherry profile/157 nút)','004','890000',1000,'1649768474_akko_bluBlac.jpg','',1,7),(22,'AKKO Keycap set – Matcha Red Bean (PBT Double-Shot/ASA profile/158 nút)','005','1090000',1000,'1649768675_akko_greeWhit.jpg','',1,7),(23,'AKKO Keycap set – Midnight (PBT Double-Shot/ASA profile/178 nút)','006','1090000',1000,'1649768771_akko_midnight.jpg','',1,7),(24,'AKKO Keycap set – NEON (PBT Double-Shot/ASA profile/158 nút)','007','1090000',1000,'1649768841_akko_neon.jpg','',1,7),(25,'AKKO Keycap set – Silent (PBT Double-Shot/Cherry profile/177 nút)','008','890000',1000,'1649768891_akko_Silen.jpg','',1,7),(26,'AKKO Keycap set EVA-01 (PBT Double-Shot/ASA profile/158 nút)','009','1090000',1000,'1649768952_akko_EVA.jpg','',1,7),(29,'Balo Acer Predator SUV','010','2000000',1000,'1649770101_balo_SUV.jpeg','',1,9),(30,'Balo Gaming FSP','011','290000',1000,'1649770127_balo_FSP.jpg','',1,9),(31,'Balo Razer Rogue 13“ Backpack V3','012','1990000',1000,'1649770441_balo_razer13.png','',1,9),(32,'Balo Razer Rogue 15“ Backpack V3 Chromatic','013','3090000',1000,'1649770492_balo_razer15.png','',1,9),(33,'Balo TOMTOC Unisex travel Macbook 15“ - A71-D01X10','014','1080000',1000,'1649770558_balo_TOMTOC.jpg','',1,9),(34,'Bộ chuyển đổi âm thanh Dolby Virtual 7.1','015','1100000',1000,'1649770775_hyperx-dolby-virtual-7.1-gearvn_large.jpg','',1,9),(35,'Bộ keycaps FPS & Moba HyperX (Red)','016','450000',1000,'1649770823_gearvn.com-products-bo-keycaps-fps-moba-hyperx-red-1.jpg','',1,9),(36,'Bộ tai nghe rời Jabra Elite Active 75t','016','3990000',1000,'1649770861_gearvn-bo-tai-nghe-roi-jabra-elite-active-75t.jpg','',1,6),(37,'Bộ tai nghe thể thao rời Jabra Elite 75t','017','3790000',1000,'1649770923_gearvn-bo-tai-nghe-roi-jabra-elite-75t.jpg','',1,6),(38,'ROG Strix Fusion 700','018','5990000',1000,'1649770996_thumbtainghe_large.png','',1,6),(39,'Tai nghe AKG N5005','019','23900000',1000,'1649771064_gearvn-akg_n5005.jpg','',1,6),(40,'Tai nghe Asus ROG THETA 7.1','020','5990000',1000,'1649771100_asus-rog-theta-noise-cancelling-home-theater-grade-1.jpg','',1,6),(41,'Tai nghe Corsair Virtuoso RGB Wireless - White','021','4490000',1000,'1649771158_-ca-9011186-ap-gallery-virtuoso-white.png','',1,9),(42,'Tai nghe Corsair Virtuoso RGB Wireless - Carbon','022','4890000',1000,'1649771206_-ca-9011185-ap-gallery-virtuoso-carbon.png','',1,6),(43,'Tai nghe Razer BlackShark V2 Pro - Rainbow Six Edition','023','5590000',1000,'1649771250_rz04-03220200-r3m1.jpg','',1,6),(44,'Chuột Mad Catz R.A.T. PRO X3','024','6690000',1000,'1649771336_Chuột Mad Catz R.A.T. PRO X3.jpg','',1,5),(45,'Chuột Razer Basilisk Ultimate','025','3990000',1000,'1649771377_gearvn-chuot-razer-basilisk-ultimate.jpg','',1,5),(46,'Chuột Razer Viper Ultimate with Charging Dock - Mercury','026','3790000',1000,'1649771418_gearvn-chuot-razer-viper-ultimate-with-charging-dock-mercury.jpg','',1,5),(47,'Chuột Asus ROG Chakram','027','3890000',1000,'1649771457_gearvn-chuot-asus-rog-chakram.jpg','',1,5),(48,'Chuột Razer Basilisk Ultimate (Bản không dock sạc)','028','3590000',1000,'1649771492_gearvn-chuot-razer-basilisk-ultimate-ban-khong-dock-sac.jpg','',1,5),(49,'Chuột Steelseries Rival 650','025','2590000',1000,'1649771579_rival650-gearvn_large.jpg','',1,5),(50,'Chuột Corsair DarkCore RGB Pro SE Wireless','026','2490000',1000,'1649771610_chuot-corsair-dark-core-rgb-pro-se.jpg','',1,5),(51,'Chuột Steelseries Rival 3','027','799000',1000,'1649771665_chuot-steelseries-rival-3-gearvn.jpg','',1,5),(52,'Chuột HyperX PulseFire FPS Core','028','790000',1000,'1649771705_gvn_ks_pfcore.png','',1,5),(53,'Lót chuột Steelseries Qck Mini','029','190000',1000,'1649771764_9017_1_large.jpg','',1,9),(54,'Lót chuột Razer Sphex V3 Ultra Thin Large','030','699000',1000,'1649771796_large_624978.jpg','',1,9),(55,'Lót chuột Akko Dragonball Super - Battle of Gods','031','390000',1000,'1649771889_dbs_pad_1_010e50deb62a4f118ba81ce7c34c6d2a_large.jpg','',1,9),(56,'Lót chuột Logitech G840 KDA XL','032','1090000',1000,'1649771914_thumblc_150f025cc2b64820b676353c90b1d295_large.png','',1,9),(57,'Lót chuột Dare-U ESP109','033','180000',1000,'1649771957_gvn_dare_esp109_d7a6e054ad72402caec2207970c2f5cc_large.png','',1,9),(58,'Ghế Gaming Noble Chair - Epic Series Black','034','11990000',1000,'1649772025_gearvn-epic-black-7_large.jpg','',1,9),(59,'Ghế chơi game DXRacer G Series NW','034','8880000',1000,'1649772075_12352_28fd79f300034b938468ac84cd408b7e_large.png','',1,9),(60,'Ghế Anda Seat Spirit King V2 Black/Red','035','799000',1000,'1649772112_gearvn_andaspirit_large.png','',1,9),(61,'Ghế Anda Seat Spirit King V2 Black/Grey','036','790000',1000,'1649772137_5-1000x1000_d1aa18e774084b2092310dbd9028a7c3_large.jpg','',1,9),(62,'Laptop gaming Acer Nitro 5 AN515 45 R9SC','037','36690000',1000,'1649772490_r9sc_cffe87e9a73d4ed1be9991c474d1fde0_large.png','',1,10),(63,'Laptop Gaming Asus ROG Zephyrus G15 GA503QM HQ158T','038','43490000',1000,'1649772550_rog_zephyrus_g15.png','',1,10),(64,'Laptop GIGABYTE AORUS 15P XD 73S1324GH','039','53990000',1000,'1649772595_aorus_15p_xd_73s1324gh.png','',1,10),(65,'Laptop Gaming ASUS ROG Zephyrus G15 GA503QS HQ052T','040','62990000',1000,'1649772648_hq052t_d935f918c28e4b0485b861bc5cef2f66_large.png','',1,10);
/*!40000 ALTER TABLE `ql_sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ad_status` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',1);
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-27 10:51:12
