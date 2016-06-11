<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-11 09:43:18
         compiled from "C:\wamp\www\stcms\admin\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26886575ad6f0a46435-25199136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '170ffd65a3980bba4d279c12d0869dc388612393' => 
    array (
      0 => 'C:\\wamp\\www\\stcms\\admin\\templates\\header.tpl',
      1 => 1465609397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26886575ad6f0a46435-25199136',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575ad6f0a4f5c6_66898756',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575ad6f0a4f5c6_66898756')) {function content_575ad6f0a4f5c6_66898756($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>后台首页</title>
  <meta name="keywords" content="Admin">
  <meta name="description" content="Admin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Core CSS  -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/glyphicons.min.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">


  <!-- Your Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  
  <!-- Core Javascript - via CDN --> 
  <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- 验证插件 -->
    <link rel="stylesheet" type="text/css" href="/source/Validform/style.css">
    <link rel="stylesheet" type="text/css" href="/source/Validform/admin.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="/source/Validform/Validform_v5.3.2.js"><?php echo '</script'; ?>
>
    <!-- 验证插件 -->
    <!-- 弹窗插件 -->
    <?php echo '<script'; ?>
 type="text/javascript" src="layer/layer/layer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="layer/common.js"><?php echo '</script'; ?>
>
    <!-- 弹窗插件 -->
</head>

<body>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top" style="background-image: none; background-color: rgb(240, 240, 240);">
  <div class="pull-left"> <a class="navbar-brand" href="#">
    <div class="navbar-logo"><img src="images/logo.png" alt="logo"></div>
    </a> </div>
  <div class="pull-right header-btns">
    <div><a href="/" target="_blank">文豆首页</a></div>
    <a class="user"><span class="glyphicons glyphicon-user"></span><?php echo $_SESSION['admin']['name'];?>
</a>
    <a href="logout.php" class="btn btn-default btn-gradient" type="button"><span class="glyphicons glyphicon-log-out"></span> 退出</a>
  </div>
</header>
<!-- End: Header -->
<?php }} ?>
