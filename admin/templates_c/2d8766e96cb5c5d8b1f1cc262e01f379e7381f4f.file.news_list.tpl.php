<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-06 20:17:16
         compiled from "..\smarty\templates\news_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3724575568c8a5fe11-51504564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d8766e96cb5c5d8b1f1cc262e01f379e7381f4f' => 
    array (
      0 => '..\\smarty\\templates\\news_list.tpl',
      1 => 1465215434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3724575568c8a5fe11-51504564',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575568c8bb5ff5_97144705',
  'variables' => 
  array (
    'article' => 0,
    'value' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575568c8bb5ff5_97144705')) {function content_575568c8bb5ff5_97144705($_smarty_tpl) {?><body>
<!-- Start: Header -->
<?php echo $_smarty_tpl->getSubTemplate ('header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- End: Header -->

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->

<?php echo $_smarty_tpl->getSubTemplate ('common.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                        <th>标题</th>
                        <th>作者</th>
                        <th>添加时间</th>
                        <th width="200">操作</th>
                      </tr>
                    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                    	<tr class="success">
                        <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['article_title'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['value']->value['admin_name'];?>
</td>
                        <td><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['value']->value['article_addtime']);?>
</td>
                        <td>
		                      <div class="btn-group">
		                        <a href="news_edit.php?nid=<?php echo $_smarty_tpl->tpl_vars['value']->value['article_id'];?>
" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="news_list.php?nid=<?php echo $_smarty_tpl->tpl_vars['value']->value['article_id'];?>
&type=del" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
		                      </div>
                        
                        </td>
                      </tr>
                     <?php } ?>

                  </table>
                  
                  <div class="pull-left">

                    <button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>



                  </div>
                  
                  <div class="pull-right">
                    <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

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
