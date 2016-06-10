<?php
include_once('checklogin.php');
if($_POST){
    $title=trim($_POST['title']);
    $author=trim($_POST['author']);
    $article_content=trim($_POST['article_content']);
    $time=time();
    $in="insert into `wd_article`(`article_title`,`article_uid`,`article_content`,`article_addtime`)values('$title','$author','$article_content','$time')";
    $info=mysql_query($in);
    if($info){
        showmsg('添加成功','news_list.php');
    }else{
        showmsg('添加失败','news_add.php');
    }
    die;
}


$where = array('admin_status'=>1);
$list_ = $db->fetch('fa_admin',$where);

$smarty->assign('list_',$list_);
$smarty->display('news_add.tpl');