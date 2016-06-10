<?php
include_once('../init.php');
include_once('checklogin.php');
if($_POST){
    $title=trim($_POST['title']);
    $author=trim($_POST['author']);
    $time=time();
    $in="insert into `wd_link`(`link_name`,`link_url`,`link_addtime`)values('$title','$author','$time')";
    $info=mysql_query($in);
    if($info){
        alert('添加成功','link_list.php');
    }else{
        alert('添加失败','link_add.php');
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
        <li class="active">添加链接</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加链接</div>
              <div class="panel-btns pull-right margin-left">
              <a href="link_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">链接名称</span>
                    <input type="text" name="title" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">链接URL</span>
                        <input type="text" name="author" value="" class="form-control">
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