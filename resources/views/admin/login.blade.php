<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('admin')}}/lib/html5.js"></script>
<script type="text/javascript" src="{{asset('admin')}}/lib/respond.min.js"></script>
<script type="text/javascript" src="{{asset('admin')}}/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="{{asset('admin')}}/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('admin')}}/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="{{asset('admin')}}/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="{{asset('admin')}}/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />

<title>圆融教育.后台管理系统</title>
<meta name="keywords" content="圆融教育管理系统">
<meta name="description" content="圆融教育管理系统">
</head>
<style>
    .loginBox .input-text {
        width: 276px;
    }
    .yzm{
        width: 100px;
    }
</style>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="{{url('/admin/login')}}" method="post">
        {{csrf_field()}}

      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
          <span style="color: #f00;">{{ $errors->LoginError->first('username') }}</span>
        </div>
      </div>

      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
            <span style="color: #f00;">{{ $errors->LoginError->first('password') }}</span>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" name='captcha' class='yzm' type="text" placeholder="验证码" style="width:150px;">
          <img src="{{Captcha::src()}}" id="captcha"> <a id="kanbuq" href="javascript:;">换一张</a> </div>

        <p style="color: #f00;">{{ $errors->LoginError->first('captcha') }}</p>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="1">
            保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin.v2.5</div>
<script type="text/javascript" src="{{asset('admin')}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('admin')}}/static/h-ui/js/H-ui.js"></script>
<script>
    $('#kanbuq').on('click', function(){
        $('#captcha').attr('src', '{{Captcha::src()}}?'+ Math.random());
    });
</script>
</body>
</html>