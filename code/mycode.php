<?php
header('content-type:image/png');
function get_rand($length=4){
	$str='0123456789abcdefghijklmnopqsrtuvwxyz';
	//随机打乱字符串str_shuffle();
	//substr (打乱的字符,从第几个开始截取,截取的长度)
	$new_str= substr(str_shuffle($str),0,$length);
	return $new_str;
}

//第一步生产一张图像
$im=imagecreatetruecolor(70,35);

//第二步设置图片背景色,设置字体颜色和样式
//$text_color=imagecolorallocate($im,0,0,255);//文字颜色
$bg_color=imagecolorallocate($im,222,240,222);//背景颜色

//第三步填充背景颜色
//可以这样imagefilledrectangle($im, 0, 0, 100, 30, imagecolorallocate($im,232,232,255));
imagefilledrectangle($im, 0, 0, 70, 35, $bg_color);
$str=get_rand(4);

session_start();
$_SESSION['code']=$str;
//strlen();获取字符串长度 
for ($i=0; $i <strlen($str) ; $i++) { 
	//当前字符
	$current=$str[$i];
	//设置字体颜色
	//rand();随机获取
	$text_c=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));

// imagefttext ( //imagefttext使用 FreeType 2 字体将文本写入图像 
// resource $image (图像), 
// float $size(需要显示的字体大小) , 
// float $angle (字体的垂直度), 
// int $x (字体坐标), 
// int $y(字体坐标) , 
// int $color(文字颜色) , 
// string $fontfile(文字的文件夹路径) , 
// string $text(需要显示的验证码) )

	imagefttext($im,20,rand(-30,30),10+$i*10,22,$text_c,'arial.ttf',$current);
}

//、加入噪点防止注册机器分析原图片来恶意注册
// imagesetpixel ( resource 
// $image 生成的图像, 
// int $x , 
// int $y , 
// int $color
//  )
for ($i=1; $i <70 ; $i++) { 
	$d_color=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im,rand(0,150),rand(0,50),$d_color);

}
//、加入干扰线防止注册机器分析原图片来恶意注册
//
for ($i=0; $i <10 ; $i++) { 
	//imageline()画一条线段 imageline ( resource 
	//$image 图像, 
	//int $x1 , 
	//int $y1 , 
	//int $x2 , 
	//int $y2 , 
	//int $color )

	//$hr_color=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	//imageline($im,rand(0,150),rand(0,50),rand(0,150),rand(0,50),$hr_color);
}

//输出图片--根据头声明决定
imagepng($im);
//释放图片
imagedestroy($im);