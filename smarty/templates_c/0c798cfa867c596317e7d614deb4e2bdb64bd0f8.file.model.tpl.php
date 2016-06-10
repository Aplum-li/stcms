<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 12:13:51
         compiled from "E:\wamp\www\wd16000\admin\templates\model.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13521575851fd92b4b3-86771735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c798cfa867c596317e7d614deb4e2bdb64bd0f8' => 
    array (
      0 => 'E:\\wamp\\www\\wd16000\\admin\\templates\\model.tpl',
      1 => 1465532025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13521575851fd92b4b3-86771735',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575851fd98f785_71795422',
  'variables' => 
  array (
    'title' => 0,
    'list_' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575851fd98f785_71795422')) {function content_575851fd98f785_71795422($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                  <a href="model_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加模型</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                          <th>ID</th>
                        <th>模型名称</th>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['model_name'];?>
</td>
                        <td>
		                      <div class="btn-group">
		                        <a href="model_edit.php?nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="model.php?nid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
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
