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
            $html .= '<script type="text/javascript">layer.msg("'.$msg.'");setTimeout(function(){window.location.href=document.referrer},2000)</script></html>';
        } else{
            $html .= '<script type="text/javascript">layer.msg("'.$msg.'");setTimeout(function(){window.history.go(-1)},2000)</script></html>';
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

/**
 * 字符串截取
 * @param $String 要截取的字符串
 * @param $Length 长度
 * @param bool $act 是否省略号结尾
 * @return array|string
 */
function getstr($String, $Length, $act = true) {
	if (mb_strwidth($String, 'UTF8') <= $Length) {
		return $String;
	} else {
		$I = 0;
		$len_word = 0;
		while ($len_word < $Length) {
			$StringTMP = substr($String, $I, 1);
			if (ord($StringTMP) >= 224) {
				$StringTMP = substr($String, $I, 3);
				$I = $I + 3;
				$len_word = $len_word + 2;
			} elseif (ord($StringTMP) >= 192) {
				$StringTMP = substr($String, $I, 2);
				$I = $I + 2;
				$len_word = $len_word + 2;
			} else {
				$I = $I + 1;
				$len_word = $len_word + 1;
			}
			$StringLast[] = $StringTMP;
		}
		/* raywang edit it for dirk for (es/index.php)*/
		if (is_array($StringLast) && !empty($StringLast)) {
			$StringLast = implode("", $StringLast);
			if ($act) {
				$StringLast.= "...";
			}
		}
		return $StringLast;
	}
}

/**
 * 默认过滤字符串函数
 * @param $str 要过滤的字符串
 */
function clstring($str){
	return htmlspecialchars(trim($str));
}

/**
 * 返回随机字符串
 * @param $length 返回字符串长度
 * @return string
 */
function createRandomStr($length){
	$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';//62个字符
	$strlen = 62;
	while($length > $strlen){
		$str .= $str;
		$strlen += 62;
	}
	$str = str_shuffle($str);
	return substr($str,0,$length);
}

/**
 * 对象转数组
 * @param $obj
 * @return array
 */
function objectToArray($obj){
	$arr = is_object($obj) ? get_object_vars($obj) : $obj;
	if(is_array($arr)){
		return array_map(__FUNCTION__, $arr);
	}else{
		return $arr;
	}
}

/**
 * 截取部分 md5 后的密码
 * @param $pwd
 * @return string
 */
function substrpwd($pwd){
	return substr(md5($pwd), 3, -1);
}

/**
 * 中文转为拼音
 * @param $_String
 * @param string $pix
 * @param string $_Code
 * @return mixed
 */
// $_Code is utf8 or gb2312
function pinyin($_String, $pix = '', $_Code='utf8')
{
	$_String = strtolower($_String);
	$_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha".
		"|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|".
		"cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er".
		"|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui".
		"|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang".
		"|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang".
		"|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue".
		"|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne".
		"|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen".
		"|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang".
		"|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|".
		"she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|".
		"tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu".
		"|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you".
		"|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|".
		"zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo";

	$_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990".
		"|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725".
		"|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263".
		"|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003".
		"|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697".
		"|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211".
		"|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922".
		"|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468".
		"|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664".
		"|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407".
		"|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959".
		"|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652".
		"|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369".
		"|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128".
		"|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914".
		"|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645".
		"|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149".
		"|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087".
		"|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658".
		"|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340".
		"|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888".
		"|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585".
		"|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847".
		"|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055".
		"|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780".
		"|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274".
		"|-10270|-10262|-10260|-10256|-10254";
	$_TDataKey = explode('|', $_DataKey);
	$_TDataValue = explode('|', $_DataValue);

	$_Data = (PHP_VERSION>='5.0') ? array_combine($_TDataKey, $_TDataValue) : _Array_Combine($_TDataKey, $_TDataValue);
	arsort($_Data);
	reset($_Data);

	if($_Code != 'gb2312') $_String = _U2_Utf8_Gb($_String);

	$_Res = '';
	for($i=0; $i<strlen($_String); $i++)
	{
		$_P = ord(substr($_String, $i, 1));
		if($_P>160) { $_Q = ord(substr($_String, ++$i, 1)); $_P = $_P*256 + $_Q - 65536; }
		$_Res .= _Pinyin($_P, $_Data).$pix;
	}
	return preg_replace("/[^a-z0-9".$pix."]*/", '', $_Res);
}

function _Pinyin($_Num, $_Data)
{
	if ($_Num>0 && $_Num<160 ) return chr($_Num);
	elseif($_Num<-20319 || $_Num>-10247) return '';
	else {
		foreach($_Data as $k=>$v){ if($v<=$_Num) break; }
		return $k;
	}
}

function _U2_Utf8_Gb($_C)
{
	$_String = '';
	if($_C < 0x80) $_String .= $_C;
	elseif($_C < 0x800)
	{
		$_String .= chr(0xC0 | $_C>>6);
		$_String .= chr(0x80 | $_C & 0x3F);
	}elseif($_C < 0x10000){
		$_String .= chr(0xE0 | $_C>>12);
		$_String .= chr(0x80 | $_C>>6 & 0x3F);
		$_String .= chr(0x80 | $_C & 0x3F);
	} elseif($_C < 0x200000) {
		$_String .= chr(0xF0 | $_C>>18);
		$_String .= chr(0x80 | $_C>>12 & 0x3F);
		$_String .= chr(0x80 | $_C>>6 & 0x3F);
		$_String .= chr(0x80 | $_C & 0x3F);
	}
	return iconv('UTF-8', 'GB2312', $_String);
}

function _Array_Combine($_Arr1, $_Arr2)
{
	for($i=0; $i<count($_Arr1); $i++) $_Res[$_Arr1[$i]] = $_Arr2[$i];
	return $_Res;
}