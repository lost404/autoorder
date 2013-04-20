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

        <div id="register" class="container_16 ch-box-container">
            <div class="grid_16 ch-box-lite">
                <div class="container_16">
                    <div class="grid_2">
                        <a>&nbsp;</a>
                    </div>
                    <div class="grid_12">
                        <div id="ao_register_form_title">
                            <a><b><h1>注册</h1><b></a>
                        </div>
                        <hr />
                        <form name="ao_register" method="post" id="ao_register">
                            <div class="ch-form-row">
                                <label>用&nbsp;&nbsp;户&nbsp;&nbsp;名&nbsp;:</label><input type="text" name="username" id="ao_register_username" size="30" value="admin"/>
                                <i class="ch-form-ico-inner ch-icon-user"></i>
                                <a class="ch-box-help" id="ao_register_username_msg">请设置您的用户名！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label>密&nbsp;&nbsp;码&nbsp;:</label><input type="password" name="password" id="ao_register_password" size="30" value="password"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="ao_register_password_msg">请设置您的密码！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label>确&nbsp;认&nbsp;密&nbsp;码&nbsp;:</label><input type="password" name="password2" id="ao_register_password2" size="30" value="password"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="ao_register_password2_msg">请确认您的密码！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label>邮&nbsp;&nbsp;箱&nbsp;:</label><input type="text" name="email" id="ao_register_email" size="30" value="mail@domain.com"/>
                                <i class="ch-form-ico-inner ch-icon-envelope-alt"></i>
                                <a class="ch-box-help" id="ao_register_email_msg">请输入您的常用邮箱！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label>Q&nbsp;&nbsp;Q&nbsp;:</label><input type="text" name="qq" id="ao_register_qq" size="30" value="123456789"/>
                                <i class="ch-form-ico-inner ch-icon-comments"></i>
                                <a class="ch-box-help" id="ao_register_qq_msg">请输入您的QQ号！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label>手&nbsp;&nbsp;机&nbsp;&nbsp;号&nbsp;:</label><input type="text" name="phone" id="ao_register_phone" size="30" value="12345678901"/>
                                <i class="ch-form-ico-inner ch-icon-th"></i>
                                <a class="ch-box-help" id="ao_register_phone_msg">请输入您的手机号！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label>验&nbsp;&nbsp;证&nbsp;&nbsp;码&nbsp;:</label><input type="text" name="verify" id="ao_register_verify" size="30" />
                                <i class="ch-form-ico-inner ch-icon-refresh"></i>
                                <a class="ch-box-help" id="ao_register_verify_msg">请输入下图的验证码！</a></br>
                            </div>
                            <div class="ch-form-row">
                                <label></label><img id="Verify" src="__APP__/Public/Verify" /><font class="register_verify_info">&nbsp;&nbsp;&nbsp;看不清？点击验证码刷新.</font></br>
                            </div>
                        </form>
                            <div class="ch-form-actions">
                                <button name="ao_register_submit" id="ao_register_submit" class="ch-btn reg">注册</button>
                                <a onclick="javascript:history.go(-1);">取消</a>
                            </div>
                    </div>
                    <div class="grid_1">
                        <a>&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
        
<script src="./Static/js/ao.js"></script>
    <script>
    
    /*$("#ao_register_submit").click(function(){
        $.post('__APP__/Api/MemberRegister',  $("#ao_register").serialize(), function(data){
            $.artDialog({
                id:'register_ret',
                title:'Register Ret!',
                content:data,
                lock:true,
                fixed:true
            });
        });
    });*/
    function getId(id){
        return document.getElementById(id);
    }

    $("#ao_register_submit").click(function(){
        var reg = {
            username : getId("ao_register_username"),
            password : getId("ao_register_password"),
            password2 : getId("ao_register_password2"),
            email    : getId("ao_register_email"),
            qq       : getId('ao_register_qq'),
            phone    : getId("ao_register_phone"),
            verify   : getId("ao_register_verify")
        };
        var msg = {
            username : getId("ao_register_username_msg"),
            password : getId("ao_register_password_msg"),
            password2 : getId("ao_register_password2_msg"),
            email    : getId("ao_register_email_msg"),
            qq       : getId('ao_register_qq_msg'),
            phone    : getId("ao_register_phone_msg"),
            verify   : getId("ao_register_verify_msg")
        };
        var formCheck = {
            username : false,
            password : false,
            password2 : false,
            email    : false,
            qq       : false,
            phone    : false,
            verify   : false,
            pCp      : false
        };
        $.getJSON('__APP__/Public/VerifyCheck', {Verify:reg.verify.value}, function(data){
            if(data.check == 1){
                msg.verify.className = 'ch-box-ok';
                msg.verify.innerHTML = '';
                formCheck.verify = true;
            }
            else{
                msg.verify.className = 'ch-box-error';
                msg.verify.innerHTML = '验证码输入错误！';
                document.getElementById('Verify').src = "__APP__/Public/Verify";
                formCheck.verify = false;
            }
            if(reg.username.value.search(/^([\u4E00-\u9FA5a-zA-Z]){1}([\u4E00-\u9FA5a-zA-Z0-9_]){2,7}$/g) != -1){
                msg.username.className = 'ch-box-ok';
                msg.username.innerHTML = '';
                formCheck.username = true;
            }
            else{
                msg.username.className = 'ch-box-error';
                msg.username.innerHTML = '用户名格式错误或长度不够！';
                formCheck.username = false;
            }
            if(reg.password.value.search(/^([a-zA-Z0-9_-]){8,16}$/) != -1){
                msg.password.className = 'ch-box-ok';
                msg.password.innerHTML = '';
                formCheck.password = true;
                }
            else{
                msg.password.className = 'ch-box-error';
                msg.password.innerHTML = '密码格式错误或长度不够！';
                formCheck.password = true;
            }
            if(reg.password2.value.search(/^([a-zA-Z0-9_-]){8,16}$/) != -1){
                msg.password2.className = 'ch-box-ok';
                msg.password2.innerHTML = '';
                formCheck.password2 = true;
                if(reg.password.value == reg.password2.value){
                    msg.password.className = 'ch-box-ok';
                    msg.password2.className = 'ch-box-ok';
                    msg.password.innerHTML = '';
                    msg.password2.innerHTML = '';
                    formCheck.pCp = true;
                    }
                else{
                    msg.password.className = 'ch-box-error';
                    msg.password2.className = 'ch-box-error';
                    msg.password.innerHTML = '两次输入的密码不一样！';
                    msg.password2.innerHTML = '两次输入的密码不一样！';
                    formCheck.pCp = false;
                    }
                }
            else{
                msg.password2.className = 'ch-box-error';
                msg.password2.innerHTML = '密码格式错误或长度不够！';
                formCheck.password2 = false;
            }
            
            if(reg.email.value.search(/^([a-zA-Z0-9_-])+@[a-zA-Z0-9]+((\.|-)[a-zA-Z0-9]+)*\.[a-zA-Z0-9]+$/) != -1){
                msg.email.className = 'ch-box-ok';
                msg.email.innerHTML = '';
                formCheck.email = true;
                }
            else{
                msg.email.className = 'ch-box-error';
                msg.email.innerHTML = '请输入正确的邮箱地址！';
                formCheck.email = false;
            }
            if(reg.qq.value.search(/^[0-9]{6,12}$/) != -1){
                msg.qq.className = 'ch-box-ok';
                msg.qq.innerHTML = '';
                formCheck.qq = true;
                }
            else{
                msg.qq.className = 'ch-box-error';
                msg.qq.innerHTML = '请输入正确的QQ号！';
                formCheck.qq = false;
            }
            if(reg.phone.value.search(/^[0-9]{11}$/) != -1){
                msg.phone.className = 'ch-box-ok';
                msg.phone.innerHTML = '';
                formCheck.phone = true;
                }
            else{
                msg.phone.className = 'ch-box-error';
                msg.phone.innerHTML = '请输入正确的手机号！';
                formCheck.phone = false;
            }
            var checkState = 0;
            var checkList = formCheck;
            for(var x in checkList){
                if(checkList[x] == true){
                    checkState += 1; 
                }
            }
            if(checkState > 7){
                $.post('__APP__/Api/Member/Mod/Register',  $("#ao_register").serialize(), function(data){
                    if(data.status != 0){
                        getId('ao_register_verify').value = '';
                        getId('Verify').src = '__APP__/Public/Verify';
                    }
                    $.artDialog({
                        id:'register_ret',
                        title:'注册',
                        content:data.info,
                        lock:true,
                        fixed:true
                    });
                });
            }
            else{
                checkState = 0;
            }
        });
    });
    
   
    $("#Verify").click(function(){
        document.getElementById('Verify').src = "__APP__/Public/Verify";
    });  

    function verifyCheck(verify){
        $.getJSON('__APP__/Public/VerifyCheck', {Verify:verify}, function(data){
            alert(data.check);
            if(data.check == 1){
                return true;
            }
            else{
                return false;
            }
        });
    }
    
    $('#listtest').click(function(){

    })
    </script>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>