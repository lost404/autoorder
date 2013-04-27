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
                        <form name="register-form" id="register-form" method="post">
                            <div class="ch-form-row">
                                <label>用户名：</label>
                                <input type="text" name="username" id="username" size="30" onchange="CheckUsername();"/>
                                <i class="ch-form-ico-inner ch-icon-user"></i>
                                <a class="ch-box-help" id="username-msg">请设置您的用户名！</a>
                            </div>
                            <div class="ch-form-row">
                                <label>密码：</label>
                                <input type="password" name="password" id="password" size="30" onchange="CheckPassword();"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="password-msg">请设置您的密码！</a>
                            </div>
                            <div class="ch-form-row">
                                <label>确认密码：</label>
                                <input type="password" name="password2" id="password2" size="30" onchange="CheckPassword2();"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="password2-msg">请设置您的密码！</a>
                            </div>
                            <div class="ch-form-row">
                                <label>验&nbsp;&nbsp;证&nbsp;&nbsp;码&nbsp;：</label><input type="text" name="verify" id="verify" size="30" onchange="CheckVerify();"/>
                                <i class="ch-form-ico-inner ch-icon-refresh"></i>
                                <a class="ch-box-help" id="verify-msg">请输入下图的验证码！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label></label><img id="Verify" src="__APP__/Public/Verify" /><font class="verify-info">&nbsp;&nbsp;&nbsp;看不清？点击验证码刷新.</font></br>
                            </div>
                        </form>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);">返回上一步</button>
                        <a onclick="Register();">确认，下一步</a>
                    </div>
                    <script type="text/javascript">
                        function CheckUsername(){
                            $.getJSON('__APP__/Api/Member/Mod/CheckUsername/username/'+getID('username').value, function(data){
                                var usernameMsg = getID("username-msg");
                                if(data.status != 0){
                                    usernameMsg.className = 'ch-box-error';
                                    getID("username").focus();
                                }
                                else{
                                    usernameMsg.className = 'ch-box-ok';
                                }
                                usernameMsg.innerHTML = data.info;
                            });
                        }



                        function CheckPassword(){
                            var password = getID("password");
                            var passwordMsg = getID('password-msg');
                            if(password.value.search(/^([a-zA-Z0-9_-]){8,16}$/) != -1){
                                passwordMsg.className = 'ch-box-ok';
                                passwordMsg.innerHTML = '密码格式正确！';
                            }
                            else{
                                passwordMsg.className = 'ch-box-error';
                                passwordMsg.innerHTML = '请输入8-16位的密码！';
                                password.focus();
                            }
                        }



                        function CheckPassword2(){
                            var password2 = getID("password2");
                            var password2Msg = getID('password2-msg');
                            if(password2.value.search(/^([a-zA-Z0-9_-]){8,16}$/) != -1){
                                password2Msg.className = 'ch-box-ok';
                                password2Msg.innerHTML = '密码格式正确！';
                            }
                            else{
                                password2Msg.className = 'ch-box-error';
                                password2Msg.innerHTML = '请输入8-16位的密码！';
                                password2.focus();
                            }
                        }



                        function Register(){
                            $.post('__APP__/Api/Member/Mod/Register', $("#register-form").serialize(), function(data){
                                    if(data.status == 0){
                                        var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Register/Step/3">';
                                        var errorBoxStyle = 'ch-box-ok';
                                        var errorBoxTitle = '<?php echo L('trueTitle');?>';
                                        var errorBoxClose =  '';
                                    }
                                    else if(data.status == 3){
                                        var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Register/Step/2">';
                                        var errorBoxStyle = 'ch-box-error';
                                        var errorBoxTitle = '<?php echo L('falseTitle');?>';
                                        var errorBoxClose =  '';
                                    }
                                    else{
                                        var errorBoxToUrl = '';
                                        var errorBoxStyle = 'ch-box-error';
                                        getID('verify').value = '';
                                        getID('Verify').src = "__APP__/Public/Verify";
                                        var errorBoxTitle = '<?php echo L('falseTitle');?>';
                                        var errorBoxClose =  '<?php echo L('closeBox');?>';
                                    }
                                    $.artDialog({
                                        id: 'errorBox_',
                                        title: errorBoxTitle,
                                        lock: true,
                                        fixed: true,
                                        time: 3000,
                                        content: '<div class="'+ errorBoxStyle+ '">' +errorBoxToUrl +'<p><h4>'+ data.info+ '</h4></br><a class="ao_box_head">'+ errorBoxClose+ '</a></p></div>'
                                    });
                                    CheckUsername();
                                    CheckPassword();
                                    CheckPassword2();
                                    CheckVerify();
                            });
                        }
                    </script>
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
                                <input type="radio" value="0" id="sex" name="sex">
                                <label for="sex">男</label>
                                <a>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                <input type="radio" value="1" id="sex" name="sex">
                                <label for="sex">女</label>
                            </div>
                            <div class="ch-form-row">
                                <label>职业：</label>
                                <input type="text" name="professional" id="professional" size="50" placeholder="请填写您的职业。"/>
                            </div>
                            <div class="ch-form-row">
                                <label>简介：</label>
                                <textarea name="introduction" id="introduction" placeholder="请填写您的简介。" cols="50" rows="10"></textarea>
                            </div>
                            <input type="hidden" name="regSid" value="<?php echo (session('regSid')); ?>" />
                        </form>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);">返回上一步</button>
                        <a onclick="RegisterInfo();">确认，下一步</a>
                    </div>
                    <script type="text/javascript">
                        function RegisterInfo(){
                            $.post('__APP__/Api/Member/Mod/RegisterInfo', $('#register-info').serialize(), function(data){
                                alert(data.info);
                            });
                        }
                    </script>
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
                        <a onclick="AgreeReg();">同意注册协议，下一步</a>
                    </div>
                    <script type="text/javascript">
                        function AgreeReg(){
                            $.getJSON('__APP__/Api/Member/Mod/Agree', function(data){
                                if(data.status == 0){
                                    var errorBoxTitle = '<?php echo L('trueTitle');?>';
                                    var errorBoxStyle = 'ch-box-ok';
                                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Register/Step/2">';
                                    var errorBoxClose = '';
                                }
                                else{
                                    var errorBoxTitle = '<?php echo L('falseTitle');?>';
                                    var errorBoxStyle = 'ch-box-error';
                                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Register/Step/1">';
                                    var errorBoxClose =  '<?php echo L('closeBox');?>';
                                }
                                $.artDialog({
                                    id: 'agree',
                                    title: errorBoxTitle,
                                    lock: true,
                                    fixed: true,
                                    content: '<div class="'+ errorBoxStyle+ '">' +errorBoxToUrl +'<p><h4>'+ data.info+ '</h4></br><a class="ao_box_head">'+ errorBoxClose+ '</a></p></div>',
                                    time: 3000
                                });
                            });
                        }
                    </script><?php endif; ?>
                
            </div>
        </div>
    </div>

<script src="./Static/js/ao.js"></script>
    <script type="text/javascript">
        function getID(id){
            return document.getElementById(id);
        }



        $("#Verify").click(function(){
            getID('Verify').src = "__APP__/Public/Verify";
        }); 



        function CheckVerify(){
            var verify = getID('verify');
            var verifyMsg = getID('verify-msg');
            $.getJSON('__APP__/Public/VerifyCheck', {Verify:verify.value}, function(data){
                if(data.check == 1){
                    verifyMsg.className = 'ch-box-ok';
                    verifyMsg.innerHTML = '验证码正确！';
                }
                else{
                    verifyMsg.className = 'ch-box-error';
                    verifyMsg.innerHTML = '验证码错误！';
                    getID('Verify').src = "__APP__/Public/Verify";
                    verify.focus();
                }
            });
        }

    </script>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>