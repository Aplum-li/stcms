<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 12:09:29
         compiled from "E:\wamp\www\wd16000\admin\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:700057583876469850-28300972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52e4777f98923e701800aa3edc13da1c70290d41' => 
    array (
      0 => 'E:\\wamp\\www\\wd16000\\admin\\templates\\header.tpl',
      1 => 1465528112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '700057583876469850-28300972',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5758387646f267_06036358',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5758387646f267_06036358')) {function content_5758387646f267_06036358($_smarty_tpl) {?><!DOCTYPE html>
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
