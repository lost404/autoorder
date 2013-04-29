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
 
    <div id="news" class="container_16">
        <div id="news_main" class="grid_16 ch-box-lite">
            <div id="news_head">
                <h5><a class="ao_box_head"><b>公告</b></a><?php if($userInfo["group"] == 1): ?><a class="ao_box_head ao_right" href="__APP__/News/Add"><b>添加公告</b><a/><?php endif; ?></h5>
            </div>
            <div id="news_feed">
                <div class="news_feed container_16">
                    <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$News): $mod = ($i % 2 );++$i;?><div class="news_feed_each">
                            <a href="__APP__/News/View/Id/<?php echo ($News["nid"]); ?>" class="grid_12 news_feed_title" target="_blank"><?php echo ($News["title"]); ?></a>
                            <a class="grid_4 news_feed_time"><?php echo (date("Y-m-d h:i:s",$News["time"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                   
                </div>
            </div>
        </div>
    </div>

    <div id="order" class="container_16">
        <div id="order_main" class="grid_16 ch-box">
            <div id="order_head">
                <a class="ao_box_head"><h5><b>订单</b></h5></a>
            </div>
            <div id="order_box1" class="container_16">
                <div id="order_box1_main" class="grid_15 ch-box-lite">
                    <div id="order_box1_head">
                        <a class="ao_box_head" href="__APP__/Order/Area/Id/1"><b>订单发布一区</b></a>
                    </div>
                </div>
            </div>
            <div id="order_box2" class="container_16">
                <div id="order_box2_main" class="grid_15 ch-box-lite">
                    <div id="order_box2_head">
                        <a class="ao_box_head" href="__APP__/Order/Area/Id/2"><b>订单发布二区</b></a>
                    </div>
                </div>
            </div>
            <div id="order_box3" class="contaner_16">
                <div id="order_box3_main" class="grid_15 ch-box-lite">
                    <div id="order_box1_head">
                        <a class="ao_box_head" href="__APP__/Order/Area/Id/3"><b>自助广告发布区</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>