{li:include file='header.tpl'}
<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
{li:include file='left.tpl'}
  <!-- End: Sidebar -->   

  <!-- Start: Content -->
  <section id="content">
      {li:include file='pos.tpl'}
    <div class="container">
	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">{li:$title}</div>
                  <a href="{li:$filePre}_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加栏目</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                          <th>ID</th>
                        <th>模型名称</th>
                        <th width="200">操作</th>
                      </tr>
                    {li:foreach $list_ as $v}
                    	<tr class="success">
                            <td>{li:$v.id}</td>
                        <td>{li:$v.model_name}</td>
                        <td>
		                      <div class="btn-group">
		                        <a href="model_edit.php?id={li:$v['id']}" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="model.php?id={li:$v['id']}&type=del" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
		                      </div>
                        
                        </td>
                      </tr>
                     {li:/foreach}

                  </table>
                  
                  <div class="pull-left">

                    <button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>



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