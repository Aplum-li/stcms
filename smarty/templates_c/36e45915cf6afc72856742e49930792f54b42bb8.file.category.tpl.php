<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-12 00:51:57
         compiled from "C:\wamp\www\stcms\admin\templates\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2763575ae89112e2a9-97344151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36e45915cf6afc72856742e49930792f54b42bb8' => 
    array (
      0 => 'C:\\wamp\\www\\stcms\\admin\\templates\\category.tpl',
      1 => 1465663915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2763575ae89112e2a9-97344151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575ae891179bd6_64250348',
  'variables' => 
  array (
    'title' => 0,
    'filePre' => 0,
    'list_' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575ae891179bd6_64250348')) {function content_575ae891179bd6_64250348($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
<?php echo $_smarty_tpl->getSubTemplate ('left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- End: Sidebar -->   

  <!-- Start: Content -->
  <section id="content">
      <?php echo $_smarty_tpl->getSubTemplate ('pos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container">
	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['filePre']->value;?>
_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加栏目</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                          <th width="50px">ID</th>
                          <th>栏目名称</th>
                          <th width="200">操作</th>
                      </tr>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                    	<tr class="success">
                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['delimiter'];
echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</td>
                        <td>
		                      <div class="btn-group">
		                        <a href="model_edit.php?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="model.php?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&type=del" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
		                      </div>
                        
                        </td>
                      </tr>
                     <?php } ?>
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
<?php echo '<script'; ?>
>
  $('#selectAll').click(function  () {
    var flag=$(this).prop('checked');
    $('.cbox').prop('checked',flag);
  })
<?php echo '</script'; ?>
>
</html><?php }} ?>
