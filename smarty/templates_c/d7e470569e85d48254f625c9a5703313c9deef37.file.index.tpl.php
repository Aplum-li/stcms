<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-11 09:41:37
         compiled from "C:\wamp\www\stcms\admin\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13884575ad9fe6d1ab7-45335162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7e470569e85d48254f625c9a5703313c9deef37' => 
    array (
      0 => 'C:\\wamp\\www\\stcms\\admin\\templates\\index.tpl',
      1 => 1465609296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13884575ad9fe6d1ab7-45335162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575ad9fe717a95_12845844',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575ad9fe717a95_12845844')) {function content_575ad9fe717a95_12845844($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
	<?php echo $_smarty_tpl->getSubTemplate ('left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
      <?php echo $_smarty_tpl->getSubTemplate ('pos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
