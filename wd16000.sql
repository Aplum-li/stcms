-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?06 �?11 �?17:10
-- 服务器版本: 5.6.29
-- PHP 版本: 5.6.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wd16000`
--

-- --------------------------------------------------------

--
-- 表的结构 `fa_ad`
--

CREATE TABLE IF NOT EXISTS `fa_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(255) DEFAULT NULL COMMENT '广告名称',
  `ad_content` varchar(255) DEFAULT NULL COMMENT '广告内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告位' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fa_ad`
--

INSERT INTO `fa_ad` (`id`, `ad_name`, `ad_content`) VALUES
(1, 'logo', '广告内容'),
(2, 'logo2', '23131231321312313'),
(3, 'logo2', '23131231321312313');

-- --------------------------------------------------------

--
-- 表的结构 `fa_admin`
--

CREATE TABLE IF NOT EXISTS `fa_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) DEFAULT NULL COMMENT '管理员名称',
  `admin_pwd` varchar(50) DEFAULT NULL COMMENT '管理员密码',
  `admin_status` tinyint(4) DEFAULT NULL COMMENT '管理员状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fa_admin`
--

INSERT INTO `fa_admin` (`id`, `admin_name`, `admin_pwd`, `admin_status`) VALUES
(1, 'admin', 'adc3949ba59abbe56e057f20f883', 1);

-- --------------------------------------------------------

--
-- 表的结构 `fa_article`
--

CREATE TABLE IF NOT EXISTS `fa_article` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `fa_article`
--

INSERT INTO `fa_article` (`id`, `article_title`, `article_en_title`, `article_keyword`, `article_describe`, `article_thumb`, `article_recommend`, `article_author`, `article_content`, `article_addtime`, `article_status`, `article_sort`, `article_admin`, `article_source`, `article_recovery`) VALUES
(1, 'test', 'test_en', 'aaa', 'bbb', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(2, 'test2', 'aaaa', 'fvvv', 'vvv', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `fa_article_type`
--

CREATE TABLE IF NOT EXISTS `fa_article_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '父级id',
  `topid` smallint(6) NOT NULL COMMENT '顶级栏目id',
  `typename` varchar(150) NOT NULL,
  `subtitle` varchar(30) NOT NULL COMMENT '副标题',
  `type` char(10) NOT NULL COMMENT '栏目类型',
  `model` char(10) NOT NULL COMMENT '模型',
  `list_tpl` varchar(50) NOT NULL COMMENT '列表模板',
  `view_tpl` varchar(50) NOT NULL COMMENT '详情页模板',
  `page_tpl` varchar(50) NOT NULL COMMENT '单页模板',
  `typelink` varchar(150) NOT NULL,
  `litpic` varchar(150) NOT NULL COMMENT '栏目缩略图',
  `typedesc` varchar(400) NOT NULL COMMENT '栏目摘要',
  `typecontent` text NOT NULL COMMENT '栏目内容',
  `page` smallint(5) DEFAULT '10',
  `sort` int(11) NOT NULL COMMENT '排序',
  `status` tinyint(11) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `keyword` varchar(250) NOT NULL COMMENT '栏目关键字',
  `admin_id` tinyint(4) NOT NULL COMMENT '管理员id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `pname` varchar(100) NOT NULL COMMENT '上级标识',
  `name` varchar(100) NOT NULL COMMENT '标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='栏目表' AUTO_INCREMENT=96 ;

--
-- 转存表中的数据 `fa_article_type`
--

INSERT INTO `fa_article_type` (`id`, `pid`, `topid`, `typename`, `subtitle`, `type`, `model`, `list_tpl`, `view_tpl`, `page_tpl`, `typelink`, `litpic`, `typedesc`, `typecontent`, `page`, `sort`, `status`, `keyword`, `admin_id`, `addtime`, `pname`, `name`) VALUES
(89, 0, 0, '公司简介', '', 'page', '6', 'list_article.tpl', 'article_article.tpl', 'index_article.tpl', '', '', '', '', 10, 0, 1, '', 0, 0, '', '/gongsijianjie'),
(91, 89, 89, '公司历史', '', 'page', '6', 'list_article.tpl', 'article_article.tpl', 'index_article.tpl', '', '', '', '', 10, 0, 1, '', 1, 1465663767, '/gongsijianjie', '/gongsilishi'),
(92, 0, 0, '新闻中心', '', 'page', '6', 'list_article.tpl', 'article_article.tpl', 'index_article.tpl', '', '', '', '', 10, 0, 1, '', 1, 1465663928, '', '/xinwenzhongxin'),
(93, 92, 92, '公司新闻', '', 'page', '6', 'list_article.tpl', 'article_article.tpl', 'index_article.tpl', '', '', '', '', 10, 0, 1, '', 1, 1465663941, '/xinwenzhongxin', '/gongsixinwen'),
(94, 92, 92, '行业新闻', '', 'page', '6', 'list_article.tpl', 'article_article.tpl', 'index_article.tpl', '', '', '', '', 10, 0, 1, '', 1, 1465663954, '/xinwenzhongxin', '/xingyexinwen'),
(95, 93, 92, '子公司新闻', '', 'page', '6', 'list_article.tpl', 'article_article.tpl', 'index_article.tpl', '', '', '', '', 10, 0, 1, '', 1, 1465663974, '/xinwenzhongxin/gongsixinwen', '/zigongsixinwen');

-- --------------------------------------------------------

--
-- 表的结构 `fa_column`
--

CREATE TABLE IF NOT EXISTS `fa_column` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fa_links`
--

CREATE TABLE IF NOT EXISTS `fa_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `links_name` varchar(255) DEFAULT NULL COMMENT '链接名称',
  `links_url` varchar(255) DEFAULT NULL COMMENT '链接URL',
  `links_logo` varchar(255) DEFAULT NULL COMMENT '链接logo',
  `links_addtime` int(11) DEFAULT NULL COMMENT '链接添加时间',
  `links_sort` int(11) DEFAULT NULL COMMENT '链接排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fa_link_type`
--

CREATE TABLE IF NOT EXISTS `fa_link_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_type_name` varchar(200) DEFAULT NULL COMMENT '链接分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接分类表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fa_member`
--

CREATE TABLE IF NOT EXISTS `fa_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(30) DEFAULT NULL COMMENT '会员名称',
  `member_pwd` varchar(100) DEFAULT NULL COMMENT '会员密码',
  `member_head` varchar(255) DEFAULT NULL COMMENT '会员头像',
  `member_sex` int(11) DEFAULT NULL COMMENT '会员性别',
  `member_status` tinyint(4) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fa_message`
--

CREATE TABLE IF NOT EXISTS `fa_message` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fa_model`
--

CREATE TABLE IF NOT EXISTS `fa_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) DEFAULT NULL COMMENT '模型名称',
  `model_addtable` varchar(100) DEFAULT NULL COMMENT '模型附加表名',
  `model_page` varchar(255) DEFAULT NULL COMMENT '单页模板',
  `model_list` varchar(255) DEFAULT NULL COMMENT '模板列表',
  `model_details` text COMMENT '模板详情',
  `model_addFile` varchar(255) DEFAULT NULL COMMENT '模板附加文件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='模型表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `fa_model`
--

INSERT INTO `fa_model` (`id`, `model_name`, `model_addtable`, `model_page`, `model_list`, `model_details`, `model_addFile`) VALUES
(6, '文章模型', 'article_add', 'index_article.tpl', 'list_article.tpl', 'article_article.tpl', ''),
(7, '产品模型', 'product_add', 'product_index.tpl', 'product_list.tpl', 'product_article.tpl', 'product_add');

-- --------------------------------------------------------

--
-- 表的结构 `fa_rotations`
--

CREATE TABLE IF NOT EXISTS `fa_rotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotations_name` varchar(100) DEFAULT NULL COMMENT '轮换图名称',
  `rotations_img` varchar(255) DEFAULT NULL COMMENT '轮换图路径',
  `rotations_url` varchar(255) DEFAULT NULL COMMENT '轮换图URL',
  `rotation_sort` tinyint(4) DEFAULT NULL COMMENT '轮换图排序',
  `rotation_status` tinyint(4) DEFAULT NULL COMMENT '轮换图状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fa_rotation_type`
--

CREATE TABLE IF NOT EXISTS `fa_rotation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotation_name` varchar(100) DEFAULT NULL COMMENT '轮换图分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='轮换图分类' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
