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

    <div id="news-add" class="container_16">
        <div id="news-add-main" class="grid_16 ch-box-lite">
            <div id="news-add-form-area">
                <a class="ao_box_head"><h3>发布公告</h3></a>
                <form id="news-add-form" name="news-add-form" method="post">
                    <div class="ch-form-row">
                        <label>标题：</label>
                        <input type="text" id="news-add-title" name="title" size="80"/>
                    </div>
                    <div class="ch-form-row">
                        <label>内容：</label>
                        <textarea cols="80" rows="15" id="content"></textarea>
                    </div>
                    <div class="ch-form-row">
                        <label>验证码：</label>
                        <input type="text" name="verify" id="login_verify" size="30"/>
                        <i class="ch-form-ico-inner ch-icon-refresh"></i>
                    </div>
                    <div class="ch-form-row">
                        <label></label>
                        <img id="Verify" src="__APP__/Public/Verify" />
                        <font class="register_verify_info">&nbsp;&nbsp;&nbsp;看不清？点击验证码刷新。</font>   
                    </div>
                </form>
                    <div class="ch-form-row">
                        <label>&nbsp;</label>
                        <button class="ch-btn" id="add-news-btn">发布</button>
                        <a>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <button class="ch-btn ch-btn-skin" id="add-news-btn">取消</button>
                    </div>
            </div>
        </div>
    </div>
<script src="./Static/js/ao.js"></script>
    <script type="text/javascript">
        $("#Verify").click(function(){
            getId('Verify').src = "__APP__/Public/Verify";
        });

        function getId(id){
            return document.getElementById(id);
        }
    </script>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>