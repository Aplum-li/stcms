<?php
/**
*上传图片处理
*
*/
include_once('../include/init.php');
$type = isset($_GET['type']) ? trim($_GET['type']) : 'product';
$save_path = '/upload/image/'.$type.'/'.date('Ymd').'/';
$upload = new uploadImg();
$upload->dst_path = $_SERVER['DOCUMENT_ROOT'].$save_path;
$upload->save_path = $save_path;
$info = $upload -> upload_file($_FILES['litpic']);
echo json_encode($info);
exit();