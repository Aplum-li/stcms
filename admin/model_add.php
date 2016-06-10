<?php
include_once('checklogin.php');
if($_POST){
    $model_name=trim($_POST['model_name']);
    $model_addtable=trim($_POST['model_addtable']);
    $model_page=trim($_POST['model_page']);
    $model_list=trim($_POST['model_list']);
    $model_addFile=trim($_POST['model_addFile']);
    $model_details=trim($_POST['model_details']);
    $arr=array(
        'model_name'=>$model_name,
        'model_addtable'=>$model_addtable,
        'model_page'=>$model_page,
        'model_list'=>$model_list,
        'model_details'=>$model_details,
        'model_addFile'=>$model_addFile
    );
    $res=$db->insert('model',$arr,true);
    if($res){
        showmsg('添加成功','model.php');
    } else {
        showmsg('添加失败');
    }
    die;
}
$smarty->assign('title', '添加模型');
$smarty->display('model_add.tpl');