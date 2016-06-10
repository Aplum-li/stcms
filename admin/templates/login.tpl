<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<title>登录</title>
<meta name="keywords" content="Admin">
<meta name="description" content="Admin">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Core CSS  -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<!-- Theme CSS -->
<link rel="stylesheet" type="text/css" href="css/theme.css">
<link rel="stylesheet" type="text/css" href="css/pages.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="layer/layer/layer.js"></script>
<script type="text/javascript" src="layer/common.js"></script>

</head>
<body class="login-page">

<!-- Start: Main -->
<div id="main">
<div class="container">
<div class="row">
  <div id="page-logo"></div>
</div>
<div class="row">
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">系统登录入口</div>
    </div>

    <form action="#" class="cmxform" id="altForm" method="post" onsubmit="return login()">
      <div class="panel-body">
        <div class="form-group">
          <div class="input-group"> <span class="input-group-addon">用户名</span>
            <input type="text" name="username" class="form-control" autocomplete="off"  placeholder="请输入您的用户名">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group"> <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;码</span>
            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="请输入您的密码">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group"> <span class="input-group-addon">验证码</span>
            <input type="" name="code" class="form-control" autocomplete="off" placeholder="请输入您的验证码">
          </div>
        </div>
        <div class="form-group">
          <img src="../code/mycode.php" id="code">
        </div>
      </div>

      <div class="panel-footer"> <span class="panel-title-sm pull-left" style="padding-top: 7px;"></span>
      <div class="form-group margin-bottom-none">
        <input type="hidden" value="login" name="action-mark" />
        <input class="btn btn-primary pull-right" type="submit" value="登 录" />
        <div class="clearfix"></div>
      </div>
      </div>

    </form>

  </div>
</div>
</div>
</div>
<!-- End: Main --> 

</body>

</html>
<script type="text/javascript">
  var img=document.getElementById('code');
  img.onclick=function(){
    var time=new Date();
    var str_time=time.getTime();
    this.src="../code/mycode.php?"+str_time;
  }

  function login() {
    //判断用户名是否为空
    if ($("input[name='username']").val() == '') {
      showmsg('请输入您的用户名');
      return false;
    }
    //判断密码是否为空
    if ($("input[name='password']").val() == '') {
      showmsg('请输入您的密码');
      return false;
    }
    //判断密码是否为空
    if ($("input[name='code']").val() == '') {
      showmsg('请输入验证码');
      return false;
    }
    $.post("login.php", $("#altForm").serialize(),
     function(data){
        if (data.status) {
          showmsg(data.info, data.url);
        } else {
          showmsg(data.info);
        }
     }, "json");
    return false;
  }
</script>
