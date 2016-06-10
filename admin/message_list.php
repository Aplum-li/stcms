<?php
include_once('../init.php');
include_once('checklogin.php');
if(isset($_GET['type']) && $_GET['type']=='del' && $_GET['nid']){
  $updelel="delete from wd_message where message_id=".intval($_GET['nid']);
  $up_sql=mysql_query($updelel);
  if($up_sql){
    showmsg('删除成功','message_list.php');
  }else{
    showmsg('删除失败');
  }
}




//分页代码
$current=isset($_GET['p'])?$_GET['p']:1;//当前页
$show_page=2;//显示页
$limit=3;//显示条数
$start=$limit*($current-1);//开始页
$message=get_list('*','wd_message as e left join wd_admin as a on e.message_uid=a.admin_id'," order by message_addtime desc limit $start,$limit");//获取banner
$count=get_count('wd_message');//获取总数
//当前页，显示页，显示条数，表，url
$pages=page($current,$show_page,$limit,'wd_message','');
//echo $pages;

?>

<body>
<!-- Start: Header -->

<!-- End: Header -->
<?php include_once('header.php');?>
<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
<?php
include_once('common.php');
?>
  <!-- End: Sidebar -->   

  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">留言管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">留言列表</div>
                  <a href="message_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加留言</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center">
                        <input type="checkbox" id="selectAll" >
                          <a>全选</a>
                        </th>

                        <th>留言标题</th>
                        <th>留言内容</th>
                        <th>留言者</th>
                        <th>留言时间</th>
                        <th width="200">操作</th>
                      </tr>
                    <?php foreach ($message as $value){?>
                    	<tr class="success">
                        <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                        <td><?php echo $value['message_title'];?></td>
                        <td><?php echo $value['message_content'];?></td>
                          <td><?php echo $value['admin_name'];?></td>
                        <td><?php echo date('Y-m-d',$value['message_addtime']);?></td>
                        <td>
		                      <div class="btn-group">
		                        <a href="message_edit.php?nid=<?php echo $value['message_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="message_list.php?nid=<?php echo $value['message_id'];?>&type=del" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
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
<script>
  $('#selectAll').click(function  () {
    var flag=$(this).prop('checked');
    $('.cbox').prop('checked',flag);
  })
</script>
</html>