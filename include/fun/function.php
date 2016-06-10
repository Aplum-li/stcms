<?php
/**
 * 获取文件扩展名（方法一）
 *
 *
 */
function get_ext_array($str){
	if(is_dir($str)){ //如果是目录的话，返回空
		return 'dir';
	}
	$segment = explode('.',$str);
	return end($segment);
}
/**
 * 获取文件扩展名（方法二）
 *
 *
 */
function get_ext_strpos($str){
	//$pos = strpos($str,'.');//这种写法不能解决index.html.php的问题
	$pos = strrpos($str,'.');//strrpos()计算指定字符串在目标字符串中最后一次出现的位置
	return substr($str,$pos+1);
}
/**
 * 累加
 *
 **/
 function add($num){
	$sum = 0;
	for($i=1;$i<=$num;$i++){
		$sum = $sum+$i;
	}
	return $sum;
 }
/**
 * 访问计数器
 *
 */ 
function visit_count(){  //报错提示：Fatal error: Cannot redeclare count() 表示重定义了函数count
	$old_count = file_get_contents('./count.txt');
	$new_count = $old_count+1;
	file_put_contents('count.txt',$new_count);
}

/**
 * 文件大小格式化
 * 1KB = 1024Byte
 * 1MB = 1024KB
 * 1GB = 1024MB
 * 1TB = 1024GB
 */
function filesize_format($filesize){
	if($filesize<1024){  //size<1024
		return sprintf('%.2f',$filesize).'Byte';
	}
	if(1024<=$filesize && $filesize<1024*1024){//     1KB<=size<1MB
		return sprintf('%.2f',$filesize/1024).'KB';
	}
	if(1024*1024<=$filesize && $filesize<1024*1024*1024){// 1MB<=size<1GB
		return sprintf('%.2f',$filesize/(1024*1024)).'MB';
	}
	if(1024*1024*1024<=$filesize && $filesize<1024*1024*1024*1024){// 1GB<=size<1TB
		return sprintf('%.2f',$filesize/(1024*1024*1024)).'GB';
	}
}

/**
 * 递归的方式删除目录
 *
 */
function remove_dir($dir){
	if(!is_dir($dir)){  //如果传进来的参数本身是一个文件，直接删除该文件
		unlink($dir);
		return ;
	}
	$file_list = scandir($dir);
	foreach($file_list as $value){
		if($value == '.' || $value == '..'){
			continue;
		}
		/*
		* 2.txt => ./dir_1/dir_2/2.txt
		* 3.txt => ./dir_1/dir_2/3.txt
		* dir_3 => ./dir_1/dir_2/dir_3
		*/
		$value = $dir.'/'.$value; //获得完整的目录名
		if(is_dir($value)){       //是目录的话，调用函数本身
			remove_dir($value);
		}else{					//如果是文件的话，直接删除文件
			unlink($value);
		}
	}
	rmdir($dir);   //最后删除目录自己
}


/**
 * 表单验证
 *
 */
function validate($str,$type){
	switch($type){
		case 'telephone':
			$pattern = '/^(13|15|18|14)\d{9}$/';
			break;
		case 'email':
			$pattern = '/^[a-zA-Z]+[0-9a-zA-Z_]*@[a-zA-Z0-9]+\.[a-z]+$/';
			break;
		case 'url':
			$pattern = '/^(http:|https:)\/\/www\.[a-z0-9]+\.(com|cn)$/';
			break;
	}
	return preg_match($pattern,$str);
}



/*
*得到当前网址
 */
function get_url(){
    $str = $_SERVER['PHP_SELF'].'?';
    if($_GET){
        foreach($_GET as $k=>$v){
            if($k!='p'){
                $str .= $k.'='.$v.'&';
            }
        }
    }
    return $str;
}


/*
 *分页函数
 */
function page($current,$show_pages,$limit,$count,$url='',$condition=''){
    //$count = get_count($tablename,$condition);
    $url = get_url();
    $total_pages = ceil($count/$limit);
    $str = '<ul class="page">';//定义一个存储字符串的变量
    //判断何时显示首页，上一页
    if($current>1){
        if(strpos($url,'?')){
            $str .='<li><a href="'.$url.'p=1">&lt;</a></li>';
            $str .='<li><a href="'.$url.'p='.($current-1).'">&lt;&lt</a></li>';
        }else{
             $str .='<li><a href="'.$url.'?p=1">&lt;</a></li>';
            $str .='<li><a href="'.$url.'?p='.($current-1).'">&lt;&lt;</a></li>';
        }
    }
    //判断需要显示的页码数字
    if($total_pages<$show_pages*2+1){
    //页码总数小于设置的显示数的情况，显示所有页码数字
        $start = 1;
        $end = $total_pages;
    }else{//页码总数大于设置的显示数的情况
        if($current <=$show_pages){
        //判断最开始几页显示情况，在中轴左边的前几页，一律显示最后1~(2*$show_pages+1)页码
            $start = 1;
            $end = $show_pages*2+1;
        }else if($current>=$total_pages-$show_pages){
        //判断最后几页显示情况，在中轴右边的最后几页，一律显示(最后页码-2*$show_pages)~最后一页页码
            $start = $total_pages-2*$show_pages;
            $end = $total_pages;
        }else{//判断中间段显示情况
            $start = $current-$show_pages;
            $end = $current+$show_pages;
        }
    }
    //循环遍历所有页码
    for($i = $start; $i <= $end; $i++){
        if($i == $current){//如果是当前页，则不跳转
            $str .='<li><a href="javascript:;" style="background:#ccc;color:#f00">'.$i.'</a></li>';
        }else{//不是当前页，则可以跳转到对应页码
            if(strpos($url,'?')){
                $str .='<li><a href="'.$url.'p='.$i.'">'.$i.'</a></li>';
            }else{
                $str .='<li><a href="'.$url.'?p='.$i.'">'.$i.'</a></li>';
            }
            
        } 
    }
    //判断显示尾页，下一页的情况
    if($current<$total_pages){
        if(strpos($url,'?')){
            $str .='<li><a href="'.$url.'p='.($current+1).'">&gt;&gt;</a></li>';
            $str .='<li><a href="'.$url.'p='.$total_pages.'">&gt;</a></li>';
        }else{
            $str .='<li><a href="'.$url.'?p='.($current+1).'">&gt;&gt;</a></li>';
            $str .='<li><a href="'.$url.'?p='.$total_pages.'">&gt;</a></li>';
        }
        
    }
    $str .="</ul>";
    return $str;
}
/*
 *缩略图函数
 */
function thumb($src,$dst,$dst_width,$dst_height){
    $src_info = getimagesize($src);
    $src_ext = $src_info[2];
    switch($src_ext){
        case 1:$info = imagecreatefromgif($src);break;
        case 2:$info = imagecreatefromjpeg($src);break;
        case 3:$info = imagecreatefrompng($src);break;
        default: return false;
    }
    $dst_img = imagecreate($dst_width,$dst_height);
    $src_width = $src_info[0];
    $src_height = $src_info[1];
    imagecopyresampled($dst_img,$info,0,0,0,0,$dst_width,$dst_height,$src_width,$src_height);
    switch($src_ext){
        case 1:imagegif($dst_img,$dst);break;
        case 2:imagejpeg($dst_img,$dst);break;
        case 3:imagepng($dst_img,$dst);break;
        default: return false;
    }
    imagedestroy($info);
    imagedestroy($dst_img);
}


/*
 *获取上传的缩略图的文件名函数
 */
function thumb_name($dest,$dest2,$url){
    $out_path = '../';
    $allow = array('image/gif','image/png','image/jpeg');
    foreach($_FILES as $key=>$value){
        if(!in_array($value['type'],$allow)){
            alert('文件类型不符合',$url);
            return false;
        }
        if($value['error']==0){
            $ext_name = get_ext_strpos($value['name']);
            $base_name = time().mt_rand(10000,99999);
            $read_path = $out_path.$dest.$base_name.'.'.$ext_name;
            $src = $out_path.$dest2.$value['name'];
            thumb($src,$read_path,100,100);
            $img = $dest.$base_name.'.'.$ext_name;
            return $img;
        }else{
            alert('文件未上传',$url);
        }
    }
}

/**
 *  短消息函数,可以在某个动作处理后友好的提示信息 前端.
 *
 * @param     string  $msg      消息提示信息
 * @param     string  $gourl    跳转地址
 * @return    void
 */
function showmsg($msg, $gourl = '-1',$refresh=1) {
    $html = '<!doctype html><html lang="en"><head><meta charset="UTF-8">';
    $html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />';
    $html .= '<title>提示信息</title>';
    $html .= '<script type="text/javascript" src="/admin/js/jquery.min.js"></script>';
    $html .= '<script type="text/javascript" src="/admin/layer/layer/layer.js"></script>';
    $html .= '</head><body></body>';
    if($gourl != '-1'){
        $html .= '<script type="text/javascript">layer.msg("'.$msg.'");setTimeout(function(){window.location.href="'.$gourl.'"},1000)</script></html>';
    } else {
        if($refresh){
            $html .= '<script type="text/javascript">layer.msg("'.$msg.'");setTimeout(function(){window.location.href=document.referrer},1000)</script></html>';
        } else{
            $html .= '<script type="text/javascript">layer.msg("'.$msg.'");setTimeout(function(){window.history.go(-1)},1000)</script></html>';
        }
    }
    echo $html;
    exit();
}


/**
 * 递归创建文件夹
 * $dir 参数格式为 dir1/dir2/dir3
 *
 */
function mkDirs($dir){
    if(!is_dir($dir)){
        if(!mkDirs(dirname($dir))){
            return false;
        }
        if(!mkdir($dir,0777)){
            return false;
        }
    }
    return true;
}