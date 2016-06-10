<?php
include_once('checklogin.php');

if (isset($_GET['type']) && $_GET['type'] == 'del' && $_GET['nid']) {
  $del_sql="delete from wd_article where article_id=".intval($_GET['nid']);
  //echo $del_sql;die;
  $info=mysql_query($del_sql);
  //print_r($info);die;
  if($info){
    showmsg('删除成功','news_list.php');
  }else{
    showmsg('删除失败');
  }
}

$list_ = $db->fetch('model','','id asc');
$smarty->assign('list_', $list_);
$smarty->assign('title', '模型管理');
$smarty->display('model.tpl');