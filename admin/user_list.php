<?php
include_once('../init.php');
include_once('checklogin.php');
if(isset($_GET['type']) && $_GET['type']=='del' && $_GET['uid']){
    $del_sql="delete from wd_user where user_id=".intval($_GET['uid']);
  //echo $del_sql;die;
  $info=mysql_query($del_sql);
  //print_r($info);die;
  if($info){
    showmsg('删除成功','user_list.php');
  }else{
    showmsg('删除失败');
  }

}

//print_r($user_list);
$time=time();


//分页代码
$current=isset($_GET['p'])?$_GET['p']:1;//当前页
$show_page=2;//显示页
$limit=3;//显示条数
$start=$limit*($current-1);//开始页
$user_list=get_list('*','wd_user'," order by user_addtime desc limit $start,$limit");//获取banner
$count=get_count('wd_user');//获取总数
//当前页，显示页，显示条数，表，url
$pages=page($current,$show_page,$limit,'wd_user','');
//echo $pages;

?>

<!-- End: Header -->
  <?php  include_once('header.php'); ?>
<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
<?php include_once('common.php'); ?>
  <!-- End: Sidebar -->   

  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">用户管理</li>
      </ol>
    </div>
    <div class="container">

   <div class="row">
        <div class="col-md-12">
      <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">用户列表</div>
                  <a href="user_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加用户</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center">
                          <a class="btn btn-gray btn-sm" id="selectAll">全选</a></th>
                          
                        <th>用户名称</th>
                        
                        <th>用户地址</th>
                        <th>用户邮箱</th>
                        <th>用户简介</th>
                        <th>添加时间</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach ($user_list as $value){?>
                      <tr class="success">
                        <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                        <td><?php echo $value['user_name'];?></td>
                        <td><?php echo $value['user_address'];?></td>
                        <td><?php echo $value['user_email']?></td>
                        <td><?php echo $value['user_introduce']?></td>
                        <td><?php echo date('Y-m-d H:i:s',$time);?></td>
                        <td>
                          <div class="btn-group">
                            <a href="user_edit.php?eid=<?php echo $value['user_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                            <a onclick="return confirm('确定要删除吗？');" href="user_list.php?uid=<?php echo $value['user_id'];?>&type=del" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                          </div>
                        </td>
                      </tr>
 
                     <?php }?>
                      
                  </table>
                  
                  <div class="pull-left">
                    <button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>
                  </div>
                  
                  <div class="pull-right">
                  <?php echo $pages;?>
                  </div>
                  
                </div>
                </form>
              </div>
          </div>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 
</body>
</html>