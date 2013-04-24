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

    <div id="register" class="container_16">
        <div id="register-main" class="grid_16 ch-box-lite">
            <div class="ch-wizard">
                <?php if($step == 2): ?><ol class="ch-wizard-breadcrumb ch-steps-four">
                        <li><a>第一步：阅读协议</a></li>
                        <li class="ch-wizard-current"><a>第二步：注册帐号</a></li>
                        <li class="ch-wizard-step">第三步：完善信息</li>
                        <li class="ch-wizard-step">第四步：注册成功</li>
                    </ol>
                    <div class="ch-box-container">
                        <h2>注册</h2>
                        <hr />
                        <form name="register" id="register" method="post">
                            <div class="ch-form-row">
                                <label>用户名：</label>
                                <input type="text" name="username" id="username" size="30" onchange="CheckUsername();"/>
                                <i class="ch-form-ico-inner ch-icon-user"></i>
                                <a class="ch-box-help" id="ao_register_username_msg">请设置您的用户名！</a>
                            </div>
                            <div class="ch-form-row">
                                <label>密码：</label>
                                <input type="password" name="username" id="username" size="30"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="ao_register_password_msg">请设置您的密码！</a>
                            </div>
                            <div class="ch-form-row">
                                <label>确认密码：</label>
                                <input type="password" name="username" id="username" size="30"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="ao_register_password_msg">请设置您的密码！</a>
                            </div>
                            <div class="ch-form-row">
                                <label>验&nbsp;&nbsp;证&nbsp;&nbsp;码&nbsp;：</label><input type="text" name="verify" id="ao_register_verify" size="30" />
                                <i class="ch-form-ico-inner ch-icon-refresh"></i>
                                <a class="ch-box-help" id="ao_register_verify_msg">请输入下图的验证码！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label></label><img id="Verify" src="__APP__/Public/Verify" /><font class="register_verify_info">&nbsp;&nbsp;&nbsp;看不清？点击验证码刷新.</font></br>
                            </div>
                        </form>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);">返回上一步</button>
                        <a href="__ACTION__/Step/<?php echo ($step+1); ?>">确认，下一步</a>
                    </div>
                <?php elseif($step == 3): ?>
                    <ol class="ch-wizard-breadcrumb ch-steps-four">
                        <li><a>第一步：阅读协议</a></li>
                        <li><a>第二步：注册帐号</a></li>
                        <li class="ch-wizard-current">第三步：完善信息</li>
                        <li class="ch-wizard-step">第四步：注册成功</li>
                    </ol>
                    <div class="ch-box-container">
                        <h2>完善信息</h2>
                        <hr />
                        <form id="register-info" name="register-info" method="post">
                            <div class="ch-form-row">
                                <label>QQ号：</label>
                                <input type="text" name="qq" id="qq" size="50" placeholder="请填写您的QQ号。"/>
                            </div>
                            <div class="ch-form-row">
                                <label>手机号：</label>
                                <input type="text" name="phone" id="phone" size="50" placeholder="请填写您的手机号。"/>
                            </div>
                            <div class="ch-form-row">
                                <label>性别：</label>
                                <input type="text" name="professional" id="professional" size="50" placeholder="请选择您的性别。"/>
                            </div>
                            <div class="ch-form-row">
                                <label>职业：</label>
                                <input type="text" name="professional" id="professional" size="50" placeholder="请填写您的职业。"/>
                            </div>
                            <div class="ch-form-row">
                                <label>简介：</label>
                                <textarea name="introduction" id="introduction" placeholder="请填写您的简介。" cols="50" rows="10"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);">返回上一步</button>
                        <a href="__ACTION__/Step/<?php echo ($step+1); ?>">确认，下一步</a>
                    </div>
                <?php elseif($step == 4): ?>
                    <ol class="ch-wizard-breadcrumb ch-steps-four">
                        <li><a>第一步：阅读协议</a></li>
                        <li><a>第二步：注册帐号</a></li>
                        <li><a>第三步：完善信息</a></li>
                        <li class="ch-wizard-current">第四步：注册成功</li>
                    </ol>
                    <div class="ch-box-container">
                        <h2>注册成功</h2>
                        <p>您好，感谢您的注册，您的帐号已经注册成功了，请点击完成按钮来登录您的帐号。感谢您对我们的支持，谢谢。</p>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);">返回上一步</button>
                        <a href="__APP__/Member/Login">注册成功，点此登录</a>
                    </div>
                <?php else: ?>
                    <ol class="ch-wizard-breadcrumb ch-steps-four">
                        <li class="ch-wizard-current">第一步：阅读协议</li>
                        <li class="ch-wizard-step">第二步：注册帐号</li>
                        <li class="ch-wizard-step">第三步：完善信息</li>
                        <li class="ch-wizard-step">第四步：注册成功</li>
                    </ol>
                    <div class="ch-box-container">
                        <h2>注册协议</h2>
                        <hr />
                        <p>以下是本站注册协议，请认真阅读。</p>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);">取消</button>
                        <a href="__ACTION__/Step/<?php echo ($step+1); ?>" >同意注册协议，下一步</a>
                    </div><?php endif; ?>
                
            </div>
        </div>
    </div>

<script src="./Static/js/ao.js"></script>
    <script type="text/javascript">
        function getID(id){
            return document.getElementById(id);
        }
        function CheckUsername(){
            $.getJSON('__APP__/Api/Member/Mod/CheckUsername/username/'+getID('username').value, function(data){
                if(data.data.uid != null){
                    alert(data.data.uid);
                }
            });
        }
    </script>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>