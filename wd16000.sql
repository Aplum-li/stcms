-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-06-07 15:40:39
-- 服务器版本： 5.6.29
-- PHP Version: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wd16000`
--

-- --------------------------------------------------------

--
-- 表的结构 `fa_ad`
--

CREATE TABLE IF NOT EXISTS `fa_ad` (
  `id` int(11) NOT NULL,
  `ad_name` varchar(255) DEFAULT NULL COMMENT '广告名称',
  `ad_content` varchar(255) DEFAULT NULL COMMENT '广告内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告位';

-- --------------------------------------------------------

--
-- 表的结构 `fa_admin`
--

CREATE TABLE IF NOT EXISTS `fa_admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) DEFAULT NULL COMMENT '管理员名称',
  `admin_pwd` varchar(50) DEFAULT NULL COMMENT '管理员密码',
  `admin_status` tinyint(4) DEFAULT NULL COMMENT '管理员状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理表';

-- --------------------------------------------------------

--
-- 表的结构 `fa_article`
--

CREATE TABLE IF NOT EXISTS `fa_article` (
  `id` int(11) NOT NULL,
  `article_title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `article_en_title` varchar(255) DEFAULT NULL COMMENT '文章英文标题',
  `article_keyword` varchar(255) DEFAULT NULL COMMENT '文章关键字',
  `article_describe` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `article_thumb` varchar(255) DEFAULT NULL COMMENT '文章缩略图',
  `article_recommend` varchar(255) DEFAULT NULL COMMENT '是否推荐',
  `article_author` varchar(50) DEFAULT NULL COMMENT '文章作者',
  `article_content` text COMMENT '文章内容',
  `article_addtime` int(11) DEFAULT NULL COMMENT '文章添加时间',
  `article_status` int(11) DEFAULT NULL COMMENT '文章状态',
  `article_sort` int(11) DEFAULT NULL COMMENT '文章排序',
  `article_admin` varchar(30) DEFAULT NULL COMMENT '文章管理员',
  `article_source` varchar(255) DEFAULT NULL COMMENT '文章来源',
  `article_recovery` int(11) DEFAULT NULL COMMENT '文章回收站'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- --------------------------------------------------------

--
-- 表的结构 `fa_column`
--

CREATE TABLE IF NOT EXISTS `fa_column` (
  `id` int(11) NOT NULL,
  `column_name` varchar(100) DEFAULT NULL COMMENT '栏目名称',
  `column_url` varchar(255) DEFAULT NULL COMMENT '栏目链接',
  `column_type` int(11) DEFAULT NULL COMMENT '栏目类型',
  `column_content` varchar(255) DEFAULT NULL COMMENT '栏目内容',
  `column_status` int(11) DEFAULT NULL COMMENT '栏目状态',
  `column_sort` int(11) DEFAULT NULL COMMENT '栏目排序',
  `column_subtitle` varchar(255) DEFAULT NULL COMMENT '栏目副标题',
  `column_thumb` varchar(255) DEFAULT NULL COMMENT '栏目缩略图',
  `column_model_id` int(11) DEFAULT NULL COMMENT '栏目模型',
  `column_pid` int(11) DEFAULT NULL COMMENT '栏目父id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- --------------------------------------------------------

--
-- 表的结构 `fa_links`
--

CREATE TABLE IF NOT EXISTS `fa_links` (
  `id` int(11) NOT NULL,
  `links_name` varchar(255) DEFAULT NULL COMMENT '链接名称',
  `links_url` varchar(255) DEFAULT NULL COMMENT '链接URL',
  `links_logo` varchar(255) DEFAULT NULL COMMENT '链接logo',
  `links_addtime` int(11) DEFAULT NULL COMMENT '链接添加时间',
  `links_sort` int(11) DEFAULT NULL COMMENT '链接排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- --------------------------------------------------------

--
-- 表的结构 `fa_link_type`
--

CREATE TABLE IF NOT EXISTS `fa_link_type` (
  `id` int(11) NOT NULL,
  `link_type_name` varchar(200) DEFAULT NULL COMMENT '链接分类名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接分类表';

-- --------------------------------------------------------

--
-- 表的结构 `fa_member`
--

CREATE TABLE IF NOT EXISTS `fa_member` (
  `id` int(11) NOT NULL,
  `member_name` varchar(30) DEFAULT NULL COMMENT '会员名称',
  `member_pwd` varchar(100) DEFAULT NULL COMMENT '会员密码',
  `member_head` varchar(255) DEFAULT NULL COMMENT '会员头像',
  `member_sex` int(11) DEFAULT NULL COMMENT '会员性别',
  `member_status` tinyint(4) DEFAULT NULL COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

-- --------------------------------------------------------

--
-- 表的结构 `fa_message`
--

CREATE TABLE IF NOT EXISTS `fa_message` (
  `id` int(11) NOT NULL,
  `message_name` varchar(30) DEFAULT NULL COMMENT '留言用户名称',
  `message_sex` tinyint(4) DEFAULT NULL COMMENT '留言用户性别',
  `message_email` varchar(100) DEFAULT NULL COMMENT '留言用户邮箱',
  `message_company` varchar(100) DEFAULT NULL COMMENT '留言用户公司',
  `message_touch` varchar(100) DEFAULT NULL COMMENT '留言用户联系方式',
  `message_title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `message_content` text COMMENT '留言内容',
  `message_addtime` int(11) DEFAULT NULL COMMENT '留言时间',
  `message_index` varchar(255) DEFAULT NULL COMMENT '用户主页'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表';

-- --------------------------------------------------------

--
-- 表的结构 `fa_model`
--

CREATE TABLE IF NOT EXISTS `fa_model` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) DEFAULT NULL COMMENT '模型名称',
  `model_addtable` varchar(100) DEFAULT NULL COMMENT '模型附加表名',
  `model_page` varchar(255) DEFAULT NULL COMMENT '单页模板',
  `model_list` varchar(255) DEFAULT NULL COMMENT '模板列表',
  `model_details` text COMMENT '模板详情',
  `model_addFile` varchar(255) DEFAULT NULL COMMENT '模板附加文件'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模型表';

-- --------------------------------------------------------

--
-- 表的结构 `fa_rotations`
--

CREATE TABLE IF NOT EXISTS `fa_rotations` (
  `id` int(11) NOT NULL,
  `rotations_name` varchar(100) DEFAULT NULL COMMENT '轮换图名称',
  `rotations_img` varchar(255) DEFAULT NULL COMMENT '轮换图路径',
  `rotations_url` varchar(255) DEFAULT NULL COMMENT '轮换图URL',
  `rotation_sort` tinyint(4) DEFAULT NULL COMMENT '轮换图排序',
  `rotation_status` tinyint(4) DEFAULT NULL COMMENT '轮换图状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `fa_rotation_type`
--

CREATE TABLE IF NOT EXISTS `fa_rotation_type` (
  `id` int(11) NOT NULL,
  `rotation_name` varchar(100) DEFAULT NULL COMMENT '轮换图分类'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='轮换图分类';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fa_ad`
--
ALTER TABLE `fa_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_admin`
--
ALTER TABLE `fa_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_article`
--
ALTER TABLE `fa_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_column`
--
ALTER TABLE `fa_column`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_links`
--
ALTER TABLE `fa_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_link_type`
--
ALTER TABLE `fa_link_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_member`
--
ALTER TABLE `fa_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_message`
--
ALTER TABLE `fa_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_model`
--
ALTER TABLE `fa_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_rotations`
--
ALTER TABLE `fa_rotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_rotation_type`
--
ALTER TABLE `fa_rotation_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fa_ad`
--
ALTER TABLE `fa_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_admin`
--
ALTER TABLE `fa_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_article`
--
ALTER TABLE `fa_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_column`
--
ALTER TABLE `fa_column`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_links`
--
ALTER TABLE `fa_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_link_type`
--
ALTER TABLE `fa_link_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_member`
--
ALTER TABLE `fa_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_message`
--
ALTER TABLE `fa_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_model`
--
ALTER TABLE `fa_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_rotations`
--
ALTER TABLE `fa_rotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fa_rotation_type`
--
ALTER TABLE `fa_rotation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
