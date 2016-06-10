<?php
include_once('../init.php');
include_once('checklogin.php');
$time=time();

if(isset($_GET['type']) && $_GET['type']=='del' && $_GET['id']){
$del_sql="delete from wd_link where link_id=".intval($_GET['id']);
//echo $del_sql;die;
$info=mysql_query($del_sql);
//print_r($info);die;
if($info){
  showmsg('删除成功','link_list.php');
  
}else{
  showmsg('删除失败','link_list.php');
 
}
}
//分页操作
$current=isset($_GET['p'])?$_GET['p']:1;
$show_page=2;
$limit=3;
$start=$limit*($current-1);
$link_sql=get_list('*','wd_link'," order by link_addtime desc limit $start,$limit");
$pages=page($current,$show_page,$limit,'wd_link','');
?>

<!-- End: Header -->
<?php include_once('header.php');?>
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
        <li class="active">案例管理</li>
      </ol>
    </div>
    <div class="container">

   <div class="row">
        <div class="col-md-12">
      <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">链接列表</div>
                  <a href="link_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加链接</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center">
                        <input type="checkbox" name="cbox" id ="selectAll">
                          <a >全选</a></th>
                          
                        <th>链接名称</th>
                        <th>链接URL</th>
                        <th>添加时间</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach ($link_sql as $value){?>
                      <tr class="success">
                        <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                        <td><?php echo $value['link_name'];?></td>
                        <td><?php echo $value['link_url'];?></td>
                        <td><?php echo date('Y-m-d H:i:s',$value['link_addtime']);?></td>
                        <td>
                          <div class="btn-group">
                            <a href="link_edit.php?id=<?php echo $value['link_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                            <a onclick="return confirm('确定要删除吗？');" href="link_list.php?id=<?php echo $value['link_id'];?>&type=del" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                          </div>
                        </td>
                      </tr>
 
                     <?php }?>
                      
                  </table>
                  
                  <div class="pull-left">
                    <button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>
                  </div>
                  
                  <div class="pull-right">
                    <ul class="pagination" id="paginator-example">
                      <?php echo $pages;?>
                    </ul>
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
<script>
  $('#selectAll').click(function () {
    var flag=$(this).prop('checked');
    $('.cbox').prop('checked',flag);
  })
</script>
</html>