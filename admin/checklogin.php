<?php
include_once('../include/init.php');
$smarty -> template_dir = ROOTPATH."admin/templates";
if(empty($_SESSION['admin'])){
  showmsg('非法登录','login.php');
}