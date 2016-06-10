<?php
include_once('../include/init.php');
$smarty -> template_dir = ROOTPATH."admin/templates";
if($_POST){
  //var_dump($_SESSION);
  //获取提交的信息
  $in_code=strtolower($_POST['code']);
  $set_code=strtolower($_SESSION['code']);

  if($in_code==$set_code){
    $name=trim($_POST['username']);
    $pwd=(trim($_POST['password']));
    $where = array(
      'admin_name' => $name
    );
    //查询用户表密码和账号匹配
    $admin_info = $db->fetchOne('admin',$where);
    if (empty($admin_info)) {
      $res['status'] = 0;
      $res['info'] = '用户不存在';
      echo json_encode($res);//对变量进行 JSON 编码 
      die;
    }

    if ($admin_info['admin_pwd'] != md5($pwd)) {
      $res['status'] = 0;
      $res['info'] = '密码错误';
      echo json_encode($res);
      die;
    }

    if(!$admin_info['admin_status']){
      $res['status'] = 0;
      $res['info'] = '禁止登陆';
      echo json_encode($res);
      die;
    }

    //超全局变量
    $_SESSION['admin']['name']=$admin_info['admin_name'];
    $_SESSION['admin']['id']=$admin_info['id'];

    $res['status'] = 1;
    $res['info'] = '登录成功';
    $res['url'] = 'index.php';
  }else{
    $res['status'] = 0;
    $res['info'] = '验证码错误';
  }
  echo json_encode($res);
  die;
}
$smarty -> display('login.tpl');