{li:include file='header.tpl'}
<div id="main">
    <!-- Start: Sidebar -->
    {li:include file='left.tpl'}
  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
      {li:include file='pos.tpl'}
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">编辑模板</div>
              <div class="panel-btns pull-right margin-left">
              <a href="model.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">模型名称</span>
                    <input type="text" name="title" value="{li:$select['article_title']}" class="form-control">
                  </div>
                </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">附加表</span>
                              <input type="text" name="title" value="{li:$select['article_title']}" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">单页模板</span>
                              <input type="text" name="title" value="{li:$select['article_title']}" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">列表页模板</span>
                              <input type="text" name="title" value="{li:$select['article_title']}" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">详情页模板</span>
                              <input type="text" name="title" value="{li:$select['article_title']}" class="form-control">
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