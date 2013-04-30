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

    <div id="main" class="container_16">
        <div id="main-frame" class="grid_16 ch-box-lite">
            <div id="news-list" class="container_16">
                <div id="news-list-main" class="grid_16">
                    <table class="ch-datagrid">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo L('newsTitle');?></th>
                                <th scope="col"><?php echo L('saveDate');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$News): $mod = ($i % 2 );++$i;?><tr>
                                    <td><a href="__URL__/View/Id/<?php echo ($News["nid"]); ?>" target="_blank"><?php echo ($News["title"]); ?></a></td>
                                    <td><?php echo (date("Y-m-d H:i:s",$News["time"])); ?></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="ch-box-lite">
                        <ul class="ch-pagination">
                            <li><a type="prev"><?php echo L('Previous');?></a></li>
                            <li class="ch-pagination-current"><a href="__ACTION__/Id/1/Page/1">1</a></li>
                            <li><a href="__ACTION__/Id/1/Page/2">2</a></li>
                            <li><a href="__ACTION__/Id/1/Page/3">3</a></li>
                            <li><a href="__ACTION__/Id/1/Page/4">4</a></li>
                            <li><a href="__ACTION__/Id/1/Page/5">5</a></li>
                            <li><a type="next" href="__ACTION__/Id/1/Page/2"><?php echo L('Next');?></a></li>
                        </ul>
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