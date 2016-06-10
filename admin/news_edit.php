<?php
include_once('../init.php');
include_once('checklogin.php');
$eid=$_GET['nid'];
$edit='select * from wd_article as art left join wd_admin as ad on art.article_uid=ad.admin_id where article_id='.$eid;
$info=mysql_query($edit);
$select=mysql_fetch_assoc($info);
//print_r($update);
//修改语句
if($_POST){
    $title=trim($_POST['title']);
    $author=$_POST['author'];
    $article_content=trim($_POST['article_content']);
    $time=time();
    $update="update wd_article set `article_title`='$title',`article_uid`='$author',`article_content`='$article_content',`article_addtime`='$time' where `article_id`='$eid'";
    $info1=mysql_query($update);

    if($info1){
        showmsg('修改成功','news_list.php');
    }else{
        showmsg('修改失败');
    }
}
?>
<?php include_once('header.php'); ?>
<?php include_once('ueditor.php');?>
<body>
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
        <li class="active">编辑资讯</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">编辑资讯</div>
              <div class="panel-btns pull-right margin-left">
              <a href="news_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">标题</span>
                    <input type="text" name="title" value="<?php echo $select['article_title'];?>" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">作者</span>
                       <select name="author" id="" style="height:35px;">
                         <option value="1"<?php if($select['admin_id']==1) echo 'selected';?>>admin</option>
                         <option value="2"<?php if($select['admin_id']==2) echo 'selected';?>>web</option>
                       </select>
                    </div>
                </div>
                </div>
                <div class="form-group col-md-12">
                  <script id="container" name="article_content" type="text/plain"><?php echo $select['article_content'];?></script>
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