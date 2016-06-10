<?php
include_once('../init.php');
include_once('checklogin.php');
$select="select * from wd_message as e left wd_admin as a on e.message_uid=a.admin_id where admin_id=message_uid";
$message_info=mysql_query($select);
if($_POST){
    $title=trim($_POST['title']);
    $author=trim($_POST['author']);
    $desc=trim($_POST['desc']);
    $time=time();
    $in="insert into `wd_message`(`message_uid`,`message_title`,`message_content`,`message_addtime`)values('$author','$title','$desc','$time')";

    $info=mysql_query($in);

    if($info){
        showmsg('添加成功','message_list.php');
    }else{
        showmsg('添加失败','message_add.php');
    }

}

?>

<body>
<?php include_once('header.php');?>
<?php include_once('ueditor.php');?>

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
        <li class="active">添加留言</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加留言</div>
              <div class="panel-btns pull-right margin-left">
              <a href="message_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
               

                
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">留言用户</span>
                       <select name="author" id="" style="height:35px;">
                         <option value="1"<?php if($message_info['admin_id']==1) echo 'selected';?>>admin</option>
                         <option value="2"<?php if($message_info['admin_id']==2) echo 'selected';?>>web</option>
                         <option value="3"<?php if($message_info['admin_id']==3) echo 'selected';?>>游客</option>
                       </select>
                    </div>

                </div>
                 <div class="form-group">
                   <div class="input-group"> <span class="input-group-addon">留言标题</span>
                    <input type="text" name="title" value="" class="form-control">
                  </div>
                  </div>
<!--                  <div class="form-group">
                   <div class="input-group"> <span class="input-group-addon">用户邮箱</span>
                    <input type="text" name="title" value="" class="form-control">
                  </div>
                  </div> -->
                </div>
                <div class="form-group col-md-12">
                留言内容
                  <script id="container" name="message_content" type="text/plain"></script>
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