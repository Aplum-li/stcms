{li:include file='header.tpl'}
<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
{li:include file='left.tpl'}
  <!-- End: Sidebar -->   

  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">文章管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">文章列表</div>
                  <a href="news_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加文章</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center">
                        <input type="checkbox" value="1" name="idarr[]" class="cbox"id="selectAll">
                          <a >全选</a>
                        </th>
                        <th>排序</th>
                        <th>标题</th>
                        <th>添加时间</th>
                        <th>状态</th>
                        <th width="200">操作</th>
                      </tr>
                    {li:foreach $article as $value}
                    	<tr class="success">
                        <td class="text-center">
                            <input type="checkbox" value="1" name="idarr[]" class="cbox">
                        </td>
                            <td><input type="text" name="sort[]" value="{li:$value.article_sort}" style="width: 30px;"></td>
                        <td>{li:$value.article_title}</td>
                          <td>{li:date('Y-m-d',$value.article_addtime)}</td>
                        <td>{li:if $value.article_status}√{li:else}×{li:/if}</td>
                        <td>
		                      <div class="btn-group">
		                        <a href="news_edit.php?nid={li:$value['article_id']}" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="news_list.php?nid={li:$value['article_id']}&type=del" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
		                      </div>
                        
                        </td>
                      </tr>
                     {li:/foreach}

                  </table>
                  
                  <div class="pull-left">

                    <button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>



                  </div>
                  
                  <div class="pull-right">
                    {li:$pages}
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