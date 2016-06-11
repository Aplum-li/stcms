<?php
include_once('../include/init.php');
$smarty -> template_dir = ROOTPATH."admin/templates";
if(empty($_SESSION['admin'])){
  showmsg('请先登录','login.php');
}
//表单提交的url，默认为当前文件
$url = explode('/',$_SERVER['PHP_SELF']);
$filePre = substr(end($url),0,strpos(end($url), '.'));
$smarty->assign('postUrl', end($url));
$smarty->assign('filePre', $filePre);