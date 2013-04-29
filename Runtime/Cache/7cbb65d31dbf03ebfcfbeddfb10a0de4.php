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
                        <li><a><?php echo L('step1');?></a></li>
                        <li class="ch-wizard-current"><a><?php echo L('step2');?></a></li>
                        <li class="ch-wizard-step"><?php echo L('step3');?></li>
                        <li class="ch-wizard-step"><?php echo L('step4');?></li>
                    </ol>
                    <div class="ch-box-container">
                        <h2><?php echo L('reg');?></h2>
                        <hr />
                        <form name="register-form" id="register-form" method="post">
                            <div class="ch-form-row">
                                <label><?php echo L('username');?></label>
                                <input type="text" name="username" id="username" size="30" onchange="CheckUsername();"/>
                                <i class="ch-form-ico-inner ch-icon-user"></i>
                                <a class="ch-box-help" id="username-msg"><?php echo L('setUsername');?></a>
                            </div>
                            <div class="ch-form-row">
                                <label><?php echo L('password');?></label>
                                <input type="password" name="password" id="password" size="30" onchange="CheckPassword();"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="password-msg"><?php echo L('setPassword');?></a>
                            </div>
                            <div class="ch-form-row">
                                <label><?php echo L('confirmPassword');?></label>
                                <input type="password" name="password2" id="password2" size="30" onchange="CheckPassword2();"/>
                                <i class="ch-form-ico-inner ch-icon-lock"></i>
                                <a class="ch-box-help" id="password2-msg"><?php echo L('setPassword');?></a>
                            </div>
                            <div class="ch-form-row">
                                <label><?php echo L('verify');?></label><input type="text" name="verify" id="verify" size="30" onchange="CheckVerify();"/>
                                <i class="ch-form-ico-inner ch-icon-refresh"></i>
                                <a class="ch-box-help" id="verify-msg"><?php echo L('setVerify');?></a></br>
                            </div>
                            <div class="ch-form-row">
                                <label></label><img id="Verify" src="__APP__/Public/Verify" /><font class="verify-info"><?php echo L('refreshVerify');?></font></br>
                            </div>
                        </form>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);"><?php echo L('returnPre');?></button>
                        <a onclick="Register();"><?php echo L('nextStep');?></a>
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
                                passwordMsg.innerHTML = '<?php echo L('passwordFormatTrue');?>';
                            }
                            else{
                                passwordMsg.className = 'ch-box-error';
                                passwordMsg.innerHTML = '<?php echo L('inputTruePassword');?>';
                                password.focus();
                            }
                        }



                        function CheckPassword2(){
                            var password2 = getID("password2");
                            var password2Msg = getID('password2-msg');
                            if(password2.value.search(/^([a-zA-Z0-9_-]){8,16}$/) != -1){
                                password2Msg.className = 'ch-box-ok';
                                password2Msg.innerHTML = '<?php echo L('passwordFormatTrue');?>';
                            }
                            else{
                                password2Msg.className = 'ch-box-error';
                                password2Msg.innerHTML = '<?php echo L('inputTruePassword');?>';
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
                        <li><a><?php echo L('step1');?></a></li>
                        <li><a><?php echo L('step2');?></a></li>
                        <li class="ch-wizard-current"><?php echo L('step3');?></li>
                        <li class="ch-wizard-step"><?php echo L('step4');?></li>
                    </ol>
                    <div class="ch-box-container">
                        <h2><?php echo L('info');?></h2>
                        <hr />
                        <form id="register-info" name="register-info" method="post">
                            <div class="ch-form-row">
                                <label><?php echo L('qq');?></label>
                                <input type="text" name="qq" id="qq" size="50" placeholder="<?php echo L('inputQq');?>"/>
                            </div>
                            <div class="ch-form-row">
                                <label><?php echo L('phone');?></label>
                                <input type="text" name="phone" id="phone" size="50" placeholder="<?php echo L('inputPhone');?>"/>
                            </div>
                            <div class="ch-form-row">
                                <label><?php echo L('sex');?></label>
                                <input type="radio" value="0" id="sex" name="sex">
                                <label for="sex"><?php echo L('man');?></label>
                                <a>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                <input type="radio" value="1" id="sex" name="sex">
                                <label for="sex"><?php echo L('woman');?></label>
                            </div>
                            <div class="ch-form-row">
                                <label><?php echo L('professional');?></label>
                                <input type="text" name="professional" id="professional" size="50" placeholder="<?php echo L('inputProfessional');?>"/>
                            </div>
                            <div class="ch-form-row">
                                <label><?php echo L('introduction');?></label>
                                <textarea name="introduction" id="introduction" placeholder="<?php echo L('inputIntroduction');?>" cols="50" rows="10"></textarea>
                            </div>
                            <input type="hidden" name="regSid" value="<?php echo (session('regSid')); ?>" />
                        </form>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);"><?php echo L('returnPre');?></button>
                        <a onclick="RegisterInfo();"><?php echo L('nextStep');?></a>
                    </div>
                    <script type="text/javascript">
                        function RegisterInfo(){
                            $.post('__APP__/Api/Member/Mod/RegisterInfo', $('#register-info').serialize(), function(data){
                                if(data.status == 0){
                                    var errorBoxTitle = '<?php echo L('trueTitle');?>';
                                    var errorBoxStyle = 'ch-box-ok';
                                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Register/Step/4">';
                                    var errorBoxClose = '';
                                }
                                else{
                                    var errorBoxTitle = '<?php echo L('falseTitle');?>';
                                    var errorBoxStyle = 'ch-box-error';
                                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Register/Step/3">';
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
                    </script>
                <?php elseif($step == 4): ?>
                    <ol class="ch-wizard-breadcrumb ch-steps-four">
                        <li><a><?php echo L('step1');?></a></li>
                        <li><a><?php echo L('step2');?></a></li>
                        <li><a><?php echo L('step3');?></a></li>
                        <li class="ch-wizard-current"><?php echo L('step4');?></li>
                    </ol>
                    <div class="ch-box-container">
                        <h2><?php echo L('regOk');?></h2>
                        <p><?php echo L('regOkInfo');?></p>
                    </div>
                    <div class="ch-actions">
                        <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);"><?php echo L('returnPre');?></button>
                        <a onclick="ConfirmReg();"><?php echo L('clickReg');?></a>
                    </div>
                    <script type="text/javascript">
                        function ConfirmReg(){
                            $.getJSON('__APP__/Api/Member/Mod/RegOk', function(data){
                                if(data.status == 0){
                                    var errorBoxTitle = '<?php echo L('trueTitle');?>';
                                    var errorBoxStyle = 'ch-box-ok';
                                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Login">';
                                    var errorBoxClose = '';
                                }
                                else{
                                    var errorBoxTitle = '<?php echo L('falseTitle');?>';
                                    var errorBoxStyle = 'ch-box-error';
                                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/Member/Register/Step/4">';
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
                    </script>
                <?php else: ?>
                    <ol class="ch-wizard-breadcrumb ch-steps-four">
                        <li class="ch-wizard-current"><?php echo L('step1');?></li>
                        <li class="ch-wizard-step"><?php echo L('step2');?></li>
                        <li class="ch-wizard-step"><?php echo L('step3');?></li>
                        <li class="ch-wizard-step"><?php echo L('step4');?></li>
                    </ol>
                    <div class="ch-box-container">
                        <h2><?php echo L('agreeMent');?></h2>
                        <hr />
                        <p><?php echo L('agreeMentInfo');?></p>
                    </div>
                    <div class="ch-actions">
                       <button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);"><?php echo L('cancel');?></button>
                        <a onclick="AgreeReg();"><?php echo L('agreeAgreement');?></a>
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
                    verifyMsg.innerHTML = '<?php echo L('verifyOk');?>';
                }
                else{
                    verifyMsg.className = 'ch-box-error';
                    verifyMsg.innerHTML = '<?php echo L('verifyError');?>';
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