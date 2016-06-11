<?php
include_once('checklogin.php');
$smarty->assign('title', '后台首页');
$smarty->display('index.tpl');