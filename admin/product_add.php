<?php
include_once('../init.php');
include_once('checklogin.php');
//获取产品所有分类
$product_list=get_list('*','wd_category','where category_type=2');

//添加产品操作
if($_POST){

  /*$out_path = '../';
  //图片存放路径
  $dest = 'images/thumb/';
  //限制图片条件
  $allow = array('image/gif','image/png','image/jpeg');

 foreach($_FILES as $key=>$value){
  //print($value);die;
      if(!in_array($value['type'],$allow)){
        showmsg('文件类型不符合','product_add.php');
        return false;
      }
      if($value['error']==0){
        //get_ext_strpos()获取文件扩展名
        $ext_name = get_ext_strpos($value['name']);
        //使用时间戳加上 生成更好的随机数 
        $base_name = time().mt_rand(10000,99999);
        //组装图片的路径和名称，后缀
        $read_path = $out_path.$dest.$base_name.'.'.$ext_name;

        $src = $out_path.'images/'.$value['name'];
        thumb($src,$read_path,100,100);
        $_POST[$key] = $dest.$base_name.'.'.$ext_name;
        
      }else{
        showmsg('文件未上传','product_add.php');
      }
    }
    */
  $name=trim($_POST['name']);
  $category_id=trim($_POST['category_id']);
  $size=trim($_POST['size']);
  $fitting=trim($_POST['fitting']);
  $feature=trim($_POST['feature']);
  $spec=trim($_POST['spec']);
  $describe=trim($_POST['describe']);
  $image_1=$_POST['image_0'];
  $image_2=$_POST['image_1'];
  $image_3=$_POST['image_2'];
  $image_4=$_POST['image_3'];
  $time=time();
  //添加的语句字段
  $data=array(
       'product_name'=>$name,
       'product_category_id'=>$category_id,
       'product_size'=>$size,
       'product_fitting'=>$fitting,
       'product_feature'=>$feature,
       'product_spec'=>$spec,
       'product_describe'=>$describe,
       'product_image_1'=>$image_1,
        'product_image_2'=>$image_2,
        'product_image_3'=>$image_3,
        'product_image_4'=>$image_4,
        'product_addtime'=>$time

    );
  //插入语句前面参数是表名，后面是修改字段
   $result = mysql_insert('wd_product',$data);
   //给个判断
   if($result){
    showmsg('上传成功','product_list.php');
   }else{
    showmsg('上传失败','product_add.php');
   }

}
?>
 <?php include_once('header.php'); ?> 
  <!-- End: Sidebar -->  
  <?php include_once('common.php'); ?>  
  <!-- Start: Content -->
    <link rel="stylesheet" type="text/css" href="upload/uploadify.css">
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">添加案例</li>
      </ol>
    </div>
    <div class="container">

   <div class="row">
        <div class="col-md-10 col-lg-11 center-column">
        <form action="#" method="post" class="cmxform" enctype="multipart/form-data">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加产品</div>
              <div class="panel-btns pull-right margin-left">
              <a href="product_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
                </div>
            </div>
            <div class="panel-body">
              <div class="col-md-7">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">产品名称</span>
                    <input type="text" name="name" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-addon">产品分类</span>
                        <select name="category_id" id="" style="height:35px;">
                        <?php foreach ($product_list as $key=>$value){?>
                          <option value="<?php echo $value['category_id'];?>"><?php echo $value['category_name'];?></option>
                      <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">产品大小</span>
                    <input type="text" name="size" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">产品配件</span>
                    <input type="text" name="fitting" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">产品特征</span>
                    <input type="text" name="feature" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">产品规格</span>
                    <input type="text" name="spec" value="" class="form-control">
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <div class="input-group"> <span class="input-group-addon">产品介绍</span>
                    <textarea style="width:100%;height:150px;" name="describe"></textarea>
                  </div>
                </div>
                <div class="form-group form-group0">
                  <div class="input-group"> <span class="input-group-addon">产品图片1</span>
                    <input type="file" id="upload_picture0" name="upload_picture">
                    <input type="hidden" name="image_0" id="image_0" value=""/>
                  </div>
                </div>
                <div class="form-group form-group1">
                  <div class="input-group"> <span class="input-group-addon">产品图片2</span>
                    <input type="file" id="upload_picture1" name="upload_picture">
                    <input type="hidden" name="image_1" id="image_1" value=""/>
                  </div>
                </div>
                <div class="form-group  form-group2">
                  <div class="input-group"> <span class="input-group-addon">产品图片3</span>
                    <input type="file" id="upload_picture2" name="upload_picture">
                    <input type="hidden" name="image_2" id="image_2" value=""/>
                  </div>
                </div>
                <div class="form-group  form-group3">
                  <div class="input-group"> <span class="input-group-addon">产品图片4</span>
                    <input type="file" id="upload_picture3" name="upload_picture">
                    <input type="hidden" name="image_3" id="image_3" value=""/>
                  </div>
                </div>
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
  <script type="text/javascript" src="upload/jquery.uploadify.min.js"></script>
<script type="text/javascript">
$(function(){
  var l = $("input[name='upload_picture']").length;
  for (var i = 0; i < l; i++) {
    test('upload_picture'+i,'image_'+i,'form-group'+i);
  }
})

function test(idname,idlitpic,classname){
      $("#"+idname).uploadify({
        "height"          : 35,
        "swf"             : "upload/uploadify.swf",
        "fileObjName"     : "litpic",
        "buttonText"      : '上传图片',
        "uploader"        : "upload.php",
        "width"           : 100,
        'removeTimeout'   : 1,
        'fileSizeLimit'   : 3000,
        'fileTypeExts'    : '*.jpg; *.png; *.gif; *.jpeg;',
        "onUploadSuccess" : function(file,data){
          var data = $.parseJSON(data);
          var src = '';
          if(data.status){
            src = data.url || '' + data.path;
            //console.log($("."+classname).next('div')[0].className);
            if ($("."+classname).next('div')[0].className != 'product-img') {
              var str = '<div class="product-img"><img src="'+src+'" height="80px">';
              str += '<img src="images/close.png" onClick="delimg(this,\''+idlitpic+'\')" class="close" title="删除图片"></div>';
              $("."+classname).after(str);
            } else {
              $("."+classname).next('div').children('img').eq(0).attr('src',src);
            }
            
            //$("#"+idname).children('.uploadify-button').children('.uploadify-button-text').append(str);
            $("#"+idlitpic).val(src);
          } else {
            alert(data.info);
            setTimeout(function(){
              $('#top-alert').find('button').click();
              $(that).removeClass('disabled').prop('disabled',false);
            },1500);
          }
        },
        'onFallback' : function() {
          alert('未检测到兼容版本的Flash.');
        }
      });
    }

    function delimg (obj,idname) {
        $(obj).parent('.product-img').remove();
        $("#"+idname).val('');
    }

  </script>
</html>