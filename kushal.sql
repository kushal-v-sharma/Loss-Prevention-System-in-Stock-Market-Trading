-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kushal
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buy_stock`
--

DROP TABLE IF EXISTS `buy_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buy_stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buy_stock`
--

LOCK TABLES `buy_stock` WRITE;
/*!40000 ALTER TABLE `buy_stock` DISABLE KEYS */;
INSERT INTO `buy_stock` VALUES (2,'APPL',4,294.00,'2023-06-13 00:46:59'),(5,'BABA',12,88.00,'2023-06-14 05:32:08');
/*!40000 ALTER TABLE `buy_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cardNumber` varchar(16) NOT NULL,
  `expiryDate` varchar(10) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'6078950910751593','12/25','722',100.00),(2,'6070984275465661','01/28','977',100.00);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sell`
--

DROP TABLE IF EXISTS `sell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sell` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stock` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sell`
--

LOCK TABLES `sell` WRITE;
/*!40000 ALTER TABLE `sell` DISABLE KEYS */;
INSERT INTO `sell` VALUES (1,'AAPL',1,299.00,'2023-06-07 14:40:31'),(2,'BABA',2,85.00,'2023-06-08 03:28:06'),(3,'SBI',20,600.00,'2023-06-12 12:18:16');
/*!40000 ALTER TABLE `sell` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sell_stock`
--

DROP TABLE IF EXISTS `sell_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sell_stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `current_price` decimal(10,2) DEFAULT NULL,
  `current_profit_loss` decimal(10,2) DEFAULT NULL,
  `quantity_to_sell` int DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sell_stock`
--

LOCK TABLES `sell_stock` WRITE;
/*!40000 ALTER TABLE `sell_stock` DISABLE KEYS */;
INSERT INTO `sell_stock` VALUES (1,'APPL',2,294.00,82.00,-1060.00,2,'2023-06-14 08:47:21'),(2,'AMZN',1,2495.00,90.00,-4810.00,1,'2023-06-14 08:53:57'),(3,'AMZN',1,2495.00,38.00,-4914.00,1,'2023-06-14 08:54:44'),(4,'AMZN',2,2495.00,98.00,-4794.00,2,'2023-06-14 08:57:12'),(5,'BABA',2,88.00,93.00,75.00,2,'2023-06-14 09:24:31'),(6,'BABA',2,88.00,89.00,15.00,2,'2023-06-14 09:25:18'),(7,'BABA',3,88.00,19.00,-1035.00,3,'2023-06-14 09:33:33'),(8,'BABA',1,88.00,87.00,-15.00,1,'2023-06-14 09:41:05'),(9,'APPL',1,294.00,11.00,-1415.00,1,'2023-06-18 17:05:18'),(10,'BABA',2,88.00,32.00,-784.00,2,'2023-06-30 15:35:10');
/*!40000 ALTER TABLE `sell_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_history`
--

DROP TABLE IF EXISTS `stock_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_history`
--

LOCK TABLES `stock_history` WRITE;
/*!40000 ALTER TABLE `stock_history` DISABLE KEYS */;
INSERT INTO `stock_history` VALUES (1,'2023-06-01','2023-06-04'),(2,'2023-06-01','2023-06-04'),(3,'2023-06-01','2023-06-04'),(4,'2023-06-01','2023-06-04'),(5,'2023-06-01','2023-06-04'),(6,'2023-06-01','2023-06-04'),(7,'2023-06-01','2023-06-05'),(8,'2023-06-02','2023-06-02'),(9,'2023-06-02','2023-06-02'),(10,'2023-06-02','2023-06-02'),(11,'2023-06-01','2023-06-09'),(12,'2023-06-01','2023-06-03'),(13,'2023-06-01','2023-06-02'),(14,'2023-06-02','2023-06-03'),(15,'2023-06-01','2023-06-04'),(16,'2023-06-01','2023-06-04'),(17,'2023-06-01','2023-06-04'),(18,'2023-06-01','2023-06-04'),(19,'2023-06-01','2023-06-04'),(20,'2023-06-01','2023-06-04'),(21,'2023-06-01','2023-06-04'),(22,'2023-06-01','2023-06-04'),(23,'2023-06-01','2023-06-04'),(24,'2023-06-01','2023-06-04'),(25,'2023-06-01','2023-06-04'),(26,'2023-06-01','2023-06-04'),(27,'2023-06-01','2023-06-04'),(28,'2023-06-01','2023-06-05'),(29,'2023-06-01','2023-06-07'),(30,'2023-06-01','2023-06-06'),(31,'2023-06-01','2023-06-07');
/*!40000 ALTER TABLE `stock_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stocks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `date_of_issue` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (2,'APPL',294.00,5,'2023-06-03'),(3,'AMZN',2495.00,2,'2023-06-02'),(5,'BABA',88.00,15,'2023-06-14');
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'kushal','kushalvedsharma2002@gmail.com','Kushal'),(2,'kushal','kushalvedsharma2002@gmail.com','Kushal'),(3,'sharma','kushalved00@gmail.com','sharma@123'),(4,'kushal','kushalved00@gmail.com','Kushal@123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'kv','kushalved00@gmail.com','Kushal@123'),(2,'kushal_v_sharma','kushalvedsharma2002@gmail.com','Kv@2002'),(3,'kushal_v_sharma','kushalvedsharma2002@gmail.com','Kv@2002'),(4,'kushal_v_sharma','kushalvedsharma2002@gmail.com','Kv@2002');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-25 15:48:22
