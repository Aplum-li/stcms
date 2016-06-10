<?php
include_once('../init.php');
include_once('checklogin.php');
$eid=$_GET['eid'];
$edit='select * from wd_user where user_id='.$eid;
$info=mysql_query($edit);
$select=mysql_fetch_assoc($info);
//print_r($select);
//修改语句
if($_POST){
    $title=trim($_POST['title']);
    $author=trim($_POST['author']);
    $content=trim($_POST['content']);
    $eamil=trim($_POST['email']);
    $time=time();
    $update="update `wd_user` set `user_name`='$title',`user_address`='$author',`user_introduce`='$content',`user_email`='$eamil',`user_addtime`='$time' where `user_id`='$eid'";
   
    $info1=mysql_query($update);
    
    if($info1){
        showmsg('修改成功','user_list.php');
    }else{
        showmsg('修改失败','user_edit.php');
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
        <form action="#" method="post" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">编辑用户</div>
              <div class="panel-btns pull-right margin-left">
              <a href="user_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">用户名称</span>
                    <input type="text" name="title" value="<?php echo $select['user_name'];?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">用户地址</span>
                        <input type="text" name="author" value="<?php echo $select['user_address'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">用户邮箱</span>
                        <input type="text" name="email" value="<?php echo $select['user_email'];?>" class="form-control">
                    </div>
                </div>
                </div>
                <div class="form-group col-md-12">
                  <textarea name="content" style="width:100%;height:150px;"><?php echo $select['user_introduce'];?></textarea>
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