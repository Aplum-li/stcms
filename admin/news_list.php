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

//分页代码
$current=isset($_GET['p'])?$_GET['p']:1;//当前页
$limit = 1;
$db->page_size = $limit;
//$where = 'article_status=1';
$where = array('article_status'=>1);
$article = $db->fetch('article',$where,'article_sort asc, article_addtime desc',$current,'*');
$count=$db->counts('article',$where);//获取总数
//当前页，显示页，显示条数，表，url
$pages=page($current,2,$limit,$count);
$smarty->assign('article', $article);
$smarty->assign('pages', $pages);
$smarty->display('news_list.tpl');