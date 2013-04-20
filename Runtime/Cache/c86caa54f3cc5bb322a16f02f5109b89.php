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
        <div class="grid_16 ch-box-lite">
            <div class="container_16">
                
                <div id="news_main" class="grid_12">
                    <div id="news_title">
                        <a><h3>这是一篇测试的公告新闻！</h3></a>
                    </div>
                    <hr />
                    <div id="news_content">
        	            后台处理程序：</p>
                            1. 该订单的状态由已接单变为付款准备</p>
        2. 退单按钮变为灰色，点击“我已经满意”按钮后发单人将不可退单。</p>
        </p>
        在付款准备阶段，接单人将被告知“此时您的报酬金额已被冻结，发单方已无法申请退款。您可以放心的将完成品作品发给发单方”</p>
        </p>
        发单人接到接单人的完成品后，只需确认是否完整以及是否跟之前的半成品是同一作品。此时发单人不能提出任何对作品质量不满意的要求，因为之前已经点击“我已经满意”按钮并经过了确认页面里的接受最终协议，不能反悔或者要求退单等无赖行为。</p>
        此时发单人只有两个按钮可以按：一个是“确认满意无误”，在扣除交易手续费后把款打给接单人账户。同时订单状态由付款准备变为交易成功</p>
        </p>
        另一个按钮是“申请人工服务”，也就是说接单人没有把已经做好的作品发给你，接单人钱到了口袋边不想捡的情况。这种情况极为少见。如果出现的话将由人工客服参与交涉。</p>
        客服如果发现作品确实符合订单要求，发单人不想给钱的话，将强制完成订单，并扣减发单人信誉度（就是经验值）</p>
        客服如果发现接单人确实故意刁难发单人有钱还不想赚的话，可以强制将订单退回到未接单状态，全额退还发单人的报酬金额，并扣减接单人信誉度。</p>
        </p>
        订单交易成功，则双方信誉度+等同于报酬金额的值</p>
        报酬为200人民币的话，则交易成功后双方信誉度+200</p>
        “确认满意无误”按钮的后台处理为：</p>
        1. 从报酬金中扣除相应接单人等级的手续费，把剩余报酬金打给接单人。</p>
        2. 增加双方信誉度。</p>
        </p>
        注：信誉度有一个乘法系数a默认等于1，例如订单成功后双方加信誉度200*a=200</p>
            通过充值升级成为黄金会员后可以改变这个系数。黄金会员成功交易后取得的信誉度为5倍也就是a=5。同样的订单可以取得200*a=1000的信誉度。</p>
                    </div>
                </div>
                <div id="news_right" class="grid_4">
                    <div id="news_like">
                        <a>相关公告</a>
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