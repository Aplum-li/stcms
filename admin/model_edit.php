<?php
include_once('checklogin.php');
$eid=$_GET['nid'];
$edit='select * from wd_article as art left join wd_admin as ad on art.article_uid=ad.admin_id where article_id='.$eid;
$info=@mysql_query($edit);
$select=@mysql_fetch_assoc($info);

$list_=$db->fetch('model','model_id='.$eid,'id asc','',1);
//print_r($list_);die;
//修改语句
if($_POST){
    $title=trim($_POST['title']);
    $author=$_POST['author'];
    $article_content=trim($_POST['article_content']);
    $time=time();
    $update="update wd_article set `article_title`='$title',`article_uid`='$author',`article_content`='$article_content',`article_addtime`='$time' where `article_id`='$eid'";
    $info1=@mysql_query($update);

    if($info1){
        showmsg('修改成功','news_list.php');
    }else{
        showmsg('修改失败');
    }
}


$smarty->assign('select', $select);
$smarty->assign('title', '模型管理');
$smarty->display('model_edit.tpl');