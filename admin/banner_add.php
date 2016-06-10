<?php
include_once('../init.php');
include_once('checklogin.php');
if($_POST){
  //print_r($_POST);
  //$out_path = '../';
  //图片存放路径
  //$dest = 'images/thumb/';
  //设置图片类型
  $allow=array('image/gif','image/jpeg','image/png');

  //print_r($_FILES);
  foreach ($_FILES as $key => $value) {
  //检索图片in_array检查数组中是否存在某个值
    //第一个参数是待搜索的值
    //第二个参数是被搜索的数组
     if(!in_array($value['type'], $allow)){
    showmsg('图片不符合');
  }
  //判断error==0则是上传成功
    if($value['error']==0){
      ////get_ext_strpos()获取文件扩展名
      //$ext_name=get_ext_strpos($value['name']);
      //使用时间戳 随机数 生成新的名称
      //$base_name=time().mt_rand(10000,99999);
      //组装图片路径和名称，后缀
      //$read_path=$out_path.$dest.$base_name.'.'.$ext_name;
    //原图
       //$src=$out_path.'images/'.$value['name'];
      // //生成缩略图 原图路径 组装图片 ，缩略图大小
       //thumb($src,$read_path,100,100);
      // //存放路径 
       $_POST[$key]='images/'.$value['name'];
      //print_r($_POST[$key]);die;
    }else{
      showmsg('文件上传失败');
    }

  }

  
  

    $name=trim($_POST['name']);
    
    $image=$_POST['image'];
    $url=trim($_POST['url']);
    $time=time();
    $in="insert into `wd_advertise`(`ad_name`,`ad_img`,`ad_url`,`ad_addtime`)values('$name','$image','$url','$time')";
    $info=mysql_query($in);
     if($info){
         showmsg('添加成功','banner_list.php');
     }else{
         showmsg('添加失败');
     }

}

?>
<?php include_once('header.php'); ?>
<body>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top" style="background-image: none; background-color: rgb(240, 240, 240);">
  <div class="pull-left"> <a class="navbar-brand" href="#">
    <div class="navbar-logo"><img src="images/logo.png" alt="logo"></div>
    </a> </div>
  <div class="pull-right header-btns">
    <a class="user"><span class="glyphicons glyphicon-user"></span> admin</a>
    <a href="login.html" class="btn btn-default btn-gradient" type="button"><span class="glyphicons glyphicon-log-out"></span> 退出</a>
  </div>
</header>
<!-- End: Header -->

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
  <?php include_once('common.php');?>
  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">添加链接</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" enctype="multipart/form-data" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加链接</div>
              <div class="panel-btns pull-right margin-left">
              <a href="banner_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">链接名称</span>
                    <input type="text" name="name" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">广告图片</span>
                    <input type="file" name="image" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">链接URL</span>
                        <input type="text" name="url" value="" class="form-control">
                    </div>
                </div>
                </div>
                <div class="col-md-7">
	                <div class="form-group">
	                  <input type="submit" value="提交" class="submit btn btn-blue">
	                </div>
                </div>
            </div>
          </div>
          </form>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>

</body>

</html>