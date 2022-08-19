-- MySQL dump 10.13  Distrib 5.7.39, for Win64 (x86_64)
--
-- Host: localhost    Database: kelompok6
-- ------------------------------------------------------
-- Server version	5.7.39-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_admin_ibfk1` (`user_id`),
  CONSTRAINT `user_admin_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,1,'Admin','2022-04-25 15:45:21',NULL),(2,15,'Michael','2022-05-14 13:24:44','2022-05-15 13:54:47'),(6,25,'Tupperware','2022-05-15 19:24:39','2022-05-15 19:24:39');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_kelas_guru`
--

DROP TABLE IF EXISTS `assign_kelas_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_kelas_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `akg_k` (`kelas_id`),
  KEY `akg_g` (`guru_id`),
  CONSTRAINT `akg_g` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `akg_k` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_kelas_guru`
--

LOCK TABLES `assign_kelas_guru` WRITE;
/*!40000 ALTER TABLE `assign_kelas_guru` DISABLE KEYS */;
INSERT INTO `assign_kelas_guru` VALUES (81,1,1,'2022-08-04 13:37:57','2022-08-04 13:37:57');
/*!40000 ALTER TABLE `assign_kelas_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_kelas_siswa`
--

DROP TABLE IF EXISTS `assign_kelas_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_kelas_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `aks_s` (`siswa_id`),
  KEY `aks_k` (`kelas_id`),
  CONSTRAINT `aks_k` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `aks_s` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_kelas_siswa`
--

LOCK TABLES `assign_kelas_siswa` WRITE;
/*!40000 ALTER TABLE `assign_kelas_siswa` DISABLE KEYS */;
INSERT INTO `assign_kelas_siswa` VALUES (19,1,1,'2022-08-04 08:04:23','2022-08-04 20:02:06'),(20,2,18,'2022-08-04 16:10:33','2022-08-04 09:12:06');
/*!40000 ALTER TABLE `assign_kelas_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_mapel_kelas`
--

DROP TABLE IF EXISTS `assign_mapel_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_mapel_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `amk_m` (`mapel_id`),
  KEY `amk_k` (`kelas_id`),
  CONSTRAINT `amk_k` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `amk_m` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_mapel_kelas`
--

LOCK TABLES `assign_mapel_kelas` WRITE;
/*!40000 ALTER TABLE `assign_mapel_kelas` DISABLE KEYS */;
INSERT INTO `assign_mapel_kelas` VALUES (106,1,1,39,'2022-08-04 12:08:27','2022-08-04 12:08:27'),(109,2,1,39,'2022-08-04 12:34:18','2022-08-04 12:35:41'),(110,3,1,39,'2022-08-04 12:45:21','2022-08-04 12:45:21'),(111,4,2,39,'2022-08-04 13:04:29','2022-08-04 13:04:29');
/*!40000 ALTER TABLE `assign_mapel_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_mapel_kelas_guru`
--

DROP TABLE IF EXISTS `assign_mapel_kelas_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_mapel_kelas_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_mapel_kelas_id` int(11) NOT NULL,
  `assign_kelas_guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `amkg_akg` (`assign_kelas_guru_id`),
  KEY `amkg_akm` (`assign_mapel_kelas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_mapel_kelas_guru`
--

LOCK TABLES `assign_mapel_kelas_guru` WRITE;
/*!40000 ALTER TABLE `assign_mapel_kelas_guru` DISABLE KEYS */;
/*!40000 ALTER TABLE `assign_mapel_kelas_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_mapel_kelas_guru_bab`
--

DROP TABLE IF EXISTS `assign_mapel_kelas_guru_bab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_mapel_kelas_guru_bab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_mapel_kelas_guru_id` int(11) NOT NULL,
  `bab_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `amkgb_amkg` (`assign_mapel_kelas_guru_id`),
  KEY `amkgb_b` (`bab_id`),
  CONSTRAINT `amkgb_amkg` FOREIGN KEY (`assign_mapel_kelas_guru_id`) REFERENCES `assign_mapel_kelas_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `amkgb_b` FOREIGN KEY (`bab_id`) REFERENCES `bab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_mapel_kelas_guru_bab`
--

LOCK TABLES `assign_mapel_kelas_guru_bab` WRITE;
/*!40000 ALTER TABLE `assign_mapel_kelas_guru_bab` DISABLE KEYS */;
/*!40000 ALTER TABLE `assign_mapel_kelas_guru_bab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bab`
--

DROP TABLE IF EXISTS `bab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bab`
--

LOCK TABLES `bab` WRITE;
/*!40000 ALTER TABLE `bab` DISABLE KEYS */;
INSERT INTO `bab` VALUES (1,'Bab I','2022-04-26 02:29:45',NULL),(2,'Bab II','2022-04-26 02:30:03',NULL),(3,'Bab III','2022-04-26 02:30:03',NULL),(4,'Bab IV','2022-04-26 02:30:13',NULL),(5,'Bab V','2022-04-26 02:30:13',NULL);
/*!40000 ALTER TABLE `bab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_bab`
--

DROP TABLE IF EXISTS `course_bab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_bab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_bab`
--

LOCK TABLES `course_bab` WRITE;
/*!40000 ALTER TABLE `course_bab` DISABLE KEYS */;
INSERT INTO `course_bab` VALUES (1,'BAB I',106,'2022-08-04 21:08:29',NULL),(2,'BAB II',107,'2022-08-04 21:08:29',NULL),(6,'BAB 3',106,'2022-08-04 18:59:45','2022-08-04 18:59:45');
/*!40000 ALTER TABLE `course_bab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_pengumuman`
--

DROP TABLE IF EXISTS `file_pengumuman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengumuman_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fp_p` (`pengumuman_id`),
  CONSTRAINT `fp_p` FOREIGN KEY (`pengumuman_id`) REFERENCES `pengumuman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_pengumuman`
--

LOCK TABLES `file_pengumuman` WRITE;
/*!40000 ALTER TABLE `file_pengumuman` DISABLE KEYS */;
INSERT INTO `file_pengumuman` VALUES (7,32,'0508bf52db2ddc976ba39c757666c363.docx','2022-08-04 06:56:22','2022-08-04 06:56:22','GL01A (2).docx'),(8,32,'3296df162061e7a3c0342f678875ea46.pdf','2022-08-04 11:58:42','2022-08-04 11:58:42','RUNDOWN BEDAH BUKU Rev 2.pdf'),(9,33,'3b7ef85b65d948ced302af1db7a74389.jpeg','2022-08-04 23:34:35','2022-08-04 23:34:35','20220802 out-wifi.jpeg');
/*!40000 ALTER TABLE `file_pengumuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nama` varchar(141) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guru_user_id_ibfk1` (`user_id`),
  CONSTRAINT `guru_user_id_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (1,3,'Anto Siakangan M.Th',NULL,'Huta Gijang','4,3','','2022-04-25 09:16:16','2022-08-02 21:00:42'),(2,4,'Adrian Butar-butar M.Pd',NULL,'Huta Tanjak','','','2022-04-25 16:46:34',NULL),(3,5,'Andoko Hutahean S.Pd',NULL,'Huta Padang','','','2022-04-26 03:06:55',NULL),(4,6,'Andini Sirait S.Pd',NULL,'Huta toru','1,2,3,1,2,3','','2022-04-26 03:47:50','2022-08-02 21:00:13'),(5,7,'Irine Sinaga S.Pd',NULL,'Huta tongah','','','2022-04-26 03:47:50',NULL),(36,67,'ali','c67c7a01646d8e0194c8363af005c932.jpg','surabaya','2','1','2022-07-31 00:48:53','2022-08-02 21:02:05'),(37,69,'reny','f6bea49fb6c7326e66f0c9488224af0d.jpg','surabaya','2','1','2022-07-31 05:58:14','2022-08-02 21:01:59'),(39,73,'eff',NULL,'abcedef','1','1','2022-08-02 17:13:20','2022-08-02 21:01:29');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'Kelas IV A','2022-04-25 09:17:07',NULL),(2,'Kelas IV B','2022-04-25 09:17:51',NULL),(3,'Kelas V A','2022-04-25 09:17:51',NULL),(4,'Kelas V B','2022-04-25 09:18:13',NULL),(5,'Kelas VI A','2022-04-25 09:18:13',NULL),(6,'Kelas VI B','2022-04-25 09:18:21',NULL);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mapel`
--

DROP TABLE IF EXISTS `mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mapel`
--

LOCK TABLES `mapel` WRITE;
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
INSERT INTO `mapel` VALUES (1,'Agama','2022-04-25 09:18:44',NULL),(2,'Bahasa Indonesia','2022-04-25 09:18:44',NULL),(3,'Pendidikan Kewarganegaraan (PKN)','2022-04-25 09:19:17',NULL),(4,'Matematika (MM)','2022-04-25 09:19:17',NULL),(5,'Bahasa Ingriss','2022-04-25 09:19:42',NULL),(6,'Ilmu Pengetahuan Alam (IPA)','2022-04-25 09:19:42',NULL),(7,'Ilmu Pengetahuan Sosial (IPS)','2022-04-25 09:20:38',NULL),(8,'pendidikan jasmani olahraga dan kesehatan (PenJasKes)','2022-04-25 09:20:38',NULL);
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bab_id` int(11) NOT NULL,
  `assign_mapel_kelas` int(11) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `judul` varchar(141) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `amkgb_m` (`bab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi`
--

LOCK TABLES `materi` WRITE;
/*!40000 ALTER TABLE `materi` DISABLE KEYS */;
INSERT INTO `materi` VALUES (22,1,0,'Screenshot_(12)4.png','https://www.youtube.com/watch?v=3BkRxxfn9zU','Materi 9','asdf','Screenshot_(12)3.png','2022-08-04 19:09:13','2022-08-04 19:44:12'),(23,1,0,'Screenshot_(12)6.png','https://www.youtube.com/watch?v=3BkRxxfn9zU','Materi 2','Suatu deskripsi\r\n','Screenshot_(12)5.png','2022-08-04 19:09:34','2022-08-04 19:29:16'),(24,1,0,'Screenshot_(12).png','https://www.youtube.com/watch?v=3BkRxxfn9zU','asdf','asdf','Screenshot_(14).png','2022-08-04 19:25:54','2022-08-04 19:25:54');
/*!40000 ALTER TABLE `materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materi_tugas`
--

DROP TABLE IF EXISTS `materi_tugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materi_tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materi_id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `deadline_1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline_2` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materi_id_ibfk1` (`materi_id`),
  CONSTRAINT `materi_id_ibfk1` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi_tugas`
--

LOCK TABLES `materi_tugas` WRITE;
/*!40000 ALTER TABLE `materi_tugas` DISABLE KEYS */;
INSERT INTO `materi_tugas` VALUES (20,22,'ed2ed86a46b55e596d68999fb8bb4f51.png','2022-08-06 06:31:00','2022-08-06 06:31:00','2022-08-04 23:31:46','2022-08-04 23:31:46');
/*!40000 ALTER TABLE `materi_tugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materi_tugas_submit`
--

DROP TABLE IF EXISTS `materi_tugas_submit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materi_tugas_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materi_tugas_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materi_tugas_id_ibfk1` (`materi_tugas_id`),
  KEY `siswa_id_ibfk1` (`siswa_id`),
  CONSTRAINT `materi_tugas_id_ibfk1` FOREIGN KEY (`materi_tugas_id`) REFERENCES `materi_tugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_id_ibfk1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi_tugas_submit`
--

LOCK TABLES `materi_tugas_submit` WRITE;
/*!40000 ALTER TABLE `materi_tugas_submit` DISABLE KEYS */;
INSERT INTO `materi_tugas_submit` VALUES (11,20,1,'ed4ac5dc2b9c64658413c3ed5b135855.jpeg','2022-08-05 06:31:56','2022-08-05 06:32:26');
/*!40000 ALTER TABLE `materi_tugas_submit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `judul` varchar(141) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `a_p` (`author`),
  CONSTRAINT `a_p` FOREIGN KEY (`author`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengumuman`
--

LOCK TABLES `pengumuman` WRITE;
/*!40000 ALTER TABLE `pengumuman` DISABLE KEYS */;
INSERT INTO `pengumuman` VALUES (32,1,'2ed774a5d91d1a37450ecb6f7530f5c3.jpeg','Pengumuman Edited','tes','2022-08-04 06:55:04','2022-08-04 06:55:25'),(33,1,'90c7c6c7ac927444faf0cf6031eeef5c.jpeg','Baru','asdf','2022-08-04 23:34:35','2022-08-04 23:34:35');
/*!40000 ALTER TABLE `pengumuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `id_permission` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'lihat pengumuman'),(2,'edit pengumuman'),(3,'delete pengumuman'),(4,'tambah pengumuman'),(5,'lihat modul'),(6,'edit modul'),(7,'delete modul'),(8,'tambah modul'),(9,'download modul'),(10,'upload tugas'),(11,'melihat profil'),(12,'register'),(13,'login');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_id` (`permission_id`,`role_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id_permission`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,1),(7,1,2),(15,1,3),(2,2,1),(3,3,1),(4,4,1),(8,5,2),(16,5,3),(9,6,2),(10,7,2),(11,8,2),(12,9,2),(17,9,3),(18,10,3),(5,11,1),(13,11,2),(19,11,3),(20,12,3),(6,13,1),(14,13,2),(21,13,3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin','2022-05-14 09:29:44',NULL),(2,'guru','2022-05-14 09:29:44',NULL),(3,'siswa','2022-05-14 09:29:44',NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sejarah_sekolah`
--

DROP TABLE IF EXISTS `sejarah_sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sejarah_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sejarah_sekolah`
--

LOCK TABLES `sejarah_sekolah` WRITE;
/*!40000 ALTER TABLE `sejarah_sekolah` DISABLE KEYS */;
INSERT INTO `sejarah_sekolah` VALUES (1,'Sejarah baru','  <h3 class=\"\">Sejarah SD Negeri 12345</h3>\r\n            <p class=\"mb-6 line-height-md\">\r\n                Sejarah singkat sekolah merupakan informasi yang menunjukkan rangkaian peristiwa/kejadian/fakta yang menggambarkan SDN Purwodadi 2 pada masa lalu. Sejarah singkat tentang SDN Purwodadi 2 diperoleh dari penjelasan Ketua Komite Sekolah yang sekaligus tokoh masyarakat di daerah Plaosan.\r\n\r\n                SDN Purwodadi 2 berdiri pada tahun 1960, yang melatarbelakangi pendirian sekolah tersebut karena di wilayah Plaosan belum ada sekolah setingkat pendidikan dasar/SD. Sekolah dasar milik pemerintah yang paling dekat dengan wilayah Plaosan saat itu ada di daerah Polowijen yang berjarak kurang lebih 1,5 km. Itulah salah satu alasan warga Plaosan berinisiatif mendirikan sekolah secara mandiri. Lahan sekolah berasal dari hibah salah satu warga Plaosan.\r\n\r\n                Pada waktu berdiri sekolahan hanya terdiri dari 2 (dua) ruang belajar dengan dinding terbuat dari bambu/gedhek sedangkan lantainya masih berupa tanah belum diplester. Sekitar awal tahun delapan puluhan sekolah dasar tersebut sudah memiliki ruang kelas sebanyak 6 enam buah dibangun oleh pemerintah dengan status SD Inpres dengan nama SDN Purwodadi 4.\r\n\r\n                Di awal tahun dua ribuan ada kebijakan regroup/penggabungan sekolah untuk efektifitas dan efisinsi utamanya sekolah yang di satu lokasi terdapat 2 (dua) atau lebih sekolah. Dasar hukum kebijakan tersebut adalah: (1). Keputusan Menteri Dalam Negeri Nomor 421.2/2501/Bangda/ 1998 tentang pedoman pelaksanaan penggabungan sekolah (regrouping) SD, (2). Kepmendiknas Nomor 060/U/2002 tentang Pedoman Pendirian Sekolah , dalam ayat 1 pasal 23 dinyatakan bahwa pengintegrasian sekolah merupakan peleburan atau penggabungan dua atau lebih sekolah sejenis menjadi satu sekolah\r\n\r\n                Dampak dari kebijakan tersebut pada tahun 2003 yang dulunya bernama SDN Purwodadi 4 menjadi SDN Purwodadi 2, dikarenakan di daerah Sumpil ada 3 (tiga) sekolah di satu lokasi yaitu SDN Purwodadi 1,2, dan 3. Ketiga sekolah tersebut regroup menjadi SDN Purwodadi 1.\r\n\r\n            </p>\r\n\r\n            <p class=\"link\">\r\n                (Sumber data :Sulistyono/Ketua Komite SDN Purwodadi 2 )\r\n            </p>','2022-08-01 11:03:37','2022-08-04 06:56:56');
/*!40000 ALTER TABLE `sejarah_sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama` varchar(141) NOT NULL,
  `alamat` text,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `siswa_user_id_ibfk1` (`user_id`),
  CONSTRAINT `siswa_user_id_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (1,8,'fa3beb81b19cadf7744dc85213c144f7.JPG','amelia','utara','2022-03-19','2022-04-25 09:13:20','2022-08-02 09:56:50'),(18,74,'3d4ccf8cfe1725970e4ace8cf09e0a83.jpeg','ABCdd','abc','2022-08-24','2022-08-04 09:10:33','2022-08-04 09:12:06');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun_ajaran`
--

DROP TABLE IF EXISTS `tahun_ajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `periode_awal` varchar(100) NOT NULL,
  `periode_akhir` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun_ajaran`
--

LOCK TABLES `tahun_ajaran` WRITE;
/*!40000 ALTER TABLE `tahun_ajaran` DISABLE KEYS */;
INSERT INTO `tahun_ajaran` VALUES (1,'Tahun jaran 1','2022','2022','4','2022-07-30 07:03:05','2022-08-01 13:17:44'),(3,'ajaran 3','2020','2022','6,5','2022-07-30 09:22:16','2022-07-30 09:22:16');
/*!40000 ALTER TABLE `tahun_ajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(141) NOT NULL,
  `password` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@example.test','f865b53623b121fd34ee5426c792e5c33af8c227','2022-05-14 09:28:20',NULL),(2,'sutarjo@gmail.com','ee440435480513b57d86a033448d214413babfb6','2022-05-14 09:28:20',NULL),(3,'anto@gmail.com','6d0cee163ee3703c665a882b900523fd28f0d9a1','2022-05-14 09:28:20',NULL),(4,'sitinjak@gmail.com','65dc778fb75a29d8152cca37c02542c3320aae96','2022-05-14 09:28:20',NULL),(5,'andoko@gmail.com','2535c0b6759737f6f0830349e177c7eb45137e0d','2022-05-14 09:28:20',NULL),(6,'andini@gmail.com','e6d520174335c25c6bcab922e10f02454e462ee9','2022-05-14 09:28:20',NULL),(7,'irine@gmail.com','c2ff18e3dffba65b33a35f29c3f5e3b0fa6e80d4','2022-05-14 09:28:20',NULL),(8,'amelia@gmail.com','ee440435480513b57d86a033448d214413babfb6','2022-05-14 09:28:20',NULL),(11,'yedija2@gmail.com','6083aadbd6dd8bf664e856c821465e4ba8c7376f','2022-05-14 09:28:20',NULL),(15,'michael@gmail.com','667641b92ceae6bd7443b8f8c9deb1df46a3e78c','2022-05-14 13:24:42','2022-05-14 14:38:57'),(18,'johndoe@gmail.com','ae2b299b1c065b186f8d50869097cbff26ea283b','2022-05-14 11:43:37',NULL),(19,'lorem@gmail.com','913244d501f31552629228bf0094a47d61caf9b4','2022-05-14 11:45:44',NULL),(25,'test@gmail.com','7288edd0fc3ffcbe93a0cf06e3568e28521687bc','2022-05-15 19:24:38','2022-05-15 19:24:38'),(39,'barra@gmail.com','556ac798c1fd36de5a4254266f73adb30fa9c766','2022-07-30 10:37:57','2022-07-30 10:37:57'),(40,'barra2@gmail.com','556ac798c1fd36de5a4254266f73adb30fa9c766','2022-07-30 10:43:40','2022-07-30 10:43:40'),(67,'ali@gmail.com','e697ef18d3fa82e0fcd427a989a86c694b547c64','2022-07-31 00:48:53','2022-07-31 00:48:53'),(69,'reny@gmail.com','9a576b0278656003c7f0a5c595fd1a718bb724cc','2022-07-31 05:58:14','2022-07-31 05:58:14'),(73,'ren@mail.com','6c3e5e602a5871860b7e6bdc4e72ddf793fbe8b4','2022-08-02 17:13:20','2022-08-02 17:13:20'),(74,'sis@abc.com','88ea39439e74fa27c09a4fc0bc8ebe6d00978392','2022-08-04 09:10:32','2022-08-04 09:10:32');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_role_id_ibfk1` (`role_id`),
  KEY `role_user_id_ibfk1` (`user_id`),
  CONSTRAINT `role_role_id_ibfk1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_user_id_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,1,'2022-05-14 09:43:14',NULL),(2,2,2,'2022-05-14 09:43:14',NULL),(3,3,2,'2022-05-14 09:43:14',NULL),(4,4,2,'2022-05-14 09:43:14',NULL),(5,5,2,'2022-05-14 09:43:14',NULL),(6,6,2,'2022-05-14 09:43:14',NULL),(7,7,2,'2022-05-14 09:43:14',NULL),(8,8,3,'2022-05-14 09:43:14',NULL),(11,11,3,'2022-05-14 09:43:14',NULL),(13,15,1,'2022-05-14 13:24:43','2022-05-14 13:24:43'),(15,18,3,'2022-05-14 11:43:38',NULL),(16,19,3,'2022-05-14 11:45:45',NULL),(22,25,1,'2022-05-15 19:24:39','2022-05-15 19:24:39'),(32,39,3,'2022-07-30 10:37:57','2022-07-30 10:37:57'),(33,40,3,'2022-07-30 10:43:40','2022-07-30 10:43:40'),(59,67,2,'2022-07-31 00:48:53','2022-07-31 00:48:53'),(61,69,2,'2022-07-31 05:58:14','2022-07-31 05:58:14'),(65,73,2,'2022-08-02 17:13:20','2022-08-02 17:13:20'),(66,74,3,'2022-08-04 09:10:32','2022-08-04 09:10:32');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visimisi_sekolah`
--

DROP TABLE IF EXISTS `visimisi_sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visimisi_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visimisi_sekolah`
--

LOCK TABLES `visimisi_sekolah` WRITE;
/*!40000 ALTER TABLE `visimisi_sekolah` DISABLE KEYS */;
INSERT INTO `visimisi_sekolah` VALUES (1,'Visi Misi Sekolah','<div class=\"row\">\r\n        <div class=\"col-xl-10 mx-xl-auto mt-md-n10 mt-xl-n13 mb-8\">\r\n            <div class=\"rounded bg-white p-5\">\r\n                <h1 class=\"text-center mb-5\"> Visi Misi Sekolah </h1>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <div class=\"row mb-11\">\r\n        <div class=\"col-lg-8 mb-6 mb-lg-0\">\r\n            <h3 class=\"mb-5\">Visi</h3>\r\n            <div class=\"row row-cols-lg-2 mb-8\">\r\n                <div class=\"col-md-8\">\r\n                    <ul class=\"list-style-v1 list-unstyled\">\r\n                        <li>SEKOLAH SHALIH, CERDAS, DAN TERAMPIL</li>\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n\r\n            <h3 class=\"mb-5\">Misi</h3>\r\n            <ul class=\"list-style-v2 list-unstyled mb-6\">\r\n                <li>Menciptakan iklim dan budaya sekolah yang islami</li>\r\n                <li>Membentuk peserta didik yang cerdas dan kompetitif</li>\r\n                <li>Membentuk pribadi yang adaptif dan berketuhanan Yang Maha Esa</li>\r\n            </ul>\r\n        </div>\r\n\r\n    </div>','2022-08-01 11:29:58','2022-08-04 06:57:34');
/*!40000 ALTER TABLE `visimisi_sekolah` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-05 14:07:06
