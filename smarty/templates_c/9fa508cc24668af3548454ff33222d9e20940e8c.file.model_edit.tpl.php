<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 12:59:54
         compiled from "E:\wamp\www\wd16000\admin\templates\model_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23615575a3f581ddb89-40895109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fa508cc24668af3548454ff33222d9e20940e8c' => 
    array (
      0 => 'E:\\wamp\\www\\wd16000\\admin\\templates\\model_edit.tpl',
      1 => 1465534793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23615575a3f581ddb89-40895109',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575a3f58224100_73597689',
  'variables' => 
  array (
    'select' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575a3f58224100_73597689')) {function content_575a3f58224100_73597689($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
              <div class="panel-title">编辑模板</div>
              <div class="panel-btns pull-right margin-left">
              <a href="model.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">模型名称</span>
                    <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['select']->value['article_title'];?>
" class="form-control">
                  </div>
                </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">附加表</span>
                              <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['select']->value['article_title'];?>
" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">单页模板</span>
                              <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['select']->value['article_title'];?>
" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">列表页模板</span>
                              <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['select']->value['article_title'];?>
" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">详情页模板</span>
                              <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['select']->value['article_title'];?>
" class="form-control">
                          </div>
                      </div>


                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">作者</span>
                       <select name="author" id="" style="height:35px;">
                         <option value="1"<?php echo '<?php'; ?>
 if($select['admin_id']==1) echo 'selected';<?php echo '?>'; ?>
>admin</option>
                         <option value="2"<?php echo '<?php'; ?>
 if($select['admin_id']==2) echo 'selected';<?php echo '?>'; ?>
>web</option>
                       </select>
                    </div>
                </div>
                </div>
                <div class="form-group col-md-12">
                  <?php echo '<script'; ?>
 id="container" name="article_content" type="text/plain"><?php echo '<?php'; ?>
 echo $select['article_content'];<?php echo '?>'; ?>
<?php echo '</script'; ?>
>
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

</html><?php }} ?>
