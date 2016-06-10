<?php
//定义header utf8
header("Content-Type:text/html; charset=utf-8");
//定义错误级别
error_reporting(E_ALL);
//开启$_SESSION
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/session'));
session_start();
//定义一些常量 D:/wamp/www/wd16000/
define('ROOTPATH', substr(__DIR__,0,-7));
//包含主要文件 比如：数据库操作类、函数文件、文件处理类、数据处理类...
require_once (ROOTPATH.'include/class/db.class.php');
require_once (ROOTPATH.'include/class/category.class.php');
require_once (ROOTPATH.'include/class/file.class.php');
require_once (ROOTPATH.'include/fun/function.php');
//连接数据库
$db = new proPdo();
//实例化smarty
require_once (ROOTPATH.'include/smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty -> template_dir = ROOTPATH."templates"; //模板存放目录
$smarty -> compile_dir = ROOTPATH."smarty/templates_c"; //编译目录
$smarty -> left_delimiter = "{li:";             //左定界符
$smarty -> right_delimiter = "}";
