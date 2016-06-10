<?php
include_once('../init.php');
include_once('checklogin.php');
    $eid=$_GET['id'];
    $edit='select * from wd_advertise where ad_id='.$eid;
    $info=mysql_query($edit);
    $select=mysql_fetch_assoc($info);
if($_POST){
  if($_FILES['img']['error']==4){
    $_POST['img'] = $select['ad_img'];
  }
    $images=array('image/gif','image/jpeg','image/png');
      if($_FILES['img']['error']==0){
        if(!in_array($_FILES['img']['type'],$images)){
          showmsg('图片类型不符合');
        }
        //图片路径
        $new_img = 'images/'.$_FILES['img']['name'];
        //将上传的文件移动到新位置 
        move_uploaded_file($_FILES['img']['tmp_name'],'../'.$new_img);
        unlink('../'.$select['ad_img']);
        $_POST['img']=$new_img;
      }

    

    $name=trim($_POST['name']);
    $img=$_POST['img'];
    $url=trim($_POST['url']);
    $time=time();
    $update="update `wd_advertise` set `ad_name`='$name',`ad_url`='$url',`ad_img`='$img',`ad_addtime`='$time' where `ad_id`='$eid'";
   // die;
    $info1=mysql_query($update);
    
    // if($info1){
    //     showmsg('修改成功','banner_list.php');
    // }else{
    //     showmsg('修改失败');
    // }
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
                  <div class="input-group"> <span class="input-group-addon">名称</span>
                    <input type="text" name="name" value="<?php echo $select['ad_name'];?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">广告图</span>
                        <img src="../<?php echo $select['ad_img'];?>" style="height:50px;width:100px;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">修改广告图</span>
                        <input type="file" name="img" value="" class="form-control">
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