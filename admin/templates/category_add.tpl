{li:include file='header.tpl'}
<div id="main"> 
    <!-- Start: Sidebar -->
  {li:include file='left.tpl'}
  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
      {li:include file='pos.tpl'}
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">{li:$title}</div>
              <div class="panel-btns pull-right margin-left">
              <a href="javascript:history.go(-1);" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <form class="registerform" action="{li:$postUrl}">
                <table width="100%" style="table-layout:fixed;">
                    <tr>
                        <td class="need" style="width:10px;">*</td>
                        <td style="width:100px;" align="right">模型名称：</td>
                        <td style="width:205px;"><input type="text" value="" name="model_name" class="inputxt" datatype="s2-10" errormsg="模型名称至少2个字符,最多10个字符！" nullmsg="请填写模型名称"/></td>
                        <td><div class="Validform_checktip">模型名称为2~10个字符</div></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td align="right">附加表名：</td>
                        <td ><input type="text" value="" name="model_addtable" class="inputxt" datatype="s2-20" errormsg="附加表名至少2个字符,最多20个字符！" nullmsg="请填写附加表名"/></td>
                        <td><div class="Validform_checktip">附加表名为2~20个字符</div></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>单页模板：</td>
                        <td><input type="text" value="" name="model_page" class="inputxt" datatype="*" errormsg="单页模板不能为空" nullmsg="单页模板不能为空"/></td>
                        <td><div class="Validform_checktip">请填写单页模板名称</div></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>列表页模板：</td>
                        <td><input type="text" value="" name="model_list" class="inputxt" datatype="*" errormsg="列表页模板不能为空" nullmsg="列表页模板不能为空"/></td>
                        <td><div class="Validform_checktip">请填写列表页模板名称</div></td>
                    </tr>
                    <tr>
                        <td class="need">*</td>
                        <td>详情页模板：</td>
                        <td><input type="text" value="" name="model_details" class="inputxt" datatype="*" errormsg="详情页模板不能为空" nullmsg="详情页模板不能为空"/></td>
                        <td><div class="Validform_checktip">请填写详情页模板名称</div></td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td>附加文件：</td>
                        <td><input type="text" value="" name="model_addFile" class="inputxt" /></td>
                        <td><div class="Validform_checktip"></div></td>
                    </tr>
                    <tr>
                        <td class="need"></td>
                        <td></td>
                        <td colspan="2" style="padding:10px 0 18px 0;">
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
<script type="text/javascript">
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
</script>
</html>