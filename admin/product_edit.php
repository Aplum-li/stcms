<?php
include_once('../init.php');
    $eid=$_GET['id'];
    $edit='select * from wd_product as p left join wd_category as c on c.category_id=p.product_category_id where product_id='.$eid;
    print_r($edit);
    $info=mysql_query($edit);
    $select=mysql_fetch_assoc($info);
    print_r($select);
    //修改语句
if($_POST){
    //图片输出目录路径
    //$out_path='../';
    //图片存放路径
    //$dest='images/thumb/';

    //设置图片类型
    $images=array('image/gif','image/jpeg','image/png');
   
    //print_r($_FILES);
    foreach ($_FILES as $key => $value) {
     //检索图片类型参数1待搜索。参数2被搜索
      if(!in_array($value['type'],$images)){
          alert('图片类型不符合','product_edit.php?id='.$eid);
      }
      //如果上传成功0代表成功
      if($value['error']==0){
        //获取文件的扩展名
        //$ext_name=get_ext_strpos($value['name']);
        //newd 名字时间加随机数
        //$base_name=time().mt_rand(10000,99999);
        //组装图片完整路径，名字
        //$read_path=$out_path.$dest.$base_name.'.'.$ext_name;
        //原图
        //上传成功拼接图片路径
        $_POST[$key]='images/'.$value['name'];
        //print_r($_POST[$key]);die;
      }else{
        alert('图片未上传','product_edit.php?id='.$eid);
      }
    }
    

    $name=trim($_POST['name']);
    $img=$_POST['img'];
    $url=trim($_POST['url']);
    $time=time();
    $update="update `wd_product` set `ad_name`='$name',`ad_url`='$url',`ad_img`='$img',`ad_addtime`='$time' where `ad_id`='$eid'";
   
    $info1=mysql_query($update);
    
    if($info1){
        alert('修改成功','banner_list.php');
    }else{
        alert('修改失败','banner_edit.php');
    }
}
?>

<body>
  <!-- Start: Header -->
  <?php include_once('header.php'); ?>
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
        <li class="active">编辑用户</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" enctype="multipart/form-data" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">编辑用户</div>
              <div class="panel-btns pull-right margin-left">
              <a href="banner_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">产品分类</span>
                    <input type="text" name="name" value="<?php echo $select['category_name'];?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品型号/名称</span>
                        <input type="text" name="name" value="<?php echo $select['product_name'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品大小</span>
                        <input type="text" name="name" value="<?php echo $select['product_size'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品配件</span>
                        <input type="text" name="name" value="<?php echo $select['product_fitting'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">规格</span>
                        <input type="text" name="name" value="<?php echo $select['product_spec'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品图片</span>
                        <img src="../<?php echo $select['product_image_1'];?>" style="height:50px;">
                    </div>
                </div>
                                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品图片</span>
                        <img src="../<?php echo $select['product_image_2'];?>" style="height:50px;">
                    </div>
                </div>
                                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品图片</span>
                        <img src="../<?php echo $select['product_image_3'];?>" style="height:50px;">
                    </div>
                </div>
                                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品图片</span>
                        <img src="../<?php echo $select['product_image_4'];?>" style="height:50px;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">修改广告图</span>
                        <input type="file" name="img1" value="" class="form-control">
                    </div>
                </div>
                                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">修改广告图</span>
                        <input type="file" name="img2" value="" class="form-control">
                    </div>
                </div>
                                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">修改广告图</span>
                        <input type="file" name="img3" value="" class="form-control">
                    </div>
                </div>
                                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">修改广告图</span>
                        <input type="file" name="img4" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">广告图URL</span>
                        <input type="text" name="url" value="<?php echo $select['ad_url'];?>" class="form-control">
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