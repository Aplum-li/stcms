<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-09 00:58:25
         compiled from "E:\wamp\www\wd16000\admin\templates\news_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2730657584ddbb9e2c2-76810367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0226ad5809d09dc5b36819c5e9a9fbfb3011c45a' => 
    array (
      0 => 'E:\\wamp\\www\\wd16000\\admin\\templates\\news_add.tpl',
      1 => 1465405103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2730657584ddbb9e2c2-76810367',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57584ddbbe15d6_52304291',
  'variables' => 
  array (
    'list_' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57584ddbbe15d6_52304291')) {function content_57584ddbbe15d6_52304291($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="main"> 
    <!-- Start: Sidebar -->
  <?php echo $_smarty_tpl->getSubTemplate ('left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">添加文章</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加文章</div>
              <div class="panel-btns pull-right margin-left">
              <a href="news_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">标题</span>
                    <input type="text" name="title" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">作者</span>
                       <select name="author" id="" style="height:35px;">
                           <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                         <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_SESSION['admin']['id']==$_smarty_tpl->tpl_vars['v']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['admin_name'];?>
</option>
                           <?php } ?>
                       </select>
                    </div>
                </div>

                </div>
                <div class="form-group col-md-12">
                  <?php echo '<script'; ?>
 id="container" name="article_content" type="text/plain"><?php echo '</script'; ?>
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
