-- MySQL dump 10.13  Distrib 5.6.32, for Linux (x86_64)
--
-- Host: localhost    Database: yunwublog
-- ------------------------------------------------------
-- Server version	5.6.32

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
-- Table structure for table `blog_article`
--

DROP TABLE IF EXISTS `blog_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` varchar(100) NOT NULL,
  `classify_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `column_8` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `markdown` text NOT NULL,
  `content` text NOT NULL,
  `update_date` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_article` (`id`) USING BTREE,
  KEY `i_article$channel_id` (`channel_id`) USING BTREE
) ENGINE=myisam DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_article`
--

LOCK TABLES `blog_article` WRITE;
/*!40000 ALTER TABLE `blog_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_auth_group`
--

DROP TABLE IF EXISTS `blog_auth_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT '1',
  `title` char(20) NOT NULL DEFAULT '',
  `rules` varchar(20000) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_auth_group` (`id`) USING BTREE
) ENGINE=myisam DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_auth_group`
--

LOCK TABLES `blog_auth_group` WRITE;
/*!40000 ALTER TABLE `blog_auth_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_auth_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_auth_group_access`
--

DROP TABLE IF EXISTS `blog_auth_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_auth_group_access` (
  `uid` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  UNIQUE KEY `i_pk_auth_group_access` (`uid`,`group_id`) USING BTREE,
  KEY `i_auth_group_access$uid` (`uid`) USING BTREE,
  KEY `i_auth_group_access$group_id` (`group_id`) USING BTREE
) ENGINE=myisam DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_auth_group_access`
--

LOCK TABLES `blog_auth_group_access` WRITE;
/*!40000 ALTER TABLE `blog_auth_group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_auth_rule`
--

DROP TABLE IF EXISTS `blog_auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_auth_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT '1',
  `menu_link` varchar(200) DEFAULT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_auth_rule$name` (`name`) USING BTREE,
  UNIQUE KEY `i_pk_auth_rule` (`id`) USING BTREE
) ENGINE=myisam AUTO_INCREMENT=290 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_auth_rule`
--

LOCK TABLES `blog_auth_rule` WRITE;
/*!40000 ALTER TABLE `blog_auth_rule` DISABLE KEYS */;
INSERT INTO `blog_auth_rule` VALUES (10,10,'/Admin/Index/index','/Admin/Index/index','首页',1,1,''),(20,20,'/Admin/Menu/index','/Admin/Menu/index','菜单管理',1,1,''),(30,30,'/Admin/AuthRule/index','/Admin/AuthRule/index','功能管理',1,1,''),(31,31,'/Admin/AuthRule/index','/Admin/AuthRule/handle','功能处理（添加/修改）',1,1,''),(32,32,'/Admin/AuthRule/index','/Admin/AuthRule/del','功能删除',1,1,''),(40,40,'/Admin/AuthGroup/index','/Admin/AuthGroup/index','功能分组',1,1,''),(41,41,'/Admin/AuthGroup/index','/Admin/AuthGroup/handle','功能分组处理（添加/修改）',1,1,''),(42,42,'/Admin/AuthGroup/index','/Admin/AuthGroup/del','功能分组删除',1,1,''),(45,45,'/Admin/Manage/index','/Admin/Manage/index','会员管理',1,1,''),(46,46,'/Admin/Manage/index','/Admin/Manage/handle','会员管理（添加修改）',1,1,''),(47,47,'/Admin/Manage/index','/Admin/CountyManage/del','会员管理（删除）',1,1,''),(201,201,'/Admin/User/index','/Admin/User/index','信息管理',1,1,''),(202,202,'/Admin/User/index','/Admin/User/handle','信息修改',1,1,''),(250,250,'/Admin/Config/index','/Admin/Config/index','网站配置',1,1,''),(251,251,'/Admin/Config/index','/Admin/Config/handle','网站配置修改',1,1,''),(260,260,'/Admin/Banner/index','/Admin/Banner/index','首页滚动图',1,1,''),(261,261,'/Admin/Banner/index','/Admin/Banner/handle','网站首页图修改、添加',1,1,''),(262,262,'/Admin/Banner/index','/Admin/Banner/del','网站首页图删除',1,1,''),(263,263,'/Admin/Banner/index','/Admin/Banner/uploadPic','网站首页图上传',1,1,''),(270,270,'/Admin/Channel/index','/Admin/Channel/index','栏目管理',1,1,''),(271,271,'/Admin/Channel/index','/Admin/Channel/handle','栏目修改、添加',1,1,''),(272,272,'/Admin/Channel/index','/Admin/Channel/del','栏目删除',1,1,''),(277,277,NULL,'/Admin/Article/index','文章列表',1,1,''),(278,278,NULL,'/Admin/Article/del','文章删除',1,1,''),(279,279,NULL,'/Admin/Article/page','文章发布、修改',1,1,''),(280,280,NULL,'/Admin/Article/uploadPic','文章图片上传',1,1,''),(281,281,NULL,'/Admin/Article/handle','文章提交',1,1,''),(285,21,'/Admin/Menu/index','/Admin/Menu/handle','菜单处理（添加/修改）',1,1,''),(286,22,'/Admin/Menu/index','/Admin/Menu/del','菜单删除',1,1,''),(287,273,'/Admin/Channel/index','/Admin/Classify/index','栏目分类目录',1,1,''),(288,274,'/Admin/Channel/index','/Admin/Classify/handle','栏目分类目录处理',1,1,''),(289,275,'/Admin/Channel/index','/Admin/Classify/del','栏目分类目录删除',1,1,'');
/*!40000 ALTER TABLE `blog_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_banner`
--

DROP TABLE IF EXISTS `blog_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(200) NOT NULL,
  `alink` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_banner` (`id`) USING BTREE
) ENGINE=myisam DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_banner`
--

LOCK TABLES `blog_banner` WRITE;
/*!40000 ALTER TABLE `blog_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_channel`
--

DROP TABLE IF EXISTS `blog_channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_channel` (`id`) USING BTREE
) ENGINE=myisam AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_channel`
--

LOCK TABLES `blog_channel` WRITE;
/*!40000 ALTER TABLE `blog_channel` DISABLE KEYS */;
INSERT INTO `blog_channel` VALUES (1,'前端开发',1),(2,'后端开发',2),(3,'移动开发',3),(4,'数据库',4),(5,'数据结构',5),(6,'操作系统',6),(7,'运维&amp;测试',7),(8,'云计算&amp;大数据',8);
/*!40000 ALTER TABLE `blog_channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_classify`
--

DROP TABLE IF EXISTS `blog_classify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_classify_id_uindex` (`id`),
  KEY `i_classify&channel_id` (`channel_id`),
  KEY `i_classify&name` (`name`)
) ENGINE=myisam AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_classify`
--

LOCK TABLES `blog_classify` WRITE;
/*!40000 ALTER TABLE `blog_classify` DISABLE KEYS */;
INSERT INTO `blog_classify` VALUES (4,1,'JavaScript',3),(5,2,'PHP',1),(6,2,'Java',2),(7,1,'HTML',1),(8,1,'CSS',2);
/*!40000 ALTER TABLE `blog_classify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_manage`
--

DROP TABLE IF EXISTS `blog_manage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `manage_name` varchar(200) NOT NULL,
  `manage_phone` varchar(20) NOT NULL,
  `manage_weixin` varchar(50) NOT NULL,
  `img` varchar(20) NOT NULL DEFAULT 'default-user.jpg',
  `pwd` varchar(32) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_county_manage` (`id`) USING BTREE,
  KEY `i_county_manage$name` (`name`) USING BTREE,
  KEY `i_county_manage$manage_name` (`manage_name`) USING BTREE,
  KEY `i_county_manage$pwd` (`pwd`) USING BTREE
) ENGINE=myisam AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_manage`
--

LOCK TABLES `blog_manage` WRITE;
/*!40000 ALTER TABLE `blog_manage` DISABLE KEYS */;
INSERT INTO `blog_manage` VALUES (1,'admin','超级管理员','13088730495','bcv1741','default-male.jpg','aac5771af3d4e79f72c12c31caabd9a5','');
/*!40000 ALTER TABLE `blog_manage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_menu`
--

DROP TABLE IF EXISTS `blog_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` tinyint(4) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `name` char(20) NOT NULL,
  `alink` char(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_menu` (`id`) USING BTREE,
  KEY `i_menu$level` (`level`) USING BTREE,
  KEY `i_menu$pid` (`pid`) USING BTREE,
  KEY `i_menu$status` (`status`) USING BTREE
) ENGINE=myisam AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_menu`
--

LOCK TABLES `blog_menu` WRITE;
/*!40000 ALTER TABLE `blog_menu` DISABLE KEYS */;
INSERT INTO `blog_menu` VALUES (1,0,'0','magic','首页','/Admin/Index/index',1,'1'),(2,0,'0','clipboard','菜单管理','/Admin/Menu/index',2,'1'),(3,0,'0','list-ul','功能管理','/Admin/AuthRule/index',3,'1'),(4,0,'0','th-large','功能分组','/Admin/AuthGroup/index',4,'1'),(5,0,'0','gears','会员管理','/Admin/Manage/index',5,'1'),(27,0,'0','pencil-square-o','编辑信息','/Admin/User/index',27,'1'),(29,0,'0','gears','网站配置','/Admin/Config/index',29,'1'),(30,0,'0','picture-o','首页滚动图','/Admin/Banner/index',30,'1'),(31,0,'0','list','栏目管理','/Admin/Channel/index',31,'1');
/*!40000 ALTER TABLE `blog_menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-26 15:04:52
