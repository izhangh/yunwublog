/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : yunwublog

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2016-09-11 12:41:40
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel` varchar(100) NOT NULL,
  `classify` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `markdown` text NOT NULL,
  `content` text NOT NULL,
  `update_date` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_article` (`id`) USING BTREE,
  KEY `i_article$channel_id` (`channel`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_group`;
CREATE TABLE `blog_auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT '1',
  `title` char(20) NOT NULL DEFAULT '',
  `rules` varchar(20000) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_auth_group` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_group_access`;
CREATE TABLE `blog_auth_group_access` (
  `uid` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  UNIQUE KEY `i_pk_auth_group_access` (`uid`,`group_id`) USING BTREE,
  KEY `i_auth_group_access$uid` (`uid`) USING BTREE,
  KEY `i_auth_group_access$group_id` (`group_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_rule`;
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
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_rule
-- ----------------------------
INSERT INTO `blog_auth_rule` VALUES ('10', '10', '/Admin/Index/index', '/Admin/Index/index', '首页', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('20', '20', '/Admin/Menu/index', '/Admin/Menu/index', '菜单管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('30', '30', '/Admin/AuthRule/index', '/Admin/AuthRule/index', '功能管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('31', '31', '/Admin/AuthRule/index', '/Admin/AuthRule/handle', '功能处理（添加/修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('32', '32', '/Admin/AuthRule/index', '/Admin/AuthRule/del', '功能删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('40', '40', '/Admin/AuthGroup/index', '/Admin/AuthGroup/index', '功能分组', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('41', '41', '/Admin/AuthGroup/index', '/Admin/AuthGroup/handle', '功能分组处理（添加/修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('42', '42', '/Admin/AuthGroup/index', '/Admin/AuthGroup/del', '功能分组删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('45', '45', '/Admin/Manage/index', '/Admin/Manage/index', '会员管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('46', '46', '/Admin/Manage/index', '/Admin/Manage/handle', '会员管理（添加修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('47', '47', '/Admin/Manage/index', '/Admin/CountyManage/del', '会员管理（删除）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('201', '201', '/Admin/User/index', '/Admin/User/index', '信息管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('202', '202', '/Admin/User/index', '/Admin/User/handle', '信息修改', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('250', '250', '/Admin/Config/index', '/Admin/Config/index', '网站配置', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('251', '251', '/Admin/Config/index', '/Admin/Config/handle', '网站配置修改', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('260', '260', '/Admin/Banner/index', '/Admin/Banner/index', '首页滚动图', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('261', '261', '/Admin/Banner/index', '/Admin/Banner/handle', '网站首页图修改、添加', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('262', '262', '/Admin/Banner/index', '/Admin/Banner/del', '网站首页图删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('263', '263', '/Admin/Banner/index', '/Admin/Banner/uploadPic', '网站首页图上传', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('270', '270', '/Admin/Channel/index', '/Admin/Channel/index', '栏目管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('271', '271', '/Admin/Channel/index', '/Admin/Channel/handle', '栏目修改、添加', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('272', '272', '/Admin/Channel/index', '/Admin/Channel/del', '栏目删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('277', '277', null, '/Admin/Article/index', '文章列表', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('278', '278', null, '/Admin/Article/del', '文章删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('279', '279', null, '/Admin/Article/page', '文章发布、修改', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('280', '280', null, '/Admin/Article/uploadPic', '文章图片上传', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('281', '281', null, '/Admin/Article/handle', '文章提交', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('285', '21', '/Admin/Menu/index', '/Admin/Menu/handle', '菜单处理（添加/修改）', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('286', '22', '/Admin/Menu/index', '/Admin/Menu/del', '菜单删除', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('287', '273', '/Admin/Channel/index', '/Admin/Classify/index', '栏目分类目录', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('288', '274', '/Admin/Channel/index', '/Admin/Classify/handle', '栏目分类目录处理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('289', '275', '/Admin/Channel/index', '/Admin/Classify/del', '栏目分类目录删除', '1', '1', '');

-- ----------------------------
-- Table structure for `blog_banner`
-- ----------------------------
DROP TABLE IF EXISTS `blog_banner`;
CREATE TABLE `blog_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(200) NOT NULL,
  `alink` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_banner` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_banner
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_channel`
-- ----------------------------
DROP TABLE IF EXISTS `blog_channel`;
CREATE TABLE `blog_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_channel` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_channel
-- ----------------------------
INSERT INTO `blog_channel` VALUES ('1', '测试栏目', '1');

-- ----------------------------
-- Table structure for `blog_classify`
-- ----------------------------
DROP TABLE IF EXISTS `blog_classify`;
CREATE TABLE `blog_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_classify_id_uindex` (`id`) USING BTREE,
  KEY `i_classify&channel_id` (`channel_id`) USING BTREE,
  KEY `i_classify&name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_classify
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_manage`
-- ----------------------------
DROP TABLE IF EXISTS `blog_manage`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_manage
-- ----------------------------
INSERT INTO `blog_manage` VALUES ('1', 'admin', '超级管理员', '13088730495', 'bcv1741', 'default-male.jpg', 'aac5771af3d4e79f72c12c31caabd9a5', '');

-- ----------------------------
-- Table structure for `blog_menu`
-- ----------------------------
DROP TABLE IF EXISTS `blog_menu`;
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_menu
-- ----------------------------
INSERT INTO `blog_menu` VALUES ('1', '0', '0', 'magic', '首页', '/Admin/Index/index', '1', '1');
INSERT INTO `blog_menu` VALUES ('2', '0', '0', 'clipboard', '菜单管理', '/Admin/Menu/index', '2', '1');
INSERT INTO `blog_menu` VALUES ('3', '0', '0', 'list-ul', '功能管理', '/Admin/AuthRule/index', '3', '1');
INSERT INTO `blog_menu` VALUES ('4', '0', '0', 'th-large', '功能分组', '/Admin/AuthGroup/index', '4', '1');
INSERT INTO `blog_menu` VALUES ('5', '0', '0', 'gears', '会员管理', '/Admin/Manage/index', '5', '1');
INSERT INTO `blog_menu` VALUES ('27', '0', '0', 'pencil-square-o', '编辑信息', '/Admin/User/index', '27', '1');
INSERT INTO `blog_menu` VALUES ('29', '0', '0', 'gears', '网站配置', '/Admin/Config/index', '29', '1');
INSERT INTO `blog_menu` VALUES ('30', '0', '0', 'picture-o', '首页滚动图', '/Admin/Banner/index', '30', '1');
INSERT INTO `blog_menu` VALUES ('31', '0', '0', 'list', '栏目管理', '/Admin/Channel/index', '31', '1');
