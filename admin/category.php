<?php
include_once('checklogin.php');

if (isset($_GET['type']) && $_GET['type'] == 'del' && $_GET['id']) {
	$id = intval($_GET['id']);
	if(!$db->del('model', array('id'=>$id))){
		showmsg('删除失败');
	}
	header('Location:model.php');
	die;
}

$list_ = $db->fetch('article_type','','id asc');
$category = new category();
$list_ = $category->toLevel($list_,'┖ ');
$smarty->assign('list_', $list_);
$smarty->assign('title', '栏目管理');
$smarty->display($filePre.'.tpl');