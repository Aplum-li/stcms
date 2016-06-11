<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-12 00:13:17
         compiled from "C:\wamp\www\stcms\admin\templates\category_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26037575ae8b6674421-26478462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9121408940ffba81a2c74654b9726e172e4b207a' => 
    array (
      0 => 'C:\\wamp\\www\\stcms\\admin\\templates\\category_add.tpl',
      1 => 1465661596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26037575ae8b6674421-26478462',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_575ae8b66b9a59_89674304',
  'variables' => 
  array (
    'title' => 0,
    'postUrl' => 0,
    'model' => 0,
    'v' => 0,
    'list_' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575ae8b66b9a59_89674304')) {function content_575ae8b66b9a59_89674304($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <div class="tabs">
                    <button type="button" class="on" onclick="sh(this)">基本设置</button>
                    <button type="button" onclick="sh(this)">其他设置</button>
                </div>
                <table width="100%" style="table-layout:fixed;display: inline;" class="table-hide">
                    <tr>
                        <td class="need" style="width:10px;">*</td>
                        <td style="width:100px;" align="right">内容模型：</td>
                        <td style="width:205px;">
                            <select name="info[model]" id="model" onchange="GetTpl()">
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['model']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['model_name'];?>
</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td align="right">上级栏目：</td>
                        <td>
                            <select name="info[pid]">
                                <option value="0">作为顶级栏目</option>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['delimiter'];
echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><div class="Validform_checktip"></div></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>栏目名称：</td>
                        <td><input type="text" value="" name="info[typename]" class="inputxt" datatype="*" errormsg="栏目名称不能为空" nullmsg="栏目名称不能为空"/></td>
                        <td><div class="Validform_checktip">请填写栏目名称</div></td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td>文件保存目录：</td>
                        <td>
                            <input type="text" value="" name="info[name]" class="inputxt input400" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>栏目属性：</td>
                        <td>
                            <input type="radio" value="page" name="info[type]" class="radio" id="page" onClick="islist()" checked/> <label for="page">单页</label>
                            <input type="radio" value="list" name="info[type]" class="radio" id="list" onClick="islist()"/> <label for="list">列表页</label>
                        </td>
                        <td>
                            <span id="pages">每页显示条数： <input type="text" name="info[page]" value="10" style="width: 30px;padding: 0;"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td>栏目链接：</td>
                        <td><input type="text" value="" name="info[typelink]" class="inputxt" /></td>
                        <td><div class="Validform_checktip"></div></td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td>缩略图：</td>
                        <td>
                            <input type="text" name="info[litpic]" id="litpic" value="" class="inputxt"/>
                        </td>
                        <td>
                            <button type="button" onClick="upImage()">上传图片</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>状态：</td>
                        <td>
                            <input type="radio" value="1" name="info[status]" class="pr1" checked id="st1"><label for="st1">显示</label>
                            <input type="radio" value="0" name="info[status]" class="pr1" id="st0"><label for="st0">不显示</label>
                        </td>
                        <td><div class="Validform_checktip"></div></td>
                    </tr>
                </table>
                <table width="100%" style="table-layout:fixed;" class="table-hide">
                    <tr>
                        <td class="need" style="width:10px;">*</td>
                        <td style="width:100px;">英文标题：</td>
                        <td style="width:205px;">
                            <input type="text" value="" name="info[subtitle]" class="inputxt" />
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td>关键字：</td>
                        <td><input type="text" value="" name="info[keyword]" class="inputxt" /></td>
                        <td><div class="Validform_checktip"></div></td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td>栏目描述：</td>
                        <td>
                            <textarea name='info[typedesc]' style='width: 400px;height: 70px;margin-left:0;'></textarea>
                        <td><div class="Validform_checktip"></div></td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td>栏目内容：</td>
                        <td colspan="2">
                            <textarea name='info[typecontent]' id="myEditor" style='width: 100%;margin-left:0;'></textarea>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>单页模板：</td>
                        <td><input type="text" value="" name="info[page_tpl]" class="inputxt" datatype="*" errormsg="单页模板不能为空" nullmsg="单页模板不能为空" id="model_page"/></td>
                        <td><div class="Validform_checktip">请填写单页模板</div></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>列表页模板：</td>
                        <td><input type="text" value="" name="info[list_tpl]" class="inputxt" datatype="*" errormsg="列表页模板不能为空" nullmsg="列表页模板不能为空" id="model_list"/></td>
                        <td><div class="Validform_checktip">请填写列表页模板</div></td>
                    </tr>

                    <tr>
                        <td class="need">*</td>
                        <td>详情页模板：</td>
                        <td><input type="text" value="" name="info[view_tpl]" class="inputxt" datatype="*" errormsg="详情页模板不能为空" nullmsg="详情页模板不能为空" id="model_details"/></td>
                        <td><div class="Validform_checktip">请填写详情页模板</div></td>
                    </tr>

                </table>
                <table width="100%" style="table-layout:fixed;">
                    <tr>
                        <td class="need" style="width:10px;">&nbsp;</td>
                        <td style="width:100px;">&nbsp;</td>
                        <td style="padding:10px 0 18px 0;">
                            <input type="submit" value="提 交" /> <input type="reset" value="重 置" />
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
    /**
     * 判断是否是列表页，如果是列表页，则显示每页输出的条数
     */
    function islist(){
        if($('#page').prop('checked')){
            $('#pages').hide();
        }else{
            $('#pages').show();
        }
    }

    /**
     * 显示、隐藏选项
     * @param obj
     */
    function sh(obj){
        var i = $(obj).index();
        $('table.table-hide').hide();
        $('table.table-hide').eq(i).show();
        $(obj).siblings('button').removeClass('on');
        $(obj).addClass('on');
    }

    /**
     * 获取模板
     * @constructor
     */
    function GetTpl(){
        var model = $('#model').val();
        if (model) {
            $.post("post.php", { "type":'gettpl',"model_id": model },
            function(data){
                if (data.status) {
                    $('#model_list').val(data.model_list);
                    $('#model_details').val(data.model_details);
                    $('#model_page').val(data.model_page);
                }else{
                    showmsg(data.msg);
                }
            }, "json");
        };
    }


    $(function(){
        islist();
        GetTpl();

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

<?php echo '<script'; ?>
 src="/source/ueditor143/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/source/ueditor143/ueditor.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/plain" id="j_ueditorupload" style="height:5px;display:none;" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    UE.getEditor('myEditor',{
        initialFrameHeight:400,
        enableAutoSave: true,
        saveInterval: 500,
        //更多其他参数，请参考ueditor.config.js中的配置项
        serverUrl: '/source/ueditor143/php/controller.php'
    });

    //实例化编辑器
    var o_ueditorupload = UE.getEditor('j_ueditorupload', {
        autoHeightEnabled:false
    });
    o_ueditorupload.ready(function ()
    {

        o_ueditorupload.hide();//隐藏编辑器

        //监听图片上传
        o_ueditorupload.addListener('beforeInsertImage', function (t,arg)
        {
            $("#litpic").val(arg[0].src);
        });

        /* 文件上传监听
         * 需要在ueditor.all.min.js文件中找到
         * d.execCommand("insertHtml",l)
         * 之后插入d.fireEvent('afterUpfile',b)
         */
        o_ueditorupload.addListener('afterUpfile', function (t, arg)
        {
            alert('这是文件地址：'+arg[0].url);
        });
    });

    //弹出图片上传的对话框
    function upImage()
    {
        var myImage = o_ueditorupload.getDialog("insertimage");
        myImage.open();
    }
    //弹出文件上传的对话框
    function upFiles()
    {
        var myFiles = o_ueditorupload.getDialog("attachment");
        myFiles.open();
    }
<?php echo '</script'; ?>
>

</html><?php }} ?>
