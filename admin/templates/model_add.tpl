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
              <div class="panel-title">添加模型</div>
              <div class="panel-btns pull-right margin-left">
              <a href="javascript:history.go(-1);" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">模型名称</span>
                        <input type="text" name="model_name" value="" class="form-control">
                      </div>
                    </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">附加表</span>
                              <input type="text" name="model_addtable" value="" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">单页模板</span>
                              <input type="text" name="model_page" value="" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">列表页模板</span>
                              <input type="text" name="model_list" value="" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">详情页模板</span>
                              <input type="text" name="model_details" value="" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">附加文件</span>
                              <input type="text" name="model_addFile" value="" class="form-control">
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
<script type="text/javascript">
    function checkForm() {
        //判断用户名是否为空
        if ($("input[name='model_name']").val() == '') {
            showmsg('请输入您的用户名');
            return false;
        }
        //判断密码是否为空
        if ($("input[name='model_addtable']").val() == '') {
            showmsg('请输入您的密码');
            return false;
        }
        //判断密码是否为空
        if ($("input[name='code']").val() == '') {
            showmsg('请输入验证码');
            return false;
        }
        $.post("login.php", $("#altForm").serialize(),
                function(data){
                    if (data.status) {
                        showmsg(data.info, data.url);
                    } else {
                        showmsg(data.info);
                    }
                }, "json");
        return false;
    }
</script>
</html>