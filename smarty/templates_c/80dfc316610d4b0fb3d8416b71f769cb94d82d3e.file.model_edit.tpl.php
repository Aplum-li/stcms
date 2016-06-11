<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-10 15:37:32
         compiled from "C:\wamp\www\stcms\admin\templates\model_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26897575adba14a6a59-33909705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80dfc316610d4b0fb3d8416b71f769cb94d82d3e' => 
    array (
      0 => 'C:\\wamp\\www\\stcms\\admin\\templates\\model_edit.tpl',
      1 => 1465573051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26897575adba14a6a59-33909705',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575adba14ec372_50781115',
  'variables' => 
  array (
    'title' => 0,
    'postUrl' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575adba14ec372_50781115')) {function content_575adba14ec372_50781115($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
                            <div class="panel-btns pull-right margin-left">
                                <a href="javascript:history.go(-1);" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            </div>
                        </div>
                        <form class="registerform" action="<?php echo $_smarty_tpl->tpl_vars['postUrl']->value;?>
">
                            <table width="100%" style="table-layout:fixed;">
                                <tr>
                                    <td class="need" style="width:10px;">*</td>
                                    <td style="width:100px;" align="right">模型名称：</td>
                                    <td style="width:205px;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['model_name'];?>
" name="info[model_name]" class="inputxt" datatype="s2-10" errormsg="模型名称至少2个字符,最多10个字符！" nullmsg="请填写模型名称"/></td>
                                    <td><div class="Validform_checktip">模型名称为2~10个字符</div></td>
                                </tr>
                                <tr>
                                    <td class="need">*</td>
                                    <td align="right">附加表名：</td>
                                    <td ><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['model_addtable'];?>
" name="info[model_addtable]" class="inputxt" datatype="s2-20" errormsg="附加表名至少2个字符,最多20个字符！" nullmsg="请填写附加表名"/></td>
                                    <td><div class="Validform_checktip">附加表名为2~20个字符</div></td>
                                </tr>
                                <tr>
                                    <td class="need">*</td>
                                    <td>单页模板：</td>
                                    <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['model_page'];?>
" name="info[model_page]" class="inputxt" datatype="*" errormsg="单页模板不能为空" nullmsg="单页模板不能为空"/></td>
                                    <td><div class="Validform_checktip">请填写单页模板名称</div></td>
                                </tr>
                                <tr>
                                    <td class="need">*</td>
                                    <td>列表页模板：</td>
                                    <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['model_list'];?>
" name="info[model_list]" class="inputxt" datatype="*" errormsg="列表页模板不能为空" nullmsg="列表页模板不能为空"/></td>
                                    <td><div class="Validform_checktip">请填写列表页模板名称</div></td>
                                </tr>
                                <tr>
                                    <td class="need">*</td>
                                    <td>详情页模板：</td>
                                    <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['model_details'];?>
" name="info[model_details]" class="inputxt" datatype="*" errormsg="详情页模板不能为空" nullmsg="详情页模板不能为空"/></td>
                                    <td><div class="Validform_checktip">请填写详情页模板名称</div></td>
                                </tr>
                                <tr>
                                    <td class="need"></td>
                                    <td>附加文件：</td>
                                    <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['model_addFile'];?>
" name="info[model_addFile]" class="inputxt" /></td>
                                    <td><div class="Validform_checktip"></div></td>
                                </tr>
                                <tr>
                                    <td class="need"></td>
                                    <td></td>
                                    <td colspan="2" style="padding:10px 0 18px 0;">
                                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
">
                                        <input type="submit" value="提 交" />
                                        <input type="reset" value="重 置" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- End: Content -->
</div>

</body>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $(".registerform").Validform({
            tiptype:2,
            ajaxPost:true,
            callback:function(data){
                if (data.status == 'y') {
                    showmsg(data.info, data.url);
                } else {
                    showmsg(data.info);
                }
            }

        });
        $("#Validform_msg").remove();
    })
<?php echo '</script'; ?>
>
</html><?php }} ?>
