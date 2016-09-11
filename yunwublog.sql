/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : yunwublog

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2016-09-11 18:33:36
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
INSERT INTO `blog_auth_group_access` VALUES ('0', '0');
INSERT INTO `blog_auth_group_access` VALUES ('2', '0');
INSERT INTO `blog_auth_group_access` VALUES ('3', '0');
INSERT INTO `blog_auth_group_access` VALUES ('4', '0');
INSERT INTO `blog_auth_group_access` VALUES ('5', '0');
INSERT INTO `blog_auth_group_access` VALUES ('6', '0');
INSERT INTO `blog_auth_group_access` VALUES ('7', '0');
INSERT INTO `blog_auth_group_access` VALUES ('8', '0');
INSERT INTO `blog_auth_group_access` VALUES ('9', '0');
INSERT INTO `blog_auth_group_access` VALUES ('10', '0');
INSERT INTO `blog_auth_group_access` VALUES ('11', '0');
INSERT INTO `blog_auth_group_access` VALUES ('12', '0');
INSERT INTO `blog_auth_group_access` VALUES ('13', '0');
INSERT INTO `blog_auth_group_access` VALUES ('14', '0');
INSERT INTO `blog_auth_group_access` VALUES ('15', '0');
INSERT INTO `blog_auth_group_access` VALUES ('16', '0');
INSERT INTO `blog_auth_group_access` VALUES ('17', '0');
INSERT INTO `blog_auth_group_access` VALUES ('18', '0');
INSERT INTO `blog_auth_group_access` VALUES ('19', '0');
INSERT INTO `blog_auth_group_access` VALUES ('20', '0');
INSERT INTO `blog_auth_group_access` VALUES ('21', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=utf8;

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
INSERT INTO `blog_auth_rule` VALUES ('290', '60', '/Admin/Worker/index', '/Admin/Worker/index', '职员管理', '1', '1', '');
INSERT INTO `blog_auth_rule` VALUES ('291', '61', '/Admin/Worker/importerWorker', '/Admin/Worker/importerWorker', '职员导入', '1', '1', '');

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
-- Table structure for `blog_field_dict`
-- ----------------------------
DROP TABLE IF EXISTS `blog_field_dict`;
CREATE TABLE `blog_field_dict` (
  `table_name` varchar(50) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `field_value` varchar(50) NOT NULL,
  `field_mean` varchar(50) NOT NULL,
  `type` char(1) NOT NULL DEFAULT 'a',
  `status` char(1) NOT NULL DEFAULT 'a',
  `seq` tinyint(4) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  UNIQUE KEY `i_pk_field_dict` (`table_name`,`field_name`,`field_value`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_field_dict
-- ----------------------------
INSERT INTO `blog_field_dict` VALUES ('article', 'is_link', 'a', '否', 'a', 'a', '1', null, '1', '2016-08-15');
INSERT INTO `blog_field_dict` VALUES ('article', 'is_link', 'b', '是', 'a', 'a', '2', null, '1', '2016-08-15');
INSERT INTO `blog_field_dict` VALUES ('channel', 'status', 'a', '启用', 'a', 'a', '1', '1', '1', '2016-08-15');
INSERT INTO `blog_field_dict` VALUES ('channel', 'status', 'b', '停用', 'a', 'a', '2', '2', '1', '2016-08-15');
INSERT INTO `blog_field_dict` VALUES ('channel', 'type', 'a', '简介文章', 'a', 'a', '1', '1', '1', '2016-08-15');
INSERT INTO `blog_field_dict` VALUES ('channel', 'type', 'b', '文章列表', 'a', 'a', '2', '2', '1', '2016-08-15');
INSERT INTO `blog_field_dict` VALUES ('channel', 'type', 'c', '超链接', 'a', 'a', '3', '3', '1', '2016-08-15');
INSERT INTO `blog_field_dict` VALUES ('channel', 'type', 'd', '体检套餐', 'a', 'a', '4', null, null, null);
INSERT INTO `blog_field_dict` VALUES ('field_dict', 'status', 'a', '启用', 'a', 'a', '1', null, null, null);
INSERT INTO `blog_field_dict` VALUES ('field_dict', 'status', 'b', '停用', 'a', 'a', '2', null, null, null);
INSERT INTO `blog_field_dict` VALUES ('field_dict', 'type', 'a', '系统预设', 'a', 'a', '1', null, null, null);
INSERT INTO `blog_field_dict` VALUES ('field_dict', 'type', 'b', '用户自定义', 'a', 'a', '2', null, null, null);
INSERT INTO `blog_field_dict` VALUES ('menu', 'status', '0', '应用', 'a', 'a', '2', null, null, null);
INSERT INTO `blog_field_dict` VALUES ('menu', 'status', '1', '启用', 'a', 'a', '1', null, null, null);
INSERT INTO `blog_field_dict` VALUES ('worker', 'card_print_flag', '0', '未打印', 'a', 'a', '1', '1', null, '2015-07-07');
INSERT INTO `blog_field_dict` VALUES ('worker', 'card_print_flag', '1', '已打印', 'a', 'a', '2', '1', null, '2015-07-07');
INSERT INTO `blog_field_dict` VALUES ('worker', 'gender', 'a', '男', 'a', 'a', '1', '', '1', '2015-07-06');
INSERT INTO `blog_field_dict` VALUES ('worker', 'gender', 'b', '女', 'a', 'a', '2', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'marital_status', 'a', '已婚', 'a', 'a', '1', '', '1', '2016-05-18');
INSERT INTO `blog_field_dict` VALUES ('worker', 'marital_status', 'b', '未婚', 'a', 'a', '2', '', '1', '2016-05-18');
INSERT INTO `blog_field_dict` VALUES ('worker', 'marital_status', 'c', '离婚', 'a', 'a', '3', '', '1', '2016-05-18');
INSERT INTO `blog_field_dict` VALUES ('worker', 'marital_status', 'd', '丧偶', 'a', 'a', '4', '', '1', '2016-05-18');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '01', '汉族', 'a', 'a', '1', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '02', '蒙古族', 'a', 'a', '2', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '03', '回族', 'a', 'a', '3', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '04', '藏族', 'a', 'a', '4', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '05', '维吾尔族', 'a', 'a', '5', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '06', '苗族', 'a', 'a', '6', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '07', '彝族', 'a', 'a', '7', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '08', '壮族', 'a', 'a', '8', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '09', '布依族', 'a', 'a', '9', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '10', '朝鲜族', 'a', 'a', '10', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '11', '满族', 'a', 'a', '11', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '12', '侗族', 'a', 'a', '12', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '13', '瑶族', 'a', 'a', '13', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '14', '白族', 'a', 'a', '14', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '15', '土家族', 'a', 'a', '15', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '16', '哈尼族', 'a', 'a', '16', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '17', '哈萨克族', 'a', 'a', '17', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '18', '傣族', 'a', 'a', '18', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '19', '黎族', 'a', 'a', '19', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '20', '僳僳族', 'a', 'a', '20', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '21', '佤族', 'a', 'a', '21', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '22', '畲族', 'a', 'a', '22', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '23', '高山族', 'a', 'a', '23', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '24', '拉祜族', 'a', 'a', '24', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '25', '水族', 'a', 'a', '25', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '26', '东乡族', 'a', 'a', '26', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '27', '纳西族', 'a', 'a', '27', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '28', '景颇族', 'a', 'a', '28', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '29', '柯尔克孜族', 'a', 'a', '29', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '30', '土族', 'a', 'a', '30', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '31', '达斡尔族', 'a', 'a', '31', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '32', '仫佬族', 'a', 'a', '32', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '33', '羌族', 'a', 'a', '33', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '34', '布朗族', 'a', 'a', '34', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '35', '撒拉族', 'a', 'a', '35', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '36', '毛难族', 'a', 'a', '36', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '37', '仡佬族', 'a', 'a', '37', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '38', '锡伯族', 'a', 'a', '38', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '39', '阿昌族', 'a', 'a', '39', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '40', '普米族', 'a', 'a', '40', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '41', '塔吉克族', 'a', 'a', '41', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '42', '怒族', 'a', 'a', '42', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '43', '乌孜别克族', 'a', 'a', '43', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '44', '俄罗斯族', 'a', 'a', '44', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '45', '鄂温克族', 'a', 'a', '45', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '46', '崩龙族', 'a', 'a', '46', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '47', '保安族', 'a', 'a', '47', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '48', '裕固族', 'a', 'a', '48', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '49', '京族', 'a', 'a', '49', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '50', '塔塔尔族', 'a', 'a', '50', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '51', '独龙族', 'a', 'a', '51', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '52', '鄂伦春族', 'a', 'a', '52', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '53', '赫哲族', 'a', 'a', '53', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '54', '门巴族', 'a', 'a', '54', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '55', '珞巴族', 'a', 'a', '55', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '56', '基诺族', 'a', 'a', '56', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '57', '其他', 'a', 'a', '57', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'nation', '58', '外国血统', 'a', 'a', '58', '', '1', '2015-06-17');
INSERT INTO `blog_field_dict` VALUES ('worker', 'status', 'a', '已启用', 'a', 'a', '1', null, '1', '2015-07-07');
INSERT INTO `blog_field_dict` VALUES ('worker', 'status', 'b', '已删除', 'a', 'a', '2', '', '1', '2015-07-24');
INSERT INTO `blog_field_dict` VALUES ('worker', 'status', 'c', '已转出', 'a', 'a', '3', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

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
INSERT INTO `blog_menu` VALUES ('32', '0', '0', 'group', '职员管理', '/Admin/Worker/index', '6', '1');
INSERT INTO `blog_menu` VALUES ('33', '0', '0', 'gear', '职员导入', '/Admin/Worker/importerWorker', '7', '1');

-- ----------------------------
-- Table structure for `blog_system_option`
-- ----------------------------
DROP TABLE IF EXISTS `blog_system_option`;
CREATE TABLE `blog_system_option` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `remark` varchar(1000) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_system_option` (`id`) USING BTREE,
  KEY `i_system_option$name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_system_option
-- ----------------------------
INSERT INTO `blog_system_option` VALUES ('1', '县管理员分组ID', 'hdc_auth_group_1471077621_42ed17ca318b3ada319b59da8bfd3f2f021a6879', null, null, null);
INSERT INTO `blog_system_option` VALUES ('2', '单位管理员分组ID', 'hdc_auth_group_1471078407_5b386ced085c0e264f8af1675e3a462813baf8c1', null, null, null);
INSERT INTO `blog_system_option` VALUES ('3', '单位职员分组ID', 'hdc_auth_group_1471078592_41b7cba9600f47426826af4cfb2ba80410d735e6', null, null, null);
INSERT INTO `blog_system_option` VALUES ('4', '超级管理员ID', '新昊源电子科技有限公司', '就是汉字，不要删', null, null);
INSERT INTO `blog_system_option` VALUES ('5', '医院管理员分组ID', 'hdc_auth_group_1471573515_42387cde5b0b108615d4a1884461677152f8b389', null, null, null);

-- ----------------------------
-- Table structure for `blog_worker`
-- ----------------------------
DROP TABLE IF EXISTS `blog_worker`;
CREATE TABLE `blog_worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `gender` char(1) NOT NULL DEFAULT 'a',
  `job` varchar(100) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `nation` char(20) NOT NULL DEFAULT '汉族',
  `marital_status` char(20) NOT NULL DEFAULT '未婚',
  `id_card_no` char(18) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `img` varchar(20) DEFAULT 'default-user.jpg',
  `pic` varchar(200) DEFAULT NULL,
  `weixin` varchar(50) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'a',
  `operator` varchar(100) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_pk_worker` (`id`) USING BTREE,
  KEY `i_worker$id_card_no` (`id_card_no`) USING BTREE,
  KEY `i_worker$status` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_worker
-- ----------------------------
INSERT INTO `blog_worker` VALUES ('1', '123', 'a', '123', '123', '21', '1995-04-30', '汉族', '已婚', '360782199504300011', 'f88b96c9a7f16e47a0552c0322343f88', '123', 'default-user.jpg', '/upload/worker/pic/57d5306c53d6d.jpg', null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('2', '李小草', '0', '干部', '事业干部', '22', '1995-01-02', '汉族', '已婚', '513723199501026409', '2dc4b1cd433fab3808345f7b30e57f75', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('3', '刘艳菊', '0', '主任', '事业干部', '22', '1994-11-09', '汉族', '已婚', '622626199411094940', '2a5dcdc4bc3225060862268becfd12ec', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('4', '马如霞', '0', '干部', '事业干部', '20', '1996-05-22', '汉族', '已婚', '620423199605220026', 'ed958722c74818581261bfd75244a331', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('5', '马甜甜', '0', '主任', '事业干部', '19', '1996-12-30', '汉族', '已婚', '62242519961230162X', '97cc1e08a2c63fecb1111884fc70374c', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('6', '毛艳', '0', '干部', '事业干部', '24', '1992-06-01', '汉族', '已婚', '622823199206013621', 'cc2a75196b16d58f0cefc0a81696945a', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('7', '牛亚萍', '0', '主任', '事业干部', '19', '1997-11-01', '汉族', '已婚', '622822199711012746', '5966b4edb19de6347aec54a3684dd0f3', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('8', '申诚诚', '1', '干部', '事业干部', '22', '1994-09-07', '汉族', '已婚', '622827199409073515', '349608bdf77544402e16fc544ea656ab', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('9', '石满州', '1', '主任', '事业干部', '20', '1996-08-02', '汉族', '已婚', '622627199608021952', '17526fdae521043bd0fdec5306fa8b72', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('10', '苏玥', '0', '干部', '事业干部', '19', '1997-01-05', '汉族', '已婚', '620104199701050025', '2ea7840d6695bdf470438b3eaeb45ce3', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('11', '王俊虎', '1', '主任', '事业干部', '21', '1995-05-06', '汉族', '已婚', '62220119950506871X', '55c6a8e412f1d9094b4b7d65bc9dc071', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('12', '王淼', '0', '干部', '事业干部', '20', '1996-07-11', '汉族', '已婚', '622726199607110522', '25d137ca7db13b7e48fe24f2db1daa92', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('13', '王婷玉', '0', '主任', '事业干部', '22', '1994-11-26', '汉族', '已婚', '500384199411265824', 'ee1f2c993ec754e2e7e203bb9461d7c6', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('14', '王玉玺', '0', '干部', '事业干部', '20', '1996-08-10', '汉族', '已婚', '622921199608107826', '1c0ac3374c3c2eebba7ed1e63b42b166', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('15', '魏苗苗', '0', '主任', '事业干部', '22', '1995-01-02', '汉族', '已婚', '622722199501022422', '6a11de52ff6454542088f19ef3b773c9', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('16', '魏佩玺', '0', '干部', '事业干部', '22', '1994-10-19', '汉族', '已婚', '620422199410192743', '8ba8d87a8a7f3a490404836563b3fe37', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('17', '魏润菊', '0', '主任', '事业干部', '21', '1995-05-06', '汉族', '已婚', '620523199505065001', '71bca648a826fd859d5a6b856ea41138', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('18', '吴美霞', '0', '干部', '事业干部', '22', '1994-06-21', '汉族', '已婚', '511623199406212521', '72cff230e7cfe06a1a4d883aa5fcc9e8', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('19', '吴沙杰', '0', '主任', '事业干部', '20', '1996-03-29', '汉族', '已婚', '620402199603291320', '9187ddcc236ec4a0495908cfc23b9955', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('20', '吴玉婷', '0', '干部', '事业干部', '21', '1995-02-02', '汉族', '已婚', '62230119950202950x', 'a549a54f1929670d719835543f780338', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');
INSERT INTO `blog_worker` VALUES ('21', '许振鸿', '1', '主任', '事业干部', '22', '1994-07-16', '汉族', '已婚', '469028199407161238', 'f400e9a4991280d6d5eaf86e66a8cb24', '18809400000', 'default-user.jpg', null, null, 'a', '1', '0000-00-00');

-- ----------------------------
-- Function structure for `get_field_dict_name`
-- ----------------------------
DROP FUNCTION IF EXISTS `get_field_dict_name`;
DELIMITER ;;
CREATE FUNCTION `get_field_dict_name`(in_table_name varchar(100),
	in_field_name varchar(100),
	in_field_value varchar(100)) RETURNS varchar(100) CHARSET utf8
begin
	declare v_field_mean varchar(100);
	select field_mean into v_field_mean 
	 from blog_field_dict 
	where table_name = in_table_name 
	  and field_name = in_field_name 
	  and field_value = in_field_value;
	if(v_field_mean is null) then
		set v_field_mean = '未知';
	end if;
	return v_field_mean;
end
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `get_field_dict_remark`
-- ----------------------------
DROP FUNCTION IF EXISTS `get_field_dict_remark`;
DELIMITER ;;
CREATE FUNCTION `get_field_dict_remark`(in_table_name varchar(50),
	in_field_name varchar(50),
	in_field_value varchar(50)) RETURNS varchar(50) CHARSET utf8
begin
	declare v_remark varchar(50);
	select remark into v_remark 
	 from blog_field_dict 
	where table_name = in_table_name 
	  and field_name = in_field_name 
	  and field_value = in_field_value
	limit 1;
	if(v_remark is null) then
		set v_remark = '';
	end if;
	return v_remark;
end
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `get_field_dict_seq`
-- ----------------------------
DROP FUNCTION IF EXISTS `get_field_dict_seq`;
DELIMITER ;;
CREATE FUNCTION `get_field_dict_seq`(in_table_name varchar(50),
	in_field_name varchar(50),
	in_field_value varchar(50)) RETURNS tinyint(4)
begin
	declare v_seq varchar(100);
	select seq into v_seq 
	 from blog_field_dict 
	where table_name = in_table_name 
	  and field_name = in_field_name 
	  and field_value = in_field_value
	limit 1;
	if(v_seq is null) then
		set v_seq = 0;
	end if;
	return v_seq;
end
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `get_formate_date`
-- ----------------------------
DROP FUNCTION IF EXISTS `get_formate_date`;
DELIMITER ;;
CREATE FUNCTION `get_formate_date`(in_date datetime) RETURNS varchar(20) CHARSET utf8
begin
	return date_format(in_date,'%Y-%m-%d');
end
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `get_formate_long_date`
-- ----------------------------
DROP FUNCTION IF EXISTS `get_formate_long_date`;
DELIMITER ;;
CREATE FUNCTION `get_formate_long_date`(in_date datetime) RETURNS varchar(20) CHARSET utf8
begin
	return date_format(in_date,'%Y-%m-%d %H:%i:%s');
end
;;
DELIMITER ;
