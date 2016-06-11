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
    if($db->insert('model',$arr)){
        $res['status'] = 'y';
	    $res['info'] = '添加成功';
	    $res['url'] = 'model.php';
    } else {
	    $res['status'] = 'n';
	    $res['info'] = '添加失败';
    }
	echo json_encode($res);
    die;
}
$smarty->assign('title', '添加栏目');
$smarty->display($filePre.'.tpl');