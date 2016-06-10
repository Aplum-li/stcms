<?php
include_once('../init.php');
include_once('checklogin.php');
//添加用户操作
if($_POST){
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $address=trim($_POST['address']);
    $introduce=trim($_POST['introduce']);
    $time=time();
$user_add="insert into `wd_user` (`user_name`,`user_email`,`user_address`,`user_introduce`,`user_addtime`)values('$name','$email','$address','$introduce','$time')";
    //echo $user_add;die;
    $user_sql=mysql_query($user_add);
    if($user_sql){
        showmsg('添加成功','user_list.php');
    }else{
        showmsg('添加失败','user_add.php');
    }
}


?>
  <?php  include_once('header.php'); ?>
  <!-- End: Sidebar --> 
  <?php  include_once('common.php'); ?>   
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">添加用户</li>
      </ol>
    </div>
    <div class="container">

   <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform" enctype="multipart/form-data">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加用户</div>
              <div class="panel-btns pull-right margin-left">
              <a href="product_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
                </div>
            </div>
            <div class="panel-body">
              <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">用户名称</span>
                    <input type="text" name="name" value="" class="form-control">
                  </div>
                </div>
<!--                   <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">性别</span>
                          <input type="radio" name="sex" value="0">男<input type="radio" name="sex" value="1" >女
                      </div>
                  </div> -->
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">邮箱</span>
                    <input type="text" name="email" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">地址</span>
                    <input type="text" name="address" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">简介</span>
                    <input type="text" name="introduce" value="" class="form-control">
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