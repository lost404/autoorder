<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if IE 7]>  <html class="no-js  lt-ie10 lt-ie9 lt-ie8 ie7" lang="zh-cn"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie10 lt-ie9 ie8" lang="zh-cn"> <![endif]-->
<!--[if IE 9]>  <html class="no-js lt-ie10 ie9" lang="zh-cn"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="zh-cn"> <!--<![endif]-->
<head>
    <script></script>
    <meta charset="utf-8" />
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="cleartype" content="on">
    <title>MODULE_NAME - ACTION_NAME</title>
    <link rel="stylesheet" href="./Static/css/ao.css">
</head>
<body>
<div id="nav" class="container_16 ao_nav">
    <div class="grid_16 ch-box">
        <font><a href="__APP__/Index/index">首页</a>&nbsp;&nbsp;&nbsp;<a href="__APP__/News/Index">公告</a>&nbsp;&nbsp;&nbsp;<a href="__APP__/Order/Index">订单</a>&nbsp;&nbsp;&nbsp;</font><?php if($userInfo == 0): ?><font class="ao_right"><a href="__APP__/Member/Login">登录</a>&nbsp;&nbsp;&nbsp;<a href="__APP__/Member/Register">注册</a>&nbsp;&nbsp;</font><?php else: ?><font class="ao_right"><a class="ao_box_head">您好,</a><a href="__APP__/Member/Info/Id/<?php echo ($userInfo["uid"]); ?>"><?php echo ($userInfo["username"]); ?></a>&nbsp;&nbsp;<a href="__APP__/Member/Info/Id/<?php echo ($userInfo["uid"]); ?>">资料<a>&nbsp;<a href="__APP__/Member/Logout">退出<a>&nbsp;&nbsp;</font><?php endif; ?>
    </div>
</div>

    <div id="login" class="container_16">
        <div class="grid_16 ch-box-lite">
            <div class="container_16">
                <div id="login_left_frame" class='grid_2'>
                    <a>&nbsp;</a>
                </div>
                <div id="login_main_frame" class="grid_10">
                    <div id="login_form_title">
                            <a><b><h1>登录</h1><b></a>
                            <hr />
                        </div>
                        <form name="login_form" id="login_form" method="post">
                            <div class="ch-form-row">
                                <label>用户名:</label>
                                <input type="text" size="30" name="username" id="login_username" />
                                <i class="ch-form-ico-inner ch-icon-user"></i>
                            </div>
                            <div class="ch-form-row">
                                <label>密&nbsp;&nbsp;&nbsp;码:</label>
                                <input type="password" size="30" name="password" id="login_password" />
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                            </div>
                            <div class="ch-form-row">
                                <label>验证码:</label>
                                <input type="text" name="verify" id="login_verify" size="30"/>
                                <i class="ch-form-ico-inner ch-icon-refresh"></i>
                            </div>
                            <div class="ch-form-row">
                                <label></label>
                                <img id="Verify" src="__APP__/Public/Verify" />
                                <font class="register_verify_info">&nbsp;&nbsp;&nbsp;看不清？点击验证码刷新。</font>
                            </div>
                        </form> 
                        <div class="ch-form-actions">
                            <button name="login_submit" id="login_submit" class="ch-btn">登录</button>
                            <a onclick="javascript:history.go(-1);">取消</a>
                        </div>
                    </div>
                <div>
            </div>
        </div>
        <div id="login_right_frame" class="grid_3">
            <a>&nbsp;</a>
        </div>
    </div>

<script src="./Static/js/ao.js"></script>
    <script type="text/javascript">
        $("#Verify").click(function(){
            document.getElementById('Verify').src = "__APP__/Public/Verify";
        });

        function getId(id){
            return document.getElementById(id);
        }

        $("#login_submit").click(function(){
            var login = {
                username:getId('login_username'),
                password:getId('login_password'),
                verify:getId('login_verify')
            };
            var formCheck = {
                username:false,
                password:false,
                verify:false
            };
            $.post('__APP__/Api/Member/Mod/Login', $('#login_form').serialize(), function(data){
                $.artDialog({
                    id:'login_msg',
                    title:'登录',
                    content:data.info,
                    lock:true,
                    fixed:true
                });
                if(data.status != 0){
                    getId('Verify').src = '__APP__/Public/Verify';
                }
                switch(data.status){
                    case 1:
                        login.verify.value = '';
                        break;
                    case 2:
                        login.username.value = '';
                        login.verify.value = '';
                        break;
                    case 3:
                        login.password.value = '';
                        login.verify.value = '';
                        break;
                    default :
                        break;
                }


            }); 
        });
    </script>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>