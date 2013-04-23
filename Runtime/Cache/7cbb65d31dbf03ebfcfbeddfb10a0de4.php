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
                <ol class="ch-wizard-breadcrumb ch-steps-four">
                    <?php if($step == 2): ?><li><a>第一步：阅读协议</a></li>
                        <li class="ch-wizard-current"><a>第二步：注册帐号</a></li>
                        <li class="ch-wizard-step">第三步：完善信息</li>
                        <li class="ch-wizard-step">第四步：注册成功</li>
                    <?php elseif($step == 3): ?>
                        <li><a>第一步：阅读协议</a></li>
                        <li><a>第二步：注册帐号</a></li>
                        <li class="ch-wizard-current">第三步：完善信息</li>
                        <li class="ch-wizard-step">第四步：注册成功</li>
                    <?php elseif($step == 4): ?>
                        <li><a>第一步：阅读协议</a></li>
                        <li><a>第二步：注册帐号</a></li>
                        <li><a>第三步：完善信息</a></li>
                        <li class="ch-wizard-current">第四步：注册成功</li>
                    <?php else: ?>
                        <li class="ch-wizard-current">第一步：阅读协议</li>
                        <li class="ch-wizard-step">第二步：注册帐号</li>
                        <li class="ch-wizard-step">第三步：完善信息</li>
                        <li class="ch-wizard-step">第四步：注册成功</li><?php endif; ?>
                </ol>

                <div class="ch-box-container">
                    <h2>Caption heading</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet purus in sapien luctus sodales. Curabitur dui velit, cursus in sagittis aliquam, dictum at neque. Ut gravida scelerisque lorem non pulvinar. Pellentesque et urna vitae nisl porta imperdiet sed nec ipsum. Sed non sem velit. Cras id consectetur tellus.</p>
                </div>

                <div class="ch-actions">
                    <?php if(($step > 0) AND ($step < 5)): ?><button class="ch-btn" id="register-primary" onclick="javascript:history.go(-1);">返回上一步</button>
                        <a href="<?php if($step == 4): ?>__APP__/Member/Login<?php else: ?>__ACTION__/Step/<?php echo ($step+1); endif; ?>">确认，下一步</a><?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<script src="./Static/js/ao.js"></script>
    <script type="text/javascript">

    </script>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>