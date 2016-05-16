-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 192.168.226.161    Database: book
-- ------------------------------------------------------
-- Server version	5.5.47-MariaDB

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
-- Dumping data for table `address_item`
--

LOCK TABLES `address_item` WRITE;
/*!40000 ALTER TABLE `address_item` DISABLE KEYS */;
INSERT INTO `address_item` VALUES (1,1,'彭祖乐','13338286204','福建省','福州市','仓山区','福建农林大学',0,'2016-05-16 06:14:38','2016-05-16 07:47:35'),(2,1,'彭祖乐','13338286204','福建省','福州市','仓山区','福建农林大学',0,'2016-05-16 07:47:35','2016-05-16 07:48:54'),(3,1,'彭祖乐','13338286204','福建省','福州市','台江区','金钱猫科技',1,'2016-05-16 07:48:54','2016-05-16 07:48:54');
/*!40000 ALTER TABLE `address_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','ca95a7cb6dfc2a840255b7703d5a3f21');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cart_item`
--

LOCK TABLES `cart_item` WRITE;
/*!40000 ALTER TABLE `cart_item` DISABLE KEYS */;
INSERT INTO `cart_item` VALUES (10,1,2,1,'2016-05-16 06:41:02','2016-05-16 06:41:02'),(11,1,3,1,'2016-05-16 06:41:10','2016-05-16 06:41:10'),(12,1,5,1,'2016-05-16 06:41:16','2016-05-16 06:41:16'),(13,1,1,4,'2016-05-16 07:09:33','2016-05-16 07:25:00');
/*!40000 ALTER TABLE `cart_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'EOC设备',1,'/upload/images/20160513/30719780a61aa0576e434229c8770d73.jpg',NULL,NULL,'2016-05-13 01:49:32'),(2,'EPON设备',2,'/upload/images/20160513/921fd1894298241688ad2d70dc075957.jpg',NULL,NULL,'2016-05-13 01:50:17'),(3,'入户光终端',3,'/upload/images/20160513/4fa9a38d67b14a9c8b8ecb9de119ef8a.jpg',NULL,NULL,'2016-05-13 01:53:30'),(4,'PLC设备',4,'/upload/images/20160513/b7841406dd7479e371144f3778e38f7f.png',NULL,NULL,'2016-05-13 01:52:52'),(5,'辅助设备',5,'/upload/images/20160513/4ea57604bd297f6ba002f7b58749e4fa.jpg',NULL,NULL,'2016-05-13 01:54:15'),(6,'EOC局端',6,NULL,1,NULL,NULL),(7,'EOC终端',7,NULL,1,NULL,NULL),(8,'OLT',8,NULL,2,NULL,NULL),(9,'ONU',9,NULL,2,NULL,NULL),(10,'光猫',10,NULL,3,NULL,NULL),(11,'电力猫',11,NULL,4,NULL,NULL),(12,'跨接器',12,NULL,5,NULL,NULL),(13,'混合器',13,NULL,5,NULL,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'pengzule','13338286204','295129789@qq.com','ca95a7cb6dfc2a840255b7703d5a3f21',0,'2016-05-16 03:37:32','2016-05-16 03:37:32');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,38,'E14631237111','《金钱猫EOC局端EH7440F EOC头》',3800.00,1,1,'2016-05-13 07:15:10','2016-05-13 07:15:11'),(2,38,'E14631237862','《金钱猫EOC终端猫MT706R 广电猫 》',3075.00,1,1,'2016-05-13 07:16:26','2016-05-13 07:16:26'),(5,38,'E14631243405','《金钱猫EOC终端猫MT706R 广电猫 》',205.00,1,1,'2016-05-13 07:25:40','2016-05-13 07:25:40'),(6,38,'E14631272326','《金钱猫EOC局端EH7440F EOC头》',3800.00,1,1,'2016-05-13 08:13:52','2016-05-13 08:13:52'),(7,38,'E14632103997','《金钱猫EOC终端猫MT706R 广电猫 》《金钱猫EOC三合一局端CEH7140F 》《',14230.00,1,1,'2016-05-14 07:19:59','2016-05-14 07:19:59'),(9,38,'E14633684279','《金钱猫EOC终端猫MT706R 广电猫 》',205.00,1,1,'2016-05-16 03:13:47','2016-05-16 03:13:47'),(10,38,'E146336848410','',0.00,1,1,'2016-05-16 03:14:44','2016-05-16 03:14:44'),(11,1,'E146337928911','《金钱猫EOC终端猫MT706R 广电猫 》',205.00,1,1,'2016-05-16 06:14:49','2016-05-16 06:14:49');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_item`
--

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` VALUES (1,1,5,1,'{\"id\":5,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u5c40\\u7aefEH7440F EOC\\u5934\",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539\\u4e8c\\u5408\\u4e00\\u96c6\\u6210\\u5f0f\\u4e00\\u4f53\\u673aEOC\\u5c40\\u7aef\\u8bbe\\u5907 EOC\\u6a21\\u5757+ONU\\u6a21\\u5757\",\"price\":\"3800.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/fefcdde3c58ca8ae6d70d1bf6dd99f1d.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:59:57\",\"updated_at\":\"2016-05-13 08:59:57\"}'),(2,2,1,15,'{\"id\":1,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u7ec8\\u7aef\\u732bMT706R \\u5e7f\\u7535\\u732b \",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539EOC\\u7ec8\\u7aef\\u8bbe\\u5907 \\u56db\\u7f51\\u53e3 \\u53ef\\u8fde\\u63a5\\u7535\\u8111\\u3001IP\\u7535\\u8bdd\\u6216\\u673a\\u9876\\u76d2 \\u4e09\\u7f51\\u878d\\u5408\\u7ec8\\u7aef\\u4ea7\\u54c1\",\"price\":\"205.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/54399748b0ec5e53cc24bf2741956328.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:44:12\",\"updated_at\":\"2016-05-13 08:44:12\"}'),(3,5,1,1,'{\"id\":1,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u7ec8\\u7aef\\u732bMT706R \\u5e7f\\u7535\\u732b \",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539EOC\\u7ec8\\u7aef\\u8bbe\\u5907 \\u56db\\u7f51\\u53e3 \\u53ef\\u8fde\\u63a5\\u7535\\u8111\\u3001IP\\u7535\\u8bdd\\u6216\\u673a\\u9876\\u76d2 \\u4e09\\u7f51\\u878d\\u5408\\u7ec8\\u7aef\\u4ea7\\u54c1\",\"price\":\"205.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/54399748b0ec5e53cc24bf2741956328.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:44:12\",\"updated_at\":\"2016-05-13 08:44:12\"}'),(4,6,5,1,'{\"id\":5,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u5c40\\u7aefEH7440F EOC\\u5934\",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539\\u4e8c\\u5408\\u4e00\\u96c6\\u6210\\u5f0f\\u4e00\\u4f53\\u673aEOC\\u5c40\\u7aef\\u8bbe\\u5907 EOC\\u6a21\\u5757+ONU\\u6a21\\u5757\",\"price\":\"3800.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/fefcdde3c58ca8ae6d70d1bf6dd99f1d.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:59:57\",\"updated_at\":\"2016-05-13 08:59:57\"}'),(5,7,1,6,'{\"id\":1,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u7ec8\\u7aef\\u732bMT706R \\u5e7f\\u7535\\u732b \",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539EOC\\u7ec8\\u7aef\\u8bbe\\u5907 \\u56db\\u7f51\\u53e3 \\u53ef\\u8fde\\u63a5\\u7535\\u8111\\u3001IP\\u7535\\u8bdd\\u6216\\u673a\\u9876\\u76d2 \\u4e09\\u7f51\\u878d\\u5408\\u7ec8\\u7aef\\u4ea7\\u54c1\",\"price\":\"205.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/54399748b0ec5e53cc24bf2741956328.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:44:12\",\"updated_at\":\"2016-05-13 08:44:12\"}'),(6,7,3,5,'{\"id\":3,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u4e09\\u5408\\u4e00\\u5c40\\u7aefCEH7140F \",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539\\u4e09\\u5408\\u4e00EOC\\u5c40\\u7aef\\u8bbe\\u5907\\uff0c\\u652f\\u6301\\u73b0\\u6709\\u7684\\u6811\\u578b\\u548c\\u661f\\u578bCATV\\u7f51\\u7edc\\uff0c\\u5177\\u6709\\u4f20\\u8f93\\u8ddd\\u79bb\\u957f\\u3001\\u7f51\\u7edc\\u9002\\u5e94\\u6027\\u597d\\u3001\\u5e26\\u5bbd\\u9ad8\\u7b49\\u4f18\\u70b9\\uff0c\\u662f\\u5e7f\\u7535\\u7cfb\\u7edf\\u90e8\\u7f72\\u6570\\u5b57\\u7535\\u89c6\\u7f51\\u7edc\\u7684\\u6709\\u529b\\u6b66\\u5668\\u3002\",\"price\":\"2350.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/dfe231b7d9de427aa2ef1daa78903a78.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:54:03\",\"updated_at\":\"2016-05-13 08:54:03\"}'),(7,7,4,1,'{\"id\":4,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u5c40\\u7aef\\u8bbe\\u5907MH7100F EO\",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539EOC\\u5c40\\u7aef\\u8bbe\\u5907 \\u4e09\\u7f51\\u878d\\u5408\\u6700\\u540e1\\u516c\\u91cc\\u540c\\u8f74\\u7535\\u7f06\\u5165\\u6237\\u6539\\u9020\\u8bbe\\u5907\",\"price\":\"1250.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/35c0a1334708ff564d0fde8173325450.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:56:27\",\"updated_at\":\"2016-05-13 08:56:27\"}'),(8,9,1,1,'{\"id\":1,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u7ec8\\u7aef\\u732bMT706R \\u5e7f\\u7535\\u732b \",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539EOC\\u7ec8\\u7aef\\u8bbe\\u5907 \\u56db\\u7f51\\u53e3 \\u53ef\\u8fde\\u63a5\\u7535\\u8111\\u3001IP\\u7535\\u8bdd\\u6216\\u673a\\u9876\\u76d2 \\u4e09\\u7f51\\u878d\\u5408\\u7ec8\\u7aef\\u4ea7\\u54c1\",\"price\":\"205.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/54399748b0ec5e53cc24bf2741956328.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:44:12\",\"updated_at\":\"2016-05-13 08:44:12\"}'),(9,11,1,1,'{\"id\":1,\"name\":\"\\u91d1\\u94b1\\u732bEOC\\u7ec8\\u7aef\\u732bMT706R \\u5e7f\\u7535\\u732b \",\"summary\":\"\\u5e7f\\u7535\\u53cc\\u5411\\u7f51\\u6539EOC\\u7ec8\\u7aef\\u8bbe\\u5907 \\u56db\\u7f51\\u53e3 \\u53ef\\u8fde\\u63a5\\u7535\\u8111\\u3001IP\\u7535\\u8bdd\\u6216\\u673a\\u9876\\u76d2 \\u4e09\\u7f51\\u878d\\u5408\\u7ec8\\u7aef\\u4ea7\\u54c1\",\"price\":\"205.00\",\"preview\":\"\\/upload\\/images\\/20160513\\/54399748b0ec5e53cc24bf2741956328.jpg\",\"category_id\":1,\"created_at\":\"2016-05-13 08:44:12\",\"updated_at\":\"2016-05-13 08:44:12\"}');
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pdt_content`
--

LOCK TABLES `pdt_content` WRITE;
/*!40000 ALTER TABLE `pdt_content` DISABLE KEYS */;
INSERT INTO `pdt_content` VALUES (5,'<p><span style=\"font-size: 16.0px;color: #444444;line-height: 1.5;\"> 接口说明：以太网端口通过网线连接到电脑、IP电话或机顶盒；Cable口通过同轴电缆连接到闭路电视盒。</span></p><p style=\"border-bottom: 0.0px;text-align: left;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;text-align: left;border-left: 0.0px;padding-bottom: 0.0px;line-height: 27.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-family: verdana;color: blue;font-size: 13.5pt;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\"></span></p><p style=\"border-bottom: 0.0px;text-align: left;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;text-align: left;border-left: 0.0px;padding-bottom: 0.0px;line-height: 27.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-family: verdana;color: blue;font-size: 13.5pt;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\"></span></p><p style=\"border-bottom: 0.0px;text-align: left;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"font-size: 16.0px;line-height: 1.5;\">* 占用7.5-68MHz的低频带通信，对现有的CATV信号无任何影响</span></p><p style=\"text-align:left;border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-size: 16.0px;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; * 内置分离滤波器</span></p><p style=\"text-align:left;border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-size: 16.0px;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; * 带外抑制：≥65 dBuv</span></p><p style=\"text-align:left;border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-size: 16.0px;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; * 接收灵敏度：40 dBm</span></p><p style=\"text-align:left;border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-size: 16.0px;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; * 功耗：小于5W</span></p><p style=\"text-align:left;border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-size: 16.0px;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; * 提供4个10/100M自适应以太网接口，通过网线连接到电脑、IP电话或机顶盒</span></p><p style=\"text-align:left;border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-size: 16.0px;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; * 提供1个Cable接口，通过同轴电缆连接到闭路电视盒</span></p><p style=\"text-align:left;border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;widows: 2;text-transform: none;background-color: #ffffff;text-indent: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font: 14.0px 21.0px tahoma arial 宋体;white-space: normal;orphans: 2;letter-spacing: normal;color: #414141;border-top: 0.0px;border-right: 0.0px;word-spacing: 0.0px;padding-top: 0.0px;\"><span style=\"border-bottom: 0.0px;border-left: 0.0px;padding-bottom: 0.0px;margin: 0.0px auto;padding-left: 0.0px;padding-right: 0.0px;font-size: 16.0px;border-top: 0.0px;border-right: 0.0px;padding-top: 0.0px;\">&nbsp; &nbsp; &nbsp; * 接口类型： F型公制，母座</span></p><p><br/></p>',1,'2016-05-13 00:44:13','2016-05-13 00:44:13'),(6,'<p>产品需要考虑兼容问题，So~ 购买前请确认以下问题：</p><p>&nbsp; &nbsp; 1、需要是广电宽带入户的用户；</p><p>&nbsp; &nbsp; 2、本产品使用的是高通（Qualcomm）低频方案，局端设备（咨询广电）必须也是高通低频方案才能兼容；</p><p>&nbsp; &nbsp; 3、本款无线终端带有路由功能，可自行设置，但是VLAN需要广电技术员配置，所以想替换设备的买家请先咨询本地广电是否允许替换终端。</p><p>感谢合作！</p><p><br/></p>',2,'2016-05-13 00:50:20','2016-05-13 00:50:20'),(7,'<p>钱猫三合一产品位于光节点，基于同轴电缆的以太网网络，在CATV（Cable Television，有线电视）Cable网络中构造以太网传输通道。</p><p>* ONU模块提供上下对称1.25Gbps速率，最远距离支持20公里<br/>* EOC模块提供10/100/1000M自适应以太网接口用于连接上行ONU设备连接,支持下挂253/每模块<br/>* 光机模块超低光功率接收，精准的1V/1mw光功率检测口<br/>* 物理层速率(每模块)：700Mbps<br/>* 频率(每模块)：7.5MHz-65MHz<br/>* 提供2个10/100M自适应以太网接口，8个Cable接口，1个Console口</p><p><br/></p>',3,'2016-05-13 00:54:03','2016-05-13 00:54:03'),(8,'<p>金钱猫MH7100FEOC局端位于EOC（Ethernet over Coax，基于同轴电缆的以太网）网络，在CATV（Cable Television，有线电视）Cable网络中构造以太网传输通道。</p><p>局端支持现有的树型和星型CATV网络，具有传输距离长、网络适应性好、带宽高等优点，是广电系统部署数字电视网络的有力武器。</p><p>局端的主要特点如下：</p><p>l&nbsp; 提供3个10/100/1000M自适应以太网接口，用于连接城域网。</p><p>l&nbsp; 可选AC220V/DC60V供电方式，适应不同线路。</p><p>l&nbsp; 支持从光节点到用户家的端到端的接入。</p><p>l&nbsp; 支持现有的树型、星型Cable网络。</p><p>l&nbsp; 支持远程管理，登录局端网管后可以远程管理下挂的终端。</p><p>l&nbsp; 占用7.5-68Mhz的低频带通信，对现有的CATV信号无影响。</p><p><br/></p>',4,'2016-05-13 00:56:27','2016-05-13 00:56:27'),(9,'<p>金钱猫ONU、EOC一体化机设备工作原理：以太网数字信号经以太网线物理层收发单元，进入调制解调器本体。在调制解调器本体内，先通过数模转换单元，将网络信号调制成模拟信号，再经信号放大单元放大，最后通过耦合器，与输入的电视信号混合向下输出。</p><p>产品特点</p><p>金钱猫EH系列ONU、EOC一体化机位于EOC（Ethernet over Coax，基于同轴电缆的以太网）网络，在CATV（Cable Television，有线电视）Cable网络中构造以太网传输通道。</p><p></p><p>局端支持现有的树型和星型CATV网络，具有传输距离长、网络适应性好、带宽高等优点，是广电系统部署数字电视网络的有力武器。</p><p><br/></p>',5,'2016-05-13 00:59:57','2016-05-13 00:59:57'),(10,'',6,'2016-05-13 01:04:40','2016-05-13 01:04:40'),(11,'<p style=\"line-height: 150.0%;\">1、产品概述</p><p>金钱猫EL6000-P128是新一代高带宽、多业务接入OLT设备，具备高可靠性、高密度EPON接入，以及强大的交换路由功能。融合了IPv6、网络安全、EPON无源光网络等多种技术，支持数据、语音、视频三种业务。</p><p></p><p style=\"line-height: 150.0%;\">2、产品特点<br/></p><p>&nbsp; *&nbsp; 机框式模块设备，高密度大容量，易于扩展和升级<br/>&nbsp; *&nbsp; 遵循CTC2.0/2.1，自动发现和兼容各厂商ONU<br/>&nbsp; *&nbsp; 2个主控板插槽+8个业务模块插槽<br/>&nbsp; *&nbsp; 支持上下行对称1.25Gbps的PON传输速率<br/>&nbsp; *&nbsp; 功耗：1000W</p><p><br/></p>',7,'2016-05-13 01:14:25','2016-05-13 01:14:25'),(12,'<p>金钱猫 EN611 ONU产品是遵循IEEE802.3ah，满足《YD/T 1475-2006接入网技术要求——基于以太网方式的无源光网络(EPON)》和《中国电信EPON 设备技术要求》中对于GEPON ONU设备的相关要求。是金钱猫小容量的光网络单元(ONU)，可以很好的满足广电双向网、FTTH/FTTO/FTTB的应用。</p><p></p><p>产品特点</p><p>l&nbsp; 采用点到多点网络拓扑，有效地收集用户分散的以太网业务并汇聚，在用户侧提供标准RJ45快速以太网接口，与现有网络平滑互联。</p><p>l&nbsp; 动态带宽分配机制使所有用户可更合理地共享1Gbps的带宽，实现可靠的服务质量(QoS)，确保同一网络中的不同业务的服务品质。</p><p>l&nbsp; 支持IGMP组播，有效利用宽带。</p><p>l&nbsp; 支持组播VLAN。</p><p>l&nbsp; 丰富的OAM功能设计，包括配置、告警、性能监控、故障隔离和安全管理等，提供通过OLT进行的远程管理。</p><p><br/></p>',8,'2016-05-13 01:17:05','2016-05-13 01:17:05'),(13,'<p>EN614\r\n ONU产品是遵循IEEE802.3ah，满足《YD/T \r\n1475-2006接入网技术要求——基于以太网方式的无源光网络(EPON)》和《中国电信EPON 设备技术要求》中对于GEPON \r\nONU设备的相关要求。是小容量的光网络单元(ONU)，可以很好的满足广电双向网、FTTH/FTTO/FTTB的应用。</p><p></p><p></p><p>&nbsp;</p><p>*&nbsp; 采用点到多点网络拓扑，有效地收集用户分散的以太网业务并汇聚，</p><p>*&nbsp; 在用户侧提供标准RJ45快速以太网接口，与现有网络平滑互联。</p><p>*&nbsp; 丰富的OAM功能设计，包括配置、告警、性能监控、故障隔离和安全管理等，提供通过OLT进行的远程管理。</p><p>* &nbsp;4个固定10/100/1000M BASE-T自适应RJ45接口</p><p>* &nbsp;上下行对称1Gbps传输速率</p><p>*&nbsp; 支持IGMP组播，有效利用宽带</p><p>*&nbsp; 功率最大10W</p><p><br/></p>',9,'2016-05-13 01:19:52','2016-05-13 01:19:52'),(14,'<p>入户光猫，家用产品！</p><p>金钱猫 ONU产品是遵循IEEE802.3ah，满足《YD/T 1475-2006接入网技术要求——基于以太网方式的无源光网络(EPON)》和《中国电信EPON 设备技术要求》中对于GEPON ONU设备的相关要求。是金钱猫小容量的光网络单元(ONU)，可以很好的满足广电双向网、FTTH/FTTO/FTTB/FTTC的应用。</p><p></p><p>&nbsp;*&nbsp; 采用点到多点网络拓扑，有效地收集用户分散的以太网业务并汇聚<br/>&nbsp;*&nbsp; 在用户侧提供标准RJ45快速以太网接口，与现有网络平滑互联<br/>&nbsp;*&nbsp; 支持IGMP组播，有效利用宽带<br/>&nbsp;*&nbsp; 提供4个10/100M的宽带接入<br/>&nbsp;*&nbsp; 支持组播VLAN<br/>&nbsp;*&nbsp; 具备良好的互通性，可以与主流局端厂商OLT设备互通<br/>&nbsp;*&nbsp; 最大功耗: &lt;10W</p><p><br/></p>',10,'2016-05-13 01:22:14','2016-05-13 01:22:14'),(15,'<p>金钱猫EN604-CW是高性价比的EPON（百兆以太无源光网络）ONU终端设备，集成了CATV光接收机，支持4个10/100M BASE-T以太网口，支持无线WiFi，实现宽带、CATV两网融合的无源光网络终端产品。</p><p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp;产品特点：</p><p>&nbsp;*&nbsp; 采用点到多点网络拓扑，有效地收集用户分散的以太网业务并汇聚，在用户侧提供标准RJ45快速以太网接口，与现有网络平滑互联。&nbsp;<br/>&nbsp;*&nbsp; 传输距离20KM、支持数据加密<br/>&nbsp;*&nbsp; 提供4个10/100M的宽带接入<br/>&nbsp;*&nbsp; 支持组播VLAN<br/>&nbsp;*&nbsp; 具备良好的互通性，可以与主流局端厂商OLT设备互通</p><p><br/></p>',11,'2016-05-13 01:27:49','2016-05-13 01:27:49'),(16,'<p>金钱猫EN604-W3&nbsp;是金钱猫开发的一款无线光猫，也是作为EPON家庭网关专为满足电信运营商SOHO宽带接入、FTTH宽带提速、光纤到户(FTTH)/光纤到桌面(FTTO)的需求而设计的一款终端ONU设备。可以很好的满足广电双向网、FTTH/FTTO/FTTB的应用。</p><p>&nbsp;</p><p>&nbsp;产品特点：</p><p>&nbsp;*&nbsp; 采用点到多点网络拓扑，有效地收集用户分散的以太网业务并汇聚，在用户侧提供标准RJ45快速以太网接口，与现有网络平滑互联。&nbsp;<br/>&nbsp;*&nbsp; 传输距离20KM、支持数据加密<br/>&nbsp;*&nbsp; 提供4个10/100M的宽带接入<br/>&nbsp;*&nbsp; 支持组播VLAN<br/>&nbsp;*&nbsp; 具备良好的互通性，可以与主流局端厂商OLT设备互通</p><p>&nbsp;*&nbsp; 支持wifi</p><p><br/></p>',12,'2016-05-13 01:29:53','2016-05-13 01:29:53');
/*!40000 ALTER TABLE `pdt_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pdt_images`
--

LOCK TABLES `pdt_images` WRITE;
/*!40000 ALTER TABLE `pdt_images` DISABLE KEYS */;
INSERT INTO `pdt_images` VALUES (11,'/upload/images/20160513/6bab2c798d3445d0ef62bb9f9402fa9b.jpg',1,1,'2016-05-13 00:44:13','2016-05-13 00:44:13'),(12,'/upload/images/20160513/133579dbbfe78a55987fc6293bf8b0d0.jpg',2,1,'2016-05-13 00:50:20','2016-05-13 00:50:20'),(13,'/upload/images/20160513/5105303417569473c6dc6bee39f7921e.jpg',1,2,'2016-05-13 00:50:20','2016-05-13 00:50:20'),(14,'/upload/images/20160513/47ae1fb88f525fa26ee5567fccb48e17.jpg',2,2,'2016-05-13 00:50:20','2016-05-13 00:50:20'),(15,'/upload/images/20160513/6d196599479d5936a267ec62de60f61f.jpg',3,2,'2016-05-13 00:54:03','2016-05-13 00:54:03'),(16,'/upload/images/20160513/e1ad0869b387e6d9e5caa350e7ca3038.jpg',4,2,'2016-05-13 00:56:27','2016-05-13 00:56:27'),(17,'/upload/images/20160513/cdd327916133fe6f337b3c34d0bee67f.jpg',1,3,'2016-05-13 00:59:57','2016-05-13 00:59:57'),(18,'/upload/images/20160513/afad2a413475a5aa36c61b2401a39164.jpg',1,4,'2016-05-13 01:04:40','2016-05-13 01:04:40'),(19,'/upload/images/20160513/2f35c5803915c13bf3ecf6fd0d55c3b8.jpg',1,5,'2016-05-13 01:04:40','2016-05-13 01:04:40'),(20,'/upload/images/20160513/bc3ac0ca2f413e9dc00d29a5672e4384.jpg',1,6,'2016-05-13 01:04:40','2016-05-13 01:04:40'),(21,'/upload/images/20160513/d7639e8f1c0ce9aaa8677eace2659394.jpg',1,7,'2016-05-13 01:14:26','2016-05-13 01:14:26'),(22,'/upload/images/20160513/95dc83ea97744f4b0603aa8729d9fc12.jpg',1,8,'2016-05-13 01:17:05','2016-05-13 01:17:05'),(23,'/upload/images/20160513/e94d73c0c1bc854e151b11b330571e04.jpg',1,9,'2016-05-13 01:19:52','2016-05-13 01:19:52'),(24,'/upload/images/20160513/3c3489172499113e3d6ace2f134d9cd4.jpg',1,10,'2016-05-13 01:22:14','2016-05-13 01:22:14'),(25,'/upload/images/20160513/9700441267b4cefaa71e11db30c82795.jpg',1,11,'2016-05-13 01:27:49','2016-05-13 01:27:49'),(26,'/upload/images/20160513/a40ca25b8a625dbf5857768f81ba6c72.jpg',1,12,'2016-05-13 01:29:54','2016-05-13 01:29:54');
/*!40000 ALTER TABLE `pdt_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pro_comments`
--

LOCK TABLES `pro_comments` WRITE;
/*!40000 ALTER TABLE `pro_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `pro_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'金钱猫EOC终端猫MT706R 广电猫 ','广电双向网改EOC终端设备 四网口 可连接电脑、IP电话或机顶盒 三网融合终端产品',205.00,'/upload/images/20160513/54399748b0ec5e53cc24bf2741956328.jpg',1,'2016-05-13 00:44:12','2016-05-13 00:44:12'),(2,'金钱猫EOC无线终端MT706W 广电猫','广电双向网改EOC无线终端设备 四网口 可连接电脑、IP电话或机顶盒 三网融合终端产品',265.00,'/upload/images/20160513/68e92ef86f6857dc5dd2c3913ec3c26b.jpg',1,'2016-05-13 00:50:20','2016-05-13 00:50:20'),(3,'金钱猫EOC三合一局端CEH7140F ','广电双向网改三合一EOC局端设备，支持现有的树型和星型CATV网络，具有传输距离长、网络适应性好、带宽高等优点，是广电系统部署数字电视网络的有力武器。',2350.00,'/upload/images/20160513/dfe231b7d9de427aa2ef1daa78903a78.jpg',1,'2016-05-13 00:54:03','2016-05-13 00:54:03'),(4,'金钱猫EOC局端设备MH7100F EO','广电双向网改EOC局端设备 三网融合最后1公里同轴电缆入户改造设备',1250.00,'/upload/images/20160513/35c0a1334708ff564d0fde8173325450.jpg',1,'2016-05-13 00:56:27','2016-05-13 00:56:27'),(5,'金钱猫EOC局端EH7440F EOC头','广电双向网改二合一集成式一体机EOC局端设备 EOC模块+ONU模块',3800.00,'/upload/images/20160513/fefcdde3c58ca8ae6d70d1bf6dd99f1d.jpg',1,'2016-05-13 00:59:57','2016-05-13 00:59:57'),(6,'金钱猫EPON局端OLT设备EL6000','广电双向网改光纤入户局端olt设备，提供一个主控板，支持8个PON接口，同时提供本地配置管理接口和带外网接口',14800.00,'/upload/images/20160513/ac274f25e680b4d1682ec90442f7e944.jpg',2,'2016-05-13 01:04:39','2016-05-13 01:04:39'),(7,'金钱猫EPON局端OLT设备EL6000','广电双向网改光纤入户局端olt设备 2个主控板插槽+8个业务模块插槽',148800.00,'/upload/images/20160513/d28436ba22bf589a401776705f3bb24a.jpg',2,'2016-05-13 01:14:25','2016-05-13 01:14:25'),(8,'金钱猫EPON终端ONU设备EN611 ','广电双向网改光纤入户楼道千兆光猫 EPON终端ONU模块 三网融合EPON/GPON方案光纤猫',535.00,'/upload/images/20160513/914c760d1a07ff287bfbe90f92bd8182.jpg',2,'2016-05-13 01:17:02','2016-05-13 01:17:02'),(9,'金钱猫EPON终端ONU光猫EN614 ','广电双向网改光纤入户楼道千兆光猫 EPON终端ONU模块 三网融合EPON/GPON方案光纤猫',598.00,'/upload/images/20160513/f3351a1d7b2baa1048867926aae26bf1.jpg',2,'2016-05-13 01:19:51','2016-05-13 01:19:51'),(10,'金钱猫EPON终端ONU设备EN604 ','广电双向网改光纤入户光猫 FTTH室内型光纤猫',285.00,'/upload/images/20160513/14c52cf2ea18af345641a68377cdf298.jpg',2,'2016-05-13 01:22:14','2016-05-13 01:22:14'),(11,'金钱猫光猫设备EN604-CW 无线WI','多业务EPON终端ONU设备，带无线WIFI，集成CATV光接收机模块，百兆上网，视频点播',535.00,'/upload/images/20160513/a2a837937f8e157a7b914a021deebcdb.jpg',3,'2016-05-13 01:27:49','2016-05-13 01:27:49'),(12,'金钱猫光猫设备EN604-W3 无线WI','高性价比的EPON终端ONU设备，带无线WIFI，百兆上网，高性价比光纤猫',465.00,'/upload/images/20160513/8978de02a9762f52a2b5411dda4658ba.jpg',3,'2016-05-13 01:29:53','2016-05-13 01:29:53');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `temp_email`
--

LOCK TABLES `temp_email` WRITE;
/*!40000 ALTER TABLE `temp_email` DISABLE KEYS */;
INSERT INTO `temp_email` VALUES (2,17,'1ece9d4717eb2a31a97967e629dbc1da','2016-01-04 12:06:26'),(23,38,'3dcfa14d92c60bd024bbcd5423c43698','2016-04-22 10:09:12'),(24,39,'ad39dfc695f35b243fa4f38e3adf242d','2016-04-23 00:49:22'),(25,40,'b8cab131f1491ed61cb03378674a37e9','2016-04-23 00:57:04');
/*!40000 ALTER TABLE `temp_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `temp_phone`
--

LOCK TABLES `temp_phone` WRITE;
/*!40000 ALTER TABLE `temp_phone` DISABLE KEYS */;
INSERT INTO `temp_phone` VALUES (1,'13338286204',882376,'2016-05-16 04:36:28');
/*!40000 ALTER TABLE `temp_phone` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-16 15:49:46
