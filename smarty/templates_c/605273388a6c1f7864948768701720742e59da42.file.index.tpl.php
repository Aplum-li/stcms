<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-08 23:27:09
         compiled from "E:\wamp\www\wd16000\admin\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143955758387641c8f7-90443787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '605273388a6c1f7864948768701720742e59da42' => 
    array (
      0 => 'E:\\wamp\\www\\wd16000\\admin\\templates\\index.tpl',
      1 => 1465399563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143955758387641c8f7-90443787',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5758387645be74_11490032',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5758387645be74_11490032')) {function content_5758387645be74_11490032($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
	<?php echo $_smarty_tpl->getSubTemplate ('left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
      </ol>
    </div>
    <div class="container">


		<div class="col-md-11">
			<div id="docs-content">
				<h2 class="page-header margin-top-none">个人信息</h2>
				<table class="table">
					<tr>
					<td colspan="2">欢迎，<?php echo $_SESSION['admin']['name'];?>
</td>
					</tr>
					<tr>
					<td width="100">最后登录时间:</td>
					<td>2015-01-02 13：20</td>
					</tr>
					<tr>
					<td>最后登录IP:</td>
					<td>127.0.0.1</td>
					</tr>
				</table>

				<h2 class="page-header margin-top-none">系统信息</h2>
				<table class="table">
				  <tr>
				    <td width="100">操作系统：</td>
				    <td><?php echo @constant('PHP_OS');?>
</td>
				  </tr>
				  <tr>
				    <td>PHP 版本:</td>
				    <td><?php echo @constant('PHP_VERSION');?>
</td>
				  </tr>
				  <tr>
				    <td>MySQL 版本:</td>
				    <td>5.1.33</td>
				  </tr>
				</table>
			</div>
		</div>
    </div> 
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --></body>

</html><?php }} ?>
