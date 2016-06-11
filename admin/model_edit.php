<?php
include_once('checklogin.php');
//修改语句
if(!empty($_POST)){
	$info = (array) $_POST['info'];
	if (!get_magic_quotes_gpc()) {
		foreach ($info as $key => $value) {
			$info[$key] = addslashes($value);
		}
	}
	$where = array('id'=>intval($_POST['id']));
    if($db->update('model', $info, $where)){
	    $res['status'] = 'y';
	    $res['info'] = '修改成功';
	    $res['url'] = 'model.php';
    }else{
	    $res['status'] = 'n';
	    $res['info'] = '修改失败';
    }
	echo json_encode($res);
	die;
}

$where = array('id'=>intval($_GET['id']));
$info = $db->fetchOne('model',$where);
$smarty->assign('info', $info);
$smarty->assign('title', '编辑模型');
$smarty->display('model_edit.tpl');