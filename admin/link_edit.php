<?php
include_once('../init.php');
include_once('checklogin.php');
$eid=$_GET['id'];
//var_dump($eid);die;
$edit='select * from wd_link where link_id='.$eid;
$info=mysql_query($edit);
$select=mysql_fetch_assoc($info);
//print_r($update);
//修改语句
if($_POST){
    $title=trim($_POST['title']);
    $url=$_POST['url'];
    $time=time();
    $update="update wd_link set `link_name`='$title',`link_url`='$url',`link_addtime`='$time' where `link_id`='$eid'";
    $info1=mysql_query($update);

    if($info1){
        showmsg('修改成功','link_list.php');
    }else{
        showmsg('修改失败','link_edit.php');
    }
}
?>

<body>
<!-- Start: Header -->
<?php include_once('header.php');?>
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
        <li class="active">编辑链接</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">编辑链接</div>
              <div class="panel-btns pull-right margin-left">
              <a href="link_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">链接标题</span>
                    <input type="text" name="title" value="<?php echo $select['link_name'];?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">链接URL</span>
 <input type="text" name="url" value="<?php echo $select['link_url'];?>" class="form-control">
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