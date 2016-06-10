<?php
include_once('../init.php');
include_once('checklogin.php');
$time=time();

//分页代码
$current=isset($_GET['p'])?$_GET['p']:1;//当前页
$show_page=2;//显示页
$limit=3;//显示条数
$start=$limit*($current-1);//开始页
$product=get_list('*','wd_product as pro left join wd_category as cat on pro.product_category_id=cat.category_id'," order by product_addtime desc limit $start,$limit");//获取banner
$count=get_count('wd_product');//获取总数
//当前页，显示页，显示条数，表，url
$pages=page($current,$show_page,$limit,'wd_product','');
//echo $pages;




?>

<!-- End: Header -->
<?php include_once('header.php'); ?>
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
                  <div class="panel-title">案例列表</div>
                  <a href="product_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加产品</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center">
                        <input type="checkbox" name="cbox" id ="selectAll">
                          <a >全选</a></th>
                        <th>产品分类</th>  
                        <th>产品名称/型号</th>
                        <th>产品图片</th>
                        <th>添加时间</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach ($product as $value){?>
                      <tr class="success">
                        <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                        <td><?php echo $value['category_name'];?></td>
                        <td><?php echo $value['product_name'];?></td>
                        <td><img style="width:100px;height:80px;" src="../<?php echo $value['product_image_1']?>" ></td>
                        <td><?php echo date('Y-m-d H:i:s',$value['product_addtime']);?></td>
                        <td>
                          <div class="btn-group">
                            <a href="product_edit.php?id=<?php echo $value['product_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                            <a onclick="return confirm('确定要删除吗？');" href="#" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
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