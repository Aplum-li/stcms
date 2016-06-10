<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 14:10:42
         compiled from "E:\wamp\www\wd16000\admin\templates\model_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1028957585303364b84-67687916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a600e3c6f5ed84971e8a8c1438d2db3c4c5a760' => 
    array (
      0 => 'E:\\wamp\\www\\wd16000\\admin\\templates\\model_add.tpl',
      1 => 1465539036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1028957585303364b84-67687916',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575853033c3e83_79968270',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575853033c3e83_79968270')) {function content_575853033c3e83_79968270($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="main"> 
    <!-- Start: Sidebar -->
  <?php echo $_smarty_tpl->getSubTemplate ('left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
      <?php echo $_smarty_tpl->getSubTemplate ('pos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>
</html><?php }} ?>
