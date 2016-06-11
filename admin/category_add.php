<?php
include_once('checklogin.php');
if(!empty($_POST)){
    $info = $_POST['info'];
	if($info['name'] == ''){
		$info['name'] = '/'.pinyin($info['typename']);
	}

	if(strpos($info['name'], '/') === false){
		$info['name'] = '/'.$info['name'];
	}

	if ($info['pid'] != 0) {
		$category = new category();
		$typewhere = array('order by'=>'id asc');
		$field = 'id,typename,pid';
		$typelist = $db -> fetch('article_type');
		$toparr = $category -> getParents($typelist,$info['pid']);
		$info['topid'] = $toparr[0]['id'];

		//查询父级的标识
		$pinfo = $db->fetchOne('article_type', array('id'=>$info['pid']), 'pname,name');
		$pname = $pinfo['pname'].$pinfo['name'];
		$w = array(
			'pname' => $pname,
			'name' => $info['name']
		);
		//查询标识是否存在
		if($db->fetchOne('article_type', $w, 'id')){
			$res['status'] = 'n';
			$res['info'] = '文件保存目录重复';
			echo json_encode($res);
			die;
		}
		$info['pname'] = $pname;
	}else{
		$info['topid'] = 0;
		//查询标识是否存在
		if($db->fetchOne('article_type', array('name'=>$info['name']))){
			$res['status'] = 'n';
			$res['info'] = '文件保存目录重复';
			echo json_encode($res);
			die;
		}
	}
	$info['admin_id'] = $_SESSION['admin']['id'];
	$info['addtime'] = time();
    if($db->insert('article_type',$info)){
        $res['status'] = 'y';
	    $res['info'] = '添加成功';
	    $res['url'] = 'category.php';
    } else {
	    $res['status'] = 'n';
	    $res['info'] = '添加失败';
    }
	echo json_encode($res);
    die;
}

//查询所有栏目
$list_ = $db->fetch('article_type','', 'sort','','id,pid,typename');
$category = new category();
$list_ = $category->toLevel($list_,'┖ ');
$smarty->assign('list_', $list_);

//查询内容模型
$model = $db->fetch('model', '', 'id','','id,model_name');
$smarty->assign('model', $model);

$smarty->assign('title', '添加栏目');
$smarty->display($filePre.'.tpl');