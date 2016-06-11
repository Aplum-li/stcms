/*
SQLyog Professional v12.08 (64 bit)
MySQL - 5.5.23 : Database - wd16000
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wd16000` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `wd16000`;

/*Table structure for table `fa_ad` */

DROP TABLE IF EXISTS `fa_ad`;

CREATE TABLE `fa_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(255) DEFAULT NULL COMMENT '广告名称',
  `ad_content` varchar(255) DEFAULT NULL COMMENT '广告内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='广告位';

/*Data for the table `fa_ad` */

insert  into `fa_ad`(`id`,`ad_name`,`ad_content`) values (1,'logo','广告内容'),(2,'logo2','23131231321312313'),(3,'logo2','23131231321312313');

/*Table structure for table `fa_admin` */

DROP TABLE IF EXISTS `fa_admin`;

CREATE TABLE `fa_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) DEFAULT NULL COMMENT '管理员名称',
  `admin_pwd` varchar(50) DEFAULT NULL COMMENT '管理员密码',
  `admin_status` tinyint(4) DEFAULT NULL COMMENT '管理员状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理表';

/*Data for the table `fa_admin` */

insert  into `fa_admin`(`id`,`admin_name`,`admin_pwd`,`admin_status`) values (1,'admin','e10adc3949ba59abbe56e057f20f883e',1);

/*Table structure for table `fa_article` */

DROP TABLE IF EXISTS `fa_article`;

CREATE TABLE `fa_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `article_en_title` varchar(255) DEFAULT NULL COMMENT '文章英文标题',
  `article_keyword` varchar(255) DEFAULT NULL COMMENT '文章关键字',
  `article_describe` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `article_thumb` varchar(255) DEFAULT NULL COMMENT '文章缩略图',
  `article_recommend` varchar(255) DEFAULT NULL COMMENT '是否推荐',
  `article_author` varchar(50) DEFAULT NULL COMMENT '文章作者',
  `article_content` text COMMENT '文章内容',
  `article_addtime` int(11) DEFAULT NULL COMMENT '文章添加时间',
  `article_status` int(11) DEFAULT NULL COMMENT '文章状态，1前台显示，0前台不显示',
  `article_sort` int(11) DEFAULT NULL COMMENT '文章排序',
  `article_admin` smallint(6) DEFAULT NULL COMMENT '文章发布者id',
  `article_source` varchar(255) DEFAULT NULL COMMENT '文章来源',
  `article_recovery` int(11) DEFAULT NULL COMMENT '文章回收站',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章表';

/*Data for the table `fa_article` */

insert  into `fa_article`(`id`,`article_title`,`article_en_title`,`article_keyword`,`article_describe`,`article_thumb`,`article_recommend`,`article_author`,`article_content`,`article_addtime`,`article_status`,`article_sort`,`article_admin`,`article_source`,`article_recovery`) values (1,'test','test_en','aaa','bbb',NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL),(2,'test2','aaaa','fvvv','vvv',NULL,NULL,NULL,NULL,NULL,1,2,NULL,NULL,NULL);

/*Table structure for table `fa_column` */

DROP TABLE IF EXISTS `fa_column`;

CREATE TABLE `fa_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column_name` varchar(100) DEFAULT NULL COMMENT '栏目名称',
  `column_url` varchar(255) DEFAULT NULL COMMENT '栏目链接',
  `column_type` int(11) DEFAULT NULL COMMENT '栏目类型',
  `column_content` varchar(255) DEFAULT NULL COMMENT '栏目内容',
  `column_status` int(11) DEFAULT NULL COMMENT '栏目状态',
  `column_sort` int(11) DEFAULT NULL COMMENT '栏目排序',
  `column_subtitle` varchar(255) DEFAULT NULL COMMENT '栏目副标题',
  `column_thumb` varchar(255) DEFAULT NULL COMMENT '栏目缩略图',
  `column_model_id` int(11) DEFAULT NULL COMMENT '栏目模型',
  `column_pid` int(11) DEFAULT NULL COMMENT '栏目父id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';

/*Data for the table `fa_column` */

/*Table structure for table `fa_link_type` */

DROP TABLE IF EXISTS `fa_link_type`;

CREATE TABLE `fa_link_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_type_name` varchar(200) DEFAULT NULL COMMENT '链接分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接分类表';

/*Data for the table `fa_link_type` */

/*Table structure for table `fa_links` */

DROP TABLE IF EXISTS `fa_links`;

CREATE TABLE `fa_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `links_name` varchar(255) DEFAULT NULL COMMENT '链接名称',
  `links_url` varchar(255) DEFAULT NULL COMMENT '链接URL',
  `links_logo` varchar(255) DEFAULT NULL COMMENT '链接logo',
  `links_addtime` int(11) DEFAULT NULL COMMENT '链接添加时间',
  `links_sort` int(11) DEFAULT NULL COMMENT '链接排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接';

/*Data for the table `fa_links` */

/*Table structure for table `fa_member` */

DROP TABLE IF EXISTS `fa_member`;

CREATE TABLE `fa_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(30) DEFAULT NULL COMMENT '会员名称',
  `member_pwd` varchar(100) DEFAULT NULL COMMENT '会员密码',
  `member_head` varchar(255) DEFAULT NULL COMMENT '会员头像',
  `member_sex` int(11) DEFAULT NULL COMMENT '会员性别',
  `member_status` tinyint(4) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

/*Data for the table `fa_member` */

/*Table structure for table `fa_message` */

DROP TABLE IF EXISTS `fa_message`;

CREATE TABLE `fa_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_name` varchar(30) DEFAULT NULL COMMENT '留言用户名称',
  `message_sex` tinyint(4) DEFAULT NULL COMMENT '留言用户性别',
  `message_email` varchar(100) DEFAULT NULL COMMENT '留言用户邮箱',
  `message_company` varchar(100) DEFAULT NULL COMMENT '留言用户公司',
  `message_touch` varchar(100) DEFAULT NULL COMMENT '留言用户联系方式',
  `message_title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `message_content` text COMMENT '留言内容',
  `message_addtime` int(11) DEFAULT NULL COMMENT '留言时间',
  `message_index` varchar(255) DEFAULT NULL COMMENT '用户主页',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表';

/*Data for the table `fa_message` */

/*Table structure for table `fa_model` */

DROP TABLE IF EXISTS `fa_model`;

CREATE TABLE `fa_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) DEFAULT NULL COMMENT '模型名称',
  `model_addtable` varchar(100) DEFAULT NULL COMMENT '模型附加表名',
  `model_page` varchar(255) DEFAULT NULL COMMENT '单页模板',
  `model_list` varchar(255) DEFAULT NULL COMMENT '模板列表',
  `model_details` text COMMENT '模板详情',
  `model_addFile` varchar(255) DEFAULT NULL COMMENT '模板附加文件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='模型表';

/*Data for the table `fa_model` */

insert  into `fa_model`(`id`,`model_name`,`model_addtable`,`model_page`,`model_list`,`model_details`,`model_addFile`) values (1,'qwe','qwe','qwe','wqe','qwe','qwe'),(2,'fasdfasdf','fasdf','fasdf','sadfas','dfsadfas','fasdf'),(3,'fasdfasdf','fasdf','fasdf','sadfas','dfsadfas','fasdf'),(4,'a','a','a','a','a','a');

/*Table structure for table `fa_rotation_type` */

DROP TABLE IF EXISTS `fa_rotation_type`;

CREATE TABLE `fa_rotation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotation_name` varchar(100) DEFAULT NULL COMMENT '轮换图分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='轮换图分类';

/*Data for the table `fa_rotation_type` */

/*Table structure for table `fa_rotations` */

DROP TABLE IF EXISTS `fa_rotations`;

CREATE TABLE `fa_rotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotations_name` varchar(100) DEFAULT NULL COMMENT '轮换图名称',
  `rotations_img` varchar(255) DEFAULT NULL COMMENT '轮换图路径',
  `rotations_url` varchar(255) DEFAULT NULL COMMENT '轮换图URL',
  `rotation_sort` tinyint(4) DEFAULT NULL COMMENT '轮换图排序',
  `rotation_status` tinyint(4) DEFAULT NULL COMMENT '轮换图状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fa_rotations` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
