-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 172.18.20.3    Database: apto_db
-- ------------------------------------------------------
-- Server version	5.6.44

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
-- Table structure for table `apto_pembayaran`
--

DROP TABLE IF EXISTS `apto_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apto_pembayaran` (
  `idpembayaran` varchar(8) NOT NULL,
  `idtagihan` varchar(8) NOT NULL,
  `tglbayar` date DEFAULT NULL,
  `bankasal` varchar(30) DEFAULT NULL,
  `banktujuan` varchar(30) DEFAULT NULL,
  `nominalbayar` varchar(9) DEFAULT NULL,
  `buktibayar` varchar(200) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpembayaran`),
  KEY `fk_apto_pembayaran_1_idx` (`idtagihan`),
  CONSTRAINT `fk_apto_pembayaran_1` FOREIGN KEY (`idtagihan`) REFERENCES `apto_tagihan` (`idtagihan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apto_pembayaran`
--

LOCK TABLES `apto_pembayaran` WRITE;
/*!40000 ALTER TABLE `apto_pembayaran` DISABLE KEYS */;
INSERT INTO `apto_pembayaran` VALUES ('PAY0001','TGH0001','2019-06-18','sadasdasd','BRI','32312333','bayar/ibuk.jpg','2'),('PAY0002','TGH0003','2019-06-22','edwqdasdsad','BRI','312312312','bayar/ibuk.jpg','3'),('PAY0003','TGH0003','2019-06-23','BANK NOBU','BRI','15000','bayar/Screenshot_20181118_171704.png','2'),('PAY0004','TGH0002','2019-06-23','rere','BRI','122332323','bayar/Screenshot_20190506_074503.png','2'),('PAY0005','TGH0004','2019-06-23','BANK NOBU','BRI','10000','bayar/Screenshot_20190118_083641.png','3'),('PAY0006','TGH0004','2019-06-23','dasdasd','BRI','19999999','bayar/Screenshot_20190118_083641.png','2'),('PAY0007','TGH0005','2019-06-23','BANK NOBU','BRI','100000','bayar/Screenshot_20190206_204223.png','2'),('PAY0008','TGH0006','2019-06-24','BANK NOBU','BRI','1000000','bayar/Screenshot_20190118_083641.png','3'),('PAY0009','TGH0006','2019-06-24','adasd','BRI','100000','bayar/Screenshot_20190118_083641.png','2'),('PAY0010','TGH0007','2019-07-07','fsdfsdf','BRI','321312312','bayar/Screenshot_20190117_181540.png','2'),('PAY0011','TGH0005','2019-07-07','dsdsa','BRI','3132','bayar/Screenshot_20190206_204125.png','3'),('PAY0012','TGH0010','2019-07-17','BANK NOBU','BRI','100000','bayar/Screenshot_20190717_155437.png','2'),('PAY0013','TGH0011','2019-07-17','dasdas','BRI','100000','bayar/Screenshot_20190717_155437.png','3'),('PAY0014','TGH0013','2019-10-11','asd','dasdas','eqe','eqewq','3'),('PAY0015','TGH0012','2019-10-11','asd','dasdas','eqe','eqewq','3'),('PAY0016','TGH0014','2019-10-11','asd','dasdas','eqe','eqewq','3'),('PAY0017','TGH0015','2019-10-11','asd','dasdas','eqe','eqewq','3'),('PAY0018','TGH0005','2019-10-11','asd','dasdas','eqe','eqewq','3'),('PAY0019','TGH0016','2019-10-11','asd','dasdas','eqe','eqewq','2'),('PAY0020','TGH0017','2019-10-11','asd','dasdas','eqe','eqewq','2');
/*!40000 ALTER TABLE `apto_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apto_tagihan`
--

DROP TABLE IF EXISTS `apto_tagihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apto_tagihan` (
  `idtagihan` varchar(8) NOT NULL,
  `iduser` varchar(850) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(400) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `nominal` varchar(9) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtagihan`),
  UNIQUE KEY `idtagihan_UNIQUE` (`idtagihan`),
  KEY `idx_apto_tagihan_iduser` (`iduser`(767))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apto_tagihan`
--

LOCK TABLES `apto_tagihan` WRITE;
/*!40000 ALTER TABLE `apto_tagihan` DISABLE KEYS */;
INSERT INTO `apto_tagihan` VALUES ('TGH0001','USR0003','testdasdasd budosen aman123','test yoloo    ','2009-01-10','50000000','data baru dirubah oleh : aman123'),('TGH0002','USR0004','test dede aman','fsdfda    ','1999-10-10','100000121','data baru dirubah oleh : aman123'),('TGH0003','USR0004','UAS aman123','fsdfsdf ','2019-06-11','15000','data baru dirubah oleh : aman123'),('TGH0004','USR0003','dasdasd','dasdasdasda','2019-06-28','1000',NULL),('TGH0005','USR0003','testdasdasd','dasdsadsa','2019-07-05','12000',NULL),('TGH0006','USR0004','dsadas','dasdasd','2019-06-19','100000',NULL),('TGH0007','USR0003','dfsf','sefsdf','2019-10-10','131231',NULL),('TGH0008','USR0004','dadsa','dasdsad','2022-01-01','dsadasd',NULL),('TGH0009','USR0004','sdadas','dasdasdasd','2019-07-19','212121212',NULL),('TGH0010','USR0003','test','test','2019-07-19','100000',NULL),('TGH0011','USR0003','test lagi 100','dassadas  ','2019-07-25','100000000','data baru dirubah oleh : aman123'),('TGH0012','USR0003','dasdas','dadasdwe','2019-07-17','231312','data baru ditambahkan oleh : budosen'),('TGH0013','USR0003','test budosen','dasdas','2019-07-19','100000','data baru ditambahkan oleh : budosen'),('TGH0014','USR0003','dasdas','dasdsadas','2023-01-01','dasdsad',NULL),('TGH0015','USR0003','dadas','dasdasda','2019-01-01','dasda',NULL),('TGH0016','USR0003','sdas','dasdsadas','2024-01-01','dsadasd',NULL),('TGH0017','USR0003','Test','test','2019-01-01','10000',NULL);
/*!40000 ALTER TABLE `apto_tagihan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apto_tingkat`
--

DROP TABLE IF EXISTS `apto_tingkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apto_tingkat` (
  `kodetingkat` varchar(8) NOT NULL,
  `namatingkat` varchar(45) DEFAULT NULL,
  `keterangantingkat` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`kodetingkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apto_tingkat`
--

LOCK TABLES `apto_tingkat` WRITE;
/*!40000 ALTER TABLE `apto_tingkat` DISABLE KEYS */;
INSERT INTO `apto_tingkat` VALUES ('TKN00','Super Admin','Admin dengan otoritas khusus hampir sama dengan pemilik perusahaan'),('TKN01','Manajer Umum','Manajer perusahaa dengan hak yang telah disesuaikan dengan job desk'),('TKN02','Manajer Keuangan','Manajer keuangan perusahaan'),('TKN03','Staff keuangan','Staff manajer keuangan'),('TKN04','Admin','Admin biasa yang selalu stand by'),('TKN06','Customer','customer perusahaan tersayang');
/*!40000 ALTER TABLE `apto_tingkat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apto_user`
--

DROP TABLE IF EXISTS `apto_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apto_user` (
  `iduser` varchar(8) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(35) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tingkat` varchar(8) NOT NULL,
  PRIMARY KEY (`iduser`,`tingkat`),
  UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  KEY `idx_apto_user_iduser` (`iduser`),
  KEY `fk_apto_user_1_idx` (`tingkat`),
  CONSTRAINT `fk_apto_user_1` FOREIGN KEY (`tingkat`) REFERENCES `apto_tingkat` (`kodetingkat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apto_user`
--

LOCK TABLES `apto_user` WRITE;
/*!40000 ALTER TABLE `apto_user` DISABLE KEYS */;
INSERT INTO `apto_user` VALUES ('USR0001','Panji','panjidia995@gmail.com','GPA blok RB 17 ngijo','0895326927698','L','budosen','604de12585cffbd7ba06e6bafe601188 ',0,1,'TKN00'),('USR0002','Amanda','',NULL,NULL,NULL,'aman123','604de12585cffbd7ba06e6bafe601188 ',1,1,'TKN03'),('USR0003','Monicc','dasdad','ffsdfsdf','895342421','L','monic123','604de12585cffbd7ba06e6bafe601188',2,1,'TKN06'),('USR0004','sopo','test@panjibaskoro.web.id','    dadasd    ','3123123123',NULL,'sopo123','604de12585cffbd7ba06e6bafe601188',2,1,'TKN06'),('USR0005','sadsad','dsd','dasdasdasdas','4123213123','L','asd','bijan2089',2,1,'TKN06');
/*!40000 ALTER TABLE `apto_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-04 16:40:14
